<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class QueryPrepare
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

Class QueryPrepare
{
    private DatabaseQuery $_db;
    private GenericModel $_generic;
    private Headers $_headers;
    private object $_model;
    private mixed $_query;
    private string $_type_result;
    private object $_config;
    private object $_loader;
    private object $_lang;

    public function __construct($config, $model, $loader, $headers)
    {
        $this->_headers = $headers;
        $this->_db = new DatabaseQuery($config, $this->_headers, $loader->GetLang($this->_headers->user_lang));
        $this->_generic = new GenericModel($config, $this->_headers, $loader);
        $this->_model = $model;
        $this->_db->database = $this->_model->dbAlternative;
        $this->_query = $this->_model->{$this->_headers->resource_model}()['query'];
        $this->_type_result = isset($this->_headers->type_result) ? $this->_headers->type_result : 'assoc';
        $this->_config = $config;
        $this->_loader = $loader;
        $this->_lang = $this->_loader->GetLang($this->_headers->user_lang);
    }

    public function GetAll()
    {
        $params = (empty($this->_headers->params)) ? [] : json_decode($this->_headers->params, true);
        
        if(is_array($this->_query)){
            throw new Exception($this->_lang->not_process_list, 500);
        }
        
        $this->_db->query = $this->_generic->GetAllRecords($this->_query, $this->_model, $this->_headers->withoutlimit);
        
        if(isset($params['orderby'])) unset($params['orderby']);
        if(isset($params['limit'])) unset($params['limit']);
        if(isset($params['filter'])) unset($params['filter']);

        $result = $this->_db->All($params, $this->_type_result);
    
        /* cantidad registros tabla */
        if(isset($this->_model->{$this->_headers->resource_model}()['tableRecordsQuantity']) && $this->_model->All()['tableRecordsQuantity'])
        {
            $this->_db->query = $this->_model->Total()['query'];
            $result['tableRecordsQuantity'] = $this->_db->Value($params, $this->_type_result);
            $result['limit'] = $this->_generic->StartToEnd($result['tableRecordsQuantity']);
        }
        
        return $result;
    }

    public function GetList()
    {
        $params = (empty($this->_headers->params)) ? [] : json_decode($this->_headers->params, true);
        
        if(!is_array($this->_query)) throw new Exception($this->_lang->list_required, 500);

        $dbfn = new DatabaseFunctions($this->_config, $this->_loader, $this->_headers);
        $concatenate = $this->_loader->GetConcatenate();
        
        $fields = isset($params['fieldsList']) ? $params['fieldsList'] : [];
        unset($params['fieldsList']);

        $result = [];

        foreach($fields as $fieldList)
        {
            if(!isset($this->_query[$fieldList][$this->_headers->resource]))
                throw new Exception(str_replace("{{value}}", $fieldList, $this->_lang->resource_not_exist), 500);

            $query = $this->_query[$fieldList][$this->_headers->resource];
            $arrayQuery = $this->_query[$fieldList];
            $condition = stripos($query, "where") !== false ? "and" : "where";

            if (!isset($this->_query[$fieldList][$this->_headers->resource])) 
                throw new Exception(str_replace("{{value}}", $fieldList, $this->_lang->resource_not_exist), 500);

            $this->_db->query = $query
                    . $dbfn->WhereProfile($arrayQuery['idResource'], $arrayQuery['deleteField'], $arrayQuery['filter'], $condition) 
                    . $concatenate->{$arrayQuery['table']}->orderBy;
            $result[$fieldList] = $this->_db->All($params, $this->_type_result);
        }

        return $result;
    }
    

    public function GetRow()
    {
        $params = (empty($this->_headers->params)) ? [] : json_decode($this->_headers->params, true);
        $this->_db->query = $this->_query;
        $result = $this->_db->Row($params, $this->_type_result);
        return $result;
    }

    public function GetValue()
    {
        $params = (empty($this->_headers->params)) ? [] : json_decode($this->_headers->params, true);
        $this->_db->query = $this->_query;
		$result = $this->_db->Value($params);
        return $result;
    }

    public function GetColumn()
    {
        $this->_db->query = $this->_query;
		$result = $this->_db->Column($this->_headers['column']);
        return $result;
    }

	public function Post($body)
	{
	    $this->_db->query = $this->_query;
        $params = (empty($body->params)) ? [] : (array)$body->params;	
        $table = $this->_model->mainTable;
        $keyfield = $this->_model->keyField;
        //$this->_validate->Duplicity($table, $keyfield, $params, $this->_database);
        $responseInsert = $this->_db->Insert($params, $table);
        return $responseInsert; 
	}

	public function Put($body)
	{
		$this->_db->query = $this->_query;  
        $params = (empty($body->params)) ? [] : (array)$body->params;
        $table = $this->_model->mainTable;
        $keyfield = $this->_model->keyField;
        //$this->validate->Duplicity($table, $keyfield, $params, $this->_database);
        $responseUpdate = $this->_db->Update($params, $table);
        return $responseUpdate;
	}
    
	public function Delete()
	{
        $this->_db->query = $this->_query;
        $params = (empty($this->_headers->params)) ? [] : json_decode($this->_headers->params, true);
        $table = $this->_model->mainTable;
        //this->ValidateIntegrityData();
        $responseDelete = $this->_db->Delete($params, $table);
        return $responseDelete;
	}
}