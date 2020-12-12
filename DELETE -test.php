<?php   
    require_once "SQL-Queries/DELETE.php";
    echo delete("connect.php", "articles", "id", 2);
    //test completed - returned value = true