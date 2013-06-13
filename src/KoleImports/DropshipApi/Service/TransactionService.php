<?php
namespace KoleImports\DropshipApi\Service;

class TransactionService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getTransaction($id)
    {
        $order = new Order;
        $order->setOrderId($id);

        return $this->client->GetTransaction(array('order_id' => $order->getOrderId()));
    }

    public function getTransactions()
    {
        return $this->client->GetTransactions();
    }
}
