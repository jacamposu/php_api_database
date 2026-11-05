<?php

class Index
{
    private $_controller;
    private $_method;
    private $_params;
    private $_config;

    public function __construct()
    {

    }

    public function Main()
    {
        $this->Autoload();
        $response = new HttpResponseClient();
        try {
            $this->loadConfig();
            $this->Init();
            $this->paramsURL();
            $response->Response(200, $this->LoadController());
        } catch(ConfigException $ex) {
            $response->Response(500, ['error' => $ex->getMessage()]);
        } catch(Exception $ex) {
            $response->Response($ex->getCode(), ['error' => $ex->getMessage()]);
        }
    }

    public function loadConfig(){
        $this->_config = json_decode(file_get_contents('Config/Config.json'));
        if (json_last_error() !== JSON_ERROR_NONE) 
            throw new Exception('INVALID CONFIG FILE', 500);
    }


    public function Init()
    {
        //error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
		//ini_set('ignore_repeated_errors', TRUE); // always use TRUE
		//ini_set('display_errors', TRUE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
		//ini_set('log_errors', TRUE); // Error/Exception file logging engine.
    }

    private function paramsURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $arrUrl = explode('/', $url);

        $this->_controller = $arrUrl[0];
        $this->_method = $arrUrl[0];
        $this->_params = '';

        // Se obienen los métodos
        if(!empty($arrUrl[1])){
            if($arrUrl[1] != ''){
                $this->_method = $arrUrl[1];
            }
        }

        // Se obtienen los parámetros
        if(!empty($arrUrl[2])){
            $arrGet = [];
            for($i=2; $i < count($arrUrl); $i++){
                $arrayUrl = explode('=', $arrUrl[$i]);
                if(isset($arrayUrl[0]) && isset($arrayUrl[1])){
                    $arrGet[$arrayUrl[0]] = $arrayUrl[1];
                }
            }
            $_GET = $arrGet;
        }
    }

    private function Autoload()
    {
        spl_autoload_register(function($class)
        {
            if(file_exists('Lib/'.$class.'.php')) require_once 'Lib/'.$class.'.php';

            if(file_exists('Lib/Shared/'.$class.'.php')) require_once 'Lib/Shared/'.$class.'.php';

            if(file_exists('Models/'.$class.'.php')) require_once 'Models/'.$class.'.php';
        });
    }

    private function LoadController()
    {
        if(!file_exists('Controller/'.$this->_controller.'Controller.php')) throw new Exception("CONTROLLER NOT FOUND", 500);
        
        require_once 'Controller/'.$this->_controller.'Controller.php';
        $controller = $this->_controller.'Controller';
        $objectController = new $controller($this->_config);

        if(!method_exists($objectController, $this->_method)) throw new Exception("METHOD NOT FOUND", 500);
        
        return $objectController->{$this->_method}();
    }
}

$index = new Index();
$index->Main();