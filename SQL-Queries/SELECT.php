<?php
    function SELECT($table_name, $what_select, $connect_file_name, $column, $val_of_column){
        require_once $connect_file_name;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_error != 0){
            return $connect->connect_error;
        }else{
            if($result = $connect->query("SELECT $what_select FROM $table_name WHERE $column = '$val_of_column'")){
                $tab = $result->fetch_assoc();
                return $tab[$what_select];
            }else{
                return false;
            }
        }
    }