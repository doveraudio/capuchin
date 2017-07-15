<?php
namespace Capuchin;
$app_root = getcwd();
$class_root = "\\Src";
include $app_root.$class_root."\\Core\\Bootstrapper.php";
class Capuchin
{
    public function __construct(){
        //Create a new instance of the Client.
        //Client creates insttance Bootstrapper,
        // Initializes and calls Bootstrapper
        //Which:
        // Loads config files
        // Creates instance of Autoloader
        // Autoloader loads the existing classes 
        $this->client = new Client();    
    }
    private $client;


}