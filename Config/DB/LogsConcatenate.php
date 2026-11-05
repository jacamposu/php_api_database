<?php

global $concatenatedb2; $concatenatedb2 = [

	'ChangesBD' => [
		'concatenate' => $sql->appConcatenateField('ChaTable', 'ChaQueryType', 'ChaDatetime', 'ChaStatusProcess'),
		'orderBy' => ' order by ChaTable, ChaQueryType, ChaDatetime, ChaStatusProcess',
	],
	'LangDictionary' => [
		'concatenate' => 'LanDicStatusProcess',
		'orderBy' => ' order by LanDicStatusProcess',
	],
	'LangFunct' => [
		'concatenate' => 'LanFunStatusProcess',
		'orderBy' => ' order by LanFunStatusProcess',
	],
	'LangJS' => [
		'concatenate' => 'JsStatusProcess',
		'orderBy' => ' order by JsStatusProcess',
	],
	'LangMenu' => [
		'concatenate' => 'LanMenStatusProcess',
		'orderBy' => ' order by LanMenStatusProcess',
	],
	'LangResources' => [
		'concatenate' => 'LanResStatusProcess',
		'orderBy' => ' order by LanResStatusProcess',
	],
	'Login' => [
		'concatenate' => $sql->appConcatenateField('LogUser', 'LogAttempt'),
		'orderBy' => ' order by LogUser, LogAttempt',
	],
	'Mail' => [
		'concatenate' => 'MaiId',
		'orderBy' => '',
	],
	'MsgLogin' => [
		'concatenate' => $sql->appConcatenateField('MsgLogDescription'),
		'orderBy' => ' order by MsgLogDescription',
	],
	'QueryTypes' => [
		'concatenate' => $sql->appConcatenateField('QueDescription'),
		'orderBy' => ' order by QueDescription',
	],
	'Reports' => [
		'concatenate' => 'RepId',
		'orderBy' => '',
	],
	'SqlLog' => [
		'concatenate' => $sql->appConcatenateField('SqlQueryType', 'SqlTable', 'SqlUser', 'SqlQuery', 'SqlDatetime', 'SqlIp', 'SqlStatusProcess'),
		'orderBy' => ' order by SqlQueryType, SqlTable, SqlUser, SqlQuery, SqlDatetime, SqlIp, SqlStatusProcess',
	],
	'Wiki' => [
		'concatenate' => $sql->appConcatenateField('WikTitle', 'WikSubtitle', 'WikTypeContent', 'WikStatusProcess'),
		'orderBy' => ' order by WikTitle, WikSubtitle, WikTypeContent, WikStatusProcess',
	]
];
