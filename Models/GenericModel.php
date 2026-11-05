<?php 
/**
* ----------------------------------------------------------
* API DATABASE
* Class GenericModel
* @return functions for mysql engine DB
* @version 1.0
* @package Model
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class GenericModel
{
	private object $_config;
	private Headers $_headers;
	private object $_model;
	private DatabaseFunctions $_dbfn;
	private $_query;
	private object $_lang;
	private array $_params;

	public function __construct(object $config, Headers $headers, LoaderResources $loader)
	{
		$this->_config = $config;
		$this->_headers = $headers;
		$this->_lang = $loader->GetLang($this->_headers->user_lang);
		$this->_dbfn = new DatabaseFunctions($this->_config, $loader, $headers);

		// print_r($this->_headers); die();

		$this->_params = !empty($this->_headers->params) ? json_decode($this->_headers->params, true) : [];
	}

	public function GetAllRecords(string $query, object $model, bool $withoutlimit):string
	{
		$order_by = $this->_params['orderby'] ?? '';
		$limit = $this->_params['limit'] ?? 0;
		$filter = $this->_params['filter'] ?? [];
		
		$where = $this->_dbfn->Where($query, $model, $filter);
		$orderBy = $this->_dbfn->OrderBy($model->mainTable, $order_by);
		$limitClause = $withoutlimit ? '' : $this->_dbfn->Limit($limit);

		return $query.$where.$orderBy.$limitClause;
	}

	public function StartToEnd($tableRecordsQuantity):array
	{
		$limit = $this->_params['limit'] ?? 0;
		
		$start = empty($limit) || $limit == 1 ? 1 : (($limit-1) * $this->_config->rowsByPage) + 1;

		if($tableRecordsQuantity < $this->_config->rowsByPage)
			$end = $tableRecordsQuantity;
		else if($limit == 0)
			$end = $this->_config->rowsByPage;
		else
			$end = ($this->_config->rowsByPage * $limit);
			
		return ['start' => $start, 'end' => $end];
	}

	public function GetTotalRecords():array
	{
		return [
			'query' => "SELECT count(1) AS totalRecords FROM ({$this->_query}) Records",
			'dbConnection' => $this->_model->dbAlternative
		];
	}

	public function GetQuery():array
	{
		return [
			'query' => $this->_query,
			'dbConnection' => $this->_model->dbAlternative
		];
	}

	public function GetLists():array
	{
		$listaReturn = [];

		foreach($this->_query as $field => $sql)
		{
			$listaReturn[$field] = $sql['sql'];
		}

		return [
			'query' => $listaReturn,
			'dbConnection' => $this->_model->dbAlternative
		];
	}

	public function GetColumns():array
	{
		$limit = $this->_dbfn->Limit(0, 0);

		return [
			'query' => $this->_query.$limit,
			'dbConnection' => $this->_model->dbAlternative
		];
	}

	public function AffectRecord():array
	{
		return [
			'query' => $this->_query,
			'dbConnection' => $this->_model->dbAlternative,
			'table' => $this->_model->mainTable,
			'keyfield' => $this->_model->keyField
		];
	}
}