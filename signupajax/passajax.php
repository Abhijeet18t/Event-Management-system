<?php
include "../dbhusers.php";
$password=$_GET['pass'];
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
if(!$number && !$specialChars){
    echo"password must contain a number and character";
}else if(!$number){
    echo"password must contain a number";
}else if(!$specialChars){
    echo"password must contain a character";
}



?>