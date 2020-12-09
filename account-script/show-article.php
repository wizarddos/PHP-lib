<?php
    session_start();
    function showArticle($connection_file_name, $idcolumn, $idarticle, $tablename, $articlecolumn){
        require_once $connection_file_name;
        $connection = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connection->connect_error != 0){
            return false;
        }else{
            if($result = $connection->query("SELECT * FROM $tablename WHERE $idcolumn = '$idarticle'")){
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    $_SESSION['article'] = $row[$articlecolumn];
                    return true;
                }else{
                    return false;
                }
            }
        }
    }