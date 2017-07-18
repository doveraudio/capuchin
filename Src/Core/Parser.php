<?php

namespace Capuchin\Core;

class Parser
{
    public function __construct(){



    }

    private $dictionary;
    private $command;

    private $parameters;

    private $values;
    public function setDictionary($values){
        
        $this->dictionary = $values;
        
    }
    
    public function getDictionary(){
        
        return $this->dictionary;
        
    }

    public function setCommand(string $command){
        
        $this->command = $command;
        
    }
    function setParameters(Array $args){
        
        $this->parameters = $args;
        
    }

    public function getCommand(){
        //echo json_encode($this->dictionary);
        $namespace =  $this->dictionary[$this->command];
        return $namespace;
        // this is where we literally just call out the class by name, via string, fully namespaced, 
        // and php, like wizard poweers, delivers it.
        //$tuple = array_search($this->command,$this->dictionary, false);
       // return $this->dictionary[$this->command];
//$name = $this->dictionary[$this->command];
       
       if($namespace!==null && $namespace!==""){
            
            return $namespace;
        }else{
            echo ('Invalid Command: '.$this->command);
            return "error";
        }
    }
    
    public function getParameters(){
        return $this->parameters();
    }


    


}
