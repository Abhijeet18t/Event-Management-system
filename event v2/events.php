<?php
session_start();
if(isset($_SESSION['username'])){
include 'dbhusers.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Nunito:wght@400;600;800&family=Poppins:wght@400;500&display=swap"
			rel="stylesheet"
		/>
		<link
			rel="stylesheet"
			href="https://unpkg.com/simplebar@5.0.7/dist/simplebar.css"
		/>
		<link rel="stylesheet" href="css/index.css" />
        <title>Document</title>
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

//details ajax
function details(ename) {
    if (ename.length == 0) {
        document.getElementById("event_data").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("event_data").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "detailsajax.php?ename=" + ename, true);
        xmlhttp.send();
    }
}

</script>
	</head>
	<body>
		<!--EVENT INFO MODAL START-->
	<div id="event_data" class="dynamic_event_container"></div>
		<!--EVENT INFO MODAL END-->
		<main class="wrapper">
			<!--********* NAVIGATION START ********-->
			<div class="nav">
				<div class="nav__desktop">
					<h3 class="nav__desktop__logo">BRAND.</h3>
					<div class="nav__desktop__profile">
						<img
							class="nav__desktop__profile__img"
							src="images/profile.jpg"
							alt=""
						/>
						<div class="nav__desktop__profile__info">
							<h4>Atharva Kulkarni</h4>
							<p>Web Developer</p>
						</div>
					</div>
				</div>
				<img src="images/profile.jpg" class="nav__mobile" alt="" />
				<input
					type="search"
					placeholder="Search"
					class="search nav__mobile"
				/>
				<input type="checkbox" id="check" class="nav__mobile" />
				<label for="check" class="nav__mobile">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="24"
						height="24"
						viewBox="0 0 24 24"
						fill="none"
						stroke="#fff"
						stroke-width="2"
						stroke-linecap="round"
						stroke-linejoin="round"
						class="feather feather-menu"
					>
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				</label>
				<div class="nav__links">
					<a href="#" class="nav__links__link home">Dashboard</a>
					<a href="#" class="active nav__links__link event">Events</a>
					<a href="#" class="nav__links__link department"
						>Departments</a
					>
					<a href="#" class="nav__links__link club"> Clubs</a>
					<a href="#" class="nav__links__link library">Library</a>
					<a href="#" class="nav__links__link settings">Settings</a>
					<a href="#" class="nav__links__link help">Help & Support</a>
					<a href="#" class="nav__links__link logout">Logout</a>
				</div>
			</div>
			<!--********* NAVIGATION END ********-->

            <!--******** CONTAINER ONE ********-->
            
			<div class="container">
				<div class="active__tab__bg">
					<section class="active__tab">
						<header>
							<h3>Events</h3>
							<p>Ready to join events</p>
						</header>
						<nav class="active__tab__nav">
							<a
								class="active active__tab__nav_link nav-item is-active"
								active-color="#F65164"
								font-color="#2D364F"
								id="create_btn"
								>Create</a
							>
							<a
								class="active__tab__nav_link nav-item"
								active-color="##F65164"
								font-color="#2D364F"
								id="myevent_btn"
								>My Events</a
							>
							<a
								class="active__tab__nav_link nav-item"
								active-color="#F65164"
								font-color="#2D364F"
								id="ongoing_btn"
								>Ongoing</a
							>
							<a
								class="active__tab__nav_link nav-item"
								active-color="#F65164"
								font-color="#2D364F"
								id="enrolled_btn"
								>Enroll</a
							>
							<span class="nav-indicator"></span>
						</nav>
					</section>

                    <!-- CREATE EVENT START -->
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
				  $filedestin="C:/xampp/htdocs/projectc/event v2/event-images/".$filenewname;
				  
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

					<form method='POST' id="create" class="container__create" enctype='multipart/form-data'>
						<div class="container__create__name">
							<header>
								<h3>New Event</h3>
							</header>
						</div>
						<div class="container__create__info">
							<div class="container__create__info__inputs">
								<div
									class="container__create__info__inputs__input"
								>
									<input name="ename"
										id="event_name"
                                        type="text"
                                        onkeyup='eventname(this.value)'
										required
									/>
									<label for="event_name" class="label-name"
										>Name</label
									><div id='enameajax'><?php echo$enameerr ?></div>
								</div>
								<div
									class="container__create__info__inputs__input"
								>
									<select name="visibility" id="event_visibility">
										<option value="all">All</option>
										<option value="teachers">Teachers</option>
										<option value="students">Students</option>
									</select>
									<label
										class="event__visibility__label"
										for="event_visibility"
										>Visibility</label
									>
								</div>
							</div>
							<div class="container__create__input__img">
								<input name="file" id="input_event_img" type="file" onchange="loadFile(event)" />
								<label for="input_event_img"
									><img id="output" width='50px'/>Upload Image</label
								>
                            </div>
                            <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
							<div class="container__create__event__description">
                                <textarea
                                    name="edes"
									id="event_description"
									cols="30"
									rows="5"
									placeholder="Describe your event"
								></textarea>
								<label
									for="event_description"
									class="event__description__label"
									>Description</label
								>
							</div>
                        </div>
                        <input type='hidden' name='verification' value="no">  <!--no verification required-->
						<div class="container__create__verification">
							<input type="checkbox" name='verification' id="verification" value="yes" />
							<label for="verification">Verification</label>
							<button class="create" type='submit' name='sevent'>
								Create
							</button>
						</div>
                     </form>

					<!-- CREATE EVENT END -->

					<!-- MY EVENT START -->

					<section id="myevent" class="container__myevent">
						<div class="container__myevent__name">
							<header>
								<h3>Your Events</h3>
							</header>
						</div>
						<div class="container__myevent__wrapper" data-simplebar>
						<?php
						$username=$_SESSION['username'];
						$sql="SELECT * FROM `events` WHERE `username`='$username';";
						$result=mysqli_query($conn,$sql);
						$resultcheck=mysqli_num_rows($result);
						if($resultcheck>0){
							while($row=mysqli_fetch_array($result)){
								
								$ename=$row['ename'];
								$edes=$row['edes'];
								$imagename=$row['imagename'];
								?>
						
							<div class="container__myevent__wrapper__event">
								<div class="wrapper__event__display__img">
									<?php echo"<img src='event-images/$imagename' alt='' />";?>
								</div>
								<div class="wrapper__event__display__info">
									<h4><?php echo$ename; ?></h4>
									<p>
										<?php echo$edes;?>
									</p>
								</div>
								<div class="wrapper__event__display__time">
									<div>
										<h4>12 Aug</h4>
										<h5>12:30pm</h5>
									</div>
									
									<button type='button'  value='<?php echo$ename;?>'  onclick="details(this.value)">view</button>
									
								</div>
							</div>
						
						<?php
						}
						
						
					}else{
						echo"NO events created YET";
					}
					?>
					</div>
					</section>
					<!-- MY EVENT END -->

					<!-- ONGOING EVENT START -->
					<section
						id="ongoing"
						class="container__ongoing"
						data-simplebar
					>
						<div class="container__ongoing__name">
							<header>
								<h3>Events in your college</h3>
							</header>
						</div>
						<div class="container__ongoing__wrapper" data-simplebar>
						<?php
						$college=$_SESSION['college'];
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
				
							<div class="container__ongoing__wrapper__event">
								<div class="wrapper__event__display__img">
									<?php echo"<img src='event-images/$imagename' alt='' />";?>
								</div>
								<div class="wrapper__event__display__info">
									<h4><?php echo$ename ?></h4>
									<p>
										<?php echo$edes ?>
									</p>
								</div>
								<div class="wrapper__event__display__time">
									<div>
										<h4>12 Aug</h4>
										<h5>12:30pm</h5>
									</div>
									<button>view</button>
								</div>
							</div>
							<?php
					}
				}else{
					echo"NO active events";
				}
				?>
							
						</div>
					</section>
					<!-- ONGOING EVENT END -->

					<!-- ENROLLED EVENT START -->
					<section id="enrolled" class="container__enrolled">
						<div class="container__enrolled__name">
							<header>
								<h3>You have participated in..</h3>
							</header>
						</div>
						<div
							class="container__enrolled__wrapper"
							data-simplebar
						 >
						 <?php
						 $vstat=1;
						 $sql="SELECT * FROM eventusers WHERE username='$username' AND vstat='$vstat';";
						 $result=mysqli_query($conn,$sql);
						 $num=mysqli_num_rows($result);
						 if($num>0){
                               while($row=mysqli_fetch_array($result)){
								   $ename=$row['ename'];
			

						 ?>
							<div class="container__enrolled__wrapper__event">
								<div class="wrapper__event__display__img">
									<img src="images/profile.jpg" alt="" />
								</div>
								<div class="wrapper__event__display__info">
									<h4><?php echo$ename;?></h4>
									<p>
										Lorem ipsum dolor sit amet consectetur
										adipisicing elit. Vel eius architecto
										necessitatibus.
									</p>
								</div>
								<div class="wrapper__event__display__time">
									<div>
										<h4>12 Aug</h4>
										<h5>12:30pm</h5>
									</div>
									<button>view</button>
								</div>
							</div>
							<?php
							}
						}else{
							echo"NO enrolled events YET";
						}?>
							
						</div>
					</section>
					<!-- ENROLLED EVENT END -->
				</div>
			</div>

			

			<!--******** CONTAINER ONE END********-->

			<!--******** CONTAINER TWO ********-->
			<input type="checkbox" id="sidebar" class="sidebar__puller" />
			<label for="sidebar" class="sidebar__label"> </label>
			<div class="container2">
				<div class="active__tab__sidebar">
					<div class="row1">
						<input
							type="search"
							placeholder="Search"
							class="search"
						/>
						<button class="notification">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								width="22"
								height="22"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								class="feather feather-bell"
							>
								<path
									d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"
								></path>
								<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
							</svg>
						</button>
					</div>
					<!--UPCOMING EVENTS SECTION START-->
					<div id="upcoming" class="upcoming_events">
						<header class="upcoming_events_title">
							<h3>Upcoming Events</h3>
							<p>checkout these events...</p>
						</header>
						<div
							class="container__upcoming__wrapper"
							data-simplebar
						>
							<div class="container__upcoming__wrapper__event">
								<div class="wrapper__event__display__img">
									<img src="images/profile.jpg" alt="" />
								</div>
								<div class="wrapper__event__display__info">
									<h4>JS Workshop</h4>
									<p>
										Lorem ipsum dolor sit amet consectetur
										adipisicing elit. Vel eius architecto
										necessitatibus.
									</p>
								</div>
								<div class="wrapper__event__display__time">
									<div>
										<h4>12 Aug</h4>
										<h5>12:30pm</h5>
									</div>
									<button class="enroll">Enroll</button>
								</div>
							</div>
							<div class="container__upcoming__wrapper__event">
								<div class="wrapper__event__display__img">
									<img src="images/profile.jpg" alt="" />
								</div>
								<div class="wrapper__event__display__info">
									<h4>JS Workshop</h4>
									<p>
										Lorem ipsum dolor sit amet consectetur
										adipisicing elit. Vel eius architecto
										necessitatibus.
									</p>
								</div>
								<div class="wrapper__event__display__time">
									<div>
										<h4>12 Aug</h4>
										<h5>12:30pm</h5>
									</div>
									<button class="enroll">Enrolled</button>
								</div>
							</div>
						</div>
					</div>
					<!--UPCOMING EVENTS SECTION END-->
					<!--EVENT REQUESTS SECTION FOR MYEVENTS START-->
					<div id="eve-req" class="event_requests">
						<header class="event_request_title">
							<h3>Event Requests</h3>
							<p>they want to join your event</p>
						</header>
						<div class="event_request_wrapper" data-simplebar>
						  <div class="event_request_container">
					  <?php
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
					 $sql="SELECT * FROM eventusers WHERE creator='$username' AND vstat='$vstat' ORDER BY ename ASC;";
					 $result=mysqli_query($conn,$sql);
					 $num=mysqli_num_rows($result);
					 if($num>0){
						$i=1; 
					 while($row=mysqli_fetch_array($result)){
                        if($i==1){
							$prev=$row['ename'];
						} 
						$sender=$row['username'];
						$ename=$row['ename'];		     
					
					 ?>
							
								<?php
								if($prev!=$ename||$i==1){?>
								<header>
									<h4><?php echo$ename; ?></h4>
								</header>
								<?php
								$prev=$ename;
							 }?>
								<div class="request_container">
									<div class="request__profile__img">
										<img src="images/profile.jpg" alt="" />
									</div>
									<div class="request__profile__info">
										<h4><?php echo$sender; ?></h4>
										<p>
											student
										</p>
									</div>
									<?PHP echo"<form method='POST' class='actions'>
									    <input type='hidden' name='sender' value='$sender'>
										<input type='hidden' name='ename' value='$ename'>  
										<button type='submit' class='accept' name='accept'></button>
										<button type='submit' class='decline' name='decline'></button>
									</form>";?>
								</div>
								
							
						
						     <?php
						    $i++; }
					           }else{
					 	          echo"NO requests YET";
					           }?>
							   </div>
			          </div>
					</div>
				
					<!--EVENT REQUESTS SECTION FOR MYEVENTS END-->
					<!--PENDING REQUEST SECTION FOR XX START-->
					<div id="pending" class="pending_requests">
						<header class="pending_request_title">
							<h3>Pending Requests</h3>
							<p>waiting for approval....</p>
						</header>
						<div class="pending_request_wrapper" data-simplebar>
                         <?php
						 $username=$_SESSION['username'];
						 $vstat=0;
						 $sql="SELECT * FROM eventusers WHERE username='$username' AND vstat='$vstat';";
						 $result=mysqli_query($conn,$sql);
						 $num=mysqli_num_rows($result);
						 if($num>0){

						while($row=mysqli_fetch_array($result)){
							$ename=$row['ename'];
							$creator=$row['creator'];
						  ?>

							<div class="pending_request_container">
								<div class="event_display_img">
									<img src="images/profile.jpg" alt="" />
								</div>
								<div class="event_info">
									<h4><?php echo$ename;?></h4>
									<p>by <?php echo$creator;?></p>
								</div>
								<div class="pending">
									<svg
										xmlns="http://www.w3.org/2000/svg"
										width="24"
										height="24"
										viewBox="0 0 24 24"
										fill="none"
										stroke="#a9a9ac"
										stroke-width="2"
										stroke-linecap="round"
										stroke-linejoin="round"
										class="feather feather-clock"
									>
										<circle cx="12" cy="12" r="10"></circle>
										<polyline
											points="12 6 12 12 16 14"
										></polyline>
									</svg>
									<p>pending</p>
								</div>
							</div>
							<?php
						   }
						}else{
							 echo"No requests sent";
						 }?>
							
						</div>
					</div>
					<!--PENDING REQUEST SECTION FOR XX END-->
				</div>
			</div>
			<!--******** CONTAINER TWO ********-->
		</main>
		
		<script src="js/events.js"></script>
		<script src="js/active.js"></script>
		<script src="https://unpkg.com/simplebar@5.0.7/dist/simplebar.min.js"></script>
	</body>
</html>
<?php }else{
echo "<script>alert('You have logged out!');</script>";

echo "<script>window.location = '../index';</script>";

}?>
