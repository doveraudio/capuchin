<?php
namespace Capuchin\Autoload;

/**
* An implementation of the example found at
* https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
*
* 
* Add new class files to the appropriate folders,
* Capuchin\Command\, Capuchin\Component,
* and edit the file in the Capuchin\Config folder, Autoloader.json
* Each Component encapsuplates a group of like behaviours,
* ie. functions. Filesystem, for example, features methods
* which deal with the files on the development system.
* Caveat:
*  Command classes may call on more than one Component class,
*  therefore, many commands may be interdependant with
*  several other components. A Component Class, will also therefore,
*  be called on by many Command Classes.
*     
*   The Autoload.json is not described here, but is very easy to follow,
*   
* 
*
*/

class Autoloader
{
    protected $prefixes;
    private $root;


    private $files;
    private $classnames;

    public function Autoloader(){
        $this->prefixes = Array();
        $this->app_root = getcwd();
        
    }
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        // normalizing namespace prefix
        $prefix = trim($prefix, '\\') . '\\';
        // normalize base dir with traiiling seperator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        // initialize the namespace prefix array
        if(isset($this->prefixes[$prefix])=== false){
            $this->prefixes[$prefix] = array();
        }

        if($prepend){
            array_unshift($this->prefixes[$prefix], $base_dir);

        } else {
            array_push($this->prefixes[$prefix]);
        }
    }

    /**
     * @param string $class the name of the class
     * @return bool True if class loaded, False if not. 
     * 
     * 
     */
    public function loadClass($class){
        // the current namespace prefix
        $prefix = $class;

        /// work backwards through the namespace names of the
        // class name to find a mapped file name
        while(false !== $pos = strrpos($prefix, '\\')){
            // retain the trailing namespace seperator in the prefix
           $prefix = substr($class, 0, $pos+1);
           // the rest is the relativ class name
           $relative_class = substr($class, $pos + 1);

           $mapped_file = $this->loadMappedFile($prefix, $relative_class);
           if($mapped_file){
               return $mapped_file;
           }
           //remove the trailing namespace separator
           // for next iteration of strpos()
           $prefix = rtrim($prefix, '\\');
        }
        // never found a mapped file
        return false;
    }

    protected function loadMappedFile($prefix, $relative_class){
        // are there any base directories for this prefix?
        if(isset($this->prefixes[$prefix])===false){
            return false;
        }
        // look through base directories for this namespace prefix
        foreach($this->prefixes[$prefix] as $base_dir){
            // replace the namespace prefix with the base directory
            // replace namespace seperators with directory seperators
            // in the relative class name, append with .php
            $file = $base_dir
            . str_replace('//', '/', $relative_class)
            . '.php';
            // if the mapped file exists, require it
            if($this->requireFile($file)){
                //Autoloader.php final Endpoint
                return $file;
            }
        }
        return false;
    } 
     
    protected function requireFile($file)
    {
        if(file_exists($file)){
            require $file;
            return true;
        }
        return false;
    }
}
