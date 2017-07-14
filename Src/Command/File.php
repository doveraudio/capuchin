<?php
namespace Capuchin\Command;

class File extends Command
{
private $parameters;
public function invoke(){}
public function getParameters($values){
    $this->parameters = $values;
}
public function setParameters(){
    return $this->parameters;
}   
}