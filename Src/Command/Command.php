<?php
namespace Capuchin\Command;

abstract class Command{
    
    abstract public function invoke();

    abstract public function getParameters();
    abstract public function setParameters($values);
    
    
}