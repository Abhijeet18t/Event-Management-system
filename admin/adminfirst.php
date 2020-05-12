<?php
session_start();
if(isset($_SESSION['username'])&&$_SESSION['user']=='admin'){
if(isset($_POST['submitdept'])){
    
    $college=$_SESSION['college'];
    $username=$_SESSION['username'];
    include "../dbhusers.php";
    $count=$_POST['count'];
    $depts='';
    while($count>0){
        $depts.=$_POST[$count];
        if($count>1){
            $depts.=',';
        }
        $count--;
    }
    $sql="INSERT INTO `depts`(`college`, `depts`) VALUES ('$college','$depts'); ";
    mysqli_query($conn,$sql);
    $sql1="UPDATE `users` SET `debut`=1 WHERE `username`='$username' ;";
    mysqli_query($conn,$sql1);
    header("Location:admin");
 }
}else{
    echo "<script>alert('You have logged out!');</script>";

    echo "<script>window.location = '../index';</script>";
}