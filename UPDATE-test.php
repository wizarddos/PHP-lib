<?php   
    require_once "SQL-Queries/UPDATE.php";
    echo update("connect.php", "articles", "lorem ipsum", "title", "id", 1 );
    //test completed. returned value = true