<?php 

	class Campaign {
		
		private $ID;
		private $Name;
		private $Amount;
		private $Minute;
		private $Cellular;
		private $Message;
		
		function __construct($ID = NULL, $Name = NULL, $Minute = NULL, $Message = NULL, $Cellular = NULL, $Amount = NULL){
			
			$this->ID = $ID;
			$this->Name = $Name;
			$this->Amount = $Amount;
			$this->Minute = $Minute;
			$this->Cellular = $Cellular;
			$this->Message = $Message;
		}

		public function getID() {
			return $this->ID;
		}
		public function getName() {
			return $this->Name;
		}
		public function getAmount() {
			return $this->Amount;
		}
		public function getMinute() {
			return $this->Minute;
		}
		public function getCellular() {
			return $this->Cellular;
		}
		public function getMessage() {
			return $this->Message;
		}
	}
?>