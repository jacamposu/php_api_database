<?php

global $tableFieldsdb2; $tableFieldsdb2 = [
	'wiki' => ['WikId', 'WikTitle', 'WikSubtitle', 'WikParentTitle', 'WikContent', 'WikTypeContent', 'WikStatusProcess'],
	'login' => ['LogId', 'LogUser', 'LogDatetime', 'LogProblem', 'LogAttempt', 'LogStatusProcess'],
	'changesbd' => ['ChaId', 'ChaTable', 'ChaQueryType', 'ChaBefore', 'ChaLater', 'ChaUser', 'ChaDatetime', 'ChaStatusProcess'],
	'querytypes' => ['QueId', 'QueDescription', 'QueStatusProcess'],
	'msglogin' => ['MsgLogId', 'MsgLogDescription', 'MsgStatusProcess'],
	'sqllog' => ['SqlId', 'SqlQueryType', 'SqlTable', 'SqlUser', 'SqlQuery', 'SqlDatetime', 'SqlIp', 'SqlStatusProcess'],
	'mail' => ['MaiId', 'MaiFrom', 'MaiTo', 'MaiMessage', 'MaiSubject', 'MaiFiles', 'MaiDatetime', 'MaiStatus', 'MaiResponse', 'MaiStatusProcess'],
	'reports' => ['RepId', 'RepResource', 'RepUser', 'RepIp', 'RepDatetime', 'RepStatusProcess'],
	'langresources' => ['LanResResource', 'LanResSpanish', 'LanResEnglish', 'LanResStatusProcess'],
	'langfunct' => ['LanFunFuncName', 'LanFunSpanish', 'LanFunEnglish', 'LanFunStatusProcess'],
	'langdictionary' => ['LanDicField', 'LanDicSpanishDesc', 'LanDicSpanishHelp', 'LanDicEnglishDesc', 'LanDicEnglishHelp', 'LanDicStatusProcess'],
	'langmenu' => ['LanMeIdResource', 'LanMenSpanish', 'LanMenEnglish', 'LanMenStatusProcess'],
	'langjs' => ['JsItem', 'JsSpanish', 'JsEnglish', 'JsStatusProcess'],
];
