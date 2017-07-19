<?php

namespace Capuchin\Core;

class Parser
{
    public function __construct(){



    }
    private $log;
    private $dictionary;
    private $command;

    private $parameters;

    private $values;
    public function appendLog($value){
        $this->log .= $value;
    }
    public function getLog(){
        return $this->log;
    }
    public function setDictionary($values){
        
        $this->dictionary = $values;
        
    }
    
    public function getDictionary(){
        
        return $this->dictionary;
        
    }

    public function setCommand(string $command){
        if(key_exists($command, $this->dictionary)){
        $this->command = $command;
        return $this->command;
        
        }else{
            $this->command = 'error';
        }
      
    }
    function setParameters(Array $args){
        
        $this->parameters = $args;
        
    }
    
    public function getCommand(){
        return $this->command;
    }
    
    public function getClass(){
        //echo json_encode($this->dictionary);
            
        return  $this->dictionary[$this->command];
       
        
    }
    
    public function getParameters(){
        return $this->parameters();
    }


    


}
