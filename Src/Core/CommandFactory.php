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
    
    public function getInstance($classname){
        $class = $this->namepsace.$classname;
        if(class_exists($class)){
            
            return new $class;
        }
    }
    
}
