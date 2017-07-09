<?php

namespace \Capuchin\Core;

class Parser
{
    public function Parser(){



    }


    private $command;

    private $parameters;

    private $values;

    public function setCommand(string $command){
        $this->command = $command;
    }
    function setParameters(Array $args){
        $this->parameters = $args;
    }

    


}
