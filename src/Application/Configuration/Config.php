<?php
namespace Application\Configuration;

class Config
{
	protected $username;
	protected $password;

	public function setAccountId($username)
	{
		$this->username = $username;
	}

	public function setApiKey($password)
	{
		$this->password = $password;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}
}
