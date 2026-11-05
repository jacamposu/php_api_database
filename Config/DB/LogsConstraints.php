<?php

global $relationsDeletedb2; $relationsDeletedb2 = [
	"5440" => [
		"primaryTable" => "MsgLogin", 
		"foreignTable" => "Login", 
		"relationship" => "MsgLogId_LogProblem", 
		"deleteFieldFT" => "LogStatusProcess"
	],
	"5452" => [
		"primaryTable" => "QueryTypes", 
		"foreignTable" => "ChangesBD", 
		"relationship" => "QueId_ChaQueryType", 
		"deleteFieldFT" => "ChaStatusProcess"
	],
	"5459" => [
		"primaryTable" => "QueryTypes", 
		"foreignTable" => "SqlLog", 
		"relationship" => "QueId_SqlQueryType", 
		"deleteFieldFT" => "SqlStatusProcess"
	],

];
