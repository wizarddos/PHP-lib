<?php
function update($connect_file_name, $table, $valueToUpdate, $columnToUpdate,$UPDATEcolumn, $UPDATEval){
    require_once $connect_file_name;
    $connect = new mysqli($host,$db_user,$db_pass,$db_name);
    if($connect->connect_error != 0){
        return false;
    }else{
        if($connect->query("UPDATE $table SET $columnToUpdate = '$valueToUpdate' WHERE $UPDATEcolumn = '$UPDATEval'")){
            return true;
        }else{
            return false;
        }
    }
}