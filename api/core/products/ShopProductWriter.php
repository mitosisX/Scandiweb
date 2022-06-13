<?php
include_once 'ShopProduct.php';

class ShopProductWriter
{
	private $products = [];
	private $columns = [];

	public function __construct($columns){
		$this->columns = $columns;
		$this->iter();
	}

	public function shopProductObject($kind)
	{
		$lookup = [
			1 => "BookProduct",
			2 => "DVDProduct",
			3 => "FurnitureProduct"
		];

		$objName = $lookup[$kind];
		return $objName;
	}

	private function iter(){
		foreach($this->columns as $rows){
			foreach($rows as $data){
				$id = $data['ID'];
				$sku = $data['SKU'];
				$name = $data['Name'];
				$price = $data['Price'];
				$kind = $data['Kind'];
				$attr = $data['Attributes'];

				//Create object based on type
				$getObj = $this->shopProductObject($kind);
				
				$instantiateObject = new $getObj(
							$id,
							$sku,
							$name,
							$price,
							$attr);

				$this->addProduct($instantiateObject);
			}
		}
	}
	
	private function addProduct(ShopProduct $product){
		array_push($this->products, $product);
	}

	public function getProducts(){
		$products_array = [];
		foreach($this->products as $products){
			array_push($products_array, $products->getProductDetails());
		}

		return $products_array;
	}
}

?>