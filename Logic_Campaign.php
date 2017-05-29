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
		
			date_default_timezone_set('Europe/Istanbul');
			
			$date = date('Y-m-d', time());

			if(Logic_Campaign::compareDates($date, $ID)){
				
				
				echo "ID : " . $ID;
				echo "Campaign ID :" . $campaignID;
				echo "Date : " . $date;
				
				$db = new DB();
				$success = $db -> executeQuery("UPDATE usercampaign SET CampaignID = '$campaignID', RegistrationCampaingDate = '$date' WHERE UserID = '$ID'");	//Update yazılcak.
				
				return $success;
			}
				
			return false;
		}
		
		private static function compareDates($date, $ID){
			
			$db = new DB();
			$result = $db -> getDataTable("Select RegistrationCampaingDate FROM usercampaign WHERE UserID = '$ID'");	
						
			$row = $result->fetch_assoc();
			$dateCampaign = $row['RegistrationCampaingDate'];
			
			if(Logic_Campaign :: diff_date($dateCampaign, $date)){	/* 30 günden fazla olması kontrol edilecek */

				return true;
			}
			
			return false;
		}
		
		private static function diff_date($oldDate, $newDate){
			
			//get fisrt four char for year
			
			$oldYear = substr($oldDate, 0, 4);
			$newYear = substr($newDate, 0, 4);
			
			if($newYear > $oldYear){
				
				echo "asd";
				return true;
			}
			else if($newYear == $oldYear){
				
				$oldMonth = substr($oldDate, 5, 2);
				$newMonth = substr($newDate, 5, 2);
				
				$oldDay = substr($oldDate, 8, 2);
				$newDay = substr($newDate, 8, 2);
		
				if($newMonth > $oldMonth){	/* If months are different check the sum of days */	/* Februrary is 30 */
					
					if($newMonth - $oldMonth > 2){
						
						return true;
					}
					
					if((30 - $oldDay) + $newDay >= 30){
						
						return true;
					}
					else{
						
						return false;
					}
				}
				else if($newMonth == $oldMonth){	/* Some months has 31 days, so this algorithm can handle this stuation */
					
					if($oldDay - $newDay >= 30){
						
						return true;
					}
					else{
						
						return false;
					}
				}
				else{
					
					return false;
				}
			}
			else{	/* If someone can find a way to send wrong entry, the algorithm has t handle it, because of i have used else if and else */ 
				
				return false;
			}
		}
	}
?>