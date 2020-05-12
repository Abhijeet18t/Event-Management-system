<?php
session_start();
include '../dbhusers.php';
$username=$_SESSION['username'];
$ename=mysqli_real_escape_string($conn,$_GET['ename']);
echo"<h3>$ename</h3>";
$sql="SELECT * FROM eventusers WHERE creator='$username' AND ename='$ename';";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    $count=0;
    while($row=mysqli_fetch_array($result)){
        echo$row['username'];
        echo"  ";
        echo$row['college'];
        echo"<br><br>";
     $count++;
    }
    echo"TOTAL ENTRIES:".$count;
}else{
    echo"NO entries yet";
}
