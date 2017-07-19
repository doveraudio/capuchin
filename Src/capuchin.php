<?php
namespace Capuchin;
$app_root = getcwd();
$class_root = "\\Src";
require_once getcwd()."/Src/"."/Core/Client.php";
class Capuchin
{
    public function __construct(){
        //Create a new instance of the Client.
        //Client creates insttance Bootstrapper,
        // Initializes and calls Bootstrapper
        //Which:
        // Loads config files
        // Creates instance of Autoloader
        // Autoloader loads the existing classes 
        $this->client = new \Capuchin\Core\Client();    
    }
    private $client;
    private $log;
    public function run(){
        $this->client->bootstrap();
        $this->client->initialize();
        $result = $this->client->run();
    }
    
    public function appendLog($value){
        $this->log .= $value;
    }
}


$capuchin = new Capuchin();

try{
       
        $result = $capuchin->run();
        }
        catch(Exception $ex){
            $capuchin->appendLog(json_encode($ex));
        return false;
    }
    