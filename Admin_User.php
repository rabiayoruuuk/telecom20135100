<?php 

	require_once("K:\PHP\htdocs\project\DataLayer\DB.php");
	require_once("K:\PHP\htdocs\project\BusinessLayer\User.php");

	class Admin_User{
		
		public static function deleteUser($ID){
			
			$db = new DB();
			$success = $db->executeQuery("DELETE FROM user WHERE ID = '$ID'");

			return $success;
		}
		
		public static function updateUser($ID, $Name, $Surname, $PhoneNumber){	/* 3 basamak random, 2 basamak isimden 3 basamak soy isimden 0529 þirketin kodu */
			
			$db = new DB();
			$success = $db->executeQuery("UPDATE user SET Name = '$Name', Surname = '$Surname', PhoneNumber = '$PhoneNumber' WHERE ID = '$ID'");
			
			return $success;
		}	
	}
?>
