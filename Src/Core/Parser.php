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
    public function setCommand(string $command){
        $this->command = $command;
    }
    function setParameters(Array $args){
        $this->parameters = $args;
    }

    public function getCommandClass(){
        // this is where we literally just call out the class by name, via string, fully namespaced, 
        // and php, like wizard poweers, delivers it.
        if(array_search($this->command,$this->dictionary, false)!==false){
            
        }
    }


    


}
