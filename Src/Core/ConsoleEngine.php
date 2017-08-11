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
    
    
    public function configure($config){
        $dictionary = array();
        // set the dictionary to all command names, and alieases, providing each key command with a value for the proper command,
        //  whether alias or precise command.
        
        foreach($config->Capuchin->Commands as $command){
            $dictionary["commands"][$command->name]  = "\\Capuchin" . str_replace("/","\\",$command->class);
            $dictionary["parameters"][$command->name] =  $command->parameters;
            foreach($command->aliases as $alias)
            {
                $dictionary["commands"][$alias] = "\\Capuchin" . str_replace("/","\\",$command->class);
                $dictionary["parameters"][$alias] =  $command->parameters;
            }
        }
        
        $this->parser->setDictionary($dictionary);
    }
    
     public function initialize(){
        $this->processArgs();
    }
    
    public function invoke(){
        $command = $this->getCommandInstance();
        
        if($command!== 'error'){
        $this->invoker->prepare($command, $this->parser->getParameters());

        return $this->invoker->invoke();
        
        }else{
            return 'error';
        }
    }
    
    
    public function engage(){
        $this->initialize();
        $this->parser->setCommand($this->tokenStream['command']);
        $this->parser->setRawInput($this->tokenStream['rawInput']);
        $this->parser->setParameters($this->tokenStream['parameters']);
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
        $this->parser->setRawInput($this->tokenStream['rawInput']);
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
        return $this->commandFactory->getInstance($class, $this->parser->getParameters());
        }else{
            return 'error';
        }
    
    }
    
   
    
    
    

}
