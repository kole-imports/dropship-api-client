<?php
namespace Application;

require dirname(__DIR__) . '/config.php';

use Guzzle\Service\Client;
use Guzzle\Common\Collection;
use Guzzle\Service\Builder\ServiceBuilder;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;
use Guzzle\Http\Message\Response;

class KoleImportsClient extends Client
{
	public function KoleImportsService()
	{
		//Client Setup
		$client = new Client('https://api.koleimports.com/', array(
			'curl.options'	=> array(
			CURLOPT_HTTPAUTH	=> 'CURLAUTH_BASIC',
			CURLOPT_USERPWD		=> ACCOUNT_ID.':'.API_KEY,
			CURLOPT_RETURNTRANSFER	=> 'true'
			)
		));

		//Attach a service description to the client
		$description = ServiceDescription::factory(__DIR__ .'/services.json');
		$client->setDescription($description);

		return $client;
	}
}
