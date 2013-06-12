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

    public function getProducts($offset = null ,$limit = null)
    {
        if(!isset($offset, $limit))
        {
            return $this->client->GetProducts();
        }else
        {
            return $this->client->GetProducts(array('offset' => $offset, 'limit' => $limit));
        }
    }
}
