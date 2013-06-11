<?php

namespace KoleImports\DropshipApi\Service;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use KoleImports\DropshipApi\Model\Request\Config;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ApiClient extends Client
{
    /**
    * @var config Config Object
    */
    private $apiConfig;

    /**
     * @param Config $config Config Object
     */
    public function connectApi(Config $apiConfig)
    {
        $baseUrl = $apiConfig->getApiEndpoint();

        $options = array(CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
            CURLOPT_USERPWD => $apiConfig->getAuthToken()
            );

        $client = new Client($baseUrl, array('curl.options' => $options));

        $client->setDescription(ServiceDescription::factory(__DIR__ . '/ServiceDescriptions.json'));

        return $client;
    }
}
