<?php
namespace KoleImports\DropshipApi\Service;

/**
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class TransactionService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getTransaction($id)
    {
	return $this->client->GetTransaction(array('order_id' => $id));
    }

    public function getTransactions()
    {
    	return $this->client->GetTransactions();
    }
}
