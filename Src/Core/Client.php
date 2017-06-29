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
    /**
     * boostrap
     *
     * @return void
     */

    private $invoker;

    private $parser;

    private $tokenizer;


    public function bootstrap(){
        $this->bootstrapper->register();
    }
    
    

    public function destroy(){

        
    }


}