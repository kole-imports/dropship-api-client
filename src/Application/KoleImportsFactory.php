<?php
namespace Application;

use Application\Config;
use Application\KoleImportsClient;

class KoleImportsFactory
{
	protected $userConfig = Config::USERPWD;

	public static function ClientConfig()
	{
		$koleConfig = KoleImportsClient::factory(array(
			'base_url'		=> 'https://api.koleimports.com',
			'curl.options'	=> array(
		            CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
		            CURLOPT_USERPWD =>  $userConfig,
		            CURLOPT_RETURNTRANSFER => 'true'
			)
		));

	 //Add service description to client object
        $this->client->setDescription(ServiceDescription::factory(__DIR__ .'/Services/services.json'));

		return new KoleImportsClient();
	}
}

