<?php

namespace KoleImports\DropshipApi\Model\Request;

class OrderCollection
{
	/**
	* order
	* @var array<order>
	*/
	private $order = array();

	public function getOrders()
	{
		return $this->order;
	}

	public function setOrders(array $order)
	{
	           $this->addOrder($order);

	           return $this;
	}

	public function addOrder(Order $order)
	{
		$this->order[] = $order;
	}

}
