<?php
	class Customer
	{
		private $id;
		private $first_name;
		
		private $adress;
		private $email;
		private $postcode;
		private $woonplaats;
		
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