<?php   
    require_once "SQL-Queries/SELECT.php";
    echo SELECT("users", "users", "connect.php", "id", 1);