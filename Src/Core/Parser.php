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
    public function setDictionary($commands){
        $this->dictionary[] = $commands;
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
        // this is where we literally just call out the class by name, via string, fully namespaced, 
        // and php, like wizard poweers, delivers it.
        if(array_search($this->command,$this->dictionary, false)!==false){
            return $this->command;
        }else{
            $this->log('Invalid Command: '.$this->command);
            return "error";
        }
    }
    
    public function getParameters(){
        
    }


    


}
