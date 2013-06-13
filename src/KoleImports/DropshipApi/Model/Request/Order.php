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

namespace KoleImports\DropshipApi\Model\Request;

$vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
$baseDir = dirname(dirname($vendorDir));
use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', $baseDir . "/vendor/jms/serializer/src");

use Doctrine\Common\Annotations;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\Type;

/** @XmlRoot("order") */
class Order
{

    /**
     * orderContainer
     * @var OrderCollection
     */
    private $orders = array();

    /**
     * @Type("string")
     */
    private $poNumber;

    /**
     * Notes
     * @var string
     */
    private $notes;

    /**
     * Ship Options
     * @var ShipOptions
     */
    private $shipOptions;

    /**
     * Shipping Address
     * @var Address
     */
    private $shipToAddress;

    /**
     * Items
     * @var ItemCollection
     */
    private $items;

    /**
    *@var orderId int
    */
    private $orderId;

    /**
     * Get PO Number
     *
     * @return string PO Number
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }

    /**
     * Set PO Number
     *
     * @param  string $poNumber PO Number
     * @return Order;
     */
    public function setPoNumber($poNumber)
    {
        $this->poNumber = $poNumber;

        return $this;
    }

    /**
     * Get Notes
     *
     * @return string Notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set Notes
     *
     * @param  string $notes Notes
     * @return Order;
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get Ship Options
     *
     * @return ShipOptions Ship Options
     */
    public function getShipOptions()
    {
        return $this->shipOptions;
    }

    /**
     * Set Ship Options
     *
     * @param  ShipOptions $shipOptions Ship Options
     * @return Order;
     */
    public function setShipOptions(ShipOptions $shipOptions)
    {
        $this->shipOptions = $shipOptions;

        return $this;
    }

    /**
     * Get Shipping Address
     *
     * @return Address Shipping Address
     */
    public function getShipToAddress()
    {
        return $this->shipToAddress;
    }

    /**
     * Set Shipping Address
     *
     * @param  Address $shipToAddress Shipping Address
     * @return Order;
     */
    public function setShipToAddress(Address $shipToAddress)
    {
        $this->shipToAddress = $shipToAddress;

        return $this;
    }

    /**
     * Get Items
     *
     * @return ItemCollection Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set Items
     *
     * @param  ItemCollection $items Items
     * @return Order;
     */
    public function setItems(ItemCollection $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get Order Id
     *
     * @return Order Id
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set Items
     *
     * @param  Order Id
     * @return Order;
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
    * Get Orders
    *
    * @return OrderCollection Orders
    */

    /**
    * Set order data into container
    * @param orderContainer
    */
    public function setOrderContainer($orderContainer)
    {
        $this->orderContainer[] = $orderContainer;

        return $this;
    }

    public function getOrderContainer()
    {
        return $this->orderContainer;
    }



}
