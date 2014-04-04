<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
	class Customer
	{
		private $id;
		private $first_name;
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