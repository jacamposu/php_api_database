DELIMITER $$
DROP PROCEDURE IF EXISTS `Usp_Set_Dictionary` $$
CREATE PROCEDURE `Usp_Set_Dictionary`(
    `_DB_NAME` VARCHAR(255)	
)
BEGIN

	-- Insertar campos que solo existen en la tabla esquema
	INSERT INTO dictionary 
	(
		`DiDataBase`,
		`DiTableName`, 
		`DiFieldName`, 
		`DiFormat`, 
		`IdInputType`, 
		`IdInputTypeForm`, 
		`DiSizeInputForm`, 
		`IdIcon`, 
		`DiDependentList`, 
		`DiPattern`, 
		`DiValidationForm`, 
		`DiCreated_at`
	)
	SELECT 
		TABLE_SCHEMA AS DiDataBase,
		TABLE_NAME AS DiTableName, 
		COLUMN_NAME AS DiFieldName, 
		'' AS FORMAT,
		'?' AS IdInputType,
		'?' AS IdInputTypeForm,
		'?' AS DiSizeInputForm,
		'?' AS IdIcon,
		'' AS DiDependentList,
		'' AS DiPattern,
		'' AS DiValidationForm,
		NOW()
	FROM INFORMATION_SCHEMA.COLUMNS
		LEFT JOIN dictionary ON DiTableName = TABLE_NAME AND DiFieldName = COLUMN_NAME
	WHERE TABLE_SCHEMA = _DB_NAME
		AND (DiTableName IS NULL);
		
		
	INSERT INTO dictionarylang 
	(
		`DlTableName`,
		`DlFieldName`, 
		`DlSpanishDesc`, 
		`DlSpanishHelp`, 
		`DlEnglishDesc`, 
		`DlEnglishHelp`, 
		`DlCreated_at`
	)
	SELECT 
		TABLE_NAME AS DiTableName, 
		COLUMN_NAME AS DiFieldName, 
		NULL AS DlSpanishDesc,
		NULL AS DlSpanishHelp,
		NULL AS DlEnglishDesc,
		NULL AS DlEnglishHelp,
		NOW()
	FROM INFORMATION_SCHEMA.COLUMNS
		LEFT JOIN dictionarylang ON DlTableName = TABLE_NAME AND DlFieldName = COLUMN_NAME
	WHERE TABLE_SCHEMA = _DB_NAME
		AND (DlTableName IS NULL);
		
		
		
	-- Borrar campos que solo existen en la tabla Diccionario
	/*DELETE FROM dictionary WHERE DiId IN(
		SELECT 
			DiId
		FROM dictionary
			LEFT JOIN INFORMATION_SCHEMA.COLUMNS 
				ON DiTableName = TABLE_NAME 
				AND DiFieldName = COLUMN_NAME
				AND TABLE_SCHEMA = _DB_NAME
		WHERE (TABLE_NAME IS NULL)
	);*/
END$$
DELIMITER ;