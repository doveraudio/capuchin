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
        $stream = $this->input;
        $this->tokenstream = [
            "command"     => $stream[0],
            "parameters" => $this->TokenizeParameterStream()];
    }
    public function getTokenStream(){
        return $this->tokenstream;
    }
    
    public function TokenizeParameterStream(){
        $stream = $this->input;
        array_shift($stream);
        $values = array_filter($stream, 
                function($key){
                                return strpos($key, '--') === 0;
                              });
        $output = [];
        foreach($values as $parameter){
            $tuple = ltrim($parameter, "--");
            $output[]= explode("=", $tuple);
    }
    if(count($output)==0){
        $output = $stream[0];
    }
    return $output;
    }


}