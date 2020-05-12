<?php
session_start();
include '../dbhusers.php';
if(isset($_SESSION['username'])&&$_SESSION['user']=='admin')
{
    include "../dbhusers.php";
    $name=$_SESSION['name'];
    $username=$_SESSION['username'];
    $user_imgext=$_SESSION['user_imgext'];

?>


<html class="no-js">


<head>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;900&family=Oswald:wght@300;400&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
  <link rel="stylesheet" href="admin.css" />


</head>

<body id="body">
  <main>
    <div class="sidebar">
      <div><?php
        echo"<img class='pro-circle' src='../profile-images/$username.$user_imgext' alt='' />";
        ?>
      </div>
      <div class="side-links">
        <svg role="img" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
          aria-labelledby="circleIconTitle" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" fill="none" color="#fff">
          <circle cx="12" cy="12" r="8" />
        </svg>
        <svg role="img" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
          aria-labelledby="settingsIconTitle" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" fill="none" color="#fff">
          <path
            d="M5.03506429,12.7050339 C5.01187484,12.4731696 5,12.2379716 5,12 C5,11.7620284 5.01187484,11.5268304 5.03506429,11.2949661 L3.20577137,9.23205081 L5.20577137,5.76794919 L7.9069713,6.32070904 C8.28729123,6.0461342 8.69629298,5.80882212 9.12862533,5.61412402 L10,3 L14,3 L14.8713747,5.61412402 C15.303707,5.80882212 15.7127088,6.0461342 16.0930287,6.32070904 L18.7942286,5.76794919 L20.7942286,9.23205081 L18.9649357,11.2949661 C18.9881252,11.5268304 19,11.7620284 19,12 C19,12.2379716 18.9881252,12.4731696 18.9649357,12.7050339 L20.7942286,14.7679492 L18.7942286,18.2320508 L16.0930287,17.679291 C15.7127088,17.9538658 15.303707,18.1911779 14.8713747,18.385876 L14,21 L10,21 L9.12862533,18.385876 C8.69629298,18.1911779 8.28729123,17.9538658 7.9069713,17.679291 L5.20577137,18.2320508 L3.20577137,14.7679492 L5.03506429,12.7050339 Z" />
          <circle cx="12" cy="12" r="1" />
        </svg>
        <svg role="img" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
          aria-labelledby="entranceIconTitle" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" fill="none" color="#1c2559">
          <path d="M11 15l3-3-3-3" />
          <path d="M4.5 12H13" />
          <path stroke-linecap="round" d="M14 12h-1" />
          <path d="M18 4v16H7V4z" />
        </svg>
      </div>
    </div>
    <div class="nav">
      <div class="input">
        <input type="text" id="search" placeholder="Search" autocomplete="OFF" />
      </div>

      <div class="nav-links">
        <a href="#">FEEDBACK</a>
        <a href="#">HELP</a>
        <a href="#">CONTACT</a>
        <a class="logout-btn" href="logout">LOGOUT</a>
      </div>
    </div>
    <div class="events">
      <h3 class="event-head">Events</h3>
      <div class="events-container">
        <div class="add-event">
          <div class="add-event-card">
            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="64px" height="64px" viewBox="0 0 24 24"
              aria-labelledby="addIconTitle" stroke="#4e63d9" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="miter" fill="none" color="#4e63d9">
              <path d="M17 12L7 12M12 17L12 7" />
              <circle cx="12" cy="12" r="10" />
            </svg>
            <p>event</p>
          </div>
        </div>
        <div class="current-events" data-simplebar data-simplebar-auto-hide="false">
          <div class="event-card"></div>
          <div class="event-card"></div>
          <div class="event-card"></div>
          <div class="event-card"></div>
          <div class="event-card"></div>
        </div>
      </div>
    </div>
    <div class="departments">
      <h3 class="dept-head">Departments</h3>
      <div class="dept-container">
        <div class="add-dept">
          <div class="add-dept-card">
            <svg role="img" xmlns="http://www.w3.org/2000/svg" width="64px" height="64px" viewBox="0 0 24 24"
              aria-labelledby="addIconTitle" stroke="#4e63d9" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="miter" fill="none" color="#4e63d9">
              <path d="M17 12L7 12M12 17L12 7" />
              <circle cx="12" cy="12" r="10" />
            </svg>
            <p>department</p>
          </div>
        </div>
        <div class="all-depts" data-simplebar data-simplebar-auto-hide="false">
          <div class="dept-card"></div>
          <div class="dept-card"></div>
          <div class="dept-card"></div>
          <div class="dept-card"></div>
          <div class="dept-card"></div>
        </div>
      </div>
    </div>
    <div class="profile">
      <div class="profile-cont">
        <div class="my-profile"><?php
          echo"<img src='../profile-images/$username.$user_imgext' alt='' class='profile-img' width='120px' height='120px' />"?>
          <div class="names">
            <h4>
              <?php echo$name;?> <br />
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

   <!--first time login form -->
<?php
$username=$_SESSION['username'];
$sql="SELECT * FROM `users` WHERE `username`='$username' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$debut=$row['debut'];
if($debut==0){
?>

  
 

  <div id="first-pop">
    <div class="first-card">
      <div class="first-card-container">
        <h3>PROFILE</h3>
        <?php
$defaultpic=1;
if(isset($_POST["submitpic"]))
 {
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
				  $filenewname=$username.".".$fileactext;
				  $filedestin="C:/xampp/htdocs/projectc/profile-images/".$filenewname;
				  $sql="UPDATE `users` SET `user_imgext`='$fileactext' WHERE  username='$username';";
				  mysqli_query($conn,$sql);
				  
				  move_uploaded_file($filetmpname,$filedestin);
				  $defaultpic=0;
				  echo"file success";
			  }
			  else{
				  echo "file size exceeds 2 MB!";
			  }
		  }
		  else{
			echo "error opening file!";			
		  }	
		
	  }
	   else{
		echo "file extension not supported";
	}		
 }

        if($defaultpic){
        echo"<img class='profile-pop' src='../profile-images/default.jpg' alt='' />";
        }
        else{
            echo"<img class='profile-pop' src='../profile-images/$username.$fileactext' alt='' />";
          }
        ?>
        <div class="file-browse">
            <form method='POST' enctype="multipart/form-data">
          <input type="file" name="file" id="browse">
          <label class="browse-label" for="browse">Browse</label>
        </div>
        <button type='SUBMIT' name='submitpic' class="upload">Upload</button>
        </form>
      </div>
      <div class="first-card-container2">
        <h3 class="card-head">DEPARTMENTS</h3>
        <form method='POST' action='adminfirst'>
        <div class="dept-inputs" data-simplebar>
        
          <div class="input-dept">
         
            <input type="text" name="count" id="dept-name" onkeyup='show(this.value)' required />
            <label class="label-name" for="dept-name">Number of Departments</label>
          </div>
          <div class="input-dept" id='dept'>
            
          </div>
          
        </div>
        <button type='submit' name='submitdept' id="close" class="submit">Submit</button>
        </div>
        </form>
       
      
    </div>
  </div>



  


  <script>

    var modal = document.getElementById("first-pop");


    var body = document.getElementById("body");


    var close = document.getElementById("close");


    body.onload = function () {
      modal.style.display = "block";
    }


    close.onclick = function () {
      modal.style.display = "none";
    }

     //number of departments
     function show(count) {
    if (count.length == 0) {
        document.getElementById("dept").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dept").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "admindpt.php?c=" + count, true);
        xmlhttp.send();
    }
}
  </script>
  <?php } //first time login form end  ?>


<?php
}else{
    echo "<script>alert('You have logged out!');</script>";

echo "<script>window.location = '../index';</script>";

}
?>  
</body>

</html>