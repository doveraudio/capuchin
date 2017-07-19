<?php
namespace Capuchin;
$app_root = getcwd();
$class_root = "\\Capuchin\\Src";
require_once getcwd()."/Src/"."/Core/Client.php";
class Capuchin
{
    public function __construct(){
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
    