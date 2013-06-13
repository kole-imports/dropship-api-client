<?php

namespace KoleImports\DropshipApi\Service;

class SerializerService
{
	/**
	* Raw response data from API request
	* @var $data
	*/
	private $data;

	/**
	* @var $serializer JMS Serializer Object
	*/
	private $serializer;

	public function __construct($serializer)
	{
		$this->serializer = $serializer;
	}

	public function getXml()
	{
		return $this->serializer->serialize($this->data, 'xml');
	}

	public function getJson()
	{
		return $this->serializer->serialize($this->data, 'json');
	}

	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	public function getData()
	{
		return $this->data;
	}
}
