<?php 
    function addarticle($connect_file_name,$article_content, $table,$Title, $author, $addday,$addmonth,$addyear ){
        require_once $connect_file_name;
        $connection = new mysqli($host, $db_user,$db_pass,$db_name);
        if($connection->connect_error != 0){
            return false;
        }else{
            $safe_article = htmlentities($article_content, ENT_QUOTES, "UTF-8");
            $safe_title = htmlentities($Title,ENT_QUOTES,"UTF-8");
            $safe_author = htmlentities($author,ENT_QUOTES,"UTF-8");
            if(checkdate($addmonth,$addday,$addyear)){
                $safe_date = $adday."-".$addmonth."-".$addyear;
                if($connection->query("INSERT INTO $table VALUES(NULL,'$safe_title','$safe_article,'$safe_author', '$safe_date')")){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
            
    }