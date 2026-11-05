<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class QueryController
* @return functions for mysql engine DB
* @version 1.0
* @package Controller
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class QueryController
{
	private LoaderResources $_loader;
	private Auth $_auth;
	private QueryPrepare $_prepare;
	private Headers $_headers;
	private object $_model;
	private object $_lang;
	private object $_config;
	private mixed $_body;
	private string $_method;
	
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
		$this->_loader = new LoaderResources();
		$this->_lang = $this->_loader->GetLang($this->_headers->user_lang);
		$this->_auth = new Auth($this->_config);
	}

	#region PUBLIC METHODS

	public function Test()
	{
		return 'Connection Ok';
	}

	public function Query()
	{
		$response = '';
		$this->VerifyToken();
		$this->SetValues();
		$this->_prepare = new QueryPrepare($this->_config, $this->_model, $this->_loader, $this->_headers);
		switch ($_SERVER['REQUEST_METHOD']) 
		{
			case 'POST':
				$response = $this->_prepare->Post($this->_body);
				break;

			case 'PUT':
				$response = $this->_prepare->Put($this->_body);
				break;

			case 'DELETE':
				$response = $this->_prepare->Delete();
				break;

			case 'GET':
				$response = $this->Get();
				break;
			
			default:
				throw new Exception($this->_lang->incorrect_method, 500);
				break;
		}

		return $response;
	}

	#endregion

	#region PRIVATE METHODS

	private function Get()
	{
		switch (strtolower($this->_method)) 
		{
			case 'all':
				return $this->_prepare->GetAll();

			case 'row':
				return $this->_prepare->GetRow();

			case 'value':
				return $this->_prepare->GetValue();

			case 'column':
				return $this->_prepare->GetColumn();
				
			case 'list':
				return $this->_prepare->GetList();
			
			default:
				throw new Exception($this->_lang->incorrect_option_get, 401);
				break;
		}
	}

	/* Verificacion de token */
	private function VerifyToken()
	{	
		if($this->_config->Auth->env == 'PROD' && !$this->_auth->Verify($this->_headers->token))		
			throw new Exception(str_replace("{{token}}", $this->_headers->token, $this->_lang->invalid_token), 500);
	}

	private function SetValues()
	{
		$modelClass = $this->_headers->model;
		if(!class_exists($modelClass)) 
			throw new Exception($this->_lang->class_not_found, 500);
		$this->_model = new $modelClass($this->_config, $this->_loader, $this->_headers);
		$resourceModel = $this->_headers->resource_model;
		if(!method_exists($modelClass, $resourceModel)) 
			throw new Exception($this->_lang->method_not_found, 500);
		$methodResult = $this->_model->{$resourceModel}();
		if (!isset($methodResult['type_result'])) 
			throw new Exception($this->_lang->type_result_not_found, 500);
		$this->_method = $methodResult['type_result'];
	}

	#endregion
}