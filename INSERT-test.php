<?php 
    require_once "SQL-Queries/INSERT.php";
    echo insert("articles", "connect.php", "NULL,'new','article for insert test', 'XYZ', '2020-12-12'");
    //test completed - returned value = true