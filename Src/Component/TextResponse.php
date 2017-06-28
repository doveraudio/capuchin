<?php

namespace Capuchin\Component;

class TextResponse extends Component
{
    private $textvalue;
    
    public function setTextValue($value){

        $this->textvalue = $value;
    }

    public function getTextValue(){
        return $this->textvalue;
    }

    public function EchoTextValue(){
        echo $this->textvalue;
    }
}