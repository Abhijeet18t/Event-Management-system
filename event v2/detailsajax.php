<?php 
session_start();
include "dbhusers.php";
$college=$_SESSION['college'];
$username=$_SESSION['username'];
 $ename=$_GET['ename'];
 $sql="SELECT * FROM events WHERE ename='$ename' AND college='$college';";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($result);
 $edes=$row['edes'];
 $verification=$row['verification'];
 $visibility=$row['visibility'];
 $user=$row['user'];
 $imagename=$row['imagename'];
 $creator=$row['username'];


 echo"
 <div class='event_modal_img'>
		<img src='event-images/$imagename' alt='' />
	</div>
	<div class='field'>
		<span class='head'>Created By</span>$creator
	</div>
	<div class='field'>
		<span class='head'>Visibility</span> $visibility
	</div>
	<div class='field'>
		<span class='head'>Verification</span> $verification
	</div>
	<div class='field'>
		<span class='head'>Description</span> $edes
	</div>
	<div class='field'>
		<span class='head-line'>Capacity</span>
		<span class='unit'>150</span>
	</div>
	<div class='field'>
		<span class='head-line'>Enrolled</span>
		<span class='unit'>79</span>
	</div>
	<form method='POST'>
	<input type='hidden' name='eventname' value='$ename'>
	<input type='hidden' name='creator' value='$creator'>
	<input type='hidden' name='verification' value='$verification'>
	<button type='submit' name='enroll' class='enroll_btn'>Enroll</button>
		</form>";
				
				
                ?>