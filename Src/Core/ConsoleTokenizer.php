<?php

namespace Capuchin\Core;

class ConsoleTokenizer extends Tokenizer
{
    public function __construct(){
        $this->tokenStream = array();
    }

    private $input;
    private $tokenstream;
    private $log;
    public function setInputStream($stream){
        $this->input = $stream;
    }
    public function process(){
        $stream = $this->input;
         $rawinput = $stream;
         array_shift($rawinput);
         $parameters = [];
         if(count($stream)>1){
         $parameters = $this->TokenizeParameterStream();
            //echo json_encode($parameters);
         }else{
             $parameters = [];
         }
         $this->tokenstream = [
            "command"     => $stream[0],
            "parameters" => $parameters,
            "rawInput"   => $rawinput
                ]
                ;
    }
    public function getTokenStream(){
        return $this->tokenstream;
    }
    
    public function TokenizeParameterStream(){
        $stream = $this->input;
        $output=[];
        $values = array_filter($stream, 
                function($key){
                                return strpos($key, '--') === 0;
                              });
      
        foreach($values as $parameter){
            $text = ltrim($parameter, "--");
            $tuple = explode("=", $text);
            $output[$tuple[0]] = $tuple[1];
    }
    //$output["dummy"] = "fake";
    if(count($output)==0){
        if(count($stream)>1){
        $output = ["input"=>$stream[1]];
        }else{
            $output = ["input"=>""];
        }
        
        
    }
    return $output;
    }


}