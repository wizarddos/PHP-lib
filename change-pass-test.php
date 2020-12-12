<?php
    require_once "account-script/change-pass.php";
    if(changepass("foor", "toor", "pass", "users", "connect.php")){
        echo "good";
    }else{
        echo "bad";
    }
    //test completed value returned- true