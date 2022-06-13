<?php
class BookProduct extends ShopProduct{
	private float $weight;

	public function __construct(
		int $id,
		string $sku,
		string $name,
		float $price,
		float $weight
	){
		parent::__construct(
			$id,
			$sku,
			$name,
			$price,
			$weight
		);
		$this->weight = $weight;
	}

	private function getWeight(){
		return $this->weight;
	}

	public function getProductDetails(){
		return array(
					'ID' => parent::getID(),
					'Name' => parent::getName(),
					'SKU' => parent::getSKU(),
					'Price' => parent::getPrice(),
					'Attributes' => "{$this->getWeight()} KG"
					);
	}
}
?>