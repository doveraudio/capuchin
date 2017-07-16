<?php

/*
 * Copyright Jeremy Leach
 * Pegas Corp and Associates
 * 
 */
namespace Capuchin\Test\Core;
require_once getcwd()."/Src/"."/Core/Client.php";
/**
 * Description of TestClient
 *
 * @author Jeremy Leach AKA Lt. Barclay
 */
class TestClient {
    public function __construct(){
        
    }
    
    private $client;
    private $log;
    public function assert(){
        try{
        $this->client = new \Capuchin\Core\Client();
        $this->client->bootstrap();
        $this->client->initialize();
        //echo json_encode($this->client->getDictionary());
       // $this->client->setCommand("say");
        $ccm = new \Capuchin\Core\CommandFactory();
        $class = "\Capuchin\Command\EchoInput";
        $instance = new $class("Hello World");
        //$instance->setParameters("Hello World");
        $instance->invoke();
        //$class->invoke();
        //echo json_encode($this->client->getCommandInstance());
        return true;
        
        }
        catch(Exception $ex){
            $this->log = json_encode($ex);
        return false;
    }
    
        }
        
        
    
    
}
