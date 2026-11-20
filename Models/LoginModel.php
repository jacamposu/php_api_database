<?php 
/**
* ----------------------------------------------------------
* Class LOGINMODEL
* @return model for mysql engine DB
* @version 1.0
* @package Models
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class LoginModel
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
		$this->mainTable = 'login';
		$this->dbAlternative = 'db1';
		$this->DeleteField = 'LaDeleted_at';
		$this->keyField = '';
		$this->idprofile = '60a824c6cbcdc';
	}
	
	// escribir logs en base de datos y archivo plano
	public function RegisterAccessLogin()
	{		
		return [
			'query' => "INSERT INTO login (IdUser, IdProblem, Attempt, LastIp, Created_at) VALUES (:user, :problem, :attemp, :lastIp, now())",
			'type_result' => ''
		];
	}

	// registrar el logout del usuario
	public function RegisterLogout()
	{
		return [
			'query' => "UPDATE userslogin 
						set deleted_at=now() 
						where Id = :loginId",
			'type_result' => ''
		];
	}
}