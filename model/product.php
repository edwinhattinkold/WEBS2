<?php
	class Product
	{
		private $id;
		private $name;
		private $price;
		private $description;
		private $image;
		private $category_name;
		
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