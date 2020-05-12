<?php

    include "../dbhusers.php";
    $username=$_GET['name'];
    $sql="SELECT `username` FROM `users` WHERE 1 ;";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        if($username==$row['username']){
            echo"username taken";
        break;
        }

    }
    


?>