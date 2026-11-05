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

class UserOptionsModel
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

	public function ProfileUserView():array
	{
		return [
			'query' => "SELECT UsrId, 
					concat(UsrSurname, ' ', UsrSecondSurname) as UsrSurname, 
					concat(UsrFirtsName, ' ', UsrSecondName) as UsrFirtsName,
					UsrEmail, 
					UsrCellphone,
					UsrAddress,
                    UtDescription,
					UsrPhoto,
					CpLastAccess,
					UsrIdentificationNumber,
					ItDescription as IdIdentificationType,
					LaLanguage as LanLanguage,
					CiCityName as CitName,
					StStateName as StaName,
					CoCountryName as CouName
                FROM users 
					inner join controlpasswords ON IdUser = UsrId AND CpDeleted_at IS NULL
					inner join usertypes on IdUserTypeUser = UtId
					inner join identificationtypes on IdIdentificationType = ItId
					inner join lang on LaId = IdLang
					inner join cities on IdCity = CiId
					inner join states on IdStateUser = StId
					inner join countries on CoId = IdCountryUser
				WHERE UsrEncryptedId = :UsrEncryptedId",
			'type_result' => 'Row'
		];
	}

	public function ProfileUserEdit():array
	{
		return [
			'query' => "SELECT UsrId, 
					concat(UsrSurname, ' ', UsrSecondSurname) as Surname, 
					concat(UsrFirtsName, ' ', UsrSecondName) as UseFirtsName,
					UsrEmail, 
					UsrCellphone
                FROM users 
				WHERE UsrId = :idUser",
			'type_result' => 'Row'
		];
	}
}