<?php
/**
* ----------------------------------------------------------
* Users Class Metadata
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class UserQuestionsModel
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
		$this->mainTable = 'userquestion';
		$this->dbAlternative = 'db1';
		$this->keyField = '';
		$this->idprofile = '';
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

    // consultar las preguntas de seguridad del usuario 
	// public function UserSecurityQuestions():array
	// {
	// 	return [
	// 		'query' => "SELECT UqId, IdQuestion, SqDescription 
	// 			FROM userquestion 
	// 			JOIN securityquestions ON IdQuestion = SqId 
	// 			WHERE IdUser = :idUser",
	// 		'type_result' => 'Row'
	// 	];
	// }

	// consultar datos del usuario (id, email) para proceso de recuperacion de contraseña
	public function GetDataUserEmail()
	{
		return "SELECT UserId, UseEmail FROM userquestion JOIN users ON UserId=UseId WHERE UseEncryptedId = :hashUser";
	}

	// Respuestas del usuario para proceso de recuperacion de contraseña
	public function GetResponse()
	{
		return "SELECT UseQueResponse FROM userquestion WHERE UseQueId = :idUser AND QuestionId = :question";
	}
}