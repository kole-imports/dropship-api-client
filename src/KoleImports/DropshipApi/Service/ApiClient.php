<?php
/*
Kole Imports Dropship API Client
Copyright (C) <2013>  <Jesse Reese>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

namespace KoleImports\DropshipApi\Service;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Http\Message\Response;
use KoleImports\DropshipApi\Model\Request\Config;


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
