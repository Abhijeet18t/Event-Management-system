<?php
session_start();
include '../dbhusers.php';
?>

<html>
<head>

<script>
//ename avail
function eventname(name) {
    if (name.length == 0) {
        document.getElementById("enameajax").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("enameajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "enameajax.php?ename=" + name, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<?php
$ename=$edes="";
$enameerr="";

if(isset($_POST['sevent'])){
$ename=mysqli_real_escape_string($conn,$_POST['ename']);
$sql="SELECT ename FROM events WHERE 1;";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    while($row=mysqli_fetch_array($result)){
        if($row['ename']==$ename){
            $enameerr="name not available";
        }
    }
}
$edes=mysqli_real_escape_string($conn,$_POST['edes']);
$verification=mysqli_real_escape_string($conn,$_POST['verification']);
$college=$_SESSION['college'];
$name=$_SESSION['name'];
$user=$_SESSION['user'];
$username=$_SESSION['username'];
if(empty($enameerr)){
$sql="INSERT INTO `events`(`name`,`username`,`user`,`college`, `ename`, `edes`,`verification`) VALUES ('$name','$username','$user','$college','$ename','$edes','$verification');";
mysqli_query($conn,$sql);
echo"event created successfully";
}
}
?>


<form method='POST'>
<input type='text' name='ename' required onkeyup='eventname(this.value)'><div id='enameajax'><?php echo$enameerr ?></div>
<input type='text' name='edes'   required>
<input type='hidden' name='verification' value="no">  <!--no verification required-->
<input type='checkbox' name='verification' value="yes">
<button type='submit' name='sevent'>SUBMIT</button>
</form>
</body>
</html>