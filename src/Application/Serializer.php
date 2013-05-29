<?php
namespace Application;

class Serializer
{
	/**
	 * @param array $array the array to be converted
	 * @param string? $rootElement if specified will be taken as root element, otherwise defaults to
	 *                <root>
	 * @param SimpleXMLElement? if specified content will be appended, used for recursion
	 * @return string XML version of $array
	 * source:  http://www.kerstner.at/en/2011/12/php-array-to-xml-conversion/
	 * author: Mattias Kerstner
	 */
	function createXML(array $order, $rootElement = null, $xml = null)
	{

		$_xml = $xml;

		if ($_xml === null)
		{
			$_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<order/>');
		}

		foreach ($order as $k => $v)
		{
			if (is_array($v)) { //nested array
				self::createXML($v, $k, $_xml->addChild($k));
			}else
			{
				$_xml->addChild($k, $v);
			}
		}

		return $_xml->asXML();
	}
}