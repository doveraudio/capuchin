<?php
namespace Capuchin\Command;

class File extends Command
{
    public function __construct($values){
        $this->parameters = $values;
    }
private $parameters;
public function invoke(){}
public function setParameters($values){
    $this->parameters = $values;
}
public function getParameters(){
    return $this->parameters;
}   
}