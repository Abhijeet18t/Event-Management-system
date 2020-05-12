<HTML>
<HEAD>
<script>
//username avail
function selection(ename) {
    if (ename == "") {
        document.getElementById("userlist").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userlist").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "myeventsajax.php?ename=" + ename, true);
        xmlhttp.send();
    }
}
</script>
</HEAD>

     </BODY>
 <?php
 //event  select list display:
 session_start();
 include '../dbhusers.php';
 $username=$_SESSION['username'];
$sql1="SELECT * FROM events WHERE username='$username';";
$result1=mysqli_query($conn,$sql1);
$num1=mysqli_num_rows($result1);
if($num1>0) { ?>
     
    <form method='POST'>
    <select name='ename' onchange="selection(this.value)">
    <option value="">Select event:</option>
    <?PHP
    while($row1=mysqli_fetch_array($result1)){
        $ename=$row1['ename'];
        echo$ename;
    echo"
    <option name='ename' value='$ename'>$ename</option>
    ";
    }?>
    </select>
    </FORM>
    <div id='userlist'><div>
    <?PHP
}

?>
</BODY>
    </HTML>