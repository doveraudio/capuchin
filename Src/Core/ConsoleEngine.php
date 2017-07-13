<?php

namespace Capuchin\Core;

class ConsoleEngine
{
    public function __construct(){

        $this->tokenizer = new ConsoleTokenizer();
        $this->parser = new Parser();
        $this->invoker = new Invoker();
        
    }
    
    private $tokenizer;
    private $invoker;
    private $parser;
    //define now, implement later;
    // need subversive logging engine.
    private $log;
    private $error_log; 
    
    public function Engage(){
        $args = $this->getConsoleData();
        $this->tokenizer->setTokenStream($args);
        $this->tokenizer->process();
        $data = $this->tokenizer->getTokenStream();
        
        
        
        return $data;
    }


    private function getConsoleData(){
        $data = $argv;
        array_shift($data);
        checkArgs($data);
        return $data;

   }
 
    private function checkArgs($args){
        if(count($args)>0){
        return true;
        }else{
            return false;
        }
    
    }

    public function configure($config){
        $this->parser->setDictionary($config->Capuchin->Commands);
    }


}
