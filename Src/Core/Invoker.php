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

    public function setCommand($value){
        $this->command = $value;
    }
    
    public function setParameters($values){
        $this->command->setParameters($values);
    }
    
    public function getParameters(){
        return $this->command->getParameters();
    }
    public function getCommand(){

        return $this->command;

    }


}