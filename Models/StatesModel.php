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

class StatesModel
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
		$this->mainTable = 'states';
		$this->dbAlternative = 'db1';
		$this->keyField = 'StId';
		$this->DeleteField = 'StDeleted_at';
		$this->idprofile = '60a8111d6dd10';
	}

	public function All():array
	{
		return [
			'query' => "SELECT StId, 
							 CoCountryName, 
							StStateName,
                            StCreated_at 
						FROM {$this->mainTable} 
						JOIN countries ON CoId = IdCountryState",
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
			'query' => "SELECT StId, CoCountryName AS IdCountryState, StStateName, StCreated_at
						FROM {$this->mainTable} 
						JOIN countries ON CoId = IdCountryState 
						WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT NULL AS StId, NULL AS IdCountryState, NULL AS StStateName FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT StId, IdCountryState, StStateName 
						FROM {$this->mainTable} 
						JOIN countries on CoId = IdCountryState
						WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}	

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS StId, NULL AS IdCountryState, NULL AS StStateName FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Insert():array
	{
		return [
			'query' => "INSERT INTO {$this->mainTable} (StId, IdCountryState, StStateName, StCreated_at) VALUES (:StId, :IdCountryState, :StStateName, now())",
			'type_result' => ''
		];
	}

	public function Update():array
	{
		return [
			'query' => "UPDATE {$this->mainTable} SET StId:StId, IdCountryState=:IdCountryState, StStateName=:StStateName WHERE {$this->keyField} = :keyfield",
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
				"IdCountryState" => [
					"all" => "SELECT CoId, CoCountryName FROM countries", 
					"save" => "SELECT CoId, CoCountryName 
								FROM states 
								JOIN countries ON CoId = IdCountryState 
								WHERE StId = :keyfield",
					"idResource" => "60a8126898f30",
					"deleteField" => "CoDeleted_at",
					"table" => "Countries",
					"filter" => "CoId"
				],
			],
			'type_result' => 'list'
		];
	}
}