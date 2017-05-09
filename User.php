<?php 

	class User{
		
		private $ID;
		private $userID;
		private $name;
		private $surname;
		private $password;
		private $phoneNumber;
		
		function __construct($ID = null, $userID = null, $name = null, $surname = null, $password = null, $phoneNumber = null){
			
			$this -> ID = $ID;
			$this -> userID = $userID; 
			$this -> name = $name; 
			$this -> surname = $surname; 
			$this -> password = $password; 
			$this -> phoneNumber = $phoneNumber;
		}
		
		public function getID() {
			return $this->ID;
		}
		public function getName() {
			return $this->name;
		}
		public function getSurname() {
			return $this->surname;
		}
		public function getPassword() {
			return $this->password;
		}
		public function getUserID() {
			return $this->userID;
		}
		public function getPhoneNumber() {
			return $this->phoneNumber;
		}
	}


?>