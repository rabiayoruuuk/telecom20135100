<?php 

	require_once("K:\PHP\htdocs\project\DataLayer\DB.php");
	require_once("K:\PHP\htdocs\project\BusinessLayer\User.php");

	class Logic_User{
		
		public static function createUser($userID, $name, $surname){
			
			$phoneNumber = Logic_User :: generatePhoneNumber($name, $surname);
			$password = Logic_User :: generatePassword();
			
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO user(Name, Password, PhoneNumber, Surname, UserID) VALUES ('$name', '$password', '$phoneNumber', '$surname', '$userID')");

			return $success;
		}
		
		private static function generatePhoneNumber($name, $surname){	/* 3 basamak random, 2 basamak isimden 3 basamak soy isimden 0529 �irketin kodu */
			
			$nameLength = strlen($name);
			$surnameLength = strlen($surname);
			$random3Length = rand(0, 999);
			
			if($random3Length < 300){
				
				$randomForName = rand(1, 5);
				if($nameLength < 10)
					$nameLength = $randomForName . $nameLength;
				
				$randomForSurname = rand(1, 5);
				if($surnameLength < 10)
					$surnameLength = $randomForSurname . $surnameLength;
			}
			
			if($random3Length > 300){
				
				$randomForName = rand(5, 9);
				if($nameLength < 10)
					$nameLength = $randomForName . $nameLength;
				
				$randomForSurname = rand(5, 9);
				if($surnameLength < 10)
					$surnameLength = $randomForSurname . $surnameLength;
			}
			
			return $phoneNumber = '0529' . $random3Length . $nameLength . $surnameLength;
		}
		
		private static function generatePassword(){	/* �ifrenin uzunlu�u 6 birim olaca�� i�in 6 basamakl� bir random say� bulmal�y�z */
			
			$password = rand(100000, 999999);
			return $password;
		}
		
		public static function getUser(){
			
			$db = new DB();
			$result = $db->getDataTable("Select ID, Name, Surname, PhoneNumber From user order by ID");
			
			$users= array();
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row['ID'], null, $row['Name'], $row['Surname'], null, $row['PhoneNumber']);
				array_push($users, $userObj);
			}
			
			return $users;
		}
		
		public static function deleteUser($phoneNumber, $password, $passwordAgain){
			
			if(Logic_User :: checkPhoneNumberIsTrue($phoneNumber))
				if(Logic_User :: checkPasswordIsTrue($password))
					$isTrue = TRUE;
				else
					return FALSE;
			else 
				return FALSE;
			
			// Compare passwords and delete
			
			if(strcmp($password, $passwordAgain) == 0){
				
				$db = new DB();
				$result = $db->executeQuery("DELETE FROM user WHERE phoneNumber = '$phoneNumber'");
			}
				
			else
				return FALSE;
		}
		
		public static function checkPhoneNumberIsTrue($phoneNumber){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT EXISTS (Select ID From user WHERE PhoneNumber = '$phoneNumber')");
			
			if($result === FALSE)
				return FALSE;
			
			return TRUE;
		}
		
		public static function checkPasswordIsTrue($password){
			
			$db = new DB();
			$result = $db->getDataTable("SELECT EXISTS (Select ID From user WHERE Password = '$password')");
			
			if($result === FALSE)
				return FALSE;
			
			return TRUE;
		}		
	}
?>