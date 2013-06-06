<?php

namespace Application\Products;

class Product
{
	protected $sku;

	public function setSku($sku)
	{
		$this->sku = $sku;
	}

	public function getSku()
	{
		return $this->sku;
	}
}
