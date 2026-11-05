<?php 
/**
* ----------------------------------------------------------
* API DATABASE
* Class Auth
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class Auth
{
	private $config;

	public function __construct($config)
	{
		$this->config = $config;
	}

	public function Verify($token)
	{
		return Util::Encrypt($this->config->Auth->app->name.date("Ymdhi")) == $token;
	}
}