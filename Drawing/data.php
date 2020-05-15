
<?php
include 'dbh.php';
$sql="SELECT * FROM drawing WHERE 1;";
$result=mysqli_query($conn,$sql);
$check=mysqli_num_rows($result);
echo"<a href='admin.php'><button>RETURN</button></a>";
if($check>0){
    echo"<table border = '1'>
    <tr>
       <th>Name</th>
       <th>Phone number</th>
       <th>Address</th>
    </tr>";
    while($row=mysqli_fetch_array($result)){
       $name=$row['name'];
       $phone=$row['phone'];
       $address=$row['address'];
        echo"<tr>
        <td>$name</td>
        <td>$phone</td>
        <td>$address</td>
     </tr>";

    }
}else{
    echo"NO entries YET";
}