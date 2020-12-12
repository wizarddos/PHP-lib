<?php
    require_once "account-script/valid.php";
    echo valid("root", "toor", "toor", "root@admin.com");
    //test completed. returned value - true