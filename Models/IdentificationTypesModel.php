<?php
/**
* ----------------------------------------------------------
* Users Class Metadata
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class IdentificationTypesModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $idprofile;
	private $dbfn;
	private $concatenate;
	public $DeleteField;

	public function __construct($config, LoaderResources $loader, Headers $headers)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader, $headers);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'IdentificationTypes';
		$this->dbAlternative = 'db1';
		$this->keyField = 'ItId';
		$this->DeleteField = 'ItDeleted_at';
		$this->idprofile = '60a83989761d0';
	}


	public function All():string
	{
		return "SELECT AliId, AliDescription FROM {$this->mainTable}";
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

    /* LOGIN */
    
    // consultar los tipos de idetificación para rellenar el select
	public function GetIDTypes():array
	{
		return [
			'query' => "SELECT ItId, ItDescription FROM identificationtypes",
			'type_result' => 'All'
		];
	}
}