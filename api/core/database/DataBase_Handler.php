<?php
include_once "config.php";

class Database{
	 private $db;

	public function __construct(){
		$this->connect();
	}

	private function connect(){
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->db->connect_error){
			die("DB Connect error");
		}
	}

	private function close(){
		$this->db -> close();
	}

	public function insertQuery(string $query){
		$this->db->query($query);
		$this->close();
	}

	public function deleteQuery($id){
		$query = "DELETE FROM Products WHERE id = {$id}";
		$this->db->query($query);
		$this->close();
	}

	public function getQuery($encode=false){
		$array = array();
		$result = $this->db->query('select * from Products;');
		while($rows = $result->fetch_assoc()){
			array_push($array, array($rows));
		}

		if($encode) return $array;
		else return json_encode($array);
	}
}
?>