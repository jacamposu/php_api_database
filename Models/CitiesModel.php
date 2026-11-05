<?php
/**
* ----------------------------------------------------------
* Class DATABASE_FUNCTIONS
* @return queries
* @version 1.0
* @package Model
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class CitiesModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $DeleteField;
	public $idprofile;
	private $dbfn;
	private $concatenate;

	public function __construct($config, LoaderResources $loader, Headers $headers)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader, $headers);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'cities';
		$this->dbAlternative = 'db1';
		$this->keyField = 'CiId';
		$this->DeleteField = 'CiDeleted_at';
		$this->idprofile = '60a8122856573';
	}

	public function All():array
	{
		return [
			'query' => "SELECT CiId, 
							{$this->concatenate->States->concatenate} AS StStateName, 
							CiCityName,
							CiCreated_at
						FROM {$this->mainTable} 
						JOIN states ON StId = IdStateCity",
			'type_result' => 'All',
			'tableRecordsQuantity' => true
		];
	}

	public function Total():array
	{
		return [
			'query' => "SELECT count(1) AS totalRecords FROM ({$this->All()['query']}) Records",
			'type_result' => 'Value'
		];
	}

	public function Row():array
	{
		return [
			'query' => "SELECT CiId, {$this->concatenate->States->concatenate} AS IdStateCity, CiCityName 
						FROM {$this->mainTable} 
						JOIN states ON StId = IdStateCity 
						WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT NULL AS CiId, NULL AS IdStateCity, NULL AS CiCityName FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT CiId, IdStateCity, CiCityName 
						FROM {$this->mainTable} 
						WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}	

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS CiId, NULL AS IdStateCity, NULL AS CiCityName FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Insert():array
	{
		return [
			'query' => "INSERT INTO {$this->mainTable} (CiId, IdStateCity, CiCityName, CiCreated_at) VALUES (:CiId, :IdStateCity, :CiCityName, now())",
			'type_result' => ''
		];
	}

	public function Update():array
	{
		return [
			'query' => "UPDATE {$this->mainTable} SET IdStateCity=:IdStateCity, CiCityName=:CiCityName WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function Delete():array
	{
		return [
			'query' => "DELETE FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function LogicalDelete():array
	{
		return [
			'query' => "UPDATE {$this->mainTable} SET deleted_at = now() WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function List():array
	{
		return [
			'query' => [
				"IdStateCity" => [
					"all" => "SELECT StId, {$this->concatenate->States->concatenate} AS StStateName FROM states",
					"save" => "SELECT StId, {$this->concatenate->States->concatenate} AS StStateName 
								FROM cities 
								JOIN states ON StId = IdStateCity 
								WHERE CiId = :keyfield",
					"idResource" => "60a8111d6dd10",
					"deleteField" => "StDeleted_at",
					"table" => "States",
					"filter" => "IdCountryState"
				]
			],
			'type_result' => 'list'
		];
	}
}