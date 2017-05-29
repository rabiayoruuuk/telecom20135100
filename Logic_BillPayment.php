<?php

	require_once("DataLayer/DB.php");
	require_once("Bill.php");
	require_once("Logic_Account.php");
	
	class Logic_BillPayment{
		
		public static function getBills($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT ID, BillDate, Amount, PaidorNot, PaymentType FROM oldbill WHERE UserID = '$userID'");
			
			$bills = array();
			
			while($row = $result->fetch_assoc()) {
				$billObj = new Bill($row['ID'], $row['Amount'], null, null, null, $row['PaymentType'], $row['PaidorNot'], $row['BillDate']);
				array_push($bills, $billObj);
			}

			return $bills;
		}
		
		public static function payBill($userID, $billID, $name, $cardNumber, $cvv, $date){
			
			/* Paid or not ı değiştirmeliyiz */ /* Zamanı gelmeden hiç bir fatura ödenemez zaten bir fatyuranın zamanı gelkmişse old bills e düşer */ /* Choose butonunu deaktive etme */	/* Diğer servislerle iletişime geçme */
			$db = new DB();
			$success = $db->executeQuery("UPDATE oldBill SET PaidorNot = 1 WHERE UserID = '$userID'");
			
			return $success;
		}
	}
?>