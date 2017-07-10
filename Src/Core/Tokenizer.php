<?php

namespace Capuchin\Core;

abstract class Tokenizer
{
    public function __construct(){

    }

    private $input;

    abstract function setInputStream($value);

    abstract function TokenizeParameterStream();


}