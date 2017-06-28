<?php
namespace Capuchin\Core;

class Autoload
{
    /**
     * Autoloader
     * Constructor for Autoloader Class
     * @return void
     */
    public function Autoload($files){
        $this->files = array($files);
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
     * @var [string]
     */
    private $classes;
    /**
     * $files
     *
     * @var [string]
     */
    private $files;

    protected function loadFiles(){
        //Load the files from the Bootstrapper System
        foreach($this->files as $file){
            $this->requireFile($file);
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
        if(file_exists($file)){
            require $file;
            return true;
        }
        return false;
    }

    
}