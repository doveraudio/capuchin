<?php

namespace Capuchin\Core;

class Parser
{
    public function __construct(){



    }
    private $log;
    private $dictionary;
    private $command;

    private $parameters;
    private $rawInput;
    public function appendLog($value){
        $this->log .= $value;
    }
    public function getLog(){
        return $this->log;
    }
    public function setDictionary($values){
        
        $this->dictionary = $values;
        
    }
    
    public function getDictionary(){
        
        return $this->dictionary;
        
    }

    public function setCommand(string $value){
        echo PHP_EOL."Parser->setCommand(): \$value :" . $value;
        if(key_exists($value, $this->dictionary["commands"])){
        $this->command = $value;
        return $this->command;
        
        }else{
            $this->command = 'error';
        }
      
    }
    function setParameters(Array $args){
        echo PHP_EOL.PHP_EOL."SET PARAMETERS , PArser.PHP:".PHP_EOL;
        echo json_encode($args);
        echo PHP_EOL;
        echo json_encode($this->dictionary).PHP_EOL;
        echo "****************";
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        foreach($args as $key => $value){
            echo "KEY:".$key."    Value: ".$value.PHP_EOL."WHERE'S MY DATA::".json_encode($this->dictionary["parameters"][$this->command]);
            $this->parameters[$this->dictionary["parameters"][$this->command][0]->name] = $value;

        }

       // $this->parameters = $args;
        
    }
    
    public function getCommand(){
        return $this->command;
    }
    
    public function getClass(){
        return  $this->dictionary["commands"][$this->command];
       
        
    }
    
    public function setRawInput($input){
        if(is_array($input)){
           $this->rawInput = implode(" ",$input); 
        } else {
        $this->rawInput = $input;
        }
    }
    
    public function getRawInput(){
        return $this->rawInput;
    }
    
    public function getParameters(){
        //echo "LINE 87:".PHP_EOL.json_encode($this->dictionary["parameters"][$this->command]);
        //if($this->dictionary["parameters"][$this->command]["input"] =="input"){
         //   return $this->rawInput;
       // }else{
            

        return $this->parameters;
        
        //}
    }


    


}
