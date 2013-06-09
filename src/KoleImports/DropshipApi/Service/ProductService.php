<?php
namespace KoleImports\DropshipApi\Service;

/**
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ProductService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getProduct($sku)
    {
	return $this->client->GetProduct(array('sku' => $sku));
    }

    public function getProducts()
    {
    	return $this->client->GetProducts();
    }

}
