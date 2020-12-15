<?php
session_start();
    function addarticle($connect_file_name,$article_content, $table,$Title, $author ){
        require_once $connect_file_name;
        $connection = new mysqli($host, $db_user,$db_pass,$db_name);
        if($connection->connect_error != 0){
            return false;
        }else{
            $safe_article = htmlentities($article_content, ENT_QUOTES, "UTF-8");
            $safe_title = htmlentities($Title,ENT_QUOTES,"UTF-8");
            $safe_author = htmlentities($author,ENT_QUOTES,"UTF-8");
            $safe_date = date("Y-m-d");
            if($connection->query("INSERT INTO $table VALUES(NULL,'$safe_title','$safe_article','$safe_author', '$safe_date')")){
                 return true;
            }else{
                  return false;
            }
        }
            
    }
    function changepass($oldpass,$newpass,$column_with_pass, $table_name,$connection_file){
        require_once $connection_file;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_error != 0){
            return $connect->connect_error;
        }else{
            $oldpass = password_hash($oldpass,PASSWORD_DEFAULT);
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);
            if($connect->query("UPDATE $table_name SET $column_with_pass = '$newpass' WHERE $column_with_pass = '$oldpass'")){
                return true;
            }else{
                return false;
            }
        }

    }
    function login($login,$pass, $connect_file, $table_name, $column_with_login, $column_with_pass ){
        $login = htmlentities($login, ENT_QUOTES,"UTF-8");
        require_once $connect_file;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_errno != 0 ){
            return $connect->connect_error;
        }else{
            if($result = $connect->query(
                sprintf("SELECT * FROM $table_name WHERE $column_with_login='%s'",
                mysqli_real_escape_string($connect,$login)))){
                $howMany = $result->num_rows;
                if($howMany != 0){
                    $row = $result->fetch_assoc();
                    if(password_verify($pass, $row[$column_with_pass])){
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
    function uploadimg($target_dir,$name_file_to_upload){
    
        $target_file = $target_dir . basename($_FILES[$name_file_to_upload]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$name_file_to_upload]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES[$name_file_to_upload]["size"] > 500000) {
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        return false;
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES[$name_file_to_upload]["tmp_name"], $target_file)) {
            return true;
        } else {
            return false;
        }
        }
    }
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
    function valid($login,$pass,$pass2,$email){
        $valid = true;
        //validate login
        if(ctype_alnum($login) == false){
            $valid = false;
        } 
    
        //validate password
        if($pass != $pass2){
            $valid = false;
        }
        // validate e-mail
        $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailS, FILTER_VALIDATE_EMAIL) == false)||($email!=$emailS)){
            $valid = false;
        }
        //check is $valid true
        if($valid){
            return true;
        }else{
            return false;
        }
    }
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
    function insert($connect_file_name, $table, $values){
        require_once $connect_file_name;
        $connect = new mysqli($host, $db_user,$db_pass,$db_name);
        if($connect->query("INSERT INTO $table VALUES ($values)")){
            return true;
        }else{
            return false;
        }
    }
    function select($connect_file_name, $table_name, $column, $val_of_column){
        require_once $connect_file_name;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_error != 0){
            return $connect->connect_error;
        }else{
            if($result = $connect->query("SELECT * FROM $table_name, WHERE $column = '$val_of_column'")){
                return $result;
            }else{
                return false;
            }
        }
    }
    function update($connect_file_name, $table, $valueToUpdate, $columnToUpdate,$whereUPDATE, $whereUPDATEval){
        require_once $connect_file_name;
        $connect = new mysqli($host,$db_user,$db_pass,$db_name);
        if($connect->connect_error != 0){
            return false;
        }else{
            if($connect->query("UPDATE $table SET $columnToUpdate = '$valueToUpdate' WHERE $whereUPDATE = '$whereUPDATEval'")){
                return true;
            }else{
                return false;
            }
        }
    }


