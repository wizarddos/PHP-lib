<?php
    session_start();
    function login($login,$pass, $connect_file, $table_name, $record_with_login, $record_with_pass ){
        $login = htmlentities($login, ENT_QUOTES,"UTF-8");
        require_once $connect_file;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_errno != 0 ){
            return $connect->connect_error;
        }else{
            if($result = $connect->query(
                sprintf("SELECT * FROM $table_name WHERE $record_with_login='%s'",
                mysqli_real_escape_string($connect,$login)))){
                $howMany = $result->num_rows;
                if($howMany != 0){
                    $row = $result->fetch_assoc();
                    if(password_verify($pass, $row[$record_with_pass])){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
            $connect->close();
        }
    }