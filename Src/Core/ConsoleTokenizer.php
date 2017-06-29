<?php

namespace Capuchin\Core;

class ConsoleTokenizer extends Tokenizer
{
    public function Tokenizer(){
        $this->tokenStream = array();
    }

    private $input;
    private $tokenstream;
    public function setInputStream($value){
        $this->tokenstream[] = ["command" => $value[0]];
        array_shift($value);
        $this->tokenstream[] = ["parameters" => TokenizeParameterStream($value)];
    }
    public function getTokenStream(){

    }
    private function TokenizeParameterStream($values){

        $values = array_filter($args, function($key){
                                return strpos($key, '--') === 0;
                            });
        $output = [];
        foreach($values as $parameter){
            $tuple = ltrim($parameter, "--");
            $output[]= explode("=", $tuple);

        }
        return $output;
    }


}