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
        $this->dictionary = $commands;
    }
    public function setCommand(string $command){
        $this->command = $command;
    }
    function setParameters(Array $args){
        $this->parameters = $args;
    }

    public function getCommandClass(){
        
    }


    


}
