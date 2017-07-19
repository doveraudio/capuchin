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
    private $tokenStream;
    //define now, implement later;
    // need subversive logging engine.
    private $log;
    private $error_log; 
    
    public function engage(){
        $this->initialize();
        $this->parser->setCommand($this->tokenStream['command']);
        return $this->invoke();
       
    }

    private function processArgs(){
        $args = $this->getConsoleData();
        $this->tokenizer->setinputStream($args);
        $this->tokenizer->process();
        $this->tokenStream = $this->tokenizer->getTokenStream();
    }
    
    public function getTokenStream(){
       return $this->tokenStream;
        
    }
    
    public function getInputArgs(){
        return getConsoleData();
    }
    
    private function getConsoleData(){
        global $argc, $argv;
        $data = $argv;
        array_shift($data);
        $this->checkArgs($data);
        return $data;

   }
 
    private function checkArgs($args){
        if(count($args)>0){
        return true;
        }else{
            return false;
        }
    
    }
    public function getDictionary(){
        return $this->parser->getDictionary();
    }
    
    public function setCommand($value){
    
        $this->parser->setCommand($value);
        
    }
    
    public function getCommand(){
    
        return $this->parser->getCommand();
        
    }

    public function getCommandInstance(){
        $class = $this->parser->getClass();
        if($class!== 'error'){
        return $this->commandFactory->getInstance($class, $this->tokenStream['parameters']);
        }else{
            return 'error';
        }
    
    }
    
    public function initialize(){
        $this->processArgs();
    }
    
    public function invoke(){
        $command = $this->getCommandInstance();
        
        if($command!== 'error'){
        $this->invoker->prepare($command, $this->tokenStream['parameters']);
        return $this->invoker->invoke();
        
        }else{
            return 'error';
        }
    }
    
    
    
    public function configure($config){
        $dictionary = array();
        // set the dictionary to all command names, and alieases, providing each key command with a value for the proper command,
        //  whether alias or precise command.
        
        foreach($config->Capuchin->Commands as $command){
            $dictionary[$command->name]  = "\\Capuchin" . str_replace("/","\\",$command->class);
            foreach($command->aliases as $alias)
            {
                $dictionary[$alias] = "\\Capuchin" . str_replace("/","\\",$command->class);
            }
        }
        
        $this->parser->setDictionary($dictionary);
    }
    

}
