 
<?php

if(!empty($_GET['code']) && isset($_GET['code']))
{

$code="$_GET['code']";
include 'dbhusers.php';
$sql="SELECT * FROM `users` WHERE `acticode`='$code';";
$result=mysqli_query($conn,$sql);
$num=mysqli_fetch_array($result);
 if($num>0){
     $st=0;
     $sql1="SELECT * FROM `users` WHERE `acticode`='$code' AND `vstat`='$st';";
     $result1=mysqli_query($conn,$sql1);
     $num1=mysqli_fetch_array($result1);
     if($num1>0){
         $st=1;
         $sql2="UPDATE `users` SET `vstat`='$st' WHERE `acticode`='$code' ;";
         mysqli_query($conn,$sql2);
         echo"account activated successfully";

     }else{
         echo"account already activated";
     }
 }else{
     echo"wrong activation code";
 }
  
}