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

class RepositoryModel
{
    public $mainTable;
	public $dbAlternative;
	public $keyField;
	public $idprofile;
	private $_dbfn;
	private $_concatenate;

    public function __construct($config)
	{
		$this->_dbfn = new DatabaseFunctions($config);
		$loader = new LoaderResources();
		$this->_concatenate = $loader->GetConcatenate();
		$this->mainTable = 'directories';
		$this->dbAlternative = 'db1';
		$this->keyField = 'FilId';
		$this->idprofile = '60a80e8757e03';
	}

    public function All():string
    {
        $condAttach = '';
        $condFolder = '';
        return "SELECT FilId, 
                'file' AS TypeDocRepository, 
                IF(VerFilNumVersion > 1, CONCAT(FilFileName, ' (', VerFilNumVersion, ')'), FilFileName) AS NameRepository, 
                {$this->_concatenate->Mime->concatenate} AS FilType, 
                CONCAT(FilSize, ' ', UPPER(FilUnit)) as FilSize
            FROM files 
                JOIN mime ON FilType = MimId
                JOIN versionfiles ON VerFilFile=FilId
                JOIN ownersfil ON OwnFilFile=FilId
            {$condAttach}
            UNION 
            SELECT DirId, 
            'directory' AS TypeDocRepository, 
                DirName AS NameRepository, 
                NULL AS AneTipoArchivo, 
                NULL AS AnePeso 
            FROM {$this->mainTable} 
                JOIN ownersdir ON OwnDirDirectory=DirId
            {$condFolder}";
    }

	public function GetTypeMime()
	{
		return "SELECT MimTypeMime FROM files JOIN mime ON MimId=FilType WHERE FilId = :keyfield";
	}

    // public function strQuery(array $infoPage)
	// {

		// Condiciones agregadas al query en la parte de directorios
		// $condFolder  = $this->whereProfile($infoPage['idProfile'], $infoPage['sqlTable']);
		// $condFolder .= ' and DirId <> 1 and DirParentDirectory = '.$this->id;
		// $condFolder .= $_SESSION['appSessionUseId'] != $config->app->owner ? " and OwnDirOwner = '{$_SESSION['appSessionUseId']}'" : null;

		// // Condiciones agregadas al query en la parte de los archivos
		// $condAttach  = $this->whereProfile('28f92a51', 'files');
		// $condAttach .= ' and FilDirectory = '.$this->id;
		// $condAttach .= $_SESSION['appSessionUseId'] != $config->app->owner ? " and OwnFilOwner = '{$_SESSION['appSessionUseId']}'" : null;

		
	// 	$parentDirectory = $this->model->GetParentDirectory($this->id);


	// 	return [
	// 		'grid' => "SELECT FilId, 'file' AS TypeDocRepository, IF(VerFilNumVersion > 1, CONCAT(FilFileName, ' (', VerFilNumVersion, ')'), FilFileName) AS NameRepository, {$concatenate['Mime']['concatenate']} AS FilType, CONCAT(FilSize, ' ', UPPER(FilUnit)) as FilSize
	// 				FROM files 
	// 					JOIN mime ON FilType = MimId
	// 					JOIN versionfiles ON VerFilFile=FilId
	// 					JOIN ownersfil ON OwnFilFile=FilId
	// 				{$condAttach}
	// 			UNION 
	// 			SELECT DirId, 'directory' AS TypeDocRepository, DirName AS NameRepository, NULL AS AneTipoArchivo, NULL AS AnePeso 
	// 				FROM {$infoPage['sqlTable']} 
	// 					JOIN ownersdir ON OwnDirDirectory=DirId
	// 				{$condFolder}",
	// 		'formUpdate' => "SELECT DirId, DirName 
	// 							FROM {$infoPage['sqlTable']} 
	// 							WHERE {$infoPage['keyField']} = ",
	// 		'formAdd' => "SELECT NULL AS DirId, NULL AS Directories ".$this->appFromDual(),
	// 		'search' => "SELECT NULL AS DirParentDirectory, NULL AS Directories, NULL AS DirDateCreation, NULL AS DirOwner ".$this->appFromDual(),
	// 		'dbAlternative' => NULL
	// 	];
	// }

    public function DdlList()
	{
		return [
			'CarPadre' => [
				'sql' => "SELECT DirId, {$this->_concatenate->Directories->concatenate} FROM directories",
				"idResource" => "3dcbbc56",
				"deleteField" => "Directories",
				"table" => "Directories",
				"filter" => ""
			],
			'Directories' => [
				'sql' => "SELECT DirId, {$this->_concatenate->Directories->concatenate} FROM directories",
				"idResource" => "3dcbbc56",
				"deleteField" => "Directories",
				"table" => "Directories",
				"filter" => ""
			],
			'DirParentDirectory' => [
				'sql' => "SELECT DirId, {$this->_concatenate->Directories->concatenate} FROM directories",
				"idResource" => "3dcbbc56",
				"deleteField" => "Directories",
				"table" => "Directories",
				"filter" => ""
			]
		];
	}

	public function DdlSaved()
	{
		return [
			'DirParentDirectory' => [
				'sql' => "SELECT DirId, {$this->_concatenate->Directories->concatenate} FROM files JOIN directories ON DirId = DirParentDirectory WHERE FilId = :keyField"
			]
		];
	}
}