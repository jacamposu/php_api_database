-- Creacion de base de datos
drop database if exists prototipo;
CREATE DATABASE IF NOT EXISTS `prototipo`;
USE `prototipo`;


-- Creacion de tablas 
CREATE TABLE IF NOT EXISTS `align` (
  `AlId` char(3) NOT NULL COMMENT 'Id',
  `AlDescription` varchar(30) NOT NULL COMMENT 'Description',
  `AlCreated_at` datetime NOT NULL COMMENT 'Created at',
  `AlDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`AlId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `appstyle` (
  `AppId` char(4) NOT NULL COMMENT 'Id',
  `AppDescription` varchar(128) NOT NULL COMMENT 'Description',
  `AppUrlImage` varchar(255) DEFAULT NULL COMMENT 'Url image',
  `AppCssStyle` varchar(128) DEFAULT NULL COMMENT 'Style Css',
  `AppCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `AppDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`AppId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `countries` (
  `CoId` char(10) NOT NULL COMMENT 'Id',
  `CoCountryName` varchar(255) NOT NULL COMMENT 'Country name',
  `CoCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `CoDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`CoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `fieldtype` (
  `FtId` char(3) NOT NULL COMMENT 'Id',
  `FtDescription` varchar(30) NOT NULL COMMENT 'Description',
  `FtCreated_at` datetime NOT NULL COMMENT 'Created at',
  `FtDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`FtId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `identificationtypes` (
  `ItId` char(3) NOT NULL COMMENT 'Id',
  `ItDescription` varchar(60) NOT NULL COMMENT 'Description',
  `ItCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `ItDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`ItId`),
  UNIQUE KEY `IdentificationTypes_ItDescription` (`ItDescription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `inputtype` (
  `TyId` char(3) NOT NULL COMMENT 'Id',
  `TyDescription` varchar(30) NOT NULL COMMENT 'Description',
  `TyCreated_at` datetime NOT NULL COMMENT 'Created at',
  `TyDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`TyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `inputtypeform` (
  `ItfId` char(3) NOT NULL COMMENT 'Id',
  `ItfDescription` varchar(30) NOT NULL COMMENT 'Description',
  `ItfCreated_at` datetime NOT NULL COMMENT 'Created at',
  `ItfDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`ItfId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `lang` (
  `LaId` char(3) NOT NULL COMMENT 'Id',
  `LaLanguage` varchar(255) NOT NULL COMMENT 'Language',
  `LaCreated_at` datetime NOT NULL COMMENT 'Created at',
  `LaDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`LaId`),
  KEY `Lang_LaLanguage` (`LaLanguage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `securityquestions` (
  `SqId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `SqDescription` varchar(255) NOT NULL COMMENT 'Question',
  `SqCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `SqDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`SqId`),
  UNIQUE KEY `SecurityQuestions_SqDescription` (`SqDescription`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `settings` (
  `SeId` varchar(255) NOT NULL COMMENT 'Id',
  `SeDescription` varchar(255) NOT NULL COMMENT 'Description',
  `SeValue` varchar(255) NOT NULL COMMENT 'Value',
  `SeCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `SeDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`SeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `typeowner` (
  `ToId` char(1) NOT NULL COMMENT 'Id',
  `ToDescription` varchar(30) NOT NULL COMMENT 'Description',
  `ToCreated_at` datetime NOT NULL COMMENT 'Created at',
  `ToDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`ToId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `usergroups` (
  `UgId` char(4) NOT NULL COMMENT 'Id',
  `UgDescription` varchar(255) NOT NULL COMMENT 'Description',
  `UgCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `UgDeleted_at` datetime DEFAULT NULL COMMENT 'Delete at',
  PRIMARY KEY (`UgId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `httpcodes` (
  `HcMessage` char(20) NOT NULL,
  `HcColor` char(30) NOT NULL,
  `HcIcon` char(50) NOT NULL,
  `HcCreated_at` datetime NOT NULL,
  `HcDeleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `wiki` (
  `WiId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `WiTitle` varchar(255) NOT NULL COMMENT 'Title',
  `WiSubtitle` varchar(255) NOT NULL COMMENT 'Subtitle',
  `WiParentTitle` int(10) unsigned DEFAULT NULL COMMENT 'Parent title',
  `WiContent` longtext COMMENT 'Content',
  `WiTypeContent` char(30) NOT NULL COMMENT 'Type content',
  `WiCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `WiDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`WiId`),
  UNIQUE KEY `Wiki_WiTitle` (`WiTitle`,`WiSubtitle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `usertypes` (
  `UtId` char(10) NOT NULL COMMENT 'Id',
  `IdUserGroup` char(4) NOT NULL COMMENT 'User group',
  `UtDescription` varchar(60) NOT NULL COMMENT 'User type',
  `UtCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `UtDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`UtId`),
  UNIQUE KEY `UserTypes_UtDescription` (`UtDescription`),
  KEY `FK_UserTypes_IdUserGroup` (`IdUserGroup`),
  CONSTRAINT `Cnst_UserGroup_UserTypes_4974` FOREIGN KEY (`IdUserGroup`) REFERENCES `usergroups` (`UgId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `states` (
  `StId` char(10) NOT NULL COMMENT 'Id',
  `IdCountryState` char(10) NOT NULL COMMENT 'Country',
  `StStateName` varchar(128) DEFAULT NULL COMMENT 'Name',
  `StCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `StDeleted_at` int(10) unsigned DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`StId`),
  KEY `FK_States_IdCountryState` (`IdCountryState`),
  CONSTRAINT `Cnst_Countries_States_4686` FOREIGN KEY (`IdCountryState`) REFERENCES `countries` (`CoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `cities` (
  `CiId` char(10) NOT NULL COMMENT 'Id',
  `IdStateCity` char(10) NOT NULL COMMENT 'State',
  `CiCityName` varchar(128) DEFAULT NULL COMMENT 'Name',
  `CiCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `CiDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`CiId`),
  KEY `FK_Cities_IdStateCity` (`IdStateCity`),
  CONSTRAINT `Cnst_States_Cities_4619` FOREIGN KEY (`IdStateCity`) REFERENCES `states` (`StId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `userstatus` (
  `UsId` varchar(2) NOT NULL COMMENT 'Id',
  `UsStatus` varchar(60) NOT NULL COMMENT 'User Status',
  `UsDescription` varchar(600) NOT NULL COMMENT 'Description error',
  `UsCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `UsDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`UsId`),
  UNIQUE KEY `UserStatus_UsDescription` (`UsDescription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `users` (
  `UsrId` varchar(20) NOT NULL COMMENT 'Id',
  `IdLang` char(3) NOT NULL COMMENT 'Lang user',
  `IdAppStyle` char(4) DEFAULT NULL COMMENT 'App style',
  `IdUserTypeUser` char(10) NOT NULL COMMENT 'User type',
  `IdUserStatus` varchar(2) NOT NULL COMMENT 'User status',
  `UsrSurname` varchar(60) NOT NULL COMMENT 'Surname',
  `UsrSecondSurname` varchar(60) DEFAULT NULL COMMENT 'Second surname',
  `UsrFirtsName` varchar(60) NOT NULL COMMENT 'Estado',
  `UsrSecondName` varchar(60) DEFAULT NULL COMMENT 'Second name',
  `UsrEmail` varchar(100) NOT NULL COMMENT 'Email',
  `IdIdentificationType` char(3) DEFAULT NULL COMMENT 'Identificacion type',
  `IdCity` char(10) DEFAULT NULL COMMENT 'Citie',
  `IdStateUser` char(10) DEFAULT NULL COMMENT 'State',
  `IdCountryUser` char(10) DEFAULT NULL COMMENT 'Country',
  `UsrIdentificationNumber` char(10) DEFAULT NULL COMMENT 'Id number',
  `UsrCellphone` varchar(10) DEFAULT NULL COMMENT 'Cellphone',
  `UsrAddress` varchar(255) DEFAULT NULL COMMENT 'Address',
  `UsrToken` varchar(50) DEFAULT NULL COMMENT 'Token',
  `UsrFailedAttempts` int(10) unsigned DEFAULT NULL COMMENT 'Failed attempts',
  `UsrLastAccess` datetime DEFAULT NULL COMMENT 'Last access',
  `UsrLastIp` varchar(255) DEFAULT NULL COMMENT 'Last ip',
  `UsrEncryptedId` varchar(128) DEFAULT NULL COMMENT 'Encrypted id',
  `UsrPhoto` char(13) DEFAULT NULL COMMENT 'Fotografía',
  `UsrCreated_at` datetime NOT NULL COMMENT 'Created at',
  `UsrDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`UsrId`),
  KEY `FK_Users_IdLang` (`IdLang`),
  KEY `FK_Users_IdAppStyle` (`IdAppStyle`),
  KEY `FK_Users_IdUserTypeUser` (`IdUserTypeUser`),
  KEY `FK_Users_IdUserStatus` (`IdUserStatus`),
  KEY `FK_Users_UsrIdIdentificationType` (`IdIdentificationType`),
  KEY `FK_Users_IdCity` (`IdCity`),
  KEY `FK_Users_IdStateUser` (`IdStateUser`),
  KEY `FK_Users_IdCountryUser` (`IdCountryUser`),
  CONSTRAINT `Cnst_AppStyle_Users_5224` FOREIGN KEY (`IdAppStyle`) REFERENCES `appstyle` (`AppId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_Lang_Users_5285` FOREIGN KEY (`IdLang`) REFERENCES `lang` (`LaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_UserStatus_Users_4993` FOREIGN KEY (`IdUserStatus`) REFERENCES `userstatus` (`UsId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_UserTypes_Users_4495` FOREIGN KEY (`IdUserTypeUser`) REFERENCES `usertypes` (`UtId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_Cities_Users_4987` FOREIGN KEY (`IdCity`) REFERENCES `cities` (`CiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_Countries_Users_4983` FOREIGN KEY (`IdCountryUser`) REFERENCES `countries` (`CoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_IdentificationTypes_Users_4989` FOREIGN KEY (`IdIdentificationType`) REFERENCES `identificationtypes` (`ItId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_States_Users_4985` FOREIGN KEY (`IdStateUser`) REFERENCES `states` (`StId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `userspassword` (
  	`CpId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  	`IdUser` varchar(20) NOT NULL COMMENT 'User',
  	`CpAccessNumber` int(10) unsigned NOT NULL COMMENT 'Access number',
  	`CpPassword` varchar(255) NOT NULL COMMENT 'Password',
  	`CpFailedAttempts` int(10) unsigned DEFAULT NULL COMMENT 'Failed attempts',
	  `CpLastAccess` datetime DEFAULT NULL COMMENT 'Last access',
	  `CpLastIp` varchar(255) DEFAULT NULL COMMENT 'Last ip',
	  `CpChangePasswordRequired` tinyint(1) NOT NULL COMMENT 'Change pass required',
  	`CpCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  	`CpDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  	PRIMARY KEY (`CpId`),
  	KEY `FK_UsersPassword_IdUser` (`IdUser`),
  	CONSTRAINT `Cnst_Users_UsersPassword_4895` FOREIGN KEY (`IdUser`) REFERENCES `users` (`UsrId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `icons` (
  `IcId` varchar(128) NOT NULL COMMENT 'Name icon',
  `IcFontAwesome` varchar(128) NOT NULL COMMENT 'Name icon fontawesome',
  `IcCreated_at` datetime NOT NULL COMMENT 'Created at',
  `IcDeleted_at` datetime DEFAULT NULL COMMENT 'Delete at',
  PRIMARY KEY (`IcId`),
  UNIQUE KEY `Icons_IcId` (`IcId`,`IcFontAwesome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `mime` (
  `MiId` char(5) NOT NULL COMMENT 'Id',
  `IdIcon` varchar(128) NOT NULL COMMENT 'Icon',
  `MiDocumentType` varchar(53) NOT NULL COMMENT 'Document type',
  `MiTypeMime` varchar(100) NOT NULL COMMENT 'Type mime',
  `MiExtension` char(6) NOT NULL COMMENT 'Extension',
  `MiColor` char(30) NOT NULL COMMENT 'Color',
  `MiCreated_at` datetime NOT NULL COMMENT 'Created at',
  `MiDeleted_at` datetime DEFAULT NULL COMMENT 'Delete at',
  PRIMARY KEY (`MiId`),
  KEY `FK_Mime_IdIcon` (`IdIcon`),
  CONSTRAINT `Cnst_IcoName_MimIcon_5302` FOREIGN KEY (`IdIcon`) REFERENCES `icons` (`IcId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `directories` (
  `DiId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdParentDirectory` int(10) unsigned NOT NULL COMMENT 'Parent directory',
  `DiName` varchar(255) NOT NULL COMMENT 'Name',
  `DiCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `DiDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`DiId`),
  KEY `FK_Directories_IdParentDirectory` (`IdParentDirectory`),
  CONSTRAINT `Cnst_DirId_IdParentDirectory_5096` FOREIGN KEY (`IdParentDirectory`) REFERENCES `directories` (`DiId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `files` (
  `FiId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdDirectory` int(10) unsigned NOT NULL COMMENT 'Directory',
  `FiFileName` varchar(255) NOT NULL COMMENT 'File name',
  `FiSize` float DEFAULT NULL COMMENT 'Size',
  `IdMimeType` char(5) DEFAULT NULL COMMENT 'Type mime',
  `FiUnit` varchar(50) DEFAULT NULL COMMENT 'Unit',
  `FiFileNameServer` char(13) DEFAULT NULL COMMENT 'File Name Storage',
  `FiSubdirectory` char(5) DEFAULT NULL COMMENT 'Subdirectory',
  `FiCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `FiDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`FiId`),
  KEY `FK_Files_IdDirectory` (`IdDirectory`),
  KEY `FK_Files_IdMimeType` (`IdMimeType`),
  CONSTRAINT `Cnst_DirId_IdDirectory_5104` FOREIGN KEY (`IdDirectory`) REFERENCES `directories` (`DiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_MimId_IdMimeType_5415` FOREIGN KEY (`IdMimeType`) REFERENCES `mime` (`MiId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `versionfiles` (
  `VfId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdFile` int(10) unsigned NOT NULL COMMENT 'File',
  `VfNumVersion` int(10) unsigned NOT NULL COMMENT 'Number version',
  `VfCreated_at` datetime NOT NULL COMMENT 'Created at',
  `VfDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`VfId`),
  KEY `FK_VersionFiles_IdFile` (`IdFile`),
  CONSTRAINT `Cnst_Files_VersionFiles_5451` FOREIGN KEY (`IdFile`) REFERENCES `files` (`FiId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `dictionary` (
  `DiId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `DiTableName` varchar(60) NOT NULL COMMENT 'Table',
  `DiFieldName` varchar(60) NOT NULL COMMENT 'Field name',
  `DiFormat` varchar(20) DEFAULT NULL COMMENT 'Format',
  `IdInputType` char(3) NOT NULL COMMENT 'InputType',
  `IdInputTypeForm` char(3) NOT NULL COMMENT 'Input type form',
  `DiSizeInputForm` varchar(128) DEFAULT NULL COMMENT 'Size input form',
  `IdIcon` varchar(128) NOT NULL COMMENT 'Icon',
  `DiDependentList` varchar(60) DEFAULT NULL COMMENT 'Dependent list',
  `DiPattern` varchar(1000) DEFAULT NULL COMMENT 'Pattern',
  `DiValidationForm` varchar(1000) DEFAULT NULL COMMENT 'Validation form',
  `DiCreated_at` datetime DEFAULT NULL COMMENT '''Created at',
  `DiDeleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`DiId`),
  KEY `FK_Dictionary_IdIcon` (`IdIcon`),
  KEY `FK_Dictionary_IdInputTypeForm` (`IdInputTypeForm`),
  KEY `FK_Dictionary_IdInputType` (`IdInputType`),
  CONSTRAINT `Cnst_Icons_Dictionary_5301` FOREIGN KEY (`IdIcon`) REFERENCES `icons` (`IcId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_InputTypeForm_Dictionary_5347` FOREIGN KEY (`IdInputTypeForm`) REFERENCES `inputtypeform` (`ItfId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_InputType_Dictionary_5345` FOREIGN KEY (`IdInputType`) REFERENCES `inputtype` (`TyId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `DictionaryAlias` (
	AliasId int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
	AliasKeyVerify varchar(255) NOT NULL COMMENT 'KeyVerify',
	AliasDateRepository datetime DEFAULT NULL,
	AliasOwnerRepository varchar(255) NOT NULL COMMENT 'OwnerRepository',
	AliasLoadPhoto varchar(60) NOT NULL COMMENT 'LoadPhoto',
	AliasNameRepository varchar(255) NOT NULL COMMENT 'NameRepository',
	AliasUserGroups varchar(255) NOT NULL COMMENT 'UserGroups',
	AliasUserList varchar(20) NOT NULL COMMENT 'UserList',
	AliasKeyNew varchar(255) NOT NULL COMMENT 'KeyNew',
	AliasKeyOld  varchar(255) NOT NULL COMMENT 'KeyOld',
	AliasDirectories  varchar(255) NOT NULL COMMENT 'Directories',
	AliasAffectMenuProile  varchar(255) NOT NULL COMMENT 'affectMenuProile',
	AliasTypeDocRepository  varchar(255) NOT NULL COMMENT 'TypeDocRepository',
	AliasFullNameUsers  varchar(60) NOT NULL COMMENT 'FullNameUsers',
	AliasTypeUserProfile varchar(60) NOT NULL COMMENT 'typeUserProfile',
	PRIMARY KEY (`AliasId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `DictionaryLang` (
  `DlId` varchar(128) NOT NULL COMMENT 'Field',
  `DlSpanishDesc` varchar(128) DEFAULT NULL COMMENT 'Spanish description',
  `DlSpanishHelp` varchar(128) DEFAULT NULL COMMENT 'Spanish help message',
  `DlEnglishDesc` varchar(128) DEFAULT NULL COMMENT 'English description',
  `DlEnglishHelp` varchar(128) DEFAULT NULL COMMENT 'English help message',
  `DlCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `DlDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`DlId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `menu` (
  `MeId` char(13) NOT NULL COMMENT 'Id',
  `IdParentMenu` char(13) DEFAULT NULL COMMENT 'Parent menu',
  `MeName` varchar(255) NOT NULL COMMENT 'Description',
  `MeMenuType` smallint(5) unsigned NOT NULL COMMENT 'Menu type',
  `MeMenuLevel` smallint(5) unsigned NOT NULL COMMENT 'Menu Level',
  `MeUrl` varchar(5000) DEFAULT NULL COMMENT 'Url',
  `MeParams` varchar(255) DEFAULT NULL COMMENT 'Params url',
  `IdIcon` varchar(128) NOT NULL COMMENT 'Icon',
  `MeCreated_at` datetime NOT NULL COMMENT 'Created at',
  `MeDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`MeId`),
  KEY `FK_Menu_IdParentMenu` (`IdParentMenu`),
  KEY `FK_Menu_IdIcon` (`IdIcon`),
  CONSTRAINT `Cnst_IcoName_IdIcon_5413` FOREIGN KEY (`IdIcon`) REFERENCES `icons` (`IcId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_MenId_IdParentMenu_5524` FOREIGN KEY (`IdParentMenu`) REFERENCES `menu` (`MeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `ownersdir` (
  `OdId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdDirectory` int(10) unsigned NOT NULL COMMENT 'Directory',
  `IdTypeOwner` char(1) NOT NULL COMMENT 'Type owner',
  `OdOwner` varchar(20) DEFAULT NULL COMMENT 'Owner',
  `OdCreated_at` datetime NOT NULL COMMENT 'Created at',
  `OdDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`OdId`),
  KEY `FK_OwnersDir_IdDirectory` (`IdDirectory`),
  KEY `FK_OwnersDir_IdTypeOwner` (`IdTypeOwner`),
  CONSTRAINT `Cnst_DirId_IdDirectory_5458` FOREIGN KEY (`IdDirectory`) REFERENCES `directories` (`DiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_TypOwnId_IdTypeOwner_5508` FOREIGN KEY (`IdTypeOwner`) REFERENCES `typeowner` (`ToId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `ownersfil` (
  `OfId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdFile` int(10) unsigned NOT NULL COMMENT 'File',
  `IdTypeOwner` char(1) NOT NULL COMMENT 'Type owner',
  `OfOwner` varchar(20) NOT NULL COMMENT 'Owner',
  `OfCreated_at` datetime NOT NULL COMMENT 'Created at',
  `Ofdelete_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`OfId`),
  KEY `FK_OwnersFil_IdFile` (`IdFile`),
  KEY `FK_OwnersFil_IdTypeOwner` (`IdTypeOwner`),
  CONSTRAINT `Cnst_FilId_IdFile_5461` FOREIGN KEY (`IdFile`) REFERENCES `files` (`FiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_TypOwnId_IdTypeOwner_5510` FOREIGN KEY (`IdTypeOwner`) REFERENCES `typeowner` (`ToId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `profiles` (
  `PrId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdMenu` char(13) NOT NULL COMMENT 'Menu',
  `IdUserTypeProfile` char(10) NOT NULL COMMENT 'User type',
  `PrVisibleMenu` tinyint(1) DEFAULT NULL COMMENT 'Visible menu',
  `PrCreate` tinyint(1) DEFAULT NULL COMMENT 'Create',
  `PrUpdate` tinyint(1) DEFAULT NULL COMMENT 'Update',
  `PrDelete` tinyint(1) DEFAULT NULL COMMENT 'Delete',
  `PrRead` tinyint(1) DEFAULT NULL COMMENT 'Read',
  `PrReports` tinyint(1) DEFAULT NULL COMMENT 'Reports',
  `PrWhere` varchar(2000) DEFAULT NULL COMMENT 'Where',
  `PrJoin` varchar(2000) DEFAULT NULL COMMENT 'Join',
  `PrCreated_at` datetime NOT NULL COMMENT 'Created at',
  `PrDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`PrId`),
  KEY `FK_Profiles_IdMenu` (`IdMenu`),
  KEY `FK_Profiles_IdUserTypeProfile` (`IdUserTypeProfile`),
  CONSTRAINT `Cnst_MenId_IdMenu_5260` FOREIGN KEY (`IdMenu`) REFERENCES `menu` (`MeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_UseTypId_IdUserTypeProfile_5243` FOREIGN KEY (`IdUserTypeProfile`) REFERENCES `usertypes` (`UtId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `userquestion` (
  `UqId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdUser` varchar(20) NOT NULL COMMENT 'User',
  `IdQuestion` int(10) unsigned NOT NULL COMMENT 'Question',
  `UqResponse` longtext COMMENT 'Response',
  `UqCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `UqDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`UqId`),
  KEY `FK_UserQuestion_IdUser` (`IdUser`),
  KEY `FK_UserQuestion_IdQuestion` (`IdQuestion`),
  CONSTRAINT `Cnst_SequrityQuestions_UserQuestion_5535` FOREIGN KEY (`IdQuestion`) REFERENCES `securityquestions` (`SqId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cnst_Users_UserQuestion_5537` FOREIGN KEY (`IdUser`) REFERENCES `users` (`UsrId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `langfunct` (
  `LfId` varchar(128) NOT NULL COMMENT 'Name',
  `LfSpanish` longtext COMMENT 'Espanish',
  `LfEnglish` longtext COMMENT 'English',
  `LfParams` varchar(255) DEFAULT NULL COMMENT 'Params function',
  `LfCreated_at` datetime NOT NULL COMMENT 'Created at',
  `LfDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`LfId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `langjs` (
  `LjsId` varchar(128) NOT NULL COMMENT 'Item',
  `LjsSpanish` varchar(255) DEFAULT NULL COMMENT 'Spanish',
  `LjsEnglish` varchar(255) DEFAULT NULL COMMENT 'English',
  `LjsCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `LjsDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`LjsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `langmenu` (
  `LmId` char(13) NOT NULL COMMENT 'Id resource',
  `LmSpanish` varchar(128) DEFAULT NULL COMMENT 'Spanish',
  `LmEnglish` varchar(128) DEFAULT NULL COMMENT 'English',
  `LmCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `LmDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`LmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `langresources` (
  `LrId` varchar(64) NOT NULL COMMENT 'Resource',
  `LrSpanish` longtext COMMENT 'Spanish',
  `LrEnglish` longtext COMMENT 'English',
  `LrItem` varchar(64) DEFAULT NULL COMMENT 'Item',
  `LrCreated_at` datetime DEFAULT NULL COMMENT 'Created at',
  `LrDeleted_at` datetime DEFAULT NULL COMMENT 'Deleted at'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `userslogin` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdUser` varchar(128) NOT NULL COMMENT 'User',
  `IdStatus` char(4) NOT NULL COMMENT 'Problem',
  `Attempt` int(10) unsigned NOT NULL COMMENT 'Attempt',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`),
  KEY `FK_Login_IdStatus` (`IdStatus`),
  CONSTRAINT `Cnst_UserStatus_Login_5440` FOREIGN KEY (`IdStatus`) REFERENCES `userstatus` (`UsId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=637 DEFAULT CHARSET=latin1;


-- CREATE TABLE IF NOT EXISTS `msglogin` (
--   `Id` char(4) NOT NULL COMMENT 'Id',
--   `Description` longtext NOT NULL COMMENT 'Description',
--   `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
--   `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
--   PRIMARY KEY (`Id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;