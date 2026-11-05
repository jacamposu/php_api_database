<?php
/**
* ----------------------------------------------------------
* Users Class Metadata
* @author Jose Antonio Campos Urquijo
* ----------------------------------------------------------
*/

class ControlPasswordsModel
{
	public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $idprofile;
	private $dbfn;
	private $concatenate;

	public function __construct($config, LoaderResources $loader, Headers $headers)
	{
		$this->dbfn = new DatabaseFunctions($config, $loader, $headers);
		$this->concatenate = $loader->GetConcatenate();
		$this->mainTable = 'controlpasswords';
		$this->dbAlternative = 'db1';
		$this->keyField = 'ConPssId';
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

	// verificar si un password ya existe
    public function GetConPssId() : array
	{
		return [
			'query' => "SELECT count(CpId) FROM controlpasswords WHERE IdUser = :idUser AND CpPassword = :CpPassword",
			'type_result' => 'Value'
		];
	}

	// obtener ultima fecha hora de acceso del usuario
	public function GetLastDatePwCreate() : array
	{
		return [
			'query' => "SELECT CpCreated_at FROM controlpasswords WHERE IdUser = :idUser and CpAccessNumber = (SELECT max(CpAccessNumber) FROM controlpasswords WHERE IdUser = :idUser)",
			'type_result' => 'Value'
		];
	}
	
	
	
	
	
	public function GetAccessNumber() : string
	{
		return "SELECT max(ConPssAccessNumber) AS accessNumber FROM {$this->mainTable} WHERE ConPssUser = :ConPssUser";
	}

	public function RegisterControlPassword() : array
	{		
		return [
			'query'=> "INSERT INTO {$this->mainTable} (ConPssUser, ConPssAccessNumber, ConPssPassword, created_at) VALUES (:ConPssUser, :ConPssAccessNumber, :ConPssPassword, now())",
			'type_result' => '',
			'generic' => 'AffectRecord'
		];
	}

	public function DeleteControlPassword() : string
	{
		return "DELETE FROM {$this->mainTable} WHERE ConPssAccessNumber = 1 AND ConPssUser = :ConPssUser";
	}

	public function AllRecordsByUser() : string
	{
		return "SELECT ConPssAccessNumber FROM {$this->mainTable} WHERE ConPssUser = :ConPssUser";
	}

	public function ControlPasswordRenumber()
	{
		return "UPDATE {$this->mainTable} SET ConPssAccessNumber = :NewConPssAccessNumber WHERE ConPssUser = :ConPssUser AND ConPssAccessNumber = :ConPssAccessNumber";
	}

	// registrar el acceso para login exitoso
	public function RegisterAccess():array
	{		
		return [
			'query' => 'UPDATE controlpasswords SET 
							CpLastAccess = now(), 
							CpFailedAttempts = :attemp 
						WHERE IdUser = :idUser 
							AND CpDeleted_at IS NULL',
			'type_result' => ''
		];
	}

	// determinar si el usuario ingresa por primera vez
	public function GetChangePwRequired():array
	{
		return [
			'query' => "SELECT CpChangePasswordRequired 
						FROM controlpasswords 
						WHERE IdUser = :idUser 
							AND CpDeleted_at IS NULL",
			'type_result' => 'Value'
		];
	}

	// obtener los intentos fallidos del usuario
	public function GetFailedAttempts():array
	{
		return [
			'query' => "SELECT CpFailedAttempts 
						FROM controlpasswords 
						WHERE idUser = :idUser 
							AND CpDeleted_at IS NULL",
			'type_result' => 'Value'
		];
	}

	// actualizar contador de intentos fallidos del usuario
	public function UpdateFailedAttempts():array
	{
		return [
			'query' => "UPDATE controlpasswords SET 
							CpFailedAttempts = :failedAttempts 
						WHERE idUser = :idUser 
							AND CpDeleted_at IS NULL",
			'type_result' => ''
		];
	}
}