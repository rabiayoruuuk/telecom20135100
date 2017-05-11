<?php 

	require_once("DataLayer/DB.php");
	require_once("Campaign.php");
	
	class Logic_Campaign {
		
		public static function getCampaigns () {	/* Admin */
			$db = new DB();
			$result = $db->getDataTable("Select * from Campaign");
			
			$campaigns= array();
			
			while($row = $result->fetch_assoc()) {
				$campaignObj = new Campaign($row['ID'], $row['Name'], $row['Minute'], $row['SMS'], $row['Cellular'],  $row['Amount']);
				array_push($campaigns, $campaignObj);
			}

			return $campaigns;
		}
		
		public static function updateCampaign($ID, $Name, $Minute, $Cellular, $Message, $Amount) {	/* Admin */
			
			$db = new DB();
			$success = $db -> executeQuery("UPDATE Campaign SET Name = '$Name', Minute = '$Minute', SMS = '$Message', Cellular = '$Cellular', Amount = '$Amount' WHERE ID = $ID");
			
			return $success;
		}
		
		public static function changecampaign($ID, $campaignID){	/* Tutar bill içerisinde değiştirilmeli */
			
			$date = date("Y-m-d");
			
			if(Logic_Campaign::compareDates($date, $ID)){
				
				$db = new DB();
				$success = $db -> executeQuery("UPDATE usercampaign SET CampaignID = '$campaignID', Date = '$date' WHERE ID = $ID");	//Update yazılcak.
				return $success;
			}
				
			return false;
		}
		
		private static function compareDates($date, $ID){
			
			$db = new DB();
			$success = $db -> executeQuery("Select RegistrationCampaignDate FROM usercampaign WHERE ID = '$ID'");	
						
			$row = $result->fetch_assoc();
			$dateCampaign = $row['RegistrationCampaignDate'];
			
			if($date > $dateCampaign){	/* 30 günden fazla olması kontrol edilecek */
				
				return true;
			}
			
			return false;
		}
	}
?>