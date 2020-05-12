<?php
$pass=$_GET['pass'];
$cpass=$_GET['cpass'];
if($pass!=$cpass){
    echo"password don't match";
}

