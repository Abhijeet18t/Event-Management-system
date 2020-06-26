<?php
session_start();
if(isset($_SESSION['username'])){
include 'dbhusers.php';
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link
			href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@300;400;500;900&family=Oswald:wght@300;400&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&display=swap"
			rel="stylesheet"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
		/>
		<link rel="stylesheet" href="css/events.css" />
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

	<body id="body">
		<main>
			<div class="sidebar">
				<div>
					<img class="pro-circle" src="img/profile_img.png" alt="" />
				</div>
				<div class="side-links">
					<svg
						role="img"
						xmlns="http://www.w3.org/2000/svg"
						width="40px"
						height="40px"
						viewBox="0 0 24 24"
						aria-labelledby="circleIconTitle"
						stroke="#fff"
						stroke-width="1.5"
						stroke-linecap="round"
						stroke-linejoin="round"
						fill="none"
						color="#fff"
					>
						<circle cx="12" cy="12" r="8" />
					</svg>
					<svg
						role="img"
						xmlns="http://www.w3.org/2000/svg"
						width="40px"
						height="40px"
						viewBox="0 0 24 24"
						aria-labelledby="settingsIconTitle"
						stroke="#fff"
						stroke-width="1.5"
						stroke-linecap="round"
						stroke-linejoin="round"
						fill="none"
						color="#fff"
					>
						<path
							d="M5.03506429,12.7050339 C5.01187484,12.4731696 5,12.2379716 5,12 C5,11.7620284 5.01187484,11.5268304 5.03506429,11.2949661 L3.20577137,9.23205081 L5.20577137,5.76794919 L7.9069713,6.32070904 C8.28729123,6.0461342 8.69629298,5.80882212 9.12862533,5.61412402 L10,3 L14,3 L14.8713747,5.61412402 C15.303707,5.80882212 15.7127088,6.0461342 16.0930287,6.32070904 L18.7942286,5.76794919 L20.7942286,9.23205081 L18.9649357,11.2949661 C18.9881252,11.5268304 19,11.7620284 19,12 C19,12.2379716 18.9881252,12.4731696 18.9649357,12.7050339 L20.7942286,14.7679492 L18.7942286,18.2320508 L16.0930287,17.679291 C15.7127088,17.9538658 15.303707,18.1911779 14.8713747,18.385876 L14,21 L10,21 L9.12862533,18.385876 C8.69629298,18.1911779 8.28729123,17.9538658 7.9069713,17.679291 L5.20577137,18.2320508 L3.20577137,14.7679492 L5.03506429,12.7050339 Z"
						/>
						<circle cx="12" cy="12" r="1" />
					</svg>
					<svg
						role="img"
						xmlns="http://www.w3.org/2000/svg"
						width="40px"
						height="40px"
						viewBox="0 0 24 24"
						aria-labelledby="entranceIconTitle"
						stroke="#fff"
						stroke-width="1.5"
						stroke-linecap="round"
						stroke-linejoin="round"
						fill="none"
						color="#1c2559"
					>
						<path d="M11 15l3-3-3-3" />
						<path d="M4.5 12H13" />
						<path stroke-linecap="round" d="M14 12h-1" />
						<path d="M18 4v16H7V4z" />
					</svg>
				</div>
			</div>
			<div class="nav">
				<div class="input">
					<input type="text" id="search" placeholder="Search" />
				</div>

				<div class="nav-links">
					<a href="#">FEEDBACK</a>
					<a href="#">HELP</a>
					<a href="#">CONTACT</a>
					<a class="logout-btn" href="logout.php">LOGOUT</a>
				</div>
			</div>

			<?php
$ename=$edes=$eimage="";
$enameerr=$eimageerr="";

if(isset($_POST['sevent'])){
$ename=mysqli_real_escape_string($conn,$_POST['ename']);
$visibility=mysqli_real_escape_string($conn,$_POST['visibility']);
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
$file=$_FILES["file"];
	 $filename=$_FILES["file"]["name"];
	 $filetype=$_FILES["file"]["type"];
	 $filetmpname=$_FILES["file"]["tmp_name"];
	 $fileerror=$_FILES["file"]["error"];
	 $filesize=$_FILES["file"]["size"];
	 
	 
	 $fileext=explode(".",$filename);
	 $fileactext=strtolower(end($fileext));
	 $allowedext=array("jpg","png","jpeg");
	  if(in_array($fileactext,$allowedext)){
		  if($fileerror===0){
			  if($filesize<1000000){
				  $username=$_SESSION['username'];
				  $filenewname=$ename.".".$fileactext;
				  $filedestin="C:/xampp/htdocs/projectc/event-section/event-images/".$filenewname;
				  
				  move_uploaded_file($filetmpname,$filedestin);
			  }
			  else{
				  $eimageerr="file size exceeds 2 MB!";
			  }
		  }
		  else{
			$eimageerr="error opening file!";			
		  }	
		
	  }
	   else{
		$eimageerr="file extension not supported";
	}
if(empty($enameerr)&&empty($eimageerr)){
$sql="INSERT INTO `events`(`name`,`username`,`user`,`college`, `ename`,`visibility`, `edes`,`imagename`,`verification`) VALUES ('$name','$username','$user','$college','$ename','$visibility','$edes','$filenewname','$verification');";
mysqli_query($conn,$sql);
echo"event created successfully";
}
}
?>


			<div class="events">
				<h4>EVENTS</h4>
				<div class="nested_nav">
					<a class="event_link nav-item is-active" active-color="#4e63d9" id="create_b">Create</a>
					<a class="event_link nav-item" active-color="#4e63d9" id="my_b">My Events</a>
					<a class="event_link nav-item" active-color="#4e63d9" id="ongoing_b">Ongoing</a>
					<a class="event_link nav-item" active-color="#4e63d9" id="joined_b">Enrolled</a>
					<span class="nav-indicator"></span>
				</div>
				<form id="create_e" class="create_event" method='POST' enctype='multipart/form-data'>
					<div class="img"><img src="calendar.svg" alt="" /></div>
					<div class="data">
						<div class="box1">
							<label for="img">
								<input type="file" name='file' accept='image/*' onchange="loadFile(event)" id="img" />
								<span class="evimg"><img id="output"/>upload image</span>
							</label>
							<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
							<div class="sub-box1">
								<div class="input">
									<input type="text" name='ename' id="name" onkeyup='eventname(this.value)'  required />
									<label class="label-name" for="name"
										>Name</label
									><div id='enameajax'><?php echo$enameerr ?></div>
								</div>
								<div class="input">
									<select name="visibility" id="visibility">
										<option value="all">All</option>
										<option value="teachers"
											>Teachers</option
										>
										<option value="students"
											>Students</option
										>
									</select>
									<label class="label-vis" for="visibility"
										>Visibility</label
									>
								</div>
							</div>
						</div>
						<div class="box2">
							<textarea
								name="edes"
								id="desc"
								cols="92"
								rows="10"
								placeholder="describe your event"
							></textarea>
							<label for="desc">Description</label>
						</div>
						<input type='hidden' name='verification' value="no">  <!--no verification required-->
						<div class="box3">
							<input type="checkbox" name="verification" id="verify" value="yes" />
							<label class="lable-verify" for="verify"
								>Verification</label
							>
							<button type='submit' name='sevent'class="create">Create</button>
						</div>
					</div>
			   </form>

			   <!-- ****** MY EVENTS START ******-->

			   <div id="my_e" class="my_event" data-simplebar>
					<div class="event_container">
						<div class="img_container"></div>
						<div class="event_info">
							<h3>Atharva Kulkarni</h3>
							<br />
							this event is sponsored by nikhil shinde
						</div>
						<button class="more">more</button>
					</div>
					<div class="event_container">
						<div class="img_container"></div>
						<div class="event_info"></div>
						<button class="more">more</button>
					</div>
					<div class="event_container">
						<div class="img_container"></div>
						<div class="event_info"></div>
						<button class="more">more</button>
					</div>
				</div>

				<!-- ****** MY EVENTS END ******-->

				<!-- ****** ONGOING EVENT START ******-->

				<div id="ongoing_e" class="ongoing_event" data-simplebar>
				<?php
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
						$ename=$row['ename'];
						$edes=$row['edes'];
						$creator=$row['username'];
						$verification=$row['verification'];
						$imagename=$row['imagename'];
				?>
					<div class="event_container">
						<div class="img_container"><?php echo"<img src='event-images/$imagename' width='150px'>";?></div>
						<div class="event_info">
							<?php echo"<h3>$ename</h3>"; ?>
							<br />
							<?php echo$edes;?>
						</div>
						<?php echo"<form method='POST'>
        <input type='hidden' name='eventname' value='$ename'>
        <input type='hidden' name='creator' value='$creator'>
        <input type='hidden' name='verification' value='$verification'>
        <button type='submit'  name='enroll'>ENROLL</button>
        </form><br><br>";?>
					</div>
					<?php }
					}else{
						echo"NO events to display";
					}
					
					?>
				</div>

				<!-- ****** ONGOING EVENT END ******-->

				<!-- ****** JOINED EVENT START ******-->

				<div id="joined_e" class="joined_event" data-simplebar>
				<?php
				$sql4="SELECT * FROM events WHERE college='$college' AND ename  IN(SELECT ename FROM eventusers WHERE username='$username');";
				$result4=mysqli_query($conn,$sql4);

				$num=mysqli_num_rows($result4);
				if($num>0){
					
					while($row=mysqli_fetch_array($result4)){
						
						$ename=$row['ename'];
						$edes=$row['edes'];
						$imagename=$row['imagename'];
						

				?>
					<div class="event_container">
						<div class="img_container"><?php echo"<img src=event-images/$imagename width='190px'>";?></div>
						<div class="event_info">
							<?php echo"<h3>$ename</h3>";?>
							<br />
							<?php  echo$edes;?>
						</div>
						<button class="more">more</button>
					</div><?php }

}else{
	echo"NO enrolled events";
}
?>
					
				</div>

				<!-- ****** JOINED EVENT END ******-->

			</div>
			<div class="profile">
				<div class="profile-cont">
					<div class="my-profile">
						<img
							src="img/profile_img.png"
							alt=""
							class="profile-img"
							width="120px"
							height="120px"
						/>
						<div class="names">
							<h4>
								Nikhil Shinde <br />
								<span class="profession">Web Designer</span>
							</h4>
						</div>
					</div>
					<div class="notifications">
						<h3 class="notification-head">Notifications</h3>
						<div class="current-notifications"></div>
					</div>
				</div>
			</div>
		</main>
		<footer class="footer"></footer>

		<script src="js/event.js"></script>
		<script src="js/active.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
	</body>
</html>
<?php }else{
echo "<script>alert('You have logged out!');</script>";

echo "<script>window.location = '../index';</script>";

}?>
