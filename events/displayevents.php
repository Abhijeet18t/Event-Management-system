 <?php
 session_start();
 include '../dbhusers.php';
 $college=$_SESSION['college'];
 $username=$_SESSION['username'];
 if(isset($_POST['enroll'])){// enroll action
     $eventname=mysqli_real_escape_string($conn,$_POST['eventname']);
     $creator=mysqli_real_escape_string($conn,$_POST['creator']);
     $verify=mysqli_real_escape_string($conn,$_POST['verification']);
     if($verify=='yes'){
         $vstat=0;
     }else{
         $vstat=1;
     }
    $sql="INSERT INTO `eventusers`(`username`, `college`, `ename`,`creator`, `vstat`) VALUES ('$username','$college','$eventname','$creator','$vstat');";
    mysqli_query($conn,$sql);
    
}

 //events list                                                                    
$sql="SELECT * FROM events WHERE college='$college' AND ename NOT IN(SELECT ename FROM eventusers WHERE username='$username');";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
       
if($num){
    while($row=mysqli_fetch_array($result)){
        
        echo$row['name'];echo"<br>";
        echo$row['user'];echo"<br>";
        echo$row['ename'];echo"<br>";
        echo$row['edes'];echo"<br>";
        $ename=$row['ename'];
        $creator=$row['username'];
        $verification=$row['verification'];
    
        echo"<form method='POST'>
        <input type='hidden' name='eventname' value='$ename'>
        <input type='hidden' name='creator' value='$creator'>
        <input type='hidden' name='verification' value='$verification'>
        <button type='submit' name='enroll'>ENROLL</button>
        </form><br><br>";
        
    }

}else{
    echo"NO events to display";
}


 ?>