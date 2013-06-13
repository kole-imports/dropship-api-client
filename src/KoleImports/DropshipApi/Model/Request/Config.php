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

namespace KoleImports\DropshipApi\Model\Request;

class Config
{
    const API_ENDPOINT = 'https://api.koleimports.com';

    /**
     * Account ID
     * @var string
     */
    private $accountId;

    /**
     * API Key
     * @var string
     */
    private $apiKey;

    /**
     * @param string $accountId Account ID
     * @param string $apiKey    API Key
     */
    public function __construct($accountId = null, $apiKey = null)
    {
        $this->accountId = (string) $accountId;
        $this->apiKey = (string) $apiKey;
    }

    /**
     * Get API Endpoint URL
     *
     * @return string The URL for the API Endpoint
     */
    public function getApiEndpoint()
    {
        return self::API_ENDPOINT;
    }

    /**
     * Get Account ID
     *
     * @return string Account ID
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Get API Key
     *
     * @return string API Key
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Helper to return credentials for Basic Auth
     *
     * @return string Auth Credentials
     */
    public function getAuthToken()
    {
        return $this->accountId . ':' . $this->apiKey;
    }
}
