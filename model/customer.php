<?php
	class Customer
	{
		private $id;
		private $firstname;
		private $surname;
		private $adress;
		private $email;
		private $zipcode;
		private $city;
		private $user_username;
		
		public function _get($property) {
			if (property_exists($this, $property)) {
				return $this->$property;
			}
		}
		
		public function _set($property, $value) {
			if (property_exists($this, $property)) {
				$this->$property = $value;
			}
			return $this;
		}
	}
?>