DELIMITER $$
DROP PROCEDURE IF EXISTS `Usp_Generate_Dictionary` $$
CREATE PROCEDURE `Usp_Generate_Dictionary`(
    `_DB_NAME` VARCHAR(255),
    `_LANGUAGE` VARCHAR(2)
)
BEGIN

	DROP TEMPORARY TABLE IF EXISTS INFORMATION_TABLES;
	DROP TEMPORARY TABLE IF EXISTS DICTIONARY_GENERATED;

	CREATE TEMPORARY TABLE INFORMATION_TABLES (
		id INT AUTO_INCREMENT PRIMARY KEY,
		tablename VARCHAR(100)
	);
	
	CREATE TEMPORARY TABLE DICTIONARY_GENERATED (
	  `TableName` varchar(60) NOT NULL,
	  `FieldName` varchar(60) NOT NULL,
	  `FieldType` varchar(60) NOT NULL,
	  `Length` INT unsigned DEFAULT NULL,
	  `Format` varchar(20) DEFAULT NULL,
	  `Align` char(3) DEFAULT NULL,
	  `InputTypeGrid` char(3) NOT NULL,
	  `InputTypeForm` char(3) NOT NULL,
	  `SizeInputForm` varchar(128) DEFAULT NULL,
	  `Required` tinyint(1) DEFAULT NULL,
	  `Unsigned` tinyint(1) DEFAULT NULL,
	  `TextareaChars` smallint(5) unsigned DEFAULT NULL,
	  `TextareaRows` smallint(5) unsigned DEFAULT NULL,
	  `Icon` varchar(128) NOT NULL,
	  `Disabled` tinyint(1) DEFAULT NULL,
	  `ReadOnly` tinyint(1) DEFAULT NULL,
	  `DependentList` varchar(60) DEFAULT NULL,
	  `Pattern` varchar(1000) DEFAULT NULL,
	  `ValidationForm` varchar(1000) DEFAULT NULL,
	  `Description` varchar(255) DEFAULT NULL, 
	  `Help` varchar(255) DEFAULT NULL
	);
	

	INSERT INTO INFORMATION_TABLES 
		(tablename)
	SELECT 
		TABLE_NAME
	FROM INFORMATION_SCHEMA.TABLES
	WHERE TABLE_SCHEMA = _DB_NAME;
	

	INSERT INTO DICTIONARY_GENERATED 
		(`TableName`, `FieldName`, `FieldType`, `Length`, `Format`, `Align`, `InputTypeGrid`, `InputTypeForm`, `SizeInputForm`, `Required`, `Unsigned`, 
		`TextareaChars`, `TextareaRows`, `Icon`, `Disabled`, `ReadOnly`, `DependentList`, `Pattern`, `ValidationForm`, `Description`, `Help`) 
	SELECT 
		TABLE_NAME, -- DiTableName
		COLUMN_NAME, -- DiFieldName
		DATA_TYPE, -- IdFieldType
		CHARACTER_MAXIMUM_LENGTH, -- DiLength
		COALESCE(DiFormat, ''), -- DiFormat
		CASE
            WHEN DATA_TYPE = 'datetime' THEN 'CEN'
            WHEN DATA_TYPE IN('float', 'int', 'smallint', 'tinyint') THEN 'RIG'
            ELSE 'LEF' END, -- IdAlign
		COALESCE(IdInputType, CASE
      	WHEN DATA_TYPE = 'tinyint' THEN 'CHX'
			ELSE 'DFT' END), -- IdInputType
		COALESCE(IdInputTypeForm, CASE
         WHEN COLUMN_KEY = 'MUL' THEN 'SEL'
         WHEN COLUMN_KEY = 'PRI' AND EXTRA = 'auto_increment' THEN '111'
         WHEN COLUMN_KEY = 'PRI' AND EXTRA = '' THEN 'CLA'
         WHEN DATA_TYPE IN('longtext', 'varchar') AND CHARACTER_MAXIMUM_LENGTH >= 1000 THEN 'TXA'
         WHEN DATA_TYPE = 'tinyint' THEN 'CHX'
         WHEN DATA_TYPE = 'datetime' THEN 'DTT'
         WHEN DATA_TYPE IN('float', 'int', 'smallint', 'tinyint') THEN 'NUM'
         ELSE 'TXT' END), -- IdInputTypeForm
		COALESCE(DiSizeInputForm, '?'), -- DiSizeInputForm
		CASE
			WHEN IS_NULLABLE = 'YES' THEN 1
			ELSE 0 END, -- DiRequired
		CASE
			WHEN LOCATE('unsigned', COLUMN_TYPE) THEN 1
			ELSE 0 END, -- DiUnsigned
		0, -- DiTextareaChars
		0, -- DiTextareaRows
		COALESCE(IdIcon, '?'), -- IdIcon
		0, -- DiDisabled
		0, -- DiReadOnly
		COALESCE(DiDependentList, ''), -- DiDependentList
		COALESCE(DiPattern, ''), -- DiPattern
		COALESCE(DiValidationForm, ''), -- DiValidationForm
		CASE
			WHEN _LANGUAGE = 'Es' THEN DlSpanishDesc
			WHEN _LANGUAGE = 'En' THEN DlEnglishDesc
   		ELSE '?' END,
   	CASE
			WHEN _LANGUAGE = 'Es' THEN DlSpanishHelp
			WHEN _LANGUAGE = 'En' THEN DlEnglishHelp
   		ELSE '?' END
	FROM INFORMATION_SCHEMA.COLUMNS
		JOIN INFORMATION_TABLES ON TABLE_NAME = tablename
		LEFT JOIN dictionary ON DiTableName = TABLE_NAME AND DiFieldName = COLUMN_NAME
		LEFT JOIN dictionarylang ON DlTableName = TABLE_NAME 
			AND DlFieldName = COLUMN_NAME
	WHERE TABLE_SCHEMA = _DB_NAME;
	
	
	SELECT
	`TableName`, `FieldName`, `FieldType`, `Length`, `Format`, `Align`, `InputTypeGrid`, `InputTypeForm`, `SizeInputForm`, `Required`, `Unsigned`, 
		`TextareaChars`, `TextareaRows`, `Icon`, `Disabled`, `ReadOnly`, `DependentList`, `Pattern`, `ValidationForm`, `Description`, `Help`
	FROM DICTIONARY_GENERATED;
	

	DROP TEMPORARY TABLE IF EXISTS INFORMATION_TABLES;
	DROP TEMPORARY TABLE IF EXISTS DICTIONARY_GENERATED;

END$$
DELIMITER ;