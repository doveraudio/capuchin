<?php

namespace Capuchin\Core;

class ConsoleTokenizer extends Tokenizer
{
    public function Tokenizer(){

    }

    private $input;

    public function setInputStream(){
    }

    private function TokenizeParameterStream(){

        $input = array_filter($args, function($key){
return strpos($key, '--') === 0;
});
$output = [];
foreach($input as $command){
    $tuple = ltrim($command, "--");
    $output[]= explode("=", $tuple);

}
return $output;


    }


}