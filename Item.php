<?php
	class Item{
		private $data=array();

		function __construct($name, $img, $desc){
			$this->data["name"]=$name;
			$this->data["img"]=$img;
			$this->data["desc"]=$desc;
		}

		public function __get($name){
			if(array_key_exists($name, $this->data)){
				return $this->data[$name];
			}
		}
	}
?>