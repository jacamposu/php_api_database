<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class StoreProcedureController
* @return functions for mysql engine DB
* @version 1.0
* @package Controller
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class StoreProcedureController
{
	private object $_config;
    private $_headers;
	private $_body;
	private $_db;
    private $_lang;
    private $_response;

    public function __construct($config)
    {
		$this->_config = $config;	
        $this->_headers = new Headers();
		$errors = $this->_headers->ValidateHeaders();
		if(count($errors) > 0) 
			throw new Exception(implode(", ",$errors), 500);
		$this->_headers->SetHeaders();
		$this->_headers->SetAuthorization();
		$this->_body = json_decode(file_get_contents("php://input"));
        $loader = new LoaderResources();
        $this->_lang = $loader->GetLang($this->_headers->user_lang);
        $this->_db = new DatabaseQuery($config, $this->_headers, $this->_lang);
    }

    #region PUBLIC METHODS

    public function Test()
	{
		$this->_response->Response(200, 'Connection Ok'); 
	}

    public function Exec()
	{
		$parameters = null;
		$params = (array) $this->_headers;
		$model = $params['model'];
		$params = json_decode($params['params'],true);
		
		foreach($params as $param)
		{
			$parameters .= "'$param',";
		}

		$parameters = !is_null($parameters) ? rtrim($parameters,',') : '';

		return $this->_db->StoreProcedure($model, $parameters, 'db1');
	}

    #endregion
}