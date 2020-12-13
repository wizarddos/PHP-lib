<?php
function insert($connect_file_name, $table, $values){
    require_once $connect_file_name;
    $connect = new mysqli($host, $db_user,$db_pass,$db_name);
    if($connect->query("INSERT INTO $table VALUES ($values)")){
        return true;
    }else{
        return false;
    }
}