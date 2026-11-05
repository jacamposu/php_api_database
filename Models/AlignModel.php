<?php
/**
* ----------------------------------------------------------
* Users Class Metadata
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class AlignModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $idprofile;
	private $dbfn;
	private $concatenate;
	public $DeleteField;

	public function __construct($config, LoaderResources $loader)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'align';
		$this->dbAlternative = 'db1';
		$this->keyField = 'AliId';
		$this->idprofile = '60a837e47d279';
		$this->DeleteField = 'AlDeleted_at';
	}


	public function All():array
	{
		return [
			'query' => "SELECT AlId, AlDescription, AlCreated_at FROM {$this->mainTable}",
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

	public function Row():string
	{
		return "SELECT AliId, AliDescription FROM {$this->mainTable} WHERE {$this->keyField } = :keyfield";
	}

	public function FormAdd():string
	{
		return "SELECT NULL AS AliId, NULL AS AliDescription FROM DUAL";
	}

	public function FormUpdate():string
	{
		return "SELECT AliId, AliDescription FROM {$this->mainTable} WHERE {$this->keyField } = :keyfield";
	}

	public function Search():string
	{
		return "SELECT NULL AS AliId, NULL AS AliDescription FROM DUAL";
	}

	public function Insert():string
	{
		return "INSERT INTO {$this->mainTable} (AliId, AliDescription, created_at) VALUES (:AliId, :AliDescription, now())";
	}

	public function Update():string
	{
		return "UPDATE {$this->mainTable} SET AliDescription=:AliDescription WHERE {$this->keyField} = :keyfield";
	}

	public function Delete():string
	{
		return "DELETE FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield";
	}

	public function LogicalDelete():string
	{
		return "UPDATE {$this->mainTable} SET deleted_at = now() WHERE {$this->keyField} = :keyfield";
	}

	
	public function DdlSaved()
	{
		return [];
	}

	public function DdlList()
	{
		return [];
	}
}