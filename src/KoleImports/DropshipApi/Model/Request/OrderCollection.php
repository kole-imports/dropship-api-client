<?php

namespace KoleImports\DropshipApi\Model\Request;

$vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
$baseDir = dirname(dirname($vendorDir));
use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', $baseDir . "/vendor/jms/serializer/src");
use JMS\Serializer\Annotation\XmlList;

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
