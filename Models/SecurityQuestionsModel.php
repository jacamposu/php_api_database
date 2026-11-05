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

class SecurityQuestionsModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $idprofile;
	private $dbfn;
	private $concatenate;

	public function __construct($config, LoaderResources $loader)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'SecurityQuestions';
		$this->dbAlternative = 'db1';
		$this->keyField = 'SecQueId';
		$this->idprofile = '60a824153c746';
	}

	public function All():string
	{
		return "SELECT SecQueId, SecQueDescription FROM {$this->mainTable}";
	}

	public function Row():string
	{
		return "SELECT SecQueId, SecQueDescription FROM {$this->mainTable} WHERE {$this->keyField } = :keyfield";
	}

	public function FormAdd():string
	{
		return "SELECT NULL AS SecQueId, NULL AS SecQueDescription FROM DUAL";
	}

	public function FormUpdate():string
	{
		return "SELECT SecQueId, SecQueDescription FROM {$this->mainTable} WHERE {$this->keyField } = :keyfield";
	}

	public function Search():string
	{
		return "SELECT NULL AS SecQueId, NULL AS SecQueDescription FROM DUAL";
	}

	public function Insert():string
	{
		return "INSERT INTO {$this->mainTable} (SecQueId, SecQueDescription, created_at) VALUES (:SecQueId, :SecQueDescription, now())";
	}

	public function Update():string
	{
		return "UPDATE {$this->mainTable} SET SecQueDescription=:SecQueDescription WHERE {$this->keyField} = :keyfield";
	}

	public function Delete():string
	{
		return "DELETE FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield";
	}

	public function LogicalDelete():string
	{
		return "UPDATE {$this->mainTable} SET deleted_at = now() WHERE {$this->keyField} = :keyfield";
	}

	public function DdlSaved():array
	{
		return [];
	}

	public function DdlList():array
	{
		return [];
	}

	// public function CheckSecurityResponse():array
	// {
	// 	return [
	// 		'query' => 'SELECT COUNT(UqId) as ExistsResponse FROM userquestion WHERE UqId = :idQuestion AND UqResponse = :response',
	// 		'type_result' => 'Row'
	// 	];
	// }
}