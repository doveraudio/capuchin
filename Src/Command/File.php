<?php
namespace Capuchin\Command;

class File extends Command
{
    private $filesystem;
    public function __construct($values){
        $this->parameters = $values;
        $this->filesystem = new \Capuchin\Component\Filesystem();

    }
private $parameters;
public function invoke(){
    echo "You have invoked the file command.";
    echo json_encode($this->parameters[0][0]);
    if(in_array('load',$this->parameters[0])){
        echo getcwd();
        echo $this->filesystem->load(getcwd().$this->parameters[0][1]);
    }
    return "You have invoked the file command.";
    
}
public function setParameters($values){
    $this->parameters = $values;
}
public function getParameters(){
    return $this->parameters;
}   
}