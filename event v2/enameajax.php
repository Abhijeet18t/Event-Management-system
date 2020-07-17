<?php
session_start();
include '../dbhusers.php';
$ename=$_GET['ename'];
$sql="SELECT ename FROM events WHERE 1;";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    while($row=mysqli_fetch_array($result)){
        if($row['ename']==$ename){
            echo"name not available";
        }
    }
}