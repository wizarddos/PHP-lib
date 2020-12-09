<?php
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