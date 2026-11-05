
INSERT INTO `msglogin` (`Id`, `Description`, `Created_at`, `Deleted_at`) VALUES
	('EA', 'Acceso Exitoso', now(), NULL),
	('UAB', 'Este usuario ha sido bloqueado porque ha superado el mÃ¡ximo de intentos para acceder al sistema. Por favor contacte al administrador del sistema.', now(), NULL),
	('UD', 'Este usuario ha sido eliminado por el administrador del sisitema. Para acceder nuevamente contacte al Administrador del Sistema.', now(), NULL),
	('UIB', 'El usuario ha sido bloqueado por inactividad. Por favor contacte al administrador del sistema.', now(), NULL),
	('WU', 'El usuario o password ingresado(s) es(son) incorrecto(s), por favor rectifÃ­quelo(s) o ingrÃ©selo(s) nuevamente.', now(), NULL);

INSERT INTO `querytypes` (`Id`, `Description`, `Created_at`, `Deleted_at`) VALUES
	('DE', 'Delete', now(), NULL),
	('IN', 'Insert', now(), NULL),
	('UP', 'Update', now(), NULL);