<?php 
	require_once("DataLayer/DB.php");
	require_once("Campaign.php");
	
	class Logic_Campaign {
		
		public static function getCampaigns () {
			$db = new DB();
			$result = $db->getDataTable("Select * from Campaign");
			
			$campaigns= array();
			
			while($row = $result->fetch_assoc()) {
				$campaignObj = new Campaign($row['ID'], $row['Name'], $row['Minute'], $row['SMS'], $row['Cellular'],  $row['Amount']);
				array_push($campaigns, $campaignObj);
			}

			return $campaigns;
		}
		
		public static function updateCampaign($ID, $Name, $Minute, $Cellular, $Message, $Amount) {
			
			$db = new DB();
			$success = $db -> executeQuery("UPDATE Campaign SET Name = '$Name' WHERE ID = $ID");//Update yazılcak.  
			return "asda";
		}
		
	}
?>