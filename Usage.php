<?php

	class Usage{
		
		private $UserID;
		private $UsageDate;
		private $SMS;
		private $Minute;
		private $Cellular;
		
		function __construct($UserID = null, $Minute = null, $SMS = null, $Cellular = null, $UsageDate = null){
				
			$this -> UserID = $UserID;
			$this -> UsageDate = $UsageDate; 
			$this -> Minute = $Minute; 
			$this -> SMS = $SMS; 
			$this -> Cellular = $Cellular;
		}
		
		public function getUserID() {
			return $this->UserID;
		}
		public function getUsageDate() {
			return $this->UsageDate;
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