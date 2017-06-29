<?php

namespace \Capuchin\Core;

class ConsoleEngine
{
    public function ConsoleEngine(){}
    //define now, implement later;
    // need subversive logging engine.
    private $log;
    private $error_log; 
    
    public function Engage(){
        $this->getConsoleData();


        return $data;
    }


    private function getConsoleData(){
        $data = $argv;
        array_shift($data);
        checkArgs($data);
        return $data;

   }
 
    private function checkArgs($args){
        if(count($args)>0){
        return true;
        }else{
            return false;
        }
        
    }

}
