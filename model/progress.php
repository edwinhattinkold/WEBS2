<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
	class Progress
	{
		private $id;
		private $made;
		private $who;

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