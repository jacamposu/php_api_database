<?php

global $relationsDeletedb1; $relationsDeletedb1 = [
	"5344" => [
		"primaryTable" => "Align", 
		"foreignTable" => "Dictionary", 
		"relationship" => "AliId_DicAlign", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5224" => [
		"primaryTable" => "AppStyle", 
		"foreignTable" => "Users", 
		"relationship" => "AppStyId_UseAppStyle", 
		"deleteFieldFT" => "UseStatusProcess"
	],
	"4987" => [
		"primaryTable" => "Cities", 
		"foreignTable" => "UserData", 
		"relationship" => "CitId_UseDatCitie", 
		"deleteFieldFT" => "UseDatStatusProcess"
	],
	"4686" => [
		"primaryTable" => "Countries", 
		"foreignTable" => "States", 
		"relationship" => "CouId_StaCountry", 
		"deleteFieldFT" => "StaStatusProcess"
	],
	"4983" => [
		"primaryTable" => "Countries", 
		"foreignTable" => "UserData", 
		"relationship" => "CouId_UseDatCountry", 
		"deleteFieldFT" => "UseDatStatusProcess"
	],
	"5096" => [
		"primaryTable" => "Directories", 
		"foreignTable" => "Directories", 
		"relationship" => "DirId_DirParentDirectory", 
		"deleteFieldFT" => "DirStatusProcess"
	],
	"5104" => [
		"primaryTable" => "Directories", 
		"foreignTable" => "Files", 
		"relationship" => "DirId_FilDirectory", 
		"deleteFieldFT" => "FilStatusProcess"
	],
	"5458" => [
		"primaryTable" => "Directories", 
		"foreignTable" => "OwnersDir", 
		"relationship" => "DirId_OwnDirDirectory", 
		"deleteFieldFT" => "OwnDirStatusProcess"
	],
	"5343" => [
		"primaryTable" => "FieldType", 
		"foreignTable" => "Dictionary", 
		"relationship" => "FieTypId_DicFieldType", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5461" => [
		"primaryTable" => "Files", 
		"foreignTable" => "OwnersFil", 
		"relationship" => "FilId_OwnFilFile", 
		"deleteFieldFT" => "OwnFilStatusProcess"
	],
	"5451" => [
		"primaryTable" => "Files", 
		"foreignTable" => "VersionFiles", 
		"relationship" => "FilId_VerFilFile", 
		"deleteFieldFT" => "VerFilStatusProcess"
	],
	"5303" => [
		"primaryTable" => "IconsGroup", 
		"foreignTable" => "Icons", 
		"relationship" => "IcoGroId_IcoGroup", 
		"deleteFieldFT" => "IcoStatusProcess"
	],
	"5301" => [
		"primaryTable" => "Icons", 
		"foreignTable" => "Dictionary", 
		"relationship" => "IcoName_DicIcon", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5434" => [
		"primaryTable" => "Icons", 
		"foreignTable" => "MenuGroup", 
		"relationship" => "IcoName_MenGroIcon", 
		"deleteFieldFT" => "MenGroStatusProcess"
	],
	"5413" => [
		"primaryTable" => "Icons", 
		"foreignTable" => "Menu", 
		"relationship" => "IcoName_MenIcon", 
		"deleteFieldFT" => "MenStatusProcess"
	],
	"5302" => [
		"primaryTable" => "Icons", 
		"foreignTable" => "Mime", 
		"relationship" => "IcoName_MimIcon", 
		"deleteFieldFT" => "MimStatusProcess"
	],
	"4989" => [
		"primaryTable" => "IdentificationTypes", 
		"foreignTable" => "UserData", 
		"relationship" => "IdeTypId_UseDatIdeType", 
		"deleteFieldFT" => "UseDatStatusProcess"
	],
	"5347" => [
		"primaryTable" => "InputTypeForm", 
		"foreignTable" => "Dictionary", 
		"relationship" => "InpTypFrm_DicInputTypeForm", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5345" => [
		"primaryTable" => "InputType", 
		"foreignTable" => "Dictionary", 
		"relationship" => "InpTypId_DicInputType", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5285" => [
		"primaryTable" => "Lang", 
		"foreignTable" => "Users", 
		"relationship" => "LanId_UseLang", 
		"deleteFieldFT" => "UseStatusProcess"
	],
	"5421" => [
		"primaryTable" => "MenuGroup", 
		"foreignTable" => "Menu", 
		"relationship" => "MenGroId_MenParentMenu", 
		"deleteFieldFT" => "MenStatusProcess"
	],
	"5260" => [
		"primaryTable" => "Menu", 
		"foreignTable" => "Profiles", 
		"relationship" => "MenId_ProMenu", 
		"deleteFieldFT" => "ProStatusProcess"
	],
	"5415" => [
		"primaryTable" => "Mime", 
		"foreignTable" => "Files", 
		"relationship" => "MimId_FilType", 
		"deleteFieldFT" => "FilStatusProcess"
	],
	"5013" => [
		"primaryTable" => "SecurityQuestions", 
		"foreignTable" => "Users", 
		"relationship" => "SecQueId_UseSecurityQuestion", 
		"deleteFieldFT" => "UseStatusProcess"
	],
	"4619" => [
		"primaryTable" => "States", 
		"foreignTable" => "Cities", 
		"relationship" => "StaId_CitState", 
		"deleteFieldFT" => "CitStatusProcess"
	],
	"4985" => [
		"primaryTable" => "States", 
		"foreignTable" => "UserData", 
		"relationship" => "StaId_UseDatState", 
		"deleteFieldFT" => "UseDatStatusProcess"
	],
	"5346" => [
		"primaryTable" => "TypeText", 
		"foreignTable" => "Dictionary", 
		"relationship" => "TipTexId_DicType", 
		"deleteFieldFT" => "DicStatusProcess"
	],
	"5508" => [
		"primaryTable" => "TypeOwner", 
		"foreignTable" => "OwnersDir", 
		"relationship" => "TypOwnId_OwnDirTypeOwner", 
		"deleteFieldFT" => "OwnDirStatusProcess"
	],
	"5510" => [
		"primaryTable" => "TypeOwner", 
		"foreignTable" => "OwnersFil", 
		"relationship" => "TypOwnId_OwnFilTypeOwner", 
		"deleteFieldFT" => "OwnFilStatusProcess"
	],
	"4974" => [
		"primaryTable" => "UserGroups", 
		"foreignTable" => "UserTypes", 
		"relationship" => "UseGroId_UseTypUserGroup", 
		"deleteFieldFT" => "UseTypStatusProcess"
	],
	"4895" => [
		"primaryTable" => "Users", 
		"foreignTable" => "ControlPasswords", 
		"relationship" => "UseId_ConPssUser", 
		"deleteFieldFT" => "ConPssStatusProcess"
	],
	"4997" => [
		"primaryTable" => "Users", 
		"foreignTable" => "UserData", 
		"relationship" => "UseId_UseDatUser", 
		"deleteFieldFT" => "UseDatStatusProcess"
	],
	"4993" => [
		"primaryTable" => "UserStatus", 
		"foreignTable" => "Users", 
		"relationship" => "UseStaId_UseUserStatus", 
		"deleteFieldFT" => "UseStatusProcess"
	],
	"5243" => [
		"primaryTable" => "UserTypes", 
		"foreignTable" => "Profiles", 
		"relationship" => "UseTypId_ProUserType", 
		"deleteFieldFT" => "ProStatusProcess"
	],
	"4495" => [
		"primaryTable" => "UserTypes", 
		"foreignTable" => "Users", 
		"relationship" => "UseTypId_UseUserType", 
		"deleteFieldFT" => "UseStatusProcess"
	],

];
