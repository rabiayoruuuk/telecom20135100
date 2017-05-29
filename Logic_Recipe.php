<?php 

	require_once("DataLayer/DB.php");
	require_once("Bill.php");
	require_once("AdditionalUsage.php");

	class Logic_Recipe{
		
		public static function getBill($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT ExpireDate, BillDate, Amount FROM bill WHERE UserID = '$userID'");
				
			while($row = $result->fetch_assoc()) {
				$billObj = new Bill(null, $row['Amount'], null, $row['ExpireDate'], null, null, null, $row['BillDate']);
			}

			return $billObj;
		}
		
		public static function getAdditionalUsage($userID){

			$db = new DB();
			$result = $db->getDataTable("SELECT AdditionalPacketID FROM useradditionalpacket WHERE UserID = '$userID'");

			while($row = $result->fetch_assoc()) {
				return TRUE;
			}

			return FALSE;
		}
		
		
	}
?>