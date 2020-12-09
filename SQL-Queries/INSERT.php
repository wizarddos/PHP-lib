<?php
function insert($table_name, $connect_file_name,$values){
    require_once $connect_file_name;
    $connect = new mysqli($host, $db_user,$db_pass,$db_name);
    if($connect->query("INSERT INTO $table_name VALUES ($values)")){
        return true;
    }else{
        return false;
    }
}