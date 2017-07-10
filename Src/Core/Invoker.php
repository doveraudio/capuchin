<?php
namespace Capuchin\Core;

class Invoker
{

    
    public function __construct(){

    }

    private $command;
    
    public function invoke(){
        $this->command->invoke();
    }

    public function setCommand($command){
        $this->command = $command;
    }

    public function getCommand(){

        return $this->command;

    }


}