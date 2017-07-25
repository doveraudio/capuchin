<?php
namespace Capuchin\Core;

class Autoload
{
    /**
     * Autoloader
     * Constructor for Autoloader Class
     * @return void
     */
    public function __construct($files){

        $this->files = $files;
        $this->log .= "autoloading.....".PHP_EOL.json_encode($files).PHP_EOL;
    }
    /**
     * public function invoke
     * instructs the autoloader to load all of the files in its buffer.
     * 
     * @return void
     */
    public function invoke(){
        $this->loadFiles();
    }
    /**
     * $classes
     *
     * @var string
     */
    private $classes;
    /**
     * $files
     *
     * @var array
     */
    private $files;
    /**
     * $log
     *
     * @var string
     */
    private $log;


    public function getLog(){
        return $this->log;
    }

    protected function loadFiles(){
        //Load the files from the Bootstrapper System

        $this->log .= json_encode($this->files);
        foreach($this->files as $file){
            $success = $this->requireFile($file);
            if($success){
                $this->log .= $file.":autoload success".PHP_EOL;
            }else{
                $this->log .= $file.":autoload failed".PHP_EOL;
            }
            
        }
    } 
    /**
     * requireFile
     *
     * @param string $file
     * @return boolean
     */
    protected function requireFile($file)
    {
        $this->log .= "Loading ".$file."... ".PHP_EOL;
        if(file_exists($file)){
            require_once($file);
            return true;
        }
        return false;
    }

    
}