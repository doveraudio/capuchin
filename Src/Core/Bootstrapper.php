<?php
namespace Capuchin\Core;

class Bootstrapper
{
    private $config_file;
    private $config;
    private $help_file;
    private $help;
    private $app_root;
    private $files;
    private $classes;
    public function Bootstrapper(){
        $this->app_root = getcwd();
        $this->loadConfig();
        $this->autoload();
    }
    
    private function loadConfig(){
        $this->config_file = file_get_contents($app_root.$class_root."\\Config\\Autoload.json");
        $this->config = json_decode($this->config_file);
        $help_file = file_get_contents($app_root.$class_root."\\Config\\Help.en.json");
        $this->help = json_decode($help_file);
        $this->loadClasses();
    }

    private function autoload(){
        $this->files = array();
        
        foreach($this->config->Capuchin->Commands as $command){
                $class_root = $command->root;
                $file = str_replace("\\","/",$this->app_root.$class_root.$command->class).".php";
                if(file_exists($file)){
                   
                    require $file;
                    $this->files[]=$file;    
            }
         
        }
        foreach($this->config->Capuchin->Components as $component){
            $class_root = $component->root;
            $file = str_replace("\\","/",$this->app_root.$class_root.$component->class).".php";
            if(file_exists($file)){
            require $file;
            $this->files[]=$file;
        }
    
        }
        }
    private function loadClasses(){
        $this->classes = array();
        foreach($config->Capuchin->Components as $component){
           $this->classes[] = $component->class;
}
        foreach($config->Capuchin->Commands as $command){

         $this->classes[] = $command->class;

}
    }
}