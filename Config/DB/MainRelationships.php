<?php

global $relationshipsdb1;


$relationshipsdb1 = [
		'AliDescription' => [
				'fieldName' => 'AliDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'align', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AliId' => [
				'fieldName' => 'AliId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'align', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AliStatusProcess' => [
				'fieldName' => 'AliStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'align', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AppStyCssStyle' => [
				'fieldName' => 'AppStyCssStyle', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'appstyle', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AppStyDescription' => [
				'fieldName' => 'AppStyDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'appstyle', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AppStyId' => [
				'fieldName' => 'AppStyId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'appstyle', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AppStyStatusProcess' => [
				'fieldName' => 'AppStyStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'appstyle', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'AppStyUrlImage' => [
				'fieldName' => 'AppStyUrlImage', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'appstyle', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'CitId' => [
				'fieldName' => 'CitId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'cities', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'CitName' => [
				'fieldName' => 'CitName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'cities', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'CitState' => [
				'fieldName' => 'CitState', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'cities', 
				'secondaryTable' => 'states', 
				'secKeyField' => 'StaId', 
				'secValueField' => 'StaName',  
				'secDeleteField' => 'StaStatusProcess'
		],
		'CitStatusProcess' => [
				'fieldName' => 'CitStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'cities', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssAccessNumber' => [
				'fieldName' => 'ConPssAccessNumber', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssDateCreation' => [
				'fieldName' => 'ConPssDateCreation', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssId' => [
				'fieldName' => 'ConPssId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssPassword' => [
				'fieldName' => 'ConPssPassword', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssStatusProcess' => [
				'fieldName' => 'ConPssStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ConPssUser' => [
				'fieldName' => 'ConPssUser', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'controlpasswords', 
				'secondaryTable' => 'users', 
				'secKeyField' => 'UseId', 
				'secValueField' => 'UseSurname',  
				'secDeleteField' => 'UseStatusProcess'
		],
		'CouId' => [
				'fieldName' => 'CouId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'countries', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'CouName' => [
				'fieldName' => 'CouName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'countries', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'CouStatusProcess' => [
				'fieldName' => 'CouStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'countries', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicAlign' => [
				'fieldName' => 'DicAlign', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => 'align', 
				'secKeyField' => 'AliId', 
				'secValueField' => 'AliDescription',  
				'secDeleteField' => 'AliStatusProcess'
		],
		'DicDependentList' => [
				'fieldName' => 'DicDependentList', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicDisabled' => [
				'fieldName' => 'DicDisabled', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicFieldName' => [
				'fieldName' => 'DicFieldName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicFieldType' => [
				'fieldName' => 'DicFieldType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => 'fieldtype', 
				'secKeyField' => 'FieTypId', 
				'secValueField' => 'FieTypDescription',  
				'secDeleteField' => 'FieTypStatusProcess'
		],
		'DicFormat' => [
				'fieldName' => 'DicFormat', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicIcon' => [
				'fieldName' => 'DicIcon', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => 'icons', 
				'secKeyField' => 'IcoName', 
				'secValueField' => 'IcoFontAwesome',  
				'secDeleteField' => 'IcoStatusProcess'
		],
		'DicId' => [
				'fieldName' => 'DicId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicInputType' => [
				'fieldName' => 'DicInputType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicInputTypeForm' => [
				'fieldName' => 'DicInputTypeForm', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => 'inputtypeform', 
				'secKeyField' => 'InpTypFrmId', 
				'secValueField' => 'InpTypFrmDescription',  
				'secDeleteField' => 'InpTypFrmStatusProcess'
		],
		'DicLength' => [
				'fieldName' => 'DicLength', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnblur' => [
				'fieldName' => 'DicOnblur', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnchange' => [
				'fieldName' => 'DicOnchange', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnclick' => [
				'fieldName' => 'DicOnclick', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOndblclick' => [
				'fieldName' => 'DicOndblclick', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnfocus' => [
				'fieldName' => 'DicOnfocus', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnkeydown' => [
				'fieldName' => 'DicOnkeydown', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnkeypress' => [
				'fieldName' => 'DicOnkeypress', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicOnkeyup' => [
				'fieldName' => 'DicOnkeyup', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicPattern' => [
				'fieldName' => 'DicPattern', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicReadOnly' => [
				'fieldName' => 'DicReadOnly', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicRequired' => [
				'fieldName' => 'DicRequired', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicStatusProcess' => [
				'fieldName' => 'DicStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicTable' => [
				'fieldName' => 'DicTable', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicTextareaChars' => [
				'fieldName' => 'DicTextareaChars', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicTextareaRows' => [
				'fieldName' => 'DicTextareaRows', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicType' => [
				'fieldName' => 'DicType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => 'typetext', 
				'secKeyField' => 'TipTexId', 
				'secValueField' => 'TypTexDescription',  
				'secDeleteField' => 'TypTexStatusProcess'
		],
		'DicUnsigned' => [
				'fieldName' => 'DicUnsigned', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DicValidationForm' => [
				'fieldName' => 'DicValidationForm', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'dictionary', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirDateCreation' => [
				'fieldName' => 'DirDateCreation', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirDateModify' => [
				'fieldName' => 'DirDateModify', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirId' => [
				'fieldName' => 'DirId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirName' => [
				'fieldName' => 'DirName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirOwner' => [
				'fieldName' => 'DirOwner', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'DirParentDirectory' => [
				'fieldName' => 'DirParentDirectory', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => 'directories', 
				'secKeyField' => 'DirId', 
				'secValueField' => 'DirName',  
				'secDeleteField' => 'DirStatusProcess'
		],
		'DirStatusProcess' => [
				'fieldName' => 'DirStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'directories', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FieTypDescription' => [
				'fieldName' => 'FieTypDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'fieldtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FieTypId' => [
				'fieldName' => 'FieTypId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'fieldtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FieTypStatusProcess' => [
				'fieldName' => 'FieTypStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'fieldtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilDateUpload' => [
				'fieldName' => 'FilDateUpload', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilDirectory' => [
				'fieldName' => 'FilDirectory', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => 'directories', 
				'secKeyField' => 'DirId', 
				'secValueField' => 'DirName',  
				'secDeleteField' => 'DirStatusProcess'
		],
		'FilFileName' => [
				'fieldName' => 'FilFileName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilFileNameServer' => [
				'fieldName' => 'FilFileNameServer', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilId' => [
				'fieldName' => 'FilId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilOwner' => [
				'fieldName' => 'FilOwner', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilSize' => [
				'fieldName' => 'FilSize', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilStatusProcess' => [
				'fieldName' => 'FilStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilSubdirectory' => [
				'fieldName' => 'FilSubdirectory', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilType' => [
				'fieldName' => 'FilType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => 'mime', 
				'secKeyField' => 'MimId', 
				'secValueField' => 'MimDocumentType',  
				'secDeleteField' => 'MimStatusProcess'
		],
		'FilUnit' => [
				'fieldName' => 'FilUnit', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'FilVersion' => [
				'fieldName' => 'FilVersion', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'files', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoFontAwesome' => [
				'fieldName' => 'IcoFontAwesome', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'icons', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoGroDescription' => [
				'fieldName' => 'IcoGroDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'iconsgroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoGroId' => [
				'fieldName' => 'IcoGroId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'iconsgroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoGroStatusProcess' => [
				'fieldName' => 'IcoGroStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'iconsgroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoGroup' => [
				'fieldName' => 'IcoGroup', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'icons', 
				'secondaryTable' => 'iconsgroup', 
				'secKeyField' => 'IcoGroId', 
				'secValueField' => 'IcoGroDescription',  
				'secDeleteField' => 'IcoGroStatusProcess'
		],
		'IcoName' => [
				'fieldName' => 'IcoName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'icons', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IcoStatusProcess' => [
				'fieldName' => 'IcoStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'icons', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IdeTypDescription' => [
				'fieldName' => 'IdeTypDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'identificationtypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IdeTypId' => [
				'fieldName' => 'IdeTypId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'identificationtypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'IdeTypStatusProcess' => [
				'fieldName' => 'IdeTypStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'identificationtypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypDescription' => [
				'fieldName' => 'InpTypDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'inputtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypFrmDescription' => [
				'fieldName' => 'InpTypFrmDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'inputtypeform', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypFrmId' => [
				'fieldName' => 'InpTypFrmId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'inputtypeform', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypFrmStatusProcess' => [
				'fieldName' => 'InpTypFrmStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'inputtypeform', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypId' => [
				'fieldName' => 'InpTypId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'inputtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'InpTypStatusProcess' => [
				'fieldName' => 'InpTypStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'inputtype', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanId' => [
				'fieldName' => 'LanId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'lang', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanLanguage' => [
				'fieldName' => 'LanLanguage', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'lang', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'LanStatusProcess' => [
				'fieldName' => 'LanStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'lang', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenGroIcon' => [
				'fieldName' => 'MenGroIcon', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => 'icons', 
				'secKeyField' => 'IcoName', 
				'secValueField' => 'IcoFontAwesome',  
				'secDeleteField' => 'IcoStatusProcess'
		],
		'MenGroId' => [
				'fieldName' => 'MenGroId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenGroName' => [
				'fieldName' => 'MenGroName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenGroOrder' => [
				'fieldName' => 'MenGroOrder', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenGroState' => [
				'fieldName' => 'MenGroState', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenGroStatusProcess' => [
				'fieldName' => 'MenGroStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menugroup', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenIcon' => [
				'fieldName' => 'MenIcon', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => 'icons', 
				'secKeyField' => 'IcoName', 
				'secValueField' => 'IcoFontAwesome',  
				'secDeleteField' => 'IcoStatusProcess'
		],
		'MenId' => [
				'fieldName' => 'MenId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenName' => [
				'fieldName' => 'MenName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenOrder' => [
				'fieldName' => 'MenOrder', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenParams' => [
				'fieldName' => 'MenParams', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenParentMenu' => [
				'fieldName' => 'MenParentMenu', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => 'menugroup', 
				'secKeyField' => 'MenGroId', 
				'secValueField' => 'MenGroName',  
				'secDeleteField' => 'MenGroStatusProcess'
		],
		'MenSQLTable' => [
				'fieldName' => 'MenSQLTable', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenState' => [
				'fieldName' => 'MenState', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenStatusProcess' => [
				'fieldName' => 'MenStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MenUrl' => [
				'fieldName' => 'MenUrl', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'menu', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimColor' => [
				'fieldName' => 'MimColor', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimDocumentType' => [
				'fieldName' => 'MimDocumentType', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimExtension' => [
				'fieldName' => 'MimExtension', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimIcon' => [
				'fieldName' => 'MimIcon', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => 'icons', 
				'secKeyField' => 'IcoName', 
				'secValueField' => 'IcoFontAwesome',  
				'secDeleteField' => 'IcoStatusProcess'
		],
		'MimId' => [
				'fieldName' => 'MimId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimStatusProcess' => [
				'fieldName' => 'MimStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'MimTypeMime' => [
				'fieldName' => 'MimTypeMime', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'mime', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnDirDirectory' => [
				'fieldName' => 'OwnDirDirectory', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersdir', 
				'secondaryTable' => 'directories', 
				'secKeyField' => 'DirId', 
				'secValueField' => 'DirName',  
				'secDeleteField' => 'DirStatusProcess'
		],
		'OwnDirId' => [
				'fieldName' => 'OwnDirId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'ownersdir', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnDirOwner' => [
				'fieldName' => 'OwnDirOwner', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersdir', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnDirStatusProcess' => [
				'fieldName' => 'OwnDirStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersdir', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnDirTypeOwner' => [
				'fieldName' => 'OwnDirTypeOwner', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersdir', 
				'secondaryTable' => 'typeowner', 
				'secKeyField' => 'TypOwnId', 
				'secValueField' => 'TypOwnDescription',  
				'secDeleteField' => 'TypOwnStatusProcess'
		],
		'OwnFilFile' => [
				'fieldName' => 'OwnFilFile', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersfil', 
				'secondaryTable' => 'files', 
				'secKeyField' => 'FilId', 
				'secValueField' => 'FilFileName',  
				'secDeleteField' => 'FilStatusProcess'
		],
		'OwnFilId' => [
				'fieldName' => 'OwnFilId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'ownersfil', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnFilOwner' => [
				'fieldName' => 'OwnFilOwner', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersfil', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnFilStatusProcess' => [
				'fieldName' => 'OwnFilStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersfil', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'OwnFilTypeOwner' => [
				'fieldName' => 'OwnFilTypeOwner', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'ownersfil', 
				'secondaryTable' => 'typeowner', 
				'secKeyField' => 'TypOwnId', 
				'secValueField' => 'TypOwnDescription',  
				'secDeleteField' => 'TypOwnStatusProcess'
		],
		'ProCreate' => [
				'fieldName' => 'ProCreate', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProDelete' => [
				'fieldName' => 'ProDelete', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProId' => [
				'fieldName' => 'ProId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProJoin' => [
				'fieldName' => 'ProJoin', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProMenu' => [
				'fieldName' => 'ProMenu', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => 'menu', 
				'secKeyField' => 'MenId', 
				'secValueField' => 'MenName',  
				'secDeleteField' => 'MenStatusProcess'
		],
		'ProRead' => [
				'fieldName' => 'ProRead', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProReports' => [
				'fieldName' => 'ProReports', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProStatusProcess' => [
				'fieldName' => 'ProStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProUpdate' => [
				'fieldName' => 'ProUpdate', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProUserType' => [
				'fieldName' => 'ProUserType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => 'usertypes', 
				'secKeyField' => 'UseTypId', 
				'secValueField' => 'UseTypDescription',  
				'secDeleteField' => 'UseTypStatusProcess'
		],
		'ProVisibleMenu' => [
				'fieldName' => 'ProVisibleMenu', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'ProWhere' => [
				'fieldName' => 'ProWhere', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'profiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SecQueDescription' => [
				'fieldName' => 'SecQueDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'securityquestions', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SecQueId' => [
				'fieldName' => 'SecQueId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'securityquestions', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SecQueStatusProcess' => [
				'fieldName' => 'SecQueStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'securityquestions', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SetDescription' => [
				'fieldName' => 'SetDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'settings', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SetId' => [
				'fieldName' => 'SetId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'settings', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SetStatusProcess' => [
				'fieldName' => 'SetStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'settings', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'SetValue' => [
				'fieldName' => 'SetValue', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'settings', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'StaCountry' => [
				'fieldName' => 'StaCountry', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'states', 
				'secondaryTable' => 'countries', 
				'secKeyField' => 'CouId', 
				'secValueField' => 'CouName',  
				'secDeleteField' => 'CouStatusProcess'
		],
		'StaId' => [
				'fieldName' => 'StaId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'states', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'StaName' => [
				'fieldName' => 'StaName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'states', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'StaStatusProcess' => [
				'fieldName' => 'StaStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'states', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TipTexId' => [
				'fieldName' => 'TipTexId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'typetext', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TypOwnDescription' => [
				'fieldName' => 'TypOwnDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'typeowner', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TypOwnId' => [
				'fieldName' => 'TypOwnId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'typeowner', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TypOwnStatusProcess' => [
				'fieldName' => 'TypOwnStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'typeowner', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TypTexDescription' => [
				'fieldName' => 'TypTexDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'typetext', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'TypTexStatusProcess' => [
				'fieldName' => 'TypTexStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'typetext', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseAppStyle' => [
				'fieldName' => 'UseAppStyle', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => 'appstyle', 
				'secKeyField' => 'AppStyId', 
				'secValueField' => 'AppStyDescription',  
				'secDeleteField' => 'AppStyStatusProcess'
		],
		'UseChangePassReq' => [
				'fieldName' => 'UseChangePassReq', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatAddress' => [
				'fieldName' => 'UseDatAddress', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatBirthdate' => [
				'fieldName' => 'UseDatBirthdate', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatCellphone' => [
				'fieldName' => 'UseDatCellphone', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatCitie' => [
				'fieldName' => 'UseDatCitie', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => 'cities', 
				'secKeyField' => 'CitId', 
				'secValueField' => 'CitName',  
				'secDeleteField' => 'CitStatusProcess'
		],
		'UseDatCountry' => [
				'fieldName' => 'UseDatCountry', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => 'countries', 
				'secKeyField' => 'CouId', 
				'secValueField' => 'CouName',  
				'secDeleteField' => 'CouStatusProcess'
		],
		'UseDateCreation' => [
				'fieldName' => 'UseDateCreation', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatId' => [
				'fieldName' => 'UseDatId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatIdeType' => [
				'fieldName' => 'UseDatIdeType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => 'identificationtypes', 
				'secKeyField' => 'IdeTypId', 
				'secValueField' => 'IdeTypDescription',  
				'secDeleteField' => 'IdeTypStatusProcess'
		],
		'UseDatIdNumber' => [
				'fieldName' => 'UseDatIdNumber', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatState' => [
				'fieldName' => 'UseDatState', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => 'states', 
				'secKeyField' => 'StaId', 
				'secValueField' => 'StaName',  
				'secDeleteField' => 'StaStatusProcess'
		],
		'UseDatStatusProcess' => [
				'fieldName' => 'UseDatStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseDatUser' => [
				'fieldName' => 'UseDatUser', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userdata', 
				'secondaryTable' => 'users', 
				'secKeyField' => 'UseId', 
				'secValueField' => 'UseSurname',  
				'secDeleteField' => 'UseStatusProcess'
		],
		'UseEmail' => [
				'fieldName' => 'UseEmail', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseEncryptedId' => [
				'fieldName' => 'UseEncryptedId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseFailedAttempts' => [
				'fieldName' => 'UseFailedAttempts', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseFirtsName' => [
				'fieldName' => 'UseFirtsName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseGroDescription' => [
				'fieldName' => 'UseGroDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'usergroups', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseGroId' => [
				'fieldName' => 'UseGroId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'usergroups', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseGroStatusProcess' => [
				'fieldName' => 'UseGroStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'usergroups', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseId' => [
				'fieldName' => 'UseId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseLang' => [
				'fieldName' => 'UseLang', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => 'lang', 
				'secKeyField' => 'LanId', 
				'secValueField' => 'LanLanguage',  
				'secDeleteField' => 'LanStatusProcess'
		],
		'UseLastAccess' => [
				'fieldName' => 'UseLastAccess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseLastIp' => [
				'fieldName' => 'UseLastIp', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UsePassword' => [
				'fieldName' => 'UsePassword', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UsePhoto' => [
				'fieldName' => 'UsePhoto', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseSecondName' => [
				'fieldName' => 'UseSecondName', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseSecondSurname' => [
				'fieldName' => 'UseSecondSurname', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseSecurityQuestion' => [
				'fieldName' => 'UseSecurityQuestion', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => 'securityquestions', 
				'secKeyField' => 'SecQueId', 
				'secValueField' => 'SecQueDescription',  
				'secDeleteField' => 'SecQueStatusProcess'
		],
		'UseSecurityResponse' => [
				'fieldName' => 'UseSecurityResponse', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseStaDescription' => [
				'fieldName' => 'UseStaDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userstatus', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseStaId' => [
				'fieldName' => 'UseStaId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'userstatus', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseStaStatusProcess' => [
				'fieldName' => 'UseStaStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'userstatus', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseStatusProcess' => [
				'fieldName' => 'UseStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseSurname' => [
				'fieldName' => 'UseSurname', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseTokenId' => [
				'fieldName' => 'UseTokenId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseTypDescription' => [
				'fieldName' => 'UseTypDescription', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'usertypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseTypId' => [
				'fieldName' => 'UseTypId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'usertypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseTypStatusProcess' => [
				'fieldName' => 'UseTypStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'usertypes', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'UseTypUserGroup' => [
				'fieldName' => 'UseTypUserGroup', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'usertypes', 
				'secondaryTable' => 'usergroups', 
				'secKeyField' => 'UseGroId', 
				'secValueField' => 'UseGroDescription',  
				'secDeleteField' => 'UseGroStatusProcess'
		],
		'UseUserStatus' => [
				'fieldName' => 'UseUserStatus', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => 'userstatus', 
				'secKeyField' => 'UseStaId', 
				'secValueField' => 'UseStaDescription',  
				'secDeleteField' => 'UseStaStatusProcess'
		],
		'UseUserType' => [
				'fieldName' => 'UseUserType', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'users', 
				'secondaryTable' => 'usertypes', 
				'secKeyField' => 'UseTypId', 
				'secValueField' => 'UseTypDescription',  
				'secDeleteField' => 'UseTypStatusProcess'
		],
		'VerFilFile' => [
				'fieldName' => 'VerFilFile', 
				'isForeignKey' => 1, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'versionfiles', 
				'secondaryTable' => 'files', 
				'secKeyField' => 'FilId', 
				'secValueField' => 'FilFileName',  
				'secDeleteField' => 'FilStatusProcess'
		],
		'VerFilId' => [
				'fieldName' => 'VerFilId', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 1, 
				'primaryTable' => 'versionfiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'VerFilNumVersion' => [
				'fieldName' => 'VerFilNumVersion', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'versionfiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		],
		'VerFilStatusProcess' => [
				'fieldName' => 'VerFilStatusProcess', 
				'isForeignKey' => 0, 
				'isPrimaryKey' => 0, 
				'primaryTable' => 'versionfiles', 
				'secondaryTable' => '', 
				'secKeyField' => '', 
				'secValueField' => '',  
				'secDeleteField' => ''
		]
];

