<?php 

	require_once("DataLayer/DB.php");
	require_once("Usage.php");
	
	class Logic_HomePage{
		
		public static function getUsage($userID){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT Minute, SMS, Cellular FROM userusage WHERE UserID = '$userID'");
			
			while($row = $result->fetch_assoc()) {
				$usageObj = new Usage(null, $row['Minute'], $row['SMS'], $row['Cellular'], null);
			}

			return $usageObj;	
		}
	}
?>