<?php 

	require_once("DataLayer/DB.php");
	require_once("Campaign.php");
	require_once("Bill.php");
	require_once("AdditionalUsage.php");
	
	class Logic_Account {
	
		public static function getCampaignDetails ($userID) {

			$db = new DB();
			$result = $db->getDataTable("SELECT * FROM campaign WHERE ID IN (SELECT CampaignID FROM usercampaign WHERE UserID = '$userID')");
				
			while($row = $result->fetch_assoc()) {
				
				$campaignObj = new Campaign($row['ID'], $row['Name'], $row['Minute'], $row['SMS'], $row['Cellular'],  $row['Amount']);
				
				return $campaignObj;
			}
			
			return false;
		}
		
		public static function getBill($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT Amount, ExpireDate FROM bill WHERE UserID = '$userID'");
			
			while($row = $result->fetch_assoc()) {
				
				$billObj = new Bill(null, $row['Amount'], null, $row['ExpireDate']);
				
				return $billObj;
			}
			
			return false;
		}
		
		public static function getBills($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT BillDate, Amount, PaidorNot, PaymentType FROM oldbill WHERE UserID = '$userID'");
			
			$bills = array();
			
			while($row = $result->fetch_assoc()) {
				$billObj = new Bill(null, $row['Amount'], null, null, null, $row['PaymentType'], $row['PaidorNot'], $row['BillDate']);
				array_push($bills, $billObj);
			}

			return $bills;
		}
		
		public static function getUsages($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT SMS, Minute, Cellular FROM additionalpacket WHERE ID = (SELECT AdditionalPacketID FROM useradditionalpacket WHERE UserID = '$userID')");
			
			$usages = array();

			while($row = $result->fetch_assoc()) {

				$usage = new AdditionalUsage(null, null, null, $row['Minute'], $row['SMS'], $row['Cellular']);
				array_push($usages, $usage);
			}

			return $usages;
		}
	}
?>