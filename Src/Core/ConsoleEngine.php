<?php

namespace Capuchin\Core;

class ConsoleEngine
{
    public function __construct(){

        $this->tokenizer = new ConsoleTokenizer();
        $this->parser = new Parser();
        $this->invoker = new Invoker();
        $this->commandFactory = new CommandFactory();
        
    }
    
    private $tokenizer;
    private $parser;
    private $commandFactory;
    private $invoker;
    
    //define now, implement later;
    // need subversive logging engine.
    private $log;
    private $error_log; 
    
    public function Engage(){
        $args = $this->getConsoleData();
        $this->tokenizer->setTokenStream($args);
        $this->tokenizer->process();
        $tokenStream = $this->tokenizer->getTokenStream();
        $this->parser->setCommand($tokenStream['command']);
        $class = $this->parser->getCommand();
        $command = null;
        if($class!=='error'){
           $command = \Capuchin\Core\CommandFactory::getInstance($class);
        }
        
        
        
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
