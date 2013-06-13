<?php
/*
Kole Imports Dropship API Client
Copyright (C) <2013>  <Jesse Reese>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\Address;
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

    public function __construct(
        Order $order,
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
        $this->order->setNotes($notes);

        return $this;
    }

    /**
    *ShipOptions
    */
    public function setCarrier($carrier)
    {
        $this->shipOptions->setCarrier($carrier);

        return $this;
    }

    public function setService($service)
    {
       $this->shipOptions->setService($service);

        return $this;
    }

    public function setSignature($signature)
    {
        $this->shipOptions->setSignature($signature);

        return $this;
    }

    public function setInstructions($instructions)
    {
       $this->shipOptions->setInstructions($instructions);

        return $this;
    }

    /**
    * Address
    */
    public function setFirstName($firstName)
    {
        $this->address->setFirstName($firstName);

        return $this;
    }

    public function setLastName($lastName)
    {
        $this->address->setLastName($lastName);

        return $this;
    }

    public function setCompany($company)
    {
        $this->address->setCompany($company);

        return $this;
    }

    public function setAddress1($address)
    {
        $this->address->setAddress1($address);

        return $this;
    }

    public function setAddress2($address)
    {
        $this->address->setAddress2($address);

        return $this;
    }

    public function setCity($city)
    {
        $this->address->setCity($city);

        return $this;
    }

    public function setState($state)
    {
        $this->address->setState($state);

        return $this;
    }

    public function setZipcode($zipcode)
    {
        $this->address->setZipcode($zipcode);

        return $this;
    }

    public function setExtZipcode($extZipcode)
    {
        $this->address->setExtZipcode($extZipcode);

        return $this;
    }

    public function setPhone($phone)
    {
        $this->address->setPhone($phone);

        return $this;
    }

    /**
    * Item Factory
    */
    public function addItem($sku, $quanity)
    {
        $item = $this->itemFactory->createItem($sku, $quanity);

        $this->itemCollection->addItem($item);

        return $this;
    }

}
