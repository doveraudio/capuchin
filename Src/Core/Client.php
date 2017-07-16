<?php
namespace Capuchin\Core;

/**
 * 
 */
class Client
{
    public function __construct(){
        $this->app_root = getcwd()."/Src/";
        require_once $this->app_root."/Core/Bootstrapper.php";
        $this->bootstrapper = new \Capuchin\Core\Bootstrapper();
    
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
     * bootstrap
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
    
    public function getDictionary(){
        return $this->consoleEngine->getDictionary();
    }
    
    public function setCommand($value){
        $this->consoleEngine->setCommand($value);
    }
    public function getNamespace(){
        return 'crap';
    }
    public function getCommandInstance(){
        $this->consoleEngine->getCommandInstance();
    }
    
    public function destroy(){

        
    }


}