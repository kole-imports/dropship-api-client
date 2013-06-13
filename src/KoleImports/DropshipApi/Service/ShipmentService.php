<?php
namespace KoleImports\DropshipApi\Service;

class ShipmentService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getShipment($id)
    {
        return $this->client->GetShipment(array('order_id' => $id));
    }

    public function getShipments()
    {
        return $this->client->GetShipments();
    }
}
