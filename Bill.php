<?php

	class Bill{
	
		private $ID;
		private $Amount;
		private $LastPayDate;
		private $ExpireDate;
		private $UserID;
		private $PaymentType;
		private $PaidorNot;
		private $BillDate;
		
		function __construct($ID = null, $Amount = null, $LastPayDate = null, $ExpireDate = null, $UserID = null, $PaymentType = null, $PaidorNot = null, $BillDate = null){
				
			$this -> ID = $ID;
			$this -> Amount = $Amount; 
			$this -> LastPayDate = $LastPayDate; 
			$this -> ExpireDate = $ExpireDate; 
			$this -> UserID = $UserID; 
			$this -> PaymentType = $PaymentType;
			$this -> PaidorNot = $PaidorNot;
			$this -> BillDate = $BillDate;
		}
		
		public function getID() {
			return $this->ID;
		}
		public function getAmount() {
			return $this->Amount;
		}
		public function getLastPayDate() {
			return $this->LastPayDate;
		}
		public function getExpireDate() {
			return $this->ExpireDate;
		}
		public function getUserID() {
			return $this->UserID;
		}
		public function getPaymentType() {
			return $this->PaymentType;
		}
		public function getPaidorNot() {
			return $this->PaidorNot;
		}
		public function getBillDate() {
			return $this->BillDate;
		}
	}
?>