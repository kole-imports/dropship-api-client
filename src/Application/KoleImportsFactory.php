<?php
namespace Application;

use Application\Config;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class KoleImportsFactory extends Client
{
	public static function clientConfig()
	{
		//Create Client Object
		$koleImports = new Client('https://api.koleimports.com', array(
				'curl.options'		=> array(
				CURLOPT_HTTPAUTH 	=> 'CURLAUTH_BASIC',
			        CURLOPT_USERPWD		=> Config::USERPWD,
			        CURLOPT_RETURNTRANSFER	=> 'true'
			)
		));

	//Add service description to client object
	$koleImports->setDescription(ServiceDescription::factory(__DIR__ .'/Services/services.json'));

	return $koleImports;
	}
}

