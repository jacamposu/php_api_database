<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class UsersModel
* @return queries
* @version 1.0
* @package Model
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class LangModel
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
		$this->mainTable = 'lang';
		$this->dbAlternative = 'db1';
		$this->DeleteField = 'LaDeleted_at';
		$this->keyField = '';
		$this->idprofile = '60a824c6cbcdc';
	}

    public function GetLang()
	{
		return [
			'query' => "SELECT LaId, LaLanguage FROM lang",
			'type_result' => 'All'
		];
	}
}