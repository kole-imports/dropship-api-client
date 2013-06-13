<?php

namespace KoleImports\DropshipApi\Model\Response;

use KoleImports\DropshipApi\Service\Serializer;

class OrderCollection
{
	/**
	* @var response SimpleXMLObject
	*/
	private $response;


	public function toArray($response, $array = array ())
	{
		foreach ((array) $response as $index => $node)
		{
			$array[$index] = (is_object($node)) ? self::toArray($node): $node;
		}

		foreach($array as $item => $value)
		{
			foreach($value as $key)
			{
				$responseArray = json_decode(json_encode($key), true);

				$data = array('response'=>$responseArray);

				return $data;
			}
		}
	}
}
