<?php

/*
 * Copyright Jeremy Leach
 * Pegas Corp and Associates
 * 
 */

namespace Capuchin\Command;

/**
 * Description of Error
 *
 * @author Dover
 */

class Error extends Command
{
    
    public function __construct($input){
        $this->parameters[] = $input;

        $this->component = new \Capuchin\Component\TextResponse();
    }

    private $parameters;
    private $component;
    public function getParameters(){
        return $this->parameters;
    }
    public function setParameters($values){
        $this->parameters = $values;
    }
    
    public function invoke()
    {
        $this->component->setTextValue("Error, Unable to comply. Please adjust your input parameters.");
        //echo $this->parameters[0];
        //return $this->component->echoTextValue();
       $this->component->echoTextValue();
       return $this->component->getTextValue();
    }

}