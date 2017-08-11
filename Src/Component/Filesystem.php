<?php
namespace Capuchin\Component;

class Filesystem extends Component
{
    public function load($filename){
        $data = file_get_contents($filename);
        return $data;

    }

    public function save($filename, $content){

    }

    public function exists($filename){
        return file_exists($filename);
    }

}