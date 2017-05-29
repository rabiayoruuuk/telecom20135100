<?php 

	require_once("DataLayer\DB.php");
	require_once("User.php");
	require_once("CallService.php");

	class Logic_User{
		
		public static function createUser($userID, $name, $surname){
			
			$phoneNumber = Logic_User :: generatePhoneNumber($name, $surname);
			$password = Logic_User :: generatePassword();
			
			$db = new DB();

			/* We have to call civil registry web service */
			/* if it returns true, query will be executed else return will be false */
			if(CallService::callServices($userID, "Civil Registry") === "TRUE"){	/* T.C. Personal unique number */
			
				$success = $db->executeQuery("INSERT INTO user(Name, Password, PhoneNumber, Surname, UserID) VALUES ('$name', '$password', '$phoneNumber', '$surname', '$userID')");
				return TRUE;
			}
			else{
				
				return FALSE;
			}
		}
		
		private static function generatePhoneNumber($name, $surname){	/* 3 basamak random, 2 basamak isimden 3 basamak soy isimden 0529 þirketin kodu */
			
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
		
		private static function generatePassword(){	/* Þifrenin uzunluðu 6 birim olacaðý için 6 basamaklý bir random sayý bulmalýyýz */
			
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
		
		public static function changePassword($oldPassword, $newPassword, $newPasswordAgain){
			
			$result = null;
			
			if(Logic_User::checkPasswordIsTrue($oldPassword)){
				
				if(strcmp($newPassword, $newPasswordAgain) == 0){
					
					$db = new DB();
					$result = $db->executeQuery("UPDATE user SET Password = '$newPassword' WHERE Password = '$oldPassword'");
				}	
			}
				
			return $result;
		}
		
		public static function getIDWithPhoneNumber($phoneNumber){
			
			$db = new DB();
			$result = $db->getDataTable("Select ID From user WHERE PhoneNumber = '$phoneNumber'");
			
			$row = $result->fetch_assoc();
			
			return $row['ID'];
		}
		
		public static function getIDWithUserID($userID){
			
			$db = new DB();
			$result = $db->getDataTable("Select ID From user WHERE UserID = '$userID'");
			
			$row = $result->fetch_assoc();
			
			return $row['ID'];
		}
		
		public static function getBillInfo($userID){
			
			$db = new DB();
			$result = $db->getDataTable("Select ID From oldbill WHERE UserID = '$userID' AND PaidorNot = 1");
			
			$row = $result->fetch_assoc();
			
			if($row['ID'] != NULL){
				
				return true;
			}
			else{
				
				return false;
			}
		}
	}
?>
