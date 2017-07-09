<?php
namespace Capuchin\Core;

/**
 * 
 */
class Client
{
    public function Client(){
        $this->app_root = getcwd()."\\Src";
        require_once $this->app_root()."\\Core\\Bootstrapper.php";
        require_once $this->app_root()."\\Core\\Autoload.php";
        $this->bootstrapper = new Capuchin\Core\Bootstrapper();
    
    }
    /**
     * $app_root
     * the system level folder of the application
     *
     * @var string
     */
    private $app_root;
    /**
     * $config
     * The system configuration map
     *
     * @var struct[mixed]
     */
    private $config;
    /**
     * $help
     * The system help map
     *
     * @var struct[mixed]
     */
    private $help;
    /**
     * $files
     *
     * @var array[string]
     */
    private $files;
    /**
     * $classes
     *
     * @var array[string]
     */
    private $classes;
    private $consoleEngine;
  
    /**
     * boostrap
     *
     * @return void
     */

    
     public function bootstrap(){
        $this->bootstrapper->register();
        $this->help = $this->bootstrapper->getHelp();
        $this->config = $this->bootstrapper->getConfig();
        $this->classes = $this->bootstrapper->getClasses();
    }
    
    public function initialize(){
        $this->consoleEngine = new \Capuchin\Core\ConsoleEngine();
        $this->consoleEngine->configure($this->config);
        
    }    

    public function destroy(){

        
    }


}