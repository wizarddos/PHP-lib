<?php 
function delete($connect_file_name, $table, $where_col, $where_val){
    require_once $connect_file_name;
    $connection = new mysqli($host,$db_user,$db_pass,$db_name);
    if($connection->connect_error != 0){
        return false;
    }else{
        if($connection->query("DELETE FROM $table WHERE $where_col = '$where_val'")){
            return true;
        }else{
            return false;
        }
    }
}