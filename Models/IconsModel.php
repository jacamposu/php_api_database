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

class IconsModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $DeleteField;
	public $idprofile;
	private $dbfn;
	private $concatenate;

	public function __construct($config, LoaderResources $loader)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'icons';
		$this->dbAlternative = 'db1';
		$this->keyField = 'IcId';
		$this->DeleteField = 'IcDeleted_at';
		$this->idprofile = '60a81f49b595a';
	}

	public function All():array
	{
		return [
			'query' => "SELECT IcId, IcFontAwesome, IcCreated_at
						FROM {$this->mainTable} ",
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
			'query' => "SELECT IcId, IcFontAwesome 
						FROM {$this->mainTable} 
						WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT NULL AS IcId, NULL AS IcFontAwesome FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT IcId, IcFontAwesome 
						FROM {$this->mainTable} 
						WHERE {$this->keyField} = :keyField			",
			'type_result' => 'Row'
		];
	}	

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS IcId, NULL AS IcFontAwesome FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Insert():array
	{
		return [
			'query' => "INSERT INTO {$this->mainTable} (IcId, IcFontAwesome, IcCreated_at) VALUES (:IcId, :IcFontAwesome, now())",
			'type_result' => ''
		];
	}

	public function Update():array
	{
		return [
			'query' => "UPDATE {$this->mainTable} SET IcId=:IcId, IcFontAwesome=:IcFontAwesome WHERE {$this->keyField} = :keyfield",
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
			'query' => "UPDATE {$this->mainTable} SET IcDeleted_at = now() WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function DdlSaved():array
	{
		return [
			'query' => [
				"IdStateCity" => [
					"sql" => "" 
				]
			],
			'type_result' => 'all'
		];
	}

	public function DdlList():array
	{
		return [
			'query' => [
				"IdStateCity" => [
					"sql" => "", 
				]
			],
			'type_result' => 'all'
		];
	}

	public function GenerateIcons():array
	{
		return [
			'query' => 'SELECT IcId, IcFontAwesome FROM icons',
			'type_result' => 'All'
		];
	}
}

