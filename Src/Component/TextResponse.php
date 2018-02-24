<?php

namespace Capuchin\Component;

class TextResponse extends Component
{
    private $textvalue;
    
    public function setTextValue($value){
        //echo PHP_EOL.json_encode($value).PHP_EOL;
        $this->textvalue = $value;
    }

    public function getTextValue(){
        return $this->textvalue;
    }

    public function echoTextValue(){
        //echo json_encode($this->textvalue['input']).PHP_EOL;
        echo $this->textvalue['input'].PHP_EOL;
    }
}