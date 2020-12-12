<?php   
    require_once "account-script/add-article.php";
    echo addarticle("connect.php", "lorem Ipsum dolor sit amet", "articles", "lorem", "XYZ");
    //test completed - returned value - true