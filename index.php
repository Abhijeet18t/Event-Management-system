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
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;700;800;900&family=Oswald:wght@300;400&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/bbc774f30a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body id="body">
    <main class="main-content">
        <section class="hero">
            <img src="images/hero-background.jpg" alt="" class="background" />
            <div class="nav">
                <a class="about" href="#">ABOUT</a>
                <a href="#">CONTACT</a>
                <a id="login-btn" >LOGIN</a>
                <a id="signup-btn" class="signup-btn" >SIGNUP</a>
            </div>
            <div class="header">
                <h1>
                    Manage <br />
                    your workflow
                </h1>
            </div>
            <div class="lines">
                <p>
                    get the most out of your day with our services <br />
                    and improve your workflow.
                </p>

                <a class="register" href="#">REGISTER</a>
            </div>
            <div class="svg"></div>
        </section>

        <section class="benefits">
            <div class="head">
                <h1>What you get</h1>
                <p>using our services provides you</p>
            </div>
            <div class="container" data-scroll>
                <div class="card">
                    <div class="border"></div>
                    <div class="img"></div>
                    <div class="content">
                        <h4>BENEFIT 1</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. sed nisi voluptates eum.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="border"></div>
                    <div class="img"></div>
                    <div class="content">
                        <h4>BENEFIT 2</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. sed nisi voluptates eum.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="border"></div>
                    <div class="img"></div>
                    <div class="content">
                        <h4>BENEFIT 3</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. sed nisi voluptates eum.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!------------********** LOGIN-START **********------------>
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


    <div id="login-pop">
        <div class="login-card">
            <button type='button' id="close-login">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"
                    aria-labelledby="closeIconTitle" stroke="#2329D6" stroke-width="1.7142857142857142"
                    stroke-linecap="round" stroke-linejoin="round" fill="none" color="#2329D6">
                    <title>Close</title>
                    <path
                        d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575" />
                </svg>
            </button>

            <h2 class="login-head">LOGIN</h2>
            <form class="login-details" method='POST'>


                <div class="input">
                    <span class='error'><?php echo $usererr;?></span>
                    <input type="text" name="username" class="input-field" id="email" value="<?php echo$username;?>" required  />
                    <label class="label-name" for="email"><span class="content-name">Email/Username</span></label>
                </div>
                <div class="input">
                    <span class='error'><?php echo $passerr;?></span>
                    <input type="password" name="pass" class="input-field" id="pass" value="<?php echo$pass;?>" required autofill="off" />
                    <label class="label-name" for="pass"><span class="content-name">Password</span></label>
                </div>
                <button type='submit' class="login-btn" name='login'>LOGIN</button>

            </form>

            <div class="forgot-signup">
                <p>Forgot password ?</p>
                <p>
                    Don't have an account
                    <span id="have-signup-btn">
                        <a href="#"> SIGNUP</a></span>
                </p>
            </div>
        </div>

    </div>

    <!------------********** LOGIN-END **********------------>
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
    function passcheck(cp, p) {

        if (cp.length == 0) {
            document.getElementById("passcheckajax").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("passcheckajax").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "signupajax/passcheckajax.php?pass=" + p + "&cpass=" + cp, true);
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

    <!------------********** SIGNUP-START **********------------>

    <form id="signup-pop" method='POST'>
        <!------------********** SIGNUP-CARD1-START **********------------>

        <div id="signup-card-1">
            <button type='button' id="close-signupc1">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"
                    aria-labelledby="closeIconTitle" stroke="#2329D6" stroke-width="1.7142857142857142"
                    stroke-linecap="round" stroke-linejoin="round" fill="none" color="#2329D6">
                    <title>Close</title>
                    <path
                        d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575" />
                </svg>
            </button>
            <h2 class="signup-head">SIGNUP</h2>

            <div class="signup-details">
                <div class="input">
                    <span class='error'><?php  echo$nameerr;?></span>
                    <input type="text" name="name" class="input-field" id="name" value="<?php echo$name;?>"  />
                    <label class="label-name" for="name"><span class="content-name">Name</span></label>
                </div>
                <div class="input">
                    <span class="error" id='userajax'><?php echo$usernameserr;?></span>
                    <input type="text" name="usernames" class="input-field" id="username" value="<?php echo$usernames;?>" onkeyup="user(this.value)"
                         />
                    <label class="label-name" for="username"><span class="content-name">Username</span></label>
                </div>
                <div class="input">
                    <span class="error" id='emailajax'><?php echo$emailerr; ?></span>
                    <input type="text" name="email" class="input-field" id="email" onkeyup="emailverify(this.value)" value="<?php echo$email;?>"
                         />
                    <label class="label-name" for="email"><span class="content-name">Email</span></label>
                </div>
                <button type='button' id="next">NEXT</button>
            </div>
            <div class="haveacc">
                <p>
                    Already have an account ?
                    <span id="have-login-btn1"><a href="#">LOGIN</a></span>
                </p>
            </div>
            <div class="page-number">
                <span id="one1">1</span><span id="two1">2</span><span id="three1">3</span>
            </div>
        </div>

        <!------------********** SIGNUP-CARD1-END **********------------>

        <!------------********** SIGNUP-CARD2-START **********------------>

        <div id="signup-card-2">
            <button type='button' id="close-signupc2">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"
                    aria-labelledby="closeIconTitle" stroke="#2329D6" stroke-width="1.7142857142857142"
                    stroke-linecap="round" stroke-linejoin="round" fill="none" color="#2329D6">
                    <title>Close</title>
                    <path
                        d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575" />
                </svg>
            </button>
            <h2 class="signup-head">SIGNUP</h2>
            <div class="signup-details">
                <div class="input">
                    <span class="error-pass" id='passajax'><?php echo$passworderr;?></span>
                    <input type="password" name="password" class="input-field" id="pass"
                        onkeyup="passverify(this.value)"   />
                    <label class="label-name" for="pass"><span class="content-name">Password</span></label>
                </div>
                <div class="input">
                    <span class="error" id='passcheckajax'></span>
                    <input type="password" name="cpassword" class="input-field" id="cpass"
                        onkeyup="passcheck(this.value,password.value)"  />
                    <label class="label-name" for="cpass"><span class="content-name">Confirm Password</span></label>
                </div>
                <div class="inputr">
                    <div class="radio-field">
                        <input id="student" name="users" type="radio" name="category" value="student" checked />
                        <label for="student" class="label-name">Student</label>
                    </div>
                    <div class="radio-field">
                        <input id="teacher" name="users" type="radio" name="category" value="teacher" />
                        <label for="student" class="label-name">Teacher</label>
                    </div>
                </div>
                <button type='button' id="next2">NEXT</button>
            </div>
            <div class="haveacc">
                <p>
                    Already have an account ?
                    <span id="have-login-btn2"><a href="#">LOGIN</a></span>
                </p>
            </div>
            <div class="page-number">
                <span id="one2">1</span><span id="two2">2</span><span id="three2">3</span>
            </div>
        </div>

        <!------------********** SIGNUP-CARD2-END **********------------>

        <!------------********** SIGNUP-CARD3-START **********------------>

        <div id="signup-card-3">
            <button type='button' id="close-signupc3">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"
                    aria-labelledby="closeIconTitle" stroke="#2329D6" stroke-width="1.7142857142857142"
                    stroke-linecap="round" stroke-linejoin="round" fill="none" color="#2329D6">
                    <title>Close</title>
                    <path
                        d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575" />
                </svg>
            </button>
            <h2 class="signup-head">SIGNUP</h2>
            <div class="signup-details">
                <div class="input">
                    <span class="error"> <?php echo$collegeerr;?></span>
                    <p class="college">College</p>
                    <div class="custom-select">
                        <select name="college">
                            <option value="0">Select your college</option>
                            <option value="1">College 1</option>
                            <option value="2">College 2</option>
                            <option value="3">College 3</option>
                            <option value="4">College 4</option>
                            <option value="5">College 3</option>
                            <option value="6">College 4</option>
                        </select>
                    </div>
                </div>
                <div class="input">
                    <span class="error"><?php echo$depterr;?></span>
                    <p class="dept">Department</p>
                    <div class="custom-select">
                        <select name="dept">
                            <option value="0">Select your department</option>
                            <option value="1">Computer</option>
                            <option value="2">IT</option>
                            <option value="3">Mechanical</option>
                            <option value="4">Automobile</option>
                            <option value="5">Mechanical</option>
                            <option value="6">Automobile</option>
                        </select>
                    </div>
                </div>
                <button type='submit' id="submit" name='signup'>SIGNUP</button>
            </div>
            <div class="haveacc">
                <p>
                    Already have an account ?
                    <span id="have-login-btn3"><a href="#">LOGIN</a></span>
                </p>
            </div>
            <div class="page-number">
                <span id="one3">1</span><span id="two3">2</span><span id="three3">3</span>
            </div>
        </div>

        <!------------********** SIGNUP-CARD3-END **********------------>
    </form>
    <!------------********** SIGNUP-END **********------------>

    <!------------********** JAVASCRIPT-START **********------------>

    <script src="js/select.js"></script>
    <script src="js/index.js"></script>
    <script>
    const body = document.getElementById("body")
    const loginmodal = document.getElementById("login-pop")
    const signupmodal = document.getElementById("signup-pop")
    const signupcard1 = document.getElementById("signup-card-1")
    const signupcard2 = document.getElementById("signup-card-2")
    const signupcard3 = document.getElementById("signup-card-3")



    //login onload start
    <?php if($usererr||$passerr){?>
    body.onload = function() {
        loginmodal.style.display = "block"
    }
    <?php }?>
    //login onload end

    //signup onload start
    <?php if($collegeerr||$depterr){?>
    body.onload = function() {
        signupmodal.style.display = "block"
        signupcard3.style.display = "block"
    }
<?php }?>


<?php if($passworderr||$userserr){?>
    body.onload = function() {
        signupmodal.style.display = "block"
        signupcard2.style.display = "block"
    }
<?php }?>

    <?php if($nameerr||$usernameserr||$emailerr){?>
    body.onload = function() {
        signupmodal.style.display = "block"
        signupcard1.style.display = "block"
    }
<?php }?>


    //signup onload end
    </script>

    <!------------********** JAVASCRIPT-END **********------------>
</body>

</html>