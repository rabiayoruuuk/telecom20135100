<?php

	require_once("K:\PHP\htdocs\project\DataLayer\DB.php");
	require_once("K:\PHP\htdocs\project\BusinessLayer\User.php");

	class Logic_Login{

		public static function login($phoneNumber, $password){
			
			$result = false;
			
			if(Logic_Login::checkPhoneNumber($phoneNumber))
				if(Logic_Login::checkPassword($password))
						$result = true;
			
			return $result;
		}
		
		private static function checkPassword($password){
			
			$db = new DB();
			$result = $db -> getDataTable("SELECT EXISTS (SELECT * FROM user WHERE Password = '$password')");
			
			return $result;
		}
		private static function checkPhoneNumber($phoneNumber){
			
			$db = new DB();
			$result = $db -> getDataTable("SELECT EXISTS (SELECT * FROM user WHERE PhoneNumber = '$phoneNumber')");
			
			return $result;
		}
		public static function getName($phoneNumber){
			
			$db = new DB();
			$result = $db -> getDataTable("SELECT Name FROM user WHERE PhoneNumber = '$phoneNumber'");
			$row = $result->fetch_assoc();
			
			return $row['Name'];
		}
	}
?>