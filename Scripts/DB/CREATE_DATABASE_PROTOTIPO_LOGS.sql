-- Creacion de base de datos
drop database if exists prototipologs;
CREATE DATABASE IF NOT EXISTS `prototipologs`;
USE `prototipologs`;


-- Creacion de tablas 
CREATE TABLE IF NOT EXISTS `querytypes` (
  `Id` char(2) NOT NULL COMMENT 'Id',
  `Description` varchar(30) NOT NULL COMMENT 'Description',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `changesbd` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `Table` varchar(128) NOT NULL COMMENT 'Table affected',
  `IdQueryType` char(2) NOT NULL COMMENT 'Query type',
  `Before` longtext COMMENT 'SQL before',
  `Later` longtext COMMENT 'SQL later',
  `User` varchar(128) DEFAULT NULL COMMENT 'User',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`),
  KEY `FK_ChangesBD_IdQueryType` (`IdQueryType`),
  CONSTRAINT `Cnst_Changesbd_QueryTypes_5452` FOREIGN KEY (`IdQueryType`) REFERENCES `querytypes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `mail` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `From` varchar(255) DEFAULT NULL COMMENT 'From',
  `To` longtext COMMENT 'To',
  `Message` longtext COMMENT 'Message',
  `Subject` varchar(255) DEFAULT NULL COMMENT 'Subject',
  `Files` int(10) unsigned DEFAULT NULL COMMENT 'Files',
  `Status` char(8) DEFAULT NULL COMMENT 'Status',
  `Response` longtext COMMENT 'Response',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `migrations` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `Version` int(10) unsigned NOT NULL COMMENT 'Version',
  `Description` varchar(1000) NOT NULL COMMENT 'Description',
  `Executed_at` datetime NOT NULL COMMENT 'Executed date',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `reports` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `Resource` varchar(128) DEFAULT NULL COMMENT 'Resource',
  `TypeFile` char(20) DEFAULT NULL COMMENT 'Type file',
  `User` varchar(128) DEFAULT NULL COMMENT 'User',
  `Ip` varchar(128) DEFAULT NULL COMMENT 'Ip client',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sqllog` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `IdQueryType` char(2) NOT NULL COMMENT 'Query Type',
  `Table` varchar(128) NOT NULL COMMENT 'Table',
  `User` varchar(128) NOT NULL COMMENT 'User',
  `Query` longtext NOT NULL COMMENT 'Str Query',
  `Ip` varchar(128) NOT NULL COMMENT 'Ip client',
  `Created_at` datetime DEFAULT NULL COMMENT 'Created at',
  `Deleted_at` datetime DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`Id`),
  KEY `FK_SqlLog_IdQueryType` (`IdQueryType`),
  CONSTRAINT `Cnst_QueryTypes_SqlLog_5459` FOREIGN KEY (`IdQueryType`) REFERENCES `querytypes` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1575 DEFAULT CHARSET=latin1;
