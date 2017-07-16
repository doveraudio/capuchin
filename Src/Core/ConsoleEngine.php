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
    
    public function Engage(){
        $args = $this->getConsoleData();
        $this->tokenizer->setTokenStream($args);
        $this->tokenizer->process();
        $this->tokenStream = $this->tokenizer->getTokenStream();
        $this->parser->setCommand($tokenStream['command']);
        $class = $this->parser->getCommand();
        $command = null;
        if($class!=='error'){
           $command = \Capuchin\Core\CommandFactory::getInstance($class);
        }
        return $args;
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
    public function getDictionary(){
        return $this->parser->getDictionary();
    }
    
    public function setCommand($value){
    
        $this->parser->setCommand($value);
        
    }
    
    public function getCommandInstance(){
        if($this->parser->getCommand()!== 'error'){
        return $this->commandFactory->getInstance('\\Capuchin\\Command\\EchoInput',  ["Hello World"]);
        }
    
    }
    public function configure($config){
        $dictionary = array();
        // set the dictionary to all command names, and alieases, providing each key command with a value for the proper command,
        //  whether alias or precise command.
        
        foreach($config->Capuchin->Commands as $command){
            $dictionary[$command->name] = $command->name;
            foreach($command->aliases as $alias)
            {
                $dictionary[$alias] = $command->name;
            }
        }
        
        $this->parser->setDictionary($dictionary);
    }
    

}
