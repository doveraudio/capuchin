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
        $result = $this->client->run();
        if($result == "Hello World!"){
        return true;
        }
        else{
            return false;
        }
        
        }
        catch(Exception $ex){
            $this->log = json_encode($ex);
        return false;
    }
    
        }
        
        
    
    
}
