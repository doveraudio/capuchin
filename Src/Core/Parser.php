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
        echo PHP_EOL."Parser->setCommand(): \$value :" . $value.PHP_EOL;
        echo json_encode($this->dictionary["commands"]);
        if(key_exists($value, $this->dictionary["commands"])){
        $this->command = $value;
        return $this->command;
        
        }else{
            $this->command = 'error';
        }
      
    }
    function setParameters(Array $args){
       
        foreach($args as $key => $value){
            echo PHP_EOL."PARAMETERS.".$this->command.":".PHP_EOL;
            //echo json_encode($this->dictionary["parameters"][$this->command]);
            //echo "KEY:".$key."    Value: ".$value.PHP_EOL."WHERE'S MY DATA::".PHP_EOL;
            echo "Parser, line 55, setParameters:".PHP_EOL;
            echo json_encode($this->dictionary["parameters"][$this->command]).PHP_EOL;

            $this->parameters[$this->dictionary["parameters"][$this->command]->name] = $value;

        }
        echo json_encode($this->dictionary["parameters"]);
       // $this->parameters = $args;
        
    }
    
    public function getCommand(){
        return $this->command;
    }
    
    public function getClass(){
        return  $this->dictionary["commands"][$this->command];
       
        
    }
    
    public function addClass($command){

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
