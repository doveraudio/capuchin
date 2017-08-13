<?php

/*
 * Copyright Jeremy Leach
 * Pegas Corp and Associates
 * 
 */

namespace Capuchin\Core;

/**
 * Description of CommandFactory
 *
 * @author Jeremy Leach AKA Lt. Barclay
 */
class CommandFactory {
    
    public function __construct(){
    
        $this->namespace = "\\Capuchin\\Command\\";
        
        
    }
    
    private $namespace;
    
    public function getInstance($classname, $parameters){
        $class = $classname;
        if(class_exists($class)){
            echo PHP_EOL."Command Factory: getInstance() : ".$class.PHP_EOL;
            return new $class($parameters);
        }else{
            return new Capuchin\Command\Error();
        }
    }
    
}
