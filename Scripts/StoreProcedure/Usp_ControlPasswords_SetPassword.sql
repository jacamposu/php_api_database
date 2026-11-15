DELIMITER $$

DROP PROCEDURE IF EXISTS Usp_ControlPasswords_SetPassword $$

CREATE PROCEDURE Usp_ControlPasswords_SetPassword(
    IN _userId VARCHAR(255),
    IN _passwordOld VARCHAR(255),
    IN _passwordNew VARCHAR(255),
    IN _pwHistoryCount INT
)
BEGIN

    DECLARE _AccessNumber INT DEFAULT 0;
    DECLARE _AccessNumber2 INT DEFAULT 0;
    DECLARE _ExistsUser VARCHAR(255);
    DECLARE _ExisteNuevoPass INT DEFAULT 0;
    DECLARE v_sqlstate VARCHAR(5);
    DECLARE v_message TEXT;

    -- Captura cualquier error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

        GET DIAGNOSTICS CONDITION 1
            v_sqlstate = RETURNED_SQLSTATE,
            v_message = MESSAGE_TEXT;

        ROLLBACK;

        SELECT
            0 AS Success,
            v_sqlstate AS ErrorCode,
            v_message AS ErrorMessage;
    END;

    START TRANSACTION;

    -- Validar usuario y password actual
    SELECT US.UsrId
      INTO _ExistsUser
      FROM users US
      INNER JOIN controlpasswords CP
         ON CP.IdUser = US.UsrId
     WHERE US.UsrId = _userId
       AND CP.CpPassword = _passwordOld
     LIMIT 1;

    IF _ExistsUser IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'PasswordIncorrect';
    END IF;

    -- Validar que la nueva contraseña no exista
    SELECT COUNT(*)
      INTO _ExisteNuevoPass
      FROM controlpasswords
     WHERE IdUser = _userId
       AND CpPassword = _passwordNew;

    IF _ExisteNuevoPass > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'PasswordExists';
    END IF;

    -- Obtener último access number
    SELECT COALESCE(MAX(CpAccessNumber),0)
      INTO _AccessNumber
      FROM controlpasswords
     WHERE IdUser = _userId;

    IF _AccessNumber < _pwHistoryCount THEN

        INSERT INTO controlpasswords
        (
            IdUser,
            CpAccessNumber,
            CpPassword,
            CpFailedAttempts,
            CpChangePasswordRequired,
            CpCreated_at
        )
        VALUES
        (
            _userId,
            _AccessNumber + 1,
            _passwordNew,
            0,
            0,
            NOW()
        );

        UPDATE controlpasswords
           SET CpDeleted_at = NOW()
         WHERE IdUser = _userId
           AND CpAccessNumber = _AccessNumber;

    ELSE

        DELETE
          FROM controlpasswords
         WHERE IdUser = _userId
           AND CpAccessNumber = 1;

        UPDATE controlpasswords
           SET CpDeleted_at = NOW()
         WHERE IdUser = _userId
           AND CpAccessNumber = _AccessNumber;

        UPDATE controlpasswords
           SET CpAccessNumber = CpAccessNumber - 1
         WHERE IdUser = _userId;

        SELECT COALESCE(MAX(CpAccessNumber),0)
          INTO _AccessNumber2
          FROM controlpasswords
         WHERE IdUser = _userId;

        INSERT INTO controlpasswords
        (
            IdUser,
            CpAccessNumber,
            CpPassword,
            CpChangePasswordRequired,
            CpCreated_at
        )
        VALUES
        (
            _userId,
            _AccessNumber2 + 1,
            _passwordNew,
            0,
            NOW()
        );

    END IF;

    COMMIT;

    SELECT
        1 AS Success,
        NULL AS ErrorCode,
        'Password actualizado correctamente' AS Message;

END $$

DELIMITER ;
