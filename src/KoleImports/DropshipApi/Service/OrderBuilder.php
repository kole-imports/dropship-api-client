<?php

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Model\Request\Address;
use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\ShipOptions;
use KoleImports\DropshipApi\Factory\ItemFactory;

/**
 * Provides a simple interface responsible for
 * creating a fully instantiated order object and
 * all of it's composed parts.
 *
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class OrderBuilder
{
    private $order;

    private $address;

    private $shipOptions;

    private $itemCollection;

    private $itemFactory;

    public function __construct(Order $order,
        Address $address,
        ShipOptions $shipOptions,
        ItemFactory $itemFactory)
    {
        $this->order = $order;
        $this->address = $address;
        $this->shipOptions = $shipOptions;
        $this->itemFactory = $itemFactory;
        $this->itemCollection = $itemFactory->getItemCollection();
    }

    /**
     * Get Order
     * Returns a lazily built order.
     * @return Order Order
     */
    public function getOrder()
    {
        $this->order->setShipOptions($this->getShipOptions());
        $this->order->setShipToAddress($this->getAddress());
        $this->order->setItems($this->getItemCollection());

        return $this->order;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getShipOptions()
    {
        return $this->shipOptions;
    }

    public function getItemCollection()
    {
        return $this->itemCollection;
    }

    public function setPoNumber($poNumber)
    {
        $this->order->setPoNumber($poNumber);

        return $this;
    }

    public function setNotes($notes)
    {
        return $this;
    }

    public function setCarrier($carrier)
    {
        return $this;
    }

    public function setService($service)
    {
        return $this;
    }

    public function setSignature($signature)
    {
        return $this;
    }

    public function setInstructions($instructions)
    {
        return $this;
    }

    public function setFirstName($firstName)
    {
        return $this;
    }

    public function setLastName($lastName)
    {
        return $this;
    }

    public function setCompany($company)
    {
        return $this;
    }

    public function setAddress1($address)
    {
        return $this;
    }

    public function setAddress2($address)
    {
        return $this;
    }

    public function setCity($city)
    {
        return $this;
    }

    public function setState($state)
    {
        return $this;
    }

    public function setZipcode($zipcode)
    {
        return $this;
    }

    public function setExtZipcode($extZipcode)
    {
        return $this;
    }

    public function setPhone($phone)
    {
        return $this;
    }

    public function addItem($sku,$quantity)
    {
        return $this;
    }
}
