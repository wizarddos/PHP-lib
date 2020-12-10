<?php
    function changepass($oldpass,$newpass,$record_with_pass,$connection_file){
        require_once $connection_file;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_error != 0){
            return $connect->connect_error;
        }else{
            $oldpass = password_hash($oldpass,PASSWORD_DEFAULT);
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);
            if($connect->query("UPDATE SET $record_with_pass = '$newpass' WHERE $record_with_pass = '$oldpass'")){
                return true;
            }else{
                return false;
            }
        }

    }