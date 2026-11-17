DELIMITER $$

DROP PROCEDURE IF EXISTS Usp_Login_AccessControl $$

CREATE PROCEDURE Usp_Login_AccessControl
(
    IN _userId VARCHAR(255),
    IN _password VARCHAR(255),
    IN _daysInactivity INT,
    IN _daysForceChangePw INT,
    IN _crearLog BOOLEAN,
    IN _numberAttempts INT
)
BEGIN

    DECLARE _AccessNumber INT DEFAULT 0;
    DECLARE _ExistsUser VARCHAR(255);
    DECLARE _UltimoAcceso DATETIME;
    DECLARE _ChangePasswordRequired INT DEFAULT 0;
    DECLARE _IdProblem VARCHAR(4);
    DECLARE _IdUserStatus CHAR(1);
    DECLARE v_sqlstate VARCHAR(5);
    DECLARE v_message TEXT;
    DECLARE v_error TEXT;
    DECLARE t_UsrId VARCHAR(55);
    DECLARE t_IdUserTypeUser varchar(55);
    DECLARE t_UsrSurname VARCHAR(255);
    DECLARE t_UsrFirtsName VARCHAR(255);
    DECLARE t_CpLastAccess DATETIME;
    DECLARE t_IdUserStatus CHAR(1);
    DECLARE t_IdAppStyle VARCHAR(55);
    DECLARE t_UtDescription VARCHAR(255);
    DECLARE t_IdLang VARCHAR(55);
    DECLARE t_UsrCellphone VARCHAR(255);
    DECLARE t_UsrAddress VARCHAR(255);
    DECLARE t_Localization VARCHAR(255);
    DECLARE t_CreationDate DATETIME;
    DECLARE t_UsrEmail VARCHAR(255);

    DECLARE CONTINUE HANDLER FOR NOT FOUND
    BEGIN
        SET t_UsrId = NULL;
    END;

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

    /* =======================================================
       VALIDA EXISTENCIA USUARIO
       ======================================================= */

    SELECT UsrId
    INTO _ExistsUser
    FROM users
    WHERE UsrId = _userId
    LIMIT 1;

    IF _ExistsUser IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR_WU';
    END IF;

    /* =======================================================
       OBTENER INTENTOS FALLIDOS
       ======================================================= */

    SELECT COALESCE(CpFailedAttempts,0)
    INTO _AccessNumber
    FROM userspassword
    WHERE IdUser = _userId
      AND CpDeleted_at IS NULL
    ORDER BY CpAccessNumber DESC
    LIMIT 1;

    /* =======================================================
       VALIDAR CREDENCIALES
       ======================================================= */

    SET t_UsrId = NULL;

    SELECT
        u.UsrId,
        u.IdUserTypeUser,
        u.UsrSurname,
        u.UsrFirtsName,
        cp.CpLastAccess,
        u.IdUserStatus,
        u.IdAppStyle,
        ut.UtDescription,
        u.IdLang,
        u.UsrCellphone,
        u.UsrAddress,
        CONCAT(c.CiCityName,' - ',s.StStateName),
        u.Usrcreated_at,
        u.UsrEmail
    INTO
        t_UsrId,
        t_IdUserTypeUser,
        t_UsrSurname,
        t_UsrFirtsName,
        t_CpLastAccess,
        t_IdUserStatus,
        t_IdAppStyle,
        t_UtDescription,
        t_IdLang,
        t_UsrCellphone,
        t_UsrAddress,
        t_Localization,
        t_CreationDate,
        t_UsrEmail
    FROM users u
        INNER JOIN userspassword cp
            ON cp.IdUser = u.UsrId
        LEFT JOIN appstyle aps
            ON aps.AppId = u.IdAppStyle
        INNER JOIN usertypes ut
            ON ut.UtId = u.IdUserTypeUser
        INNER JOIN cities c
            ON c.CiId = u.IdCity
        INNER JOIN states s
            ON s.StId = u.IdStateUser
    WHERE u.UsrId = _userId
      AND cp.CpPassword = _password
      AND cp.CpDeleted_at IS NULL
    LIMIT 1;

    /* =======================================================
       VALIDAR ESTADO DEL USUARIO
       ======================================================= */

    IF _crearLog THEN
        INSERT INTO userslogin (IdUser,IdStatus,Attempt,Created_at) VALUES (_userId,t_IdUserStatus,_AccessNumber,NOW());
    END IF;

    IF t_IdUserStatus <> 'A' THEN

        SET v_error = CONCAT('ERROR_', t_IdUserStatus);
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = v_error;

    END IF;

    /* =======================================================
       LOGIN FALLIDO
       ======================================================= */

    IF t_UsrId IS NULL THEN

        SET _AccessNumber = _AccessNumber + 1;

        UPDATE userspassword
        SET CpFailedAttempts = _AccessNumber
        WHERE IdUser = _userId
          AND CpDeleted_at IS NULL;

        IF _crearLog THEN
            INSERT INTO userslogin (IdUser,IdStatus,Attempt,Created_at) VALUES (_userId,'W',_AccessNumber,NOW());
        END IF;

        IF _AccessNumber >= _numberAttempts THEN

            UPDATE users
            SET IdUserStatus = 'B'
            WHERE UsrId = _userId;

            IF _crearLog THEN
                INSERT INTO userslogin (IdUser,IdStatus,Attempt,Created_at) VALUES (_userId,'B',_AccessNumber,NOW());
            END IF;

        END IF;

        COMMIT;

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR_WU';

    END IF;

    /* =======================================================
       VALIDAR INACTIVIDAD
       ======================================================= */
    SELECT
        CpCreated_at,
        COALESCE(CpChangePasswordRequired,0)
    INTO
        _UltimoAcceso,
        _ChangePasswordRequired
    FROM userspassword
    WHERE IdUser = _userId
      AND CpDeleted_at IS NULL
    ORDER BY CpAccessNumber DESC
    LIMIT 1;

    IF _daysInactivity > 0 AND DATEDIFF(NOW(), _UltimoAcceso) > _daysInactivity THEN

        UPDATE users
        SET IdUserStatus = 'I'
        WHERE UsrId = _userId;

        IF _crearLog THEN
            INSERT INTO userslogin (IdUser,IdStatus,Attempt,Created_at) VALUES (_userId,'I',_AccessNumber,NOW());
        END IF;

        COMMIT;

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR_I';

    END IF;

    /* =======================================================
       VALIDAR CAMBIO DE PASSWORD
       ======================================================= */

    IF _daysForceChangePw > 0 AND DATEDIFF(NOW(), _UltimoAcceso) > _daysForceChangePw THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR_FCP';

    END IF;

    IF _ChangePasswordRequired = 1 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ERROR_CPR';

    END IF;

    /* =======================================================
       LOGIN EXITOSO
       ======================================================= */

    UPDATE userspassword
    SET
        CpLastAccess = NOW(),
        CpFailedAttempts = 0
    WHERE IdUser = _userId
      AND CpDeleted_at IS NULL;

    COMMIT;

    SELECT
        1 AS Success,
        NULL AS ErrorCode,
        t_UsrId AS UsrId,
        t_IdUserTypeUser AS IdUserTypeUser,
        t_UsrSurname AS UsrSurname,
        t_UsrFirtsName AS UsrFirtsName,
        t_CpLastAccess AS CpLastAccess,
        t_IdUserStatus AS IdUserStatus,
        t_IdAppStyle AS IdAppStyle,
        t_UtDescription AS UtDescription,
        t_IdLang AS IdLang,
        t_UsrCellphone AS UsrCellphone,
        t_UsrAddress AS UsrAddress,
        t_Localization AS Localization,
        t_CreationDate AS CreationDate,
        t_UsrEmail AS UsrEmail;

END $$

DELIMITER ;