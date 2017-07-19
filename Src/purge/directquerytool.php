<?php

array_shift($argv);

$command = $argv[0];
array_shift($argv);
echo "Command: " . $command.PHP_EOL;
checkArgs($argv);
$commands = getCommands($argv);



echo("Parameters: ".json_encode($commands).PHP_EOL);

echo("Script Complete".PHP_EOL);

function getCommands(Array $args){
$input = array_filter($args, function($key){
return strpos($key, '--') === 0;
});
$output = [];
foreach($input as $command){
    $tuple = ltrim($command, "--");
    $output[]= explode("=", $tuple);

}
return $output;
}

function checkArgs(Array $args){
if(count($args)<1)
exit("Unable to comply.".PHP_EOL."Invalid number of arguments.".PHP_EOL);
}


?>