<?php

namespace KoleImports\DropshipApi\Service;

use JMS\Serializer\SerializerBuilder;

class Serializer
{
	public function getSerializer()
	{
		$serializerBuilder = new SerializerBuilder;

		return $serializerBuilder->create()->build();
	}
}
