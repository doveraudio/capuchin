<?php
namespace Capuchin\Core;

/**
 * 
 */
class Client
{
    public function Client(){
        $this->app_root = getcwd()."\\Src";
        require_once $this->app_root()."\\Autoload\\Autoloader.php";
        $this->autoloader = new Capuchin\Core\Autoload;

    }
    private $app_root;

    private $autoloader;
    public function bootstrap(){
        $this->autoloader->register();
    }

    

    public function destroy(){

        
    }


}