<?php
include_once 'Product.php';

class ShopProduct extends Product{
	private int $id;
	private string $SKU;
	private string $name;
	private float $price;

	public function __construct(
		int $id,
		string $SKU,
		string $name,
		float $price,
	){
		$this->id = $id;
		$this->SKU = $SKU;
		$this->name = $name;
		$this->price = $price;
	}

	public function getID(){
		return $this->id;
	}

	public function getSKU(){
		return $this->SKU;
	}

	public function getName(){
		return $this->name;
	}

	public function getPrice(){
		return $this->price;
	}

	public function getProductDetails(){
		// 
	}
}

?>