<?php
include_once('database/DataBase_Handler.php');

class Props{
	public function REQUEST_TYPE(){}
	public function REQUEST_METHOD(){}
}

class Processor extends Props{
	private $db_con;
	public function __construct(){
		// Instantiate database handler
		$this->db_con = new Database();
		$this->REQUEST_METHOD();
	}

	public function REQUEST_TYPE(){

	}

	public function REQUEST_METHOD(){
		switch($_SERVER["REQUEST_METHOD"]){
			case("POST"):
				echo '2';
				$delete = $this->getPostKey('delete');
				
				if($delete === 'true'){
					$this->handleDelete();
				}else{
					$this->handlePost();
				}
				break;
		}
	}

	private function handlePost(){
		$sku = $this->getPostKey('sku');
		$name = $this->getPostKey('name');
		$price = $this->getPostKey('price');

		$kind = $this->getPostKey('kind');

		//All queries will be concatenated from this, rather than observe redundancy of INSRTY query
		$query = "INSERT INTO Products (SKU, Name, Price, Kind, Attributes) ";

		switch($kind){
			case(1):
				$weight = $this->getPostKey('weight');
				$query .= "VALUES('{$sku}', '{$name}', {$price}, {$kind}, {$weight});";

				$this->db_con->insertQuery($query);
				break;
			case(2):
				$size = $this->getPostKey('size');
				$query .= "VALUES('{$sku}', '{$name}', {$price}, {$kind}, {$size});";

				$this->db_con->insertQuery($query);
				break;
			case(3):
				$height = $this->getPostKey('height');
				$width = $this->getPostKey('width');
				$length = $this->getPostKey('length');

				$query .= "VALUES('{$sku}', '{$name}', {$price}, {$kind}, '{$height}x{$width}x{$length}');";
				$this->db_con->insertQuery($query);
				break;
		}

	}

	public function handleDelete(){
		$id = intval($this->getPostKey('id'));
		$this->db_con->deleteQuery($id);
	}

	private function getPostKey(string $key){
		return $_POST[$key];
	}

	//Gets the id from POST, DELETE request data
	private function getParam(): int{
		$delete_data = file_get_contents('php://input');
		$data_array = array();
		parse_str($delete_data, $data_array);
		return intval($data_array['id']);
	}
}

$processor = new Processor();

?>