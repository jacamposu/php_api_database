<?php 
/**
* ----------------------------------------------------------
* API DATABASE
* Class DatabaseFunctions
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class DatabaseFunctions 
{
	private $config;
	private $profile;
	private $concatenate;
	private object $_lang;

	public function __construct($config, LoaderResources $loader, Headers $headers)
	{
		$this->config = $config;
		$this->profile = $loader->GetProfile($headers->user_type, true);
		$this->concatenate = $loader->GetConcatenate(true);
		$this->_lang = $loader->GetLang($headers->user_lang);
	}

	public function DateFormat(string $fieldDB, string $mode)
	{
		if(empty($fieldDB)) throw new Exception(str_replace("{{value}}", "fieldDB", $this->_lang->value_required), 500);
		if(empty($mode)) throw new Exception(str_replace("{{value}}", "mode", $this->_lang->value_required), 500);

		switch ($mode) 
		{
			case 'date':
				return "date_format({$fieldDB},'%Y-%m-%d')";
			
			case 'datetime':
				return "date_format({$fieldDB},'%Y-%m-%d %H:%i:%s')";
		}
	}

	public function Where(string $query, object $model, array $filter):string
	{
		if(empty($model->idprofile)) throw new Exception(str_replace("{{value}}", "idprofile", $this->_lang->value_required), 500);

		if(strpos(strtolower($query), 'where') > 0) throw new Exception($this->_lang->clause_where_included, 500);

		$whereFromProfile = $this->profile[$model->idprofile]['where'] ?? ''; // condition from perfilation

		$deleteLogical = $this->config->app->deleteType == 'logical' ? "{$model->DeleteField} IS NULL" : "";

		$filter = $this->Filter($filter);

		$conditions = array_filter([$whereFromProfile, $deleteLogical, $filter]);

		return !empty($conditions) ? " WHERE " . implode(' AND ', $conditions) : "";
	}

	public function WhereProfile(string $idprofile, string $deleteField, string $filterField='', string $condition = ''):string
	{
		if(empty($idprofile)) throw new Exception(str_replace("{{value}}", "idprofile", $this->_lang->value_required), 500);
		if(empty($deleteField)) throw new Exception(str_replace("{{value}}", "deleteField", $this->_lang->value_required), 500);

		$whereFromProfile = !empty($this->profile[$idprofile]['where']) ? $this->profile[$idprofile]['where'] : "";
		
		if ($this->config->app->deleteType == 'logical')
		{
			$filter = '';
			if($filterField!='')
				$filter = " and ".$filterField;

			return !empty($whereFromProfile) ? " {$condition} {$whereFromProfile} AND {$deleteField} IS NULL" : " {$condition} {$deleteField} IS NULL".$filter;
		}			
		
		return !empty($whereFromProfile) ? " {$condition} ".$whereFromProfile : "";
	}

	public function OrderBy(string $sqlTable, string $orderby):string
	{
		if(empty($sqlTable)) throw new Exception(str_replace("{{value}}", "sqlTable", $this->_lang->value_required), 500);

		if(!empty($orderby)) return ' ORDER BY '.$orderby;

		return isset($this->concatenate[ucwords($sqlTable)]) ? $this->concatenate[ucwords($sqlTable)]['orderBy'] : null;
	}

	public function Limit(int $start):string
	{	
		$start = empty($start) || $start == 1 ? 0 : (($start-1) * $this->config->rowsByPage) + 1;
		return " limit {$start}, {$this->config->rowsByPage}";
	}

	public function JoinProfile(string $sqlTable):string
	{
		if(empty($sqlTable)) throw new Exception(str_replace("{{value}}", "sqlTable", $this->_lang->value_required), 500);

		return !empty($this->profile[$sqlTable]['where']) ? $this->profile[$sqlTable]['where'] : null;
	}

	public function ConcatenateFields()
	{		
		$fields = [];
		$arguments = func_get_args();
		foreach ($arguments as $argument) 
		{
		    array_push($fields, $argument);
		}
        $fieldsText = implode(',', $fields);
		return "concat_ws(\"' - '\", $fieldsText)";
	}

	private function Filter(array $filters):string
	{
		$newFilter = "";
		foreach($filters as $filter){
			$newFilter .= " AND ".$filter['field']."='".$filter['value']."'";
		}
		return ltrim($newFilter, " AND ");
	}
}