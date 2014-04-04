<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
	class Product
	{
		private $id;
		private $name;
		private $price;
		private $description;
		private $short_description;
		private $image;
		private $category;
		private $subcategory;
		
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