<?php
/**
* ----------------------------------------------------------
* Users Class Metadata
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class UserTypesModel
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
		$this->mainTable = 'UserTypes';
		$this->dbAlternative = 'db1';
		$this->keyField = 'UtId';
		$this->DeleteField = 'UtDeleted_at';
		$this->idprofile = '60a839052198c';
	}


	public function All():array
	{
		return [
			'query' => "SELECT 
					UtId, 
					UgDescription, 
					UtDescription,
					UtCreated_at
				FROM {$this->mainTable} 
				LEFT JOIN usergroups ON UgId = IdUserGroup ",
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
		return "SELECT 
					UtId, 
					IdUserGroup, 
					UtDescription
				FROM {$this->mainTable} 
				LEFT JOIN usergroups ON UgId = IdUserGroup 
				WHERE {$this->keyField} = :keyfield";
	}

	public function FormAdd():string
	{
		return "SELECT 
					NULL AS UtId,
					NULL AS IdUserGroup,
					NULL AS UtDescription FROM DUAL";
	}

	public function FormUpdate():string
	{
		return "SELECT 
					UtId, 
					IdUserGroup, 
					UtDescription
				FROM {$this->mainTable} 
				WHERE {$this->keyField} = :keyfield";
	}

	public function Search():string
	{
		return "SELECT 
					NULL AS UseTypId, 
					NULL AS UseTypUserGroup, 
					NULL AS UseTypDescription
					FROM DUAL";
	}

	public function Insert():string
	{
		return "INSERT INTO {$this->mainTable} (UseTypId, UseTypUserGroup, UseTypDescription) values (:UseTypId, :UseTypUserGroup, :UseTypDescription)";
	}

	public function Update():string
	{
		return "UPDATE {$this->mainTable} SET UseTypUserGroup=:UseTypUserGroup, UseTypDescription=:UseTypDescription WHERE {$this->keyField} = :keyfield";
	}

	public function Delete():string
	{
		return "DELETE FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield";
	}

	public function LogicalDelete():string
	{
		return "UPDATE {$this->mainTable} SET deleted_at = now() WHERE {$this->keyField} = :keyfield";
	}

	public function List()
	{
		return [
			"query" => [
				"IdUserGroup" => [
					"all" => "SELECT UgId, {$this->concatenate->UserGroups->concatenate} AS UgDescription FROM UserGroups",
					"save" => "SELECT UgId, {$this->concatenate->UserGroups->concatenate} AS UgDescription FROM UserGroups JOIN UserTypes ON IdUserGroup = UseGroId WHERE UseTypId = :keyfield",
					"idResource" => "8be3a48d",
					"deleteField" => "UgDeleted_at",
					"table" => "UserGroups",
					"filter" => ""
				]
			],
			'type_result' => 'list'
		];
	}

	public function Profiles():array
	{
		return [
			'query' => "SELECT DISTINCT UtId FROM usertypes",
			'type_result' => 'All'
		];
	}
}