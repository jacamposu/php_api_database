DELIMITER $$ -- CAMBIANDO EL DELIMITADOR POR "$$"
DROP PROCEDURE IF EXISTS `Usp_ControlPasswords_SetPassword` $$
CREATE PROCEDURE `Usp_ControlPasswords_SetPassword`(
    `_userId` VARCHAR(255), 
    `_passwordNew` VARCHAR(255), 
    `_pwHistoryCount` VARCHAR(255)		
)
BEGIN
   
	DECLARE _AccessNumber int;
	DECLARE _AccessNumber2 int;
	
	SET _AccessNumber = (SELECT max(CpAccessNumber) FROM controlpasswords WHERE IdUser = _userId);
	
	IF _AccessNumber < _pwHistoryCount THEN 
		-- Insertar el nuevo registro
		INSERT INTO controlpasswords (IdUser, CpAccessNumber, CpPassword, CpChangePasswordRequired, CpCreated_at) values (_userId, _AccessNumber+1, _passwordNew, 1, now());
		
		-- Borrado logico del ultimo acceso
		UPDATE controlpasswords SET CpDeleted_at = NOW() WHERE IdUser = _userId AND CpAccessNumber = _AccessNumber;
	ELSE 
		-- Eliminar el primer registro
		DELETE FROM controlpasswords WHERE IdUser = _userId AND CpAccessNumber = 1;
		
		-- Borrado logico del ultimo acceso
		UPDATE controlpasswords SET CpDeleted_at = NOW() WHERE IdUser = _userId AND CpAccessNumber = _AccessNumber;
		
		-- Reenumerar los AccessNumber
		UPDATE controlpasswords SET CpAccessNumber=CpAccessNumber-1 WHERE IdUser = _userId;
		
		-- Insertar el nuevo registro
		SET _AccessNumber2 = (SELECT max(CpAccessNumber) FROM controlpasswords WHERE IdUser = _userId);
		
		INSERT INTO controlpasswords (IdUser, CpAccessNumber, CpPassword, CpChangePasswordRequired, CpCreated_at) values (_userId, 5, _passwordNew, 0, now());
	END IF;  
END$$
DELIMITER ; -- EL DELIMITADOR VUELVE A SER ";"