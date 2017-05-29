<?php

	class AdditionalUsage{
		
		private $ID;
		private $Amount;
		private $Name;
		private $SMS;
		private $Minute;
		private $Cellular;
		
		function __construct($ID = null, $Amount = null, $Name = null, $Minute = null, $SMS = null, $Cellular = null){
				
			$this -> ID = $ID;
			$this -> Amount = $Amount; 
			$this -> Name = $Name; 
			$this -> Minute = $Minute; 
			$this -> SMS = $SMS; 
			$this -> Cellular = $Cellular;
		}
		
		public function getID() {
			return $this->ID;
		}
		public function getAmount() {
			return $this->Amount;
		}
		public function getName() {
			return $this->Name;
		}
		public function getMinute() {
			return $this->Minute;
		}
		public function getSMS() {
			return $this->SMS;
		}
		public function getCellular() {
			return $this->Cellular;
		}
	}
?>