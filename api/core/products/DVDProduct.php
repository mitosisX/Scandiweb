<?php
class DVDProduct extends ShopProduct{
	private float $size;

	public function __construct(
		int $id,
		string $sku,
		string $name,
		float $price,
		float $size
	){
		parent::__construct(
			$id,
			$sku,
			$name,
			$price,
			$size,
		);
		$this->size = $size;
	}

	private function getSize(){
		return $this->size;
	}

	public function getProductDetails(){
		return array(
					'ID' => parent::getID(),
					'Name' => parent::getName(),
					'SKU' => parent::getSKU(),
					'Price' => parent::getPrice(),
					'Attributes' => "{$this->getSize()} MB"
					);
	}
}
?>