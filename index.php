<?php
session_start();
include 'dbhusers.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/bbc774f30a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="index.css" />
  <script>
    function magnify(imgID, zoom) {
      var img, glass, w, h, bw;
      img = document.getElementById(imgID);

      glass = document.createElement("DIV");
      glass.setAttribute("class", "img-magnifier-glass");

      img.parentElement.insertBefore(glass, img);

      glass.style.backgroundImage = "url('" + img.src + "')";
      glass.style.backgroundRepeat = "no-repeat";
      glass.style.backgroundSize =
        img.width * zoom + "px " + img.height * zoom + "px";
      bw = 3;
      w = glass.offsetWidth / 2;
      h = glass.offsetHeight / 2;

      glass.addEventListener("mousemove", moveMagnifier);
      img.addEventListener("mousemove", moveMagnifier);
      /*and also for touch screens:*/
      glass.addEventListener("touchmove", moveMagnifier);
      img.addEventListener("touchmove", moveMagnifier);
      function moveMagnifier(e) {
        var pos, x, y;

        e.preventDefault();

        pos = getCursorPos(e);
        x = pos.x;
        y = pos.y;

        if (x > img.width - w / zoom) {
          x = img.width - w / zoom;
        }
        if (x < w / zoom) {
          x = w / zoom;
        }
        if (y > img.height - h / zoom) {
          y = img.height - h / zoom;
        }
        if (y < h / zoom) {
          y = h / zoom;
        }

        glass.style.left = x - w + "px";
        glass.style.top = y - h + "px";

        glass.style.backgroundPosition =
          "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
      }
      function getCursorPos(e) {
        var a,
          x = 0,
          y = 0;
        e = e || window.event;

        a = img.getBoundingClientRect();

        x = e.pageX - a.left;
        y = e.pageY - a.top;

        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return { x: x, y: y };
      }
    }

    

  </script>
</head>

<body id="body">
  <div>
    <nav>
      <h1 id="logo">LOGO</h1>
      <ul id="navbar">
        <a class="button">About</a>
        <a class="button">Contact</a>
        <a id="button" class="button login">Login</a>
        <a id="button2" class="button signup">Signup</a>
      </ul>
    </nav>
    <main>
      <div class="main">
        <h1 class="motto"><span>WELCOME</span> we are here to help !</h1>
        <p class="content">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia,
          repudiandae fugiat distinctio animi, neque beatae, voluptatum dicta
          amet ipsa ad accusantium voluptates deleniti omnis sunt quibusdam
          exercitationem explicabo asperiores placeat?
        </p>

        <a class="register buttonr">
          REGISTER
        </a>
      </div>
      <div class="img-magnifier-container">
        <img id="myimage" class="robo" src="robo.svg" alt="" />
        <img class="shadow" src="shadow.svg" alt="" />
      </div>
    </main>
  </div>
  <footer id="footer">
    A beautiful company &copy all rights reserved.
  </footer>

  <!--Login-->
  <?php
    // login

$username=$pass="";
$usererr=$passerr="";
if(isset($_POST['login'])){
    include "dbhusers.php";
    

    if(empty($_POST['username'])){
        $usererr="username field empty";
    }else{
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        
        }
    
    if(empty($_POST['pass'])){
        $passerr="password field empty";
    }else{
        $pass=mysqli_real_escape_string($conn,$_POST['pass']);
    }

    if(empty($usererr)&&empty($passerr)){
        $sql="SELECT * FROM `users` WHERE username='$username' OR email='$username'";
        $result=mysqli_query($conn,$sql);
        $resultcheck=mysqli_num_rows($result);
        if($resultcheck>0){
            $row=mysqli_fetch_array($result);
            $hashedpasscheck = password_verify($pass, $row['hashedpass']);
            if($hashedpasscheck){
                $_SESSION['username']=$row['username'];
                $_SESSION['email']=$row['email'];
                $_SESSION['college']=$row['college'];
                $_SESSION['dept']=$row['dept'];
                $_SESSION['user']=$row['user'];
                $_SESSION['name']=$row['name'];
                $_SESSION['user_imgext']=$row['user_imgext'];
                

                if($row['user']=="admin"){
                    header("Location:admin/admin");
                }
                if($row['user']=="student"){
                  header("Location:student/home");
              }
              if($row['user']=='teacher'){
                header("Location:teacher/home");
              }


            }else{
                $passerr="Incorrect password";
            }

        }else{
            $usererr="user not found";
             }


    } 

}
?>

  <div id="myModal">
    <div class="card">
      <button id="close"><i class="fas fa-times"></i></button>
      <h2 class="headerlogin">LOGIN</h2>
      <div class="inputs">
      <form method='POST'>
        <div class="form">
          <input type="text" name='username' class="input1" id="user" autofill="off" value="<?php echo$username; ?>" required><?php echo $usererr;?></span>
          <label for="username" class="label-name">Email/Username</label>
        </div>
        <div class="form">
          <input type="password" name='pass' class="input1" id="pass" autofill="off" value="<?php echo$pass; ?>" required><?php echo $passerr;?></span>
          <label for="pass" class="label-name">Password</label>
        </div>
      </div>
      <div class="form">
      <button id="loginbtn" type='submit' name='login'>LOGIN</button>
     </div>
</form>
      <p class="forgot">forgot password ?</p>
      <h4>Dont have an account ? <a class="dont-signup" href="#">SIGNUP</a></h4>
    </div>
  </div>
  <!--Login-->
<script>
//username avail
function user(name) {
    if (name.length == 0) {
        document.getElementById("userajax").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "signupajax/userajax.php?name=" + name, true);
        xmlhttp.send();
    }
}

//username avail
function emailverify(e) {
    if (e.length == 0) {
        document.getElementById("emailajax").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("emailajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "signupajax/emailajax.php?email=" + e, true);
        xmlhttp.send();
    }
}

//password verify
function passverify(p) {
    if (p.length == 0) {
        document.getElementById("passajax").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("passajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "signupajax/passajax.php?pass=" + p, true);
        xmlhttp.send();
    }
}

//password check
function passcheck(cp,p) {
  
    if (cp.length == 0) {
        document.getElementById("passcheckajax").innerHTML = "";
        return;
    }
    
   else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("passcheckajax").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "signupajax/passcheckajax.php?pass=" + p+"&cpass="+ cp, true);
        xmlhttp.send();
    }
}


</script>


  <!--Signup-->
  <?php
       $name=$usernames=$email=$college=$dept=$password=$cpassword=$users="";
       $nameerr=$usernameserr=$emailerr=$collegeerr=$passworderr=$userserr=$depterr="";
        include 'dbhusers.php';
      if(isset($_POST['signup'])){

        
        if(empty($_POST['name'])){
          $nameerr="name field empty";
        }else{
            $name=mysqli_real_escape_string($conn,$_POST['name']);
          }

          if(empty($_POST['usernames'])){
            $usernameserr="username field empty";
          }else{
            $usernames=mysqli_real_escape_string($conn,$_POST['usernames']);
            $sql="SELECT `username` FROM `users` WHERE 1 ;";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            if($usernames==$row['username']){
            $usernameserr='username taken';
            break;
            }

    }
          }
        
        
        if (empty($_POST["email"])) {
          $emailerr = "Email is required";
        } else {
          $email =mysqli_real_escape_string($conn, $_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format";
          }else{
          $sql="SELECT `email` FROM `users` WHERE 1 ;";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
              if($email==$row['email']){
                $emailerr="email taken";
                  
              break;
              }
      
          }
        }
          
      
        }

        if(empty($_POST["college"])){
          $collegeerr="college name required";
        }else {
            $college=mysqli_real_escape_string($conn,$_POST["college"]);
        }  
        
        if(empty($_POST['dept'])){
          $depterr="department not selected";
        }else{
          $dept=mysqli_real_escape_string($conn,$_POST['dept']);
        }

        if(empty($_POST['users'])){
          $userserr="user not selected";
        }else{
          $users=mysqli_real_escape_string($conn,$_POST['users']);
        }

        if(empty($_POST['password'])||empty($_POST['cpassword'])){
          $passworderr="password field empty";
        }
          else{
            if($_POST['password']!=$_POST['cpassword']){
              $passworderr="passwords don't match";
            }else{
              $password=mysqli_real_escape_string($conn,$_POST['password']);
              $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if(!$number || !$specialChars ) {
                $passworderr='Password must contain at least one number and one special character.';
            }else{
            $hashedpassword= password_hash($password,PASSWORD_DEFAULT);
          }
            }

          }
        

        if(empty($nameerr)&&empty($usernameserr)&&empty($emailerr)&&empty($collegeerr)&&empty($depterr)&&empty($passworderr)&&empty($userserr)){
          include 'dbhusers.php';
          $acticode=md5($email.time());
          $sql="INSERT INTO `users`(`name`, `username`, `user`, `email`, `college`, `dept`, `hashedpass`, `user_imgext`, `acticode`, `vstat`, `debut`) VALUES ('$name','$usernames','$users','$email','$college','$dept','$hashedpassword','0','$acticode',0,0)";
          $query= mysqli_query($conn,$sql);
          if($query)

	{

$to=$email;

$msg= "Thanks for new Registration.";   

$subject="Email verification ()";

$headers .= "MIME-Version: 1.0"."\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

$headers .= 'From:projectc | Programing Blog <abhijeettakale182000@gmail.com>'."\r\n";

        

$ms.="<html></body><div><div>Dear $name,</div></br></br>";

$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>

<div style='padding-top:10px;'><a href='http://www.phpgurukul.com/demos/emailverify/email_verification.php?code=$acticode'>Click Here</a></div>

<div style='padding-top:4px;'>Powered by <a href='phpgurukul.com'>phpgurukul.com</a></div></div>

</body></html>";

mail($to,$subject,$ms,$headers);

echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";

echo "<script>window.location = 'index.php';</script>";

}

else

{

echo "<script>alert('Data not inserted');</script>";

}
        }
    
      }

     ?>



  <div id="myModal2">
    <div class="cardsign">
      <button id="close2"><i class="fas fa-times"></i></button>
      <h2 class="headersignup">SIGNUP</h2>
      <div class="inputsignup">
          <form method='POST'>
        <div class="form">
          <input type="text" class="input1s" name="name" id="name" autofill="off" required><?php echo$nameerr;?>
          <label for="name" class="label-names">Name</label>
        </div>
        <div class="form"><div class="err" id='userajax'><?php echo$usernameserr;?></div>
          <input type="text" class="input1s" name="usernames" id="userid" autofill="off" onkeyup="user(this.value)"  required>
          <label for="userid" class="label-names">Username</label><div id='userajax'></div>
        </div>
        <div class="form"><div class="err" id='emailajax'><?php echo$emailerr; ?></div>
          <input type="text" class="input1s" name="email" id="mail" autofill="off" onkeyup="emailverify(this.value)"  required>
          <label for="mail" class="label-names">Email</label>
        </div>



        <div class="form"><div class="errp" id='passajax'><?php echo$passworderr;?></div>
          <input type="password" class="input1s" id="pass" name="password" autofill="off" onkeyup="passverify(this.value)" required>
          <label for="pass" class="label-names">Password</label>
        </div>



        <div class="form"><div class="errcp" id='passcheckajax'></div>
          <input type="password" class="input1s" name="cpassword" id="cpass" autofill="off" onkeyup="passcheck(this.value,password.value)" required>
          <label for="cpass" class="label-names">Confirm Password</label>
        </div>
        <div class="radio">
            <label for="student" class="label-student">
            <input type="radio" class="inputr" name="users" id="student" value="student" autofill="off" required>
            Student
            <span></span></label>
          <label for="teacher" class="label-teacher">
            <input type="radio" class="inputr" name="users" id="teacher" value="teacher" autofill="off" required>
            Teacher
            <span></span>
          </label>
        </div>
        <div class="select">
          <div class="form">
            <select class="inputsel" name="college" id="college" autofill="off" required>
              <option name="college" value="college1">College1</option>
              <option name="college" value="college2">college2</option>
            </select><?php echo$depterr;?>
            <label for="departments" class="label-college">College</label>
          </div>
          <div class="form">
            <select class="inputsel2" name="dept" id="departments" autofill="off" required>
              <option name="dept" value="computer">Computer</option>
              <option name="dept" value="it">IT</option>
            </select><?php echo$depterr;?>
            <label for="departments" class="label-dept">Department</label>
          </div>

        </div>
      </div>
      <button id="signupbtn" type='submit' name='signup'>SIGNUP</button>
    </form>
      <h4 class="haveacc">already have an account ? <a class="have-login" href="#">LOGIN</a></h4>
    </div>
  </div>
  <!--Signup-->


  <script>

    magnify("myimage", 3);
    var login = document.getElementById("myModal");
    var btn = document.getElementById("button");
    var btn2 = document.getElementById("button2");
    var close = document.getElementById("close");
    var signup = document.getElementById("myModal2");

    btn.onclick = function () {
      login.style.display = "block";
    }
    btn2.onclick = function () {
      signup.style.display = "block";
    }

    close.onclick = function () {
      login.style.display = "none";
    }

    close2.onclick = function () {
      signup.style.display = "none";
    }
<?php
    if($usererr||$passerr){?>
        var body = document.getElementById("body"); 
        var login = document.getElementById("myModal");
        var close = document.getElementById("close");

        body.onload=function (){
            login.style.display="block";
        }
        close.onclick = function(){
            login.style.display="none";
        }
    
<?php
    }   

?>
<?php if($nameerr||$usernameserr||$emailerr||$collegeerr||$passworderr||$userserr||$depterr){
      ?>
      var body = document.getElementById("body");
      var btn2 = document.getElementById("button2");
      var close = document.getElementById("close");
      var signup = document.getElementById("myModal2");

      body.onload = function () {
      signup.style.display = "block";
      }
      close2.onclick = function () {
      signup.style.display = "none";
      }
    <?php 
    }?>
  </script>


</body>

</html>