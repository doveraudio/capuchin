<?php
class Dbot{

function Dbot($filename){
$this->filename = $filename;
}

private $params;
private $pdo;
private $filename;

public function connect(){

 $this->params = parse_ini_file('database.ini');
        if ($this->params === false) {
            throw new \Exception("Error reading database configuration file");
        }
        // connect to the postgresql database
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", 
                $this->params['host'], 
                $this->params['port'], 
                $this->params['database'], 
                $this->params['user'], 
                $this->params['password']);
 
        $this->pdo = new \PDO($conStr);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
}

public function getTables(){
        $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema= 'public' AND table_type='BASE TABLE' ORDER BY table_name";

        foreach($this->pdo->query($sql) as $row){
            printf(json_encode($row));
        }
}

public function getColumns($tablename){
$database = $this->params['database'];
    $sql = "select column_name from information_schema.columns where
table_name='enterprises'";

foreach($this->pdo->query($sql) as $row){
            printf(json_encode($row));
        }
}

}

$dbot = new Dbot("./database.ini");
$dbot->connect();
//$dbot->getTables();
$dbot->getColumns('enterprises');