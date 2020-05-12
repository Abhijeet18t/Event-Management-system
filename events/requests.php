 <?php
session_start();
include "../dbhusers.php";
if(isset($_POST['accept'])){
    $sender=mysqli_real_escape_string($conn,$_POST['sender']);
    $ename=mysqli_real_escape_string($conn,$_POST['ename']);
    $sql1="UPDATE eventusers SET vstat=1 WHERE username='$sender' AND ename='$ename';";
    mysqli_query($conn,$sql1);
    }
    if(isset($_POST['decline'])){
        $sender=mysqli_real_escape_string($conn,$_POST['sender']);
        $ename=mysqli_real_escape_string($conn,$_POST['ename']);
        $sql2="UPDATE eventusers SET vstat=2 WHERE username='$sender' AND ename='$ename';";
        mysqli_query($conn,$sql2);
    }
    
$username=$_SESSION['username'];
$vstat=0;
$sql="SELECT * FROM eventusers WHERE creator='$username' AND vstat='$vstat';";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    while($row=mysqli_fetch_array($result)){
        echo$row['username'];
        echo$row['college'];
        $sender=$row['username'];
        $ename=$row['ename'];
        echo"<form method='POST'>
        <input type='hidden' name='sender' value='$sender'>
        <input type='hidden' name='ename' value='$ename'>
        <button type='submit' name='accept'>accept</button>
        <button type='submit' name='decline'>decline</button>
        </form>";
    }

}else{
    echo"no requests yet";
}


 ?>