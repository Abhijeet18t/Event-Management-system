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


 echo"
 <div id='event_modal' class='event_info_modal_container' >
 <div class='event_info_modal'>
<button id='close' >
	<svg
		xmlns='http://www.w3.org/2000/svg'
		width='24'
		height='24'
		viewBox='0 0 24 24'
		fill='none'
		stroke='currentColor'
		stroke-width='2'
		stroke-linecap='round'
		stroke-linejoin='round'
		class='feather feather-plus'
	>
		<line x1='12' y1='5' x2='12' y2='19'></line>
		<line x1='5' y1='12' x2='19' y2='12'></line>
	</svg>
</button>
<header class='event_title'>
	<h3>Event Name</h3>
</header>
<div class='fields' id='fieldinfo'>
<div class='event_modal_img'>
		<img src='event-images/$imagename' alt='' />
	</div>
	<div class='field'>
		<span class='head'>Created By</span>$username
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
	<div id='main-div'>
        hi this is me
        <button id='close1' >close</button>
    </div>

</div>
</div>
</div>

<script>
const Main=document.getElementById('main-div')
        const Close = document.getElementById('close')

        Close.onclick=function(){
            Main.innerHTML=''
        }
</script>
				";
				
				
                ?>