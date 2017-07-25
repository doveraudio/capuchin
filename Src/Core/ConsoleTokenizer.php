<?php

namespace Capuchin\Core;

class ConsoleTokenizer extends Tokenizer
{
    public function __construct(){
        $this->tokenStream = array();
    }

    private $input;
    private $tokenstream;

    public function setInputStream($stream){
        $this->input = $stream;
    }
    public function process(){
        //echo "THIS_PROCESS!!".PHP_EOL.PHP_EOL;
        //echo json_encode($this->input);
        $stream = $this->input;
         //array_shift($stream);
         $rawinput = $stream;
         array_shift($rawinput);
         //echo "ConsolTokenizer, process(), line 23".PHP_EOL.json_encode($rawinput).PHP_EOL;

        $this->tokenstream = [
            "command"     => $stream[0],
            "parameters" => $this->TokenizeParameterStream(),
            "rawInput"   => $rawinput
                ]
                ;
    }
    public function getTokenStream(){
        return $this->tokenstream;
    }
    
    public function TokenizeParameterStream(){
        $stream = $this->input;
        //array_shift($stream);
        //echo PHP_EOL."TokenizeParameterStream:".PHP_EOL.json_encode($this->input);
        $values = array_filter($stream, 
                function($key){
                                return strpos($key, '--') === 0;
                              });
        $output = [];
       // echo PHP_EOL."TokenizeParameterStream:".PHP_EOL.json_encode($stream);
        foreach($values as $parameter){
            $tuple = ltrim($parameter, "--");
            $output[]= explode("=", $tuple);
    }
    if(count($output)==0){
        $output = $stream[1];
    }
    return $output;
    }


}