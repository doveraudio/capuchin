<?php


if (file_exists('test.xml')){
    $xml = simplexml_load_file('test.xml');
    $columns = $xml->section->table->rows;
    $keys = [];
    foreach($columns->row as $column){
        $keys[] = current($column['c1']);
    }
    echo(json_encode($keys));

} else {

    exit('Failed to open text.xml');

}