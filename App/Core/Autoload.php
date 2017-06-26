<?php
namespace Capuchin\Core;

class Autoload
{
    

    /**
     * Autoloader
     * Constructor for Autoloader Class
     * @return void
     */
    public function Autoload(){
        $this->prefixes = Array();
        $this->app_root = getcwd();
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
        // look through base directories for this classfile
        foreach($this->files as $file){
            // if the file exists, require it
            $this->requireFile($file);
                //Autoloader.php final Endpoint
                
            
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