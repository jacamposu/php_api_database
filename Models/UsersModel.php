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

class UsersModel
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
		$this->mainTable = 'users';
		$this->dbAlternative = 'db1';
		$this->keyField = 'UsrId';
		$this->DeleteField = 'UsrDeleted_at';
		$this->idprofile = '60a824c6cbcdc';
	}

	#region GRID

	public function All():array
	{
		return [
			'query' => "SELECT 
					UsrId, 
					UsrFirtsName, 
					UsrSecondName, 
					UsrSurname, 
					UsrSecondSurname, 
					UsrEmail, 
					UtDescription as UtDescription, 
					UsDescription as UsDescription,
					UsrIdentificationNumber,
					IdIdentificationType,
					UsrCreated_at
				FROM users
				JOIN usertypes ON UtId = IdUserTypeUser 
				JOIN userstatus ON UsId = IdUserStatus",
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
			'query' => "SELECT UsrId, UsrFirtsName, UsrSecondName, UsrSurname, UsrSecondSurname, UsrEmail, {$this->concatenate->IdentificationTypes->concatenate} as IdIdentificationType, {$this->concatenate->Countries->concatenate} as IdCountryUser, {$this->concatenate->States->concatenate} as IdStateUser, {$this->concatenate->Cities->concatenate} as IdCity, UsrIdentificationNumber, UsrCellphone, UsrAddress, {$this->concatenate->UserTypes->concatenate} as IdUserTypeUser, {$this->concatenate->UserStatus->concatenate} as IdUserStatus, UsrFailedAttempts, {$this->dbfn->DateFormat('UsrLastAccess', 'datetime')} as UsrLastAccess, UsrLastIp FROM {$this->mainTable} LEFT JOIN usertypes ON UtId = IdUserTypeUser LEFT JOIN userstatus ON UsId = IdUserStatus LEFT JOIN appstyle ON AppId = IdAppStyle LEFT JOIN identificationtypes ON ItId = IdIdentificationType LEFT JOIN cities ON CiId = IdCity LEFT JOIN states ON StId = IdStateUser LEFT JOIN countries ON CoId = IdCountryUser WHERE {$this->keyField} = :keyfield",
			'type_result' => "Row"
		];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT 
					NULL AS IdUserTypeUser,
					NULL AS UsrSurname, 
					NULL AS UsrSecondSurname, 
					NULL AS UsrFirtsName, 
					NULL AS UsrSecondName,
					NULL AS IdIdentificationType,
					NULL AS UsrIdentificationNumber,  
					NULL AS IdCountryUser, 
					NULL AS IdStateUser, 
					NULL AS IdCity, 
					NULL AS UsrAddress,
					NULL AS UsrEmail, 
					NULL AS UsrCellphone 
				FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT IdUserTypeUser, 
					UsrId, 
					IdUserStatus, 
					UsrSurname, 
					UsrSecondSurname, 
					UsrFirtsName, 
					UsrSecondName, 
					IdIdentificationType, 
					UsrIdentificationNumber, 
					IdCountryUser, 
					IdStateUser, 
					IdCity, 
					UsrAddress,
					UsrEmail, 
					UsrCellphone
				FROM {$this->mainTable} 
				WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS UsrId, NULL AS IdUserStatus, NULL AS IdUserTypeUser, NULL AS UsrSurname, NULL AS UsrSecondSurname, NULL AS UsrFirtsName, NULL AS UsrSecondName,  NULL AS UsrEmail FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Insert():array
	{
		return [
			'query' => "INSERT INTO users (UsrId, UsrFirtsName, UsrSecondName, UsrSurname, UsrSecondSurname, UsrEmail, IdUserTypeUser, IdUserStatus, UsrFailedAttempts, UsrLastAccess, UsrLastIp, IdLang, IdAppStyle, UsrCreated_at, UsrEncryptedId, IdIdentificationType, IdCity, IdStateUser, IdCountryUser, UsrIdentificationNumber, UsrCellphone, UsrAddress, UsrPassword, UsrPhoto, UsrChangePasswordRequired) values (:UsrId, :UsrFirtsName, :UsrSecondName, :UsrSurname, :UsrSecondSurname, :UsrEmail, :IdUserTypeUser, :IdUserStatus, :UsrFailedAttempts, now(), :UsrLastIp, :IdLang, :IdAppStyle, now(), :UsrEncryptedId, :IdIdentificationType, :IdCity, :IdStateUser, :IdCountryUser, :UsrIdentificationNumber, :UsrCellphone, :UsrAddress, :UsrPassword, :UsrPhoto, :UsrChangePasswordRequired)",
			'type_result' => ''
		];
	}

	public function Update():array
	{
		return [
			'query' => "UPDATE users SET UsrFirtsName=:UsrFirtsName, UsrSecondName=:UsrSecondName, UsrSurname=:UsrSurname, UsrSecondSurname=:UsrSecondSurname, UsrEmail=:UsrEmail, IdUserTypeUser=:IdUserTypeUser, IdUserStatus=:IdUserStatus, IdIdentificationType=:IdIdentificationType, IdCity=:IdCity, IdStateUser=:IdStateUser, IdCountryUser=:IdCountryUser, UsrIdentificationNumber=:UsrIdentificationNumber, UsrCellphone=:UsrCellphone, UsrAddress=:UsrAddress WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function Delete():array
	{
		return [
			'query' => "DELETE FROM users WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	public function LogicalDelete():array
	{
		return [
			'query' => "UPDATE users SET UsrDeleted_at = now() WHERE {$this->keyField} = :keyfield",
			'type_result' => ''
		];
	}

	/**
	 * @var $ddlList: Consultas SQL para listas desplegables (drop-down-list)
	 */
	public function List():array
	{
		return [
			'query' => [
				"IdUserTypeUser" => [
					"all" => "SELECT UtId, UtDescription FROM UserTypes",
					"save" => "SELECT UtId, UtDescription FROM users JOIN UserTypes ON UtId = IdUserTypeUser  WHERE UsrId = :keyfield",
					"idResource" => "60a839052198c",
					"deleteField" => "UtDeleted_at",
					"table" => "UserTypes",
					"filter" => ""
				],
				"IdUserStatus" => [
					"all" => "SELECT UsId, UsDescription FROM userstatus", 
					"save" => "SELECT UsId , UsDescription  FROM users JOIN UserStatus ON UsId = IdUserStatus WHERE UsrId = :keyfield",
					"idResource" => "60a839b712b28",
					"deleteField" => "UsDeleted_at",
					"table" => "UserStatus",
					"filter" => ""
				],
				"IdAppStyle" => [
					"all" => "SELECT AppId, AppDescription FROM appstyle", 
					"save" => "SELECT AppId, AppDescription FROM users JOIN appstyle ON AppId = IdAppStyle WHERE UsrId = :keyfield",
					"idResource" => "60a8379691e10",
					"deleteField" => "AppDeleted_at",
					"table" => "AppStyle",
					"filter" => ""
				],
				"IdLang" => [
					"all" => "SELECT LaId, LaLanguage FROM lang",
					"save" => "SELECT LaId , LaLanguage FROM users JOIN lang ON LaId = IdLang WHERE UsrId = :keyfield", 
					"idResource" => "60a8230a37fe6",
					"deleteField" => "LaDeleted_at",
					"table" => "Lang",
					"filter" => ""
				],
				"IdIdentificationType" => [
					"all" => "SELECT ItId, ItDescription FROM identificationtypes", 
					"save" => "SELECT ItId, ItDescription FROM users JOIN identificationtypes ON ItId = IdIdentificationType WHERE UsrId = :keyfield",
					"idResource" => "60a83989761d0",
					"deleteField" => "ItDeleted_at",
					"table" => "IdentificationTypes",
					"filter" => ""
				],
				"IdCity" => [
					"all" => "SELECT CiId, CiCityName FROM cities", 
					"save" => "SELECT CiId, CiCityName FROM users JOIN cities ON CiId = IdCity WHERE UsrId = :keyfield",
					"idResource" => "60a8122856573",
					"deleteField" => "CiDeleted_at",
					"table" => "Cities",
					"filter" => "IdStateCity=:keyfield"
				],
				"IdCountryUser" => [
					"all" => "SELECT CoId, CoCountryName FROM countries", 
					"save" => "SELECT CoId, CoCountryName FROM users JOIN countries ON CoId = IdCountryUser WHERE UsrId = :keyfield",
					"idResource" => "60a8126898f30",
					"deleteField" => "CoDeleted_at",
					"table" => "Countries",
					"filter" => ""
				],
				"IdStateUser" => [
					"all" => "SELECT StId, StStateName FROM states", 
					"save" => "SELECT StId, StStateName FROM users JOIN states ON StId = IdStateUser WHERE UsrId = :keyfield",
					"idResource" => "60a8111d6dd10",
					"deleteField" => "StDeleted_at",
					"table" => "States",
					"filter" => "IdCountryState=:keyfield"
				]
			],
			'type_result' => 'list'
		];
	}

	#endregion

	#region LOGIN

	public function GetUserType_Photo():array
	{
		return [
			'query' => "SELECT IdUserTypeUser, UsrPhoto FROM users WHERE UsrEncryptedId = :UseEncryptedId",
			'type_result' => 'Row'
		];
	}

	// obtener datos usuario
	public function GetDataUser():array
	{
		return [
			'query' => "SELECT UsrId, IdUserTypeUser, UsrSurname, UsrFirtsName, CpLastAccess, IdUserStatus, IdAppStyle, 
							UtDescription, IdLang, UsrCellphone, UsrAddress, concat(CiCityName,' - ',StStateName) as Localization, 
							Usrcreated_at as CreationDate, UsrEmail
						FROM users
							INNER JOIN controlpasswords ON IdUser = UsrId 
							LEFT JOIN appstyle ON AppId = IdAppStyle 
							INNER JOIN usertypes ON UtId = IdUserTypeUser 
							INNER JOIN cities ON CiId = IdCity
							INNER JOIN states ON StId = IdStateUser
						WHERE UsrId = :idUser 
							AND CpPassword = :passwordHash
							AND IdUserStatus = 'A'
							AND CpDeleted_at IS NULL",
			'type_result' => 'Row'
		];
	}

	// verificar existencia de usuario login
	public function GetExistsUser():array
	{
		return [
			'query' => 'SELECT case when UsrId <> \'\' THEN true else false end as UserExists FROM users WHERE UsrId =  :idUser',
			'type_result' => 'Value'
		];
	}

	// Consultar de token en Session Start
	public function GetTokenRegisteredDB():array
	{
		return [
			'query' => "SELECT UsrToken FROM users WHERE UsrEncryptedId = :UseId",
			'type_result' => 'Value'
		];
	}

	// registrar el token en la tabla usuarios
	// public function RegisterUserToken():array
	// {
	// 	return [
	// 		'query' => "UPDATE users SET UsrToken = :token WHERE UsrId = :userId",
	// 		'type_result' => ''
	// 	];
	// }

	

	// registrar bloqueo inactividad de usuario
	public function SetBlockingUser():array
	{
		return [
			'query' => "UPDATE users SET IdUserStatus = :userstatus WHERE UsrId = :idUser",
			'type_result' => ''
		];
	}

	// obtener el alias del usuario
	public function GetUser():array
	{
		return [
			'query' => "SELECT UsrId, CpLastAccess
						FROM users 
						INNER JOIN userspassword ON IdUser = UsrId
						WHERE UsrEncryptedId = :hashUser
						AND CpAccessNumber = (SELECT max(CpAccessNumber) FROM userspassword WHERE IdUser = UsrId)",
			'type_result' => 'Row'
		];
	}

	// 	verificar datos del formulario de recuperacion de password
	public function CheckUserExists():array
	{
		return [
			'query' => "SELECT count(UsrId) as userExists, UsrEncryptedId 
						FROM users 
						WHERE IdIdentificationType = :idtype 
						AND UsrIdentificationNumber = :idnumber 
						AND UsrEmail = :mail",
			'type_result' => 'Row'
		];
	}

	// actualizar fecha de ultimo registro en proceso de recuperacion de contraseña, para determinar vigencia de enlace enviado por correo
	public function UpdateLastAccess():array
	{
		return [
			'query' => "UPDATE users SET UsrLastAccess = now() WHERE UsrId = :idUser",
			'type_result' => ''
		];
	}

	public function GetUserIdChangePw():array
	{
		return [
			'query' => "SELECT US.UsrId 
				FROM users AS US
				JOIN controlpasswords AS CP ON CP.IdUser = US.UsrId
				WHERE US.UsrId = :idUser AND CP.CpPassword = :passwordHash",
			'type_result' => 'Value'
		];
	}

	public function ChangePassword():array
	{
		return [
			'query' => "UPDATE users SET UsrChangePasswordRequired = :UseChangePassReq, UsrPassword = :UsePassword WHERE UsrId = :UseId",
			'type_result' => ''
		];
	}


	public function GetDataUserFromHash():array
	{
		return [
			'query' => "SELECT UsrId, UsrEmail FROM users WHERE UsrEncryptedId = :idUser",
			'type_result' => 'Row'
		];
	}

	public function GetUserLastAccess():array
	{
		return [
			'query' => "SELECT UsrId, UsrLastAccess FROM users WHERE UsrEncryptedId = :idUser",
			'type_result' => 'Row'
		];
	}

	public function GetNowDB():array
	{
		return [
			'query' => "SELECT now() FROM users",
			'type_result' => 'Value'
		];
	}

	#endregion
}