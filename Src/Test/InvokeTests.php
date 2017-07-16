<?php

/*
 * Copyright Jeremy Leach
 * Pegas Corp and Associates
 * 
 */

namespace Capuchin\Test;
require_once getcwd()."/Src/Test/Core/TestClient.php";
/**
 * Description of InvokeTests
 *
 * @author Jeremy Leach AKA Lt. Barclay
 */
class InvokeTests {
    public function __construct(){
        $this->log = "Initialized.".PHP_EOL;
        $this->log .= "Loading Test Classes".PHP_EOL;
        
        $this->tests[] = new \Capuchin\Test\Core\TestClient();
    }
    
    private $log;
    private $tests;
    
    public function assert(){
        
        foreach($this->tests as $test)
        {
            $this->log .= $test->assert();
        }
        
        
        
    }
    
    public function renderLogFile(){}
    
    public function renderLogStdOut(){
        echo $this->log;
    }
    
    
    
    
}
