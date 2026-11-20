<?php 
/**
 * @author Jose Antonio Campos Urquijo
 * @class Login
 * 
 */

class MenuModel
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
		$this->mainTable = 'menu';
		$this->dbAlternative = 'db1';
		$this->keyField = 'MeId';
		$this->DeleteField = 'MeDeleted_at';
		$this->idprofile = '60a815c4a7b05';
	}

	public function GetMenuItems($level)
	{
		$sql = "SELECT MeId, IdParentMenu, MeName, MeMenuType, MeUrl, MeParams, IdIcon 
				FROM menu 
				WHERE deleted_at IS NULL 
					AND MeMenuType=:level 
				ORDER BY MenOrder ASC";

		$data = [
			':level' => $level
		];

		$params = [
            "query" => $sql,
            "params" => $data,
            "method" => "All",
            "type_result" => "assoc",
            "database" => "db1"
        ];


	}

	public function All():array
	{
		return [
			'query' => "SELECT MeId, IdParentMenu, MeName, MeUrl, MeParams, IdIcon, MeCreated_at FROM {$this->mainTable}",
			'type_result' => 'All'
		];
	}

	public function Total():array
	{
		return [
			'query' => "SELECT count(1) AS totalRecords FROM ({$this->All()['query']}) Records",
			'type_result' => 'Value'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT MeId, IdParentMenu, MeName, MeUrl, MeParams, IdIcon FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT NULL AS MeMenuType, NULL AS MeId, NULL AS IdParentMenu, NULL AS MeName, NULL AS MeUrl, NULL AS MeParams, NULL AS IdIcon FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS IdParentMenu, NULL AS MeName FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Row():array
	{
		return [
			'query' => "SELECT MeId, IdParentMenu, MeName, MeUrl, MeParams, IdIcon FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	/**
	 * @var $ddlSaved: Consultas SQL para precargar el dato almacendado en BD en las listas.
	 */
	public function DdlSaved():array
	{
		return [
			'query' => [
				"IdIcon" => [
					"sql" => "SELECT IcoName, IcoFontAwesome FROM menu JOIN icons ON IcoName = IdIcon WHERE MeId = :keyField" 
				],
				"IdParentMenu" => [
					"sql" => "SELECT a.MeId, a.MeName AS MenuGroup FROM menu as a JOIN menu as b ON a.MeId = b.IdParentMenu WHERE a.MeId = :keyField" 
				]
			],
			'type_result' => 'All'
		];
	}

	/**
	 * @var $ddlList: Consultas SQL para llenar las listas con todos los valores posibles.
	 */
	public function DdlList():array
	{
		return [
			'query' => [
				"IdIcon" => [
					"sql" => "SELECT IcoName, IcoFontAwesome FROM icons ",
					"idResource" => "d003f7b2",
					"deleteField" => "icons",
					"table" => "Icons",
					"filter" => ""
				],
				"IdParentMenu" => [
					"sql" => "SELECT MeId, {$this->concatenate->Menu->concatenate} AS MenuGroup FROM menu {$this->concatenate->Menu->orderBy}"
				]
			],
			'type_result' => 'All'
		];
	}

	public function GenerateMenu():array
	{
		return [
			'query' => "SELECT 
					IdUserTypeProfile,
					MeId, 
					IdParentMenu, 
					MeName, 
					MeMenuLevel, 
					MeUrl, 
					MeParams, 
					IcFontAwesome, 
					MeMenuType, 
					CAST(MeCreated_at AS DATE) AS MeCreated_at 
				FROM menu M
					INNER JOIN icons I ON M.IdIcon = I.IcId
					INNER JOIN profiles P ON P.IdMenu = M.MeId
				",
			'type_result' => 'All'
		];
	}
}