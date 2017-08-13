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
    //echo "You have invoked the file command.";
    echo json_encode($this->parameters);
    
    
    if($this->parameters['load']){
        echo $this->filesystem->load(getcwd().$this->parameters['load']);
    }
    return true;
    
}
public function setParameters($values){
    $this->parameters = $values;
}
public function getParameters(){
    return $this->parameters;
}   
}