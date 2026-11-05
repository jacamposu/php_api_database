<?php

class DictionaryModel
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
		$this->mainTable = 'dictionary';
		$this->dbAlternative = 'db1';
		$this->keyField = 'Id';
		$this->DeleteField = 'DiDeleted_at';
		$this->idprofile = '60a82158cc3d1';
	}

	public function All():array
	{
		return [
			'query' => "SELECT 
					DiId,
					DiTableName,
					DiFieldName,
					FtDescription,
					DiLength,
					DiFormat,
					AlDescription,
					TyDescription,
					ItfDescription,
					DiSizeInputForm,
					DiRequired,
					DiUnsigned,
					DiTextareaChars,
					DiTextareaRows,
					IcId,
					DiDisabled,
					DiReadOnly,
					DiDependentList,
					DiPattern,
					DiValidationForm,
					DiCreated_at
				FROM dictionary
				JOIN fieldtype ON FtId=IdFieldType 
				JOIN align ON AlId=IdAlign 
				JOIN inputtype ON TyId=IdInputType 
				JOIN inputtypeform ON ItfId=IdInputTypeForm 
				JOIN icons ON IcId=IdIcon",
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
		return [];
	}

	public function FormAdd():array
	{
		return [
			'query' => "SELECT NULL AS DiId, NULL AS DiTableName, NULL AS DiFieldName, NULL AS IdFieldType, NULL AS DiLength, NULL AS DiFormat, NULL AS IdAlign, NULL AS IdInputType, NULL AS IdInputTypeForm, NULL AS DiRequired, NULL AS DiUnsigned, NULL AS DiTextareaChars, NULL AS DiTextareaRows, NULL AS DiDisabled, NULL AS DiReadOnly, NULL AS DiDependentList, NULL AS DiPattern, NULL AS DiValidationForm, NULL AS IdIcon FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function FormUpdate():array
	{
		return [
			'query' => "SELECT DicId, DicTable, DicFieldName, DicFieldType, DicLength, DicFormat, DicAlign, DicInputType, DicInputTypeForm, DicRequired, DicUnsigned, DicTextareaChars, DicTextareaRows, DicDisabled, DicReadOnly, DicDependentList, DicPattern, DicValidationForm, DicIcon FROM {$this->mainTable} WHERE {$this->keyField} = :keyfield",
			'type_result' => 'Row'
		];
	}

	public function Search():array
	{
		return [
			'query' => "SELECT NULL AS DicTable, NULL AS DicFieldName, NULL AS DicFieldType, NULL AS DicAlign, NULL AS DicInputType, NULL AS DicInputTypeForm, NULL AS DicRequired, NULL AS DicUnsigned, NULL AS DicIcon, NULL AS DicDisabled, NULL AS DicReadOnly FROM DUAL",
			'type_result' => 'Row'
		];
	}

	public function Insert():array
	{
		return [];
	}

	public function Update():array
	{
		return [];
	}

	public function Delete():array
	{
		return [];
	}

	public function LogicalDelete():array
	{
		return [];
	}

	public function List():array
	{ 
		return [
			'query' => [
				"IdFieldType" => [
					"all" => "SELECT FtId, {$this->concatenate->FieldType->concatenate} AS FtDescription FROM fieldtype", 
					"save" => "SELECT FieTypId, {$this->concatenate->FieldType->concatenate} AS FieldType FROM dictionary JOIN fieldtype ON FieTypId = DicFieldType WHERE DicId = :keyfield",
					"idResource" => "6f2840d5",
					"deleteField" => "FtDeleted_at",
					"table" => "FieldType",
					"filter" => ""
				],
				"IdIcon" => [
					"all" => "SELECT IcId, {$this->concatenate->Icons->concatenate} AS IcFontAwesome FROM icons", 
					"save" => "SELECT IcoName, {$this->concatenate->Icons->concatenate} AS Icons FROM dictionary JOIN icons ON IcoName = DicIcon WHERE DicId = :keyfield",
					"idResource" => "d003f7b2",
					"deleteField" => "IcDeleted_at",
					"table" => "Icons",
					"filter" => ""
				],
				"IdAlign" => [
					"all" => "SELECT AlId, {$this->concatenate->Align->concatenate} AS AlDescription FROM align", 
					"save" => "SELECT AliId, {$this->concatenate->Align->concatenate} AS Align FROM dictionary JOIN align ON AliId = DicAlign WHERE DicId = :keyfield",
					"idResource" => "c56182e7",
					"deleteField" => "AlDeleted_at",
					"table" => "Align",
					"filter" => ""
				],
				"IdInputType" => [
					"all" => "SELECT TyId, {$this->concatenate->InputType->concatenate} AS TyDescription FROM inputtype", 
					"save" => "SELECT InpTypId, {$this->concatenate->InputType->concatenate} AS InputType FROM dictionary JOIN inputtype ON InpTypId = DicInputType WHERE DicId = :keyfield",
					"idResource" => "cd1f9f18",
					"deleteField" => "TyDeleted_at",
					"table" => "InputType",
					"filter" => ""
				],
				"IdInputTypeForm" => [
					"all" => "SELECT ItfId, {$this->concatenate->InputTypeForm->concatenate} AS ItfDescription FROM inputtypeform",
					"save" => "SELECT InpTypFrmId, {$this->concatenate->InputTypeForm->concatenate} AS InputTypeForm FROM dictionary JOIN inputtypeform ON InpTypFrmId = DicInputTypeForm WHERE DicId = :keyfield",
					"idResource" => "6cf7829a",
					"deleteField" => "ItfDeleted_at",
					"table" => "InputTypeForm",
					"filter" => ""
				]
			],
			'type_result' => 'list'
		];
	}

	public function FieldList():array
	{
		return [
			'query' => 'SELECT distinct DiFieldName FROM `dictionary`',
			'type_result' => 'All'
		];
	}

	public function GetRows():array
	{
		return [
			'query' => "SELECT 
					DiTableName,
					DiFieldName,
					FtDescription,
					DiLength,
					DiFormat,
					AlDescription,
					TyDescription,
					ItfDescription,
					DiSizeInputForm,
					DiRequired,
					DiUnsigned,
					DiTextareaChars,
					DiTextareaChars,
					DiTextareaRows,
					IcId,
					DiDisabled,
					DiReadOnly,
					DiDependentList,
					DiDependentFrom,
					DiPattern,
					DiValidationForm,
					LdSpanishDesc,
					LdEnglishDesc,
					LdSpanishHelp,
					LdEnglishHelp
				FROM dictionary 
				JOIN fieldtype ON FtId=IdFieldType 
				JOIN align ON AlId=IdAlign 
				JOIN inputtype ON TyId=IdInputType 
				JOIN inputtypeform ON ItfId=IdInputTypeForm 
				LEFT JOIN langdictionary on LdId = DiFieldName
				JOIN icons ON IcId=IdIcon",
			'type_result' => 'All'
		];
	}
}