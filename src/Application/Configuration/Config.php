<?php
namespace Application\Configuration;

class Config
{
	protected $accountId;
	protected $apiKey;

	public function setAccountId($accountId)
	{
		$this->accountId = $accountId;
	}

	public function getAccountId()
	{
		return $this->accountId;
	}

	public function setApiKey($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	public function getApiKey()
	{
		return $this->apiKey;
	}
}
