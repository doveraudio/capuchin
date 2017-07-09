<?php
namespace Capuchin;
$app_root = getcwd();
$class_root = "\\Src";

        require_once $app_root.$class_root."\\Core\\Bootstrapper.php";
        require_once $app_root.$class_root."\\Core\\Autoload.php";

$boots = new \Capuchin\Core\Bootstrapper();
$boots->register();

echo json_encode($boots->getFiles()).PHP_EOL;
echo json_encode($boots->getClasses()).PHP_EOL;
echo json_encode($boots->getConfig()).PHP_EOL;
echo json_encode($boots->getHelp()).PHP_EOL;
/*
$config_file = file_get_contents($app_root.$class_root."\\Config\\Autoload.json");
$help_file = file_get_contents($app_root.$class_root."\\Config\\Help.en.json");
$config = json_decode($config_file);
$help = json_decode($help_file);
echo "Command Classes: ".PHP_EOL;
foreach($config->Capuchin->Commands as $command){

echo $command->class.PHP_EOL;

}
echo "Command Files: ".PHP_EOL;
foreach($config->Capuchin->Commands as $command){
$class_root = $command->root;
echo str_replace("\\","/",$app_root.$class_root.$command->class).".php".PHP_EOL;

}
//echo json_encode($config->Capuchin);

echo "Component Classes: ".PHP_EOL;

foreach($config->Capuchin->Components as $component){
    echo $component->class.PHP_EOL;
}


echo "Component Files: ".PHP_EOL;

foreach($config->Capuchin->Components as $component){
    echo str_replace("\\","/",$app_root.$class_root.$component->class).".php".PHP_EOL;
}*/