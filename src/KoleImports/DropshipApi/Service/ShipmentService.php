<?php
namespace KoleImports\DropshipApi\Service;
use KoleImports\DropshipApi\Model\Request\Order;

class ShipmentService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getShipment($id)
    {
        $order = new Order;
        $order->setOrderId($id);
        return $this->client->GetShipment(array('order_id' => $order->getOrderId()));
    }

    public function getShipments()
    {
        return $this->client->GetShipments();
    }
}
