<?php

namespace Capuchin\Core;

abstract class Tokenizer
{
    public function Tokenizer(){

    }

    private $input;

    public abstract function setInputStream($value);

    public abstract function TokenizeParameterStream();


}