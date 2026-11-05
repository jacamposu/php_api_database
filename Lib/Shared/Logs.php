<?php 


class Logs
{
    
    // Escribe el log de errores de la aplicación.
    public static function QueryError($config, $error)
    {
        $path = $config->Path->Storage.'/'.$config->Path->ErrorsDatabase.'/'.date($config->Logs->FormatDateFile);
        $file = $path.'/'.$error->hashError.'.'.$config->Logs->extensionFileLog;

        if(!file_exists($path))
        {
            mkdir($path, 0777, true);
        }
        
        $myFile = fopen($file, "a") or die("File inaccessible!");
        fwrite($myFile, json_encode($error));
        fclose($myFile);
    }
    

    // Escribe un log general
    public static function RegisterQuery($config, $fileName, $content)
    {
        $path = $config->Path->Storage.'/'.$config->Path->ControlSQL.'/'.date($config->Logs->FormatDateFile);
        $datetime = date($config->Logs->FormatDateFile);
        
        if( !file_exists($path) )
        {
            mkdir($path, 0777, true);
        }

        // Renombramiento del archivo
        $file = $path.'/'.$fileName."_".$datetime.'.'.$config->Logs->extensionFileLog;

        // Escritura en el archivo
        $myFile = fopen($file, "a") or die("Inaccessible file!");
        fwrite($myFile, $content."\r");
        fclose($myFile);
    }


    public static function LoginRegister($path, $filename, $content, $date, $extension)
    {
        global $config;

        $path = $path.'/'.date($date);
        $file = $path.'/'.$filename.'.'.$extension;

        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        
        $myFile = fopen($file, "a") or die("File inaccessible!");
        fwrite($myFile, json_encode($content));
        fclose($myFile);
    }

    public static function RegisterLogFile($config, $error)
    {
        $path = $config->Path->Storage.'/'.$config->Path->ErrorsDatabase.'/'.$error->folder;

        $file = $path.'/'.$error->hashError.'.'.$config->Logs->extensionFile;

        if(!file_exists($path))
        {
            mkdir($path, 0777, true);
        }
        
        $myFile = fopen($file, "a") or die("Inaccessible file!");
        fwrite($myFile, json_encode($error));
        fclose($myFile);
    }

    public static function RegisterLogEmail($file, $error)
    {
        $datetime = date('y-m-d h:i:s');
        $myFile = fopen($file, "a") or die("Inaccessible file!");
        $text = explode(".", basename($file))[1] == 'json' ? $error : "{$datetime}-Mail send: {$error}\r\n";
        fwrite($myFile, $text);
        fclose($myFile);
    }


    /*
        Error
        Info
        Process
        Success
    */
}