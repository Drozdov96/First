<?php
	spl_autoload_register();

	class ListOfItems 
	{
		private $list;
		
		function __construct()
		{
			$base_list=sql_call("SELECT name, image, description FROM `items` ORDER BY name ASC");

			//$this->list=array();

			while(($row=$base_list->fetch_assoc())!=null){
				$item=new Item($row["name"], $row["image"], $row["description"]);
				$this->list[]= $item;
			}
		}

		public function __get($name){
			if(array_key_exists($name, $this->list)){
				return $this->list[$name];
			}
		}

		public function length(){
			return count($this->list);
		}
	}
?>