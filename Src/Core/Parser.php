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
    private $rawInput;
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

    public function setCommand(string $value){
        //echo "Parser: setCommand:".PHP_EOL.$value.PHP_EOL;
        if(key_exists($value, $this->dictionary["commands"])){
        $this->command = $value;
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
                return  $this->dictionary["commands"][$this->command];
       
        
    }
    
    public function setRawInput($input){
        if(is_array($input)){
           $this->rawInput = implode("",$input); 
        } else {
        $this->rawInput = $input;
        }
    }
    
    public function getRawInput(){
        return $this->rawInput;
    }
    
    public function getParameters(){
        if($this->dictionary["parameters"][$this->command][0]=="{input}"){
            return $this->rawInput;
        }else{
            
        return $this->parameters;
        
        }
    }


    


}
