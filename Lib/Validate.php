<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class Validate
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class Validate
{
	public $textError;
	private $_headers;
	private $_body;
	private $_db;
	private $_config;
	private $_lang;

	public function __construct(object $config, Headers $headers, mixed $body, object $lang)
	{
		$this->_headers = $headers;
		$this->textError = [];
		$this->_body = $body;
		$this->_config = $config;
		$this->_lang = $lang;
	}

	// Verificación de index & primary key´s para determinar registros repetidos.
	public function Duplicity($table, $keyField, $params, $database)
	{
		$this->_db = new DatabaseQuery($this->_config, $this->_headers, $this->_lang);
		$founds = 0;
		$this->_db->query = "SHOW index FROM {$table}";
		$this->_db->database = $database;
        $result = $this->_db->All([], "assoc");

		if(!$result)
		{
			throw new Exception($this->_lang->model_not_data, 500);
		}

		foreach ($result['data'] as $row) 
		{
			$columnName = $row['Column_name'];
			$nonUnique = $row['Non_unique'];

			// Verificación de campo clave				
			if($columnName == $keyField && $nonUnique == 0)
			{
				$this->_db->query = "select {$keyField}, deleted_at from {$table} where {$keyField} = :valueKeyField";
				$existKeyField = $this->_db->Row([':valueKeyField' => $params[':'.$keyField]], "assoc");
				
				if(!empty($existKeyField['data'][$keyField]) && 
					empty($existKeyField['data']['deleted_at']))
					$founds++;
		    }

		    // Verificación de índices
		    if($columnName != $keyField && $nonUnique == 0)
		    {
				print_r($columnName); die(__FILE__.__LINE__.__FUNCTION__);

		    	$this->_db->query = "select {$columnName} as fieldIndex, deleted_at from {$table} where {$columnName} = 'Es';";
		        $existIndex = $this->_db->Row([], "assoc");
				if(!empty($existIndex['data']['fieldIndex']) && empty($existIndex['data']['deleted_at']))
				{
					$founds++;
				}
		    }
		}

		if($founds>0)
		{	
			throw new Exception($this->_lang->record_already_exists, 500);
		}
	}

	public function ICanDelete ($table, $recordEdit) 
	{
		// global $relationsDelete;
		// $dataAssociated = 0;

		// // Se verifica si el valor a borrar tiene relaci�n en otra tabla.	
		// foreach ($relationsDelete as $key => $value) {
		// 	if(strtolower($relationsDelete[$key]['primaryTable']) == $sqlTable){

		// 		$foreignTable = $relationsDelete[$key]['foreignTable'];
		// 		$relationship = $relationsDelete[$key]['relationship'];

		// 		list($fieldPT, $fieldFT) = explode("_", $relationship);

		// 		// Generaci�n de la consulta
		// 		$sql = "SELECT count({$fieldFT}) FROM {$foreignTable} WHERE {$fieldFT} = '{$recordEdit}' AND deleted_at IS NULL";

		// 		$mysql = new Database();

		// 		$dataAssociated += $mysql->value($sql);
		// 	}

		// 	// Si existen registros en otra tabla que contenga el dato foraneo, evita eliminar el registro.
		// 	if($dataAssociated>0){
		// 		$msg = $langFunct['strDeleteRecord']($recordEdit, $value['foreignTable'], $dataAssociated);
		// 		return [
		// 			'type' => 'error',
		// 			'msg' => $msg
		// 		];
		// 	}
		// }

	}

	/* PRIVATE METHODS */

	private function AddErrorMessage($type, $index, $message)
	{
		switch ($type) {
			case 'Headers':
				if(!isset($this->_headers->{$index}) || empty($this->_headers->{$index}))
					array_push($this->textError, $message);
				break;
			
			default:
				if(!isset($this->_body->{$index}) || empty($this->_body->{$index}))
					array_push($this->textError, $message);
				break;
		}
	}
}