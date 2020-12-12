<?php 
    require_once "account-script/show-article.php";
    if(showArticle("connect.php", "id", 1, "articles", "article")){
        echo $_SESSION['article'];
    }else{
        echo "bad";
    }