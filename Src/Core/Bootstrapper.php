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
    private $class_root;
    private $log;
    public function Bootstrapper(){
        $this->class_root = '/Src/';
    }

    public function register(){
        $this->app_root = getcwd();
        $this->class_root = '/Src/';
        $this->loadConfig();
        $this->autoload();
    }
    
    private function loadConfig(){
        $this->config_file = file_get_contents($this->app_root.$this->class_root."/Config/Autoload.json");
        $this->config = json_decode($this->config_file);
        $help_file = file_get_contents($this->app_root.$this->class_root."/Config/Help.en.json");
        $this->help = json_decode($help_file);
        $this->loadFiles();
    }

    private function loadFiles(){
        $this->files = array();
        $this->classes = array();
        foreach($this->config->Capuchin->Components as $component){
            $class_root = $component->root;
            $file = str_replace("\\","/",$this->app_root.$class_root.$component->class).".php";
            if(file_exists($file)){
                $this->files[]=$file;
                $this->classes[] = $component->class;
                $this->log .= $file.": Success".PHP_EOL;
            }else{
                 $this->log .= $file.": Failed".PHP_EOL;
            }
        }
        foreach($this->config->Capuchin->Commands as $command){
            $class_root = $command->root;
            $file = str_replace("\\","/",$this->app_root.$class_root.$command->class).".php";
            if(file_exists($file)){
                $this->files[]=$file;
                $this->classes[] = $command->class;    
           $this->log .= $file.": Success".PHP_EOL;
            }else{
                 $this->log .= $file.": Failed".PHP_EOL;
            }   
         

        }
    }

    private function autoload(){
        $autoloader = new Autoload($this->files);

    }

    public function getFiles(){
        return $this->files;
    }

    public function getClasses(){
        return $this->classes;
    }

    public function getConfig(){
        return $this->config;
    }

    public function getHelp(){
        return $this->help;
    }

    public function getLog(){
        return $this->log;
    }
    
}