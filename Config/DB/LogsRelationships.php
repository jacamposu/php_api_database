<?php

global $relationshipsdb2;


$relationshipsdb2 = [
		'ChaBefore' => [
				'fieldName' => 'ChaBefore', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaDatetime' => [
				'fieldName' => 'ChaDatetime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaId' => [
				'fieldName' => 'ChaId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaLater' => [
				'fieldName' => 'ChaLater', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaQueryType' => [
				'fieldName' => 'ChaQueryType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => 'querytypes', 
				'secKeyField' => 'QueId', 
				'secValueField' => 'QueDescription',  
				'secDeleteField' => 'QueStatusProcess'
		],
		'ChaStatusProcess' => [
				'fieldName' => 'ChaStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaTable' => [
				'fieldName' => 'ChaTable', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ChaUser' => [
				'fieldName' => 'ChaUser', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'changesbd', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'JsEnglish' => [
				'fieldName' => 'JsEnglish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langjs', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'JsItem' => [
				'fieldName' => 'JsItem', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'langjs', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'JsSpanish' => [
				'fieldName' => 'JsSpanish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langjs', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'JsStatusProcess' => [
				'fieldName' => 'JsStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langjs', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicEnglishDesc' => [
				'fieldName' => 'LanDicEnglishDesc', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicEnglishHelp' => [
				'fieldName' => 'LanDicEnglishHelp', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicField' => [
				'fieldName' => 'LanDicField', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicSpanishDesc' => [
				'fieldName' => 'LanDicSpanishDesc', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicSpanishHelp' => [
				'fieldName' => 'LanDicSpanishHelp', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanDicStatusProcess' => [
				'fieldName' => 'LanDicStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langdictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanFunEnglish' => [
				'fieldName' => 'LanFunEnglish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langfunct', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanFunFuncName' => [
				'fieldName' => 'LanFunFuncName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'langfunct', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanFunSpanish' => [
				'fieldName' => 'LanFunSpanish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langfunct', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanFunStatusProcess' => [
				'fieldName' => 'LanFunStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langfunct', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanMeIdResource' => [
				'fieldName' => 'LanMeIdResource', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'langmenu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanMenEnglish' => [
				'fieldName' => 'LanMenEnglish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langmenu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanMenSpanish' => [
				'fieldName' => 'LanMenSpanish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langmenu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanMenStatusProcess' => [
				'fieldName' => 'LanMenStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langmenu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanResEnglish' => [
				'fieldName' => 'LanResEnglish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langresources', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanResResource' => [
				'fieldName' => 'LanResResource', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'langresources', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanResSpanish' => [
				'fieldName' => 'LanResSpanish', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langresources', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanResStatusProcess' => [
				'fieldName' => 'LanResStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'langresources', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LogAttempt' => [
				'fieldName' => 'LogAttempt', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'login', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LogDatetime' => [
				'fieldName' => 'LogDatetime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'login', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LogId' => [
				'fieldName' => 'LogId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'login', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LogProblem' => [
				'fieldName' => 'LogProblem', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'login', 
				'secondaryTable' => 'msglogin', 
				'secKeyField' => 'MsgLogId', 
				'secValueField' => 'MsgLogDescription',  
				'secDeleteField' => 'MsgStatusProcess'
		],
		'LogStatusProcess' => [
				'fieldName' => 'LogStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'login', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LogUser' => [
				'fieldName' => 'LogUser', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'login', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiDatetime' => [
				'fieldName' => 'MaiDatetime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiFiles' => [
				'fieldName' => 'MaiFiles', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiFrom' => [
				'fieldName' => 'MaiFrom', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiId' => [
				'fieldName' => 'MaiId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiMessage' => [
				'fieldName' => 'MaiMessage', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiResponse' => [
				'fieldName' => 'MaiResponse', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiStatus' => [
				'fieldName' => 'MaiStatus', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiStatusProcess' => [
				'fieldName' => 'MaiStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiSubject' => [
				'fieldName' => 'MaiSubject', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MaiTo' => [
				'fieldName' => 'MaiTo', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mail', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MsgLogDescription' => [
				'fieldName' => 'MsgLogDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'msglogin', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MsgLogId' => [
				'fieldName' => 'MsgLogId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'msglogin', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MsgStatusProcess' => [
				'fieldName' => 'MsgStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'msglogin', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'QueDescription' => [
				'fieldName' => 'QueDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'querytypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'QueId' => [
				'fieldName' => 'QueId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'querytypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'QueStatusProcess' => [
				'fieldName' => 'QueStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'querytypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepDatetime' => [
				'fieldName' => 'RepDatetime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepId' => [
				'fieldName' => 'RepId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepIp' => [
				'fieldName' => 'RepIp', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepResource' => [
				'fieldName' => 'RepResource', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepStatusProcess' => [
				'fieldName' => 'RepStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'RepUser' => [
				'fieldName' => 'RepUser', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'reports', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlDatetime' => [
				'fieldName' => 'SqlDatetime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlId' => [
				'fieldName' => 'SqlId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlIp' => [
				'fieldName' => 'SqlIp', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlQuery' => [
				'fieldName' => 'SqlQuery', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlQueryType' => [
				'fieldName' => 'SqlQueryType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => 'querytypes', 
				'secKeyField' => 'QueId', 
				'secValueField' => 'QueDescription',  
				'secDeleteField' => 'QueStatusProcess'
		],
		'SqlStatusProcess' => [
				'fieldName' => 'SqlStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlTable' => [
				'fieldName' => 'SqlTable', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SqlUser' => [
				'fieldName' => 'SqlUser', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'sqllog', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikContent' => [
				'fieldName' => 'WikContent', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikId' => [
				'fieldName' => 'WikId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikParentTitle' => [
				'fieldName' => 'WikParentTitle', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikStatusProcess' => [
				'fieldName' => 'WikStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikSubtitle' => [
				'fieldName' => 'WikSubtitle', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikTitle' => [
				'fieldName' => 'WikTitle', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'WikTypeContent' => [
				'fieldName' => 'WikTypeContent', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'wiki', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		]
];

