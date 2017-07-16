<?php

namespace Capuchin\Command;

class EchoInput extends Command
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
        $this->component->setTextValue($this->parameters[0]);
        //echo $this->parameters[0];
        //return $this->component->echoTextValue();
       $this->component->echoTextValue();
       return $this->component->getTextValue();
    }

    



}