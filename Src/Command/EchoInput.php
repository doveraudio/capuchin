<?php

namespace Capuchin\Command;

class EchoInput extends Command
{
    
    public function EchoInput($input){
        $this->parameters = array($input);
        $this->parameters[] = $input;

        $this->component = new \Capuchin\Component\TextResponse();
    }

    private $parameters;
    private $component;
    public function invoke()
    {

    }

    



}