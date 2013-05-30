<?php
namespace Application;

class Serializer
{
	/*
	 * @param array $order the array to be converted
	 * @param string? $rootElement if specified will be taken as root element, otherwise defaults to <order/>
	 * @param SimpleXMLElement ? if specified content will be appended, used for recursion
	 * @return string XML version of $order
	 *
	 * source:  http://www.kerstner.at/en/2011/12/php-array-to-xml-conversion/
	 * author: Mattias Kerstner
	*/
	 function createXML(array $order, $rootElement = null, $xml = null)
	{

		$xmlObject = $xml;

		if ($xmlObject === null)
		{
			$xmlObject = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<order/>');
		}

		foreach ($order as $item => $data)
		{
			if (is_array($data)) { //nested array
				self::createXML($data, $item, $xmlObject->addChild($item));
			}else
			{
				$xmlObject->addChild($item, $data);
			}
		}

		return $xmlObject->asXML();
	}
}