<?php



$concatenatedb1 = [

	'Align' => [
		'concatenate' => $sql->appConcatenateField('AliDescription'),
		'orderBy' => ' order by AliDescription',
	],
	'AppStyle' => [
		'concatenate' => $sql->appConcatenateField('AppStyDescription'),
		'orderBy' => ' order by AppStyDescription',
	],
	'Cities' => [
		'concatenate' => $sql->appConcatenateField('CitName'),
		'orderBy' => ' order by CitState',
	],
	'ControlPasswords' => [
		'concatenate' => $sql->appConcatenateField('ConPssUser', 'ConPssAccessNumber', 'ConPssPassword', 'ConPssDateCreation'),
		'orderBy' => ' order by ConPssUser, ConPssAccessNumber, ConPssPassword, ConPssDateCreation',
	],
	'Countries' => [
		'concatenate' => $sql->appConcatenateField('CouName'),
		'orderBy' => ' order by CouName',
	],
	'Dictionary' => [
		'concatenate' => $sql->appConcatenateField('DicTable', 'DicFieldName', 'DicFieldType', 'DicDescription', 'DicInputType', 'DicInputTypeForm', 'DicIcon'),
		'orderBy' => ' order by DicTable, DicFieldName',
	],
	'Directories' => [
		'concatenate' => $sql->appConcatenateField('DirParentDirectory', 'DirName'),
		'orderBy' => ' order by DirParentDirectory, DirName',
	],
	'Directories DirParentDirectory' => [
		'concatenate' => $sql->appConcatenateField('Dir_DirParentDirectory.DirParentDirectory', 'Dir_DirParentDirectory.DirName', 'Dir_DirParentDirectory.DirDateModify'),
		'orderBy' => ' order by Dir_DirParentDirectory.DirParentDirectory, Dir_DirParentDirectory.DirName, Dir_DirParentDirectory.DirDateModify',
	],
	'FieldType' => [
		'concatenate' => $sql->appConcatenateField('FieTypDescription'),
		'orderBy' => ' order by FieTypDescription',
	],
	'Files' => [
		'concatenate' => $sql->appConcatenateField('FilDirectory', 'FilFileName'),
		'orderBy' => ' order by FilDirectory, FilFileName',
	],
	'Icons' => [
		'concatenate' => $sql->appConcatenateField('IcoFontAwesome'),
		'orderBy' => ' order by IcoFontAwesome, IcoGroup',
	],
	'IconsGroup' => [
		'concatenate' => $sql->appConcatenateField('IcoGroDescription'),
		'orderBy' => ' order by IcoGroDescription',
	],
	'IdentificationTypes' => [
		'concatenate' => $sql->appConcatenateField('IdeTypDescription'),
		'orderBy' => ' order by IdeTypDescription',
	],
	'InputType' => [
		'concatenate' => $sql->appConcatenateField('InpTypDescription'),
		'orderBy' => ' order by InpTypDescription',
	],
	'InputTypeForm' => [
		'concatenate' => $sql->appConcatenateField('InpTypFrmDescription'),
		'orderBy' => ' order by InpTypFrmDescription',
	],
	'Lang' => [
		'concatenate' => $sql->appConcatenateField('LanLanguage'),
		'orderBy' => ' order by LanLanguage',
	],
	'Menu' => [
		'concatenate' => $sql->appConcatenateField('MenName'),
		'orderBy' => ' order by MenName, MenState, MenUrl, MenIcon',
	],
	'MenuGroup' => [
		'concatenate' => $sql->appConcatenateField('MenGroName'),
		'orderBy' => ' order by MenGroName, MenGroState, MenGroIcon, MenGroStatusProcess',
	],
	'Mime' => [
		'concatenate' => $sql->appConcatenateField('MimDocumentType'),
		'orderBy' => ' order by MimIcon, MimDocumentType, MimTypeMime, MimExtension, MimColor',
	],
	'OwnersDir' => [
		'concatenate' => $sql->appConcatenateField('OwnDirDirectory', 'OwnDirTypeOwner', 'OwnDirStatusProcess'),
		'orderBy' => ' order by OwnDirDirectory, OwnDirTypeOwner, OwnDirStatusProcess',
	],
	'OwnersFil' => [
		'concatenate' => $sql->appConcatenateField('OwnFilFile', 'OwnFilTypeOwner', 'OwnFilOwner', 'OwnFilStatusProcess'),
		'orderBy' => ' order by OwnFilFile, OwnFilTypeOwner, OwnFilOwner, OwnFilStatusProcess',
	],
	'Profiles' => [
		'concatenate' => $sql->appConcatenateField('ProMenu', 'ProUserType'),
		'orderBy' => ' order by ProMenu, ProUserType',
	],
	'SecurityQuestions' => [
		'concatenate' => $sql->appConcatenateField('SecQueDescription'),
		'orderBy' => ' order by SecQueDescription',
	],
	'Settings' => [
		'concatenate' => $sql->appConcatenateField('SetDescription', 'SetValue'),
		'orderBy' => ' order by SetDescription, SetValue',
	],
	'States' => [
		'concatenate' => $sql->appConcatenateField('StaName'),
		'orderBy' => ' order by StaCountry',
	],
	'TypeOwner' => [
		'concatenate' => $sql->appConcatenateField('TypOwnDescription', 'TypOwnStatusProcess'),
		'orderBy' => ' order by TypOwnDescription, TypOwnStatusProcess',
	],
	'TypeText' => [
		'concatenate' => $sql->appConcatenateField('TypTexDescription'),
		'orderBy' => ' order by TypTexDescription, TypTexStatusProcess',
	],
	'UserData' => [
		'concatenate' => $sql->appConcatenateField('UseDatIdeType', 'UseDatCitie', 'UseDatState', 'UseDatCountry', 'UseDatUser'),
		'orderBy' => ' order by UseDatIdeType, UseDatCitie, UseDatState, UseDatCountry, UseDatUser',
	],
	'UserGroups' => [
		'concatenate' => $sql->appConcatenateField('UseGroDescription'),
		'orderBy' => ' order by UseGroDescription',
	],
	'Users' => [
		'concatenate' => $sql->appConcatenateField('UseSurname', 'UseFirtsName'),
		'orderBy' => ' order by UseAppStyle, UseUserType, UseUserStatus, UseSurname, UseFirtsName, UsePassword',
	],
	'UserStatus' => [
		'concatenate' => $sql->appConcatenateField('UseStaDescription'),
		'orderBy' => ' order by UseStaDescription',
	],
	'UserTypes' => [
		'concatenate' => $sql->appConcatenateField('UseTypDescription'),
		'orderBy' => ' order by UseTypUserGroup, UseTypDescription',
	],
	'VersionFiles' => [
		'concatenate' => $sql->appConcatenateField('VerFilFile', 'VerFilNumVersion', 'VerFilStatusProcess'),
		'orderBy' => ' order by VerFilFile, VerFilNumVersion, VerFilStatusProcess',
	]
];
