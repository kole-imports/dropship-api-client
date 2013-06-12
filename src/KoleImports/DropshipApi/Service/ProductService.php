<?php
namespace KoleImports\DropshipApi\Service;

/**
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ProductService
{
    /**
    *@var client Object
    */
    private $client;


    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getProduct($sku)
    {
	return $this->client->GetProduct(array('sku' => $sku));
    }

    public function getProducts($limit = null)
    {
        if(!isset($limit))
        {
            return $this->client->GetProducts();
        }else
        {
            return $this->client->GetProducts(array('count' => $limit));
        }
    }
}
