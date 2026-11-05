<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class LoaderResources
* @return functions for mysql engine DB
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class LoaderResources
{   
    public function __construct()
    {
    }

    public function GetConfig(bool $asArray=false)
    {
        if(file_exists("Config/Config.json"))
            return json_decode(file_get_contents("Config/Config.json"), $asArray);
        
        throw new Exception('CONFIG FILE NOT FOUND');
    }

    public function GetLang(string $userLang, bool $asArray=false)
    {
        if(is_null($userLang)) 
            throw new Exception('LANG USER UNDEFINED');

        if(file_exists("Config/Lang/{$userLang}/Lang.json"))       
            return json_decode(file_get_contents("Config/Lang/{$userLang}/Lang.json"), $asArray);

        throw new Exception("LANG FILE NOT FOUND");
    }

    public function GetProfile(string $userProfile, bool $asArray=false)
    {
        if(is_null($userProfile)) 
            throw new Exception('PROFILE USER UNDEFINED');

        if(file_exists("Config/Profiles/{$userProfile}.json")) 
            return json_decode(file_get_contents("Config/Profiles/{$userProfile}.json"), $asArray);
               
        throw new Exception('PROFILE FILE NOT FOUND');
    }

    public function GetConcatenate(bool $asArray=false)
    {
        if(file_exists("Config/DB/MainConcatenate.json"))
            return json_decode(file_get_contents("Config/DB/MainConcatenate.json"), $asArray);
        
        throw new Exception('CONCATENATE FILE NOT FOUND');
    }
}