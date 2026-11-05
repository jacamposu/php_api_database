<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class Headers
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class Headers
{
    public string $authorization;
    public string $params;
    public array $headers_erros;
    public string $app;
    public string $token;
    public string $user;
    public string $ip;
    public string $user_lang;
    public string $user_type;
    public string $method;
    public string $type_result;
    public string $model;
    public string $resource_model;
    public bool $withoutlimit;
    public string $resource;

    public function __construct()
    {

    }

    
    public function ValidateHeaders()
    {
        $headers = getallheaders();
        $headersValidate = ['Authorization', 'type_result', 'model', 'method'];
        $errors = [];

        foreach($headersValidate as $field)
        {
            if( !isset($headers[$field]) || is_null($headers[$field]) || empty($headers[$field]) )
                $errors[] = "[{$field}] is mandatory";
        }

        return $errors;
    }


    public function SetHeaders()
    {
        $headers = getallheaders();
        $this->authorization = $headers['Authorization'];
        $this->type_result = $headers['type_result'];
        $this->model = $headers['model'];
        $this->resource_model = $headers['method'];
        $this->withoutlimit = $this->SetLimit('withoutLimit');

        /* opcionales */
        $this->resource = isset($headers['resource']) ? $headers['resource'] : "";
        $this->params = isset($headers['params']) ? $headers['params'] : "";
    }


    #region PRIVATE METHODS

    public function SetAuthorization()
    {
        $authorizationArray = explode(" ", $this->authorization);
        $this->authorization = $authorizationArray[1];
        $authorization = json_decode(base64_decode($this->authorization));
        $this->app = $authorization->app;
        $this->token = $authorization->token;
        $this->user = $authorization->user;
        $this->ip = $authorization->ip;
        $this->user_lang = $authorization->user_lang;
        $this->user_type = $authorization->user_type;
    }

    private function SetLimit($field)
    {
        $headers = getallheaders();
        if(isset($headers['withoutlimit']) && $headers['withoutlimit'])
            return true;
        
        return false;
    }

    #endregion
}