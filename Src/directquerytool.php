<?php
array_shift($argv);
checkArgs($argv);
$commands = getCommands($argv);



echo(json_encode($commands));

echo("Script Complete".PHP_EOL);

function getCommands(Array $args){
$input = array_filter($args, function($key){
return strpos($key, '--') === 0;
});
$output = [];
foreach($input as $command){
    ltrim($command, "--");
    $output[]= explode("=", $command);

}
return $output;
}

function checkArgs(Array $args){
if(count($args)!==3)
exit("Unable to comply.".PHP_EOL."Invalid number of arguments.".PHP_EOL);
}


?>