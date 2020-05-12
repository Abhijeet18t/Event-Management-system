<?php

    include "../dbhusers.php";
    $email=$_GET['email'];
    $sql="SELECT `email` FROM `users` WHERE 1 ;";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        if($email==$row['email']){
            echo "email taken";
        break;
        }

    }
    


?>