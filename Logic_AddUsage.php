<?php

	require_once("DataLayer/DB.php");
	require_once("AdditionalUsage.php");

	class Logic_AddUsage{
		
		public static function addUsage($usageID, $userID){
			
			$db = new DB();
			
			date_default_timezone_set('Europe/Istanbul');
			$date = date('Y-m-d', time());
			
			$success = $db -> executeQuery("INSERT INTO useradditionalpacket values('$userID', '$usageID', '$date')");
			return $success;
		}
	}
?>