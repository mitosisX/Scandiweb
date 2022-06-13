<?php

class FurnitureProduct extends ShopProduct{
	private float $height;
	private float $width;
	private float $length;

	public function __construct(
		int $id,
		string $sku,
		string $name,
		float $price,
		string $attr
	){
		parent::__construct(
			$id,
			$sku,
			$name,
			$price
		);

		$split = explode('x', $attr);

		$height = $split[0];
		$width = $split[1];
		$length = $split[2];

		$this->height = $height;
		$this->width = $width;
		$this->length = $length;

	}

	private function getHeight(){
		return $this->height;
	}

	private function getWidth(){
		return $this->width;
	}

	private function getLength(){
		return $this->length;
	}

	public function getProductDetails(){
		return array(
					'ID' => parent::getID(),
					'Name' => parent::getName(),
					'SKU' => parent::getSKU(),
					'Price' => parent::getPrice(),
					'Attributes' => "{$this->getHeight()}x{$this->getWidth()}x{$this->getLength()}"
					);
	}
}
?>