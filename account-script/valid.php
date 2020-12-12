<?php
function valid($login,$pass,$pass2,$email){
    $valid = true;
    if(ctype_alnum($login) == false){
        $valid = false;
    } 
    if($pass != $pass2){
        $valid = false;
    }
    $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
    if((filter_var($emailS, FILTER_VALIDATE_EMAIL) == false)||($email!=$emailS)){
        $valid = false;
    }
    if($valid){
        return true;
    }else{
        return false;
    }
}