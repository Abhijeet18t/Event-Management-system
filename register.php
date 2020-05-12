<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <nav>
      <h1 id="logo">LOGO</h1>
      <ul id="navbar">
        <li class="about">About</li>
        <li class="contact">Contact</li>
        <li class="login"><a href='login'>Login</a></li>
        <li class="signup"><a href='login'>Signup</a></li>
      </ul>
    </nav>
    <?php
    // register:
include "dbhusers.php";
$nameerr=$emailerr=$collegeerr=$passerr=$usererr="";
$name=$email=$college=$pass=$cpass=$username="";

if(isset($_POST['submit']))
{
    if (empty($_POST["name"])) {
        $nameerr = "Name is required";
      } else {
        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameerr = "Only letters and white space allowed";
        }
      }

      if(empty($_POST['username'])){
        $usererr="username field empty";
      }else{
        $username=mysqli_real_escape_string($conn,$_POST['username']);
      }

      
  if (empty($_POST["email"])) {
    $emailerr = "Email is required";
  } else {
    $email =mysqli_real_escape_string($conn, $_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format";
    }
  }
 
  if(empty($_POST["college"])){
      $collegeerr="college name required";
    }else {
        $college=mysqli_real_escape_string($conn,$_POST["college"]);
    }  


  if (empty($_POST["pass"]) || empty($_POST["cpass"])){
      $passerr="password is required";
      }else{
          $pass=mysqli_real_escape_string($conn,$_POST["pass"]);
          $cpass=mysqli_real_escape_string($conn,$_POST["cpass"]);
          if($pass!=$cpass){
              $passerr="password don't match";
          }else{
            
            $number    = preg_match('@[0-9]@', $pass);
            $specialChars = preg_match('@[^\w]@', $pass);
            if(!$number || !$specialChars ) {
                $passerr='Password must contain at least one number and one special character.';
            }else{
            $hashedpass= password_hash($pass,PASSWORD_DEFAULT);
          }
        }
      }

      if(empty($nameerr)&&empty($usererr)&&empty($emailerr)&&empty($collegeerr)&&empty($passerr)){
        include "dbhusers.php";
        $acticode=md5($email.time());
       $sql1="INSERT INTO `users`( `name`,`username`,`user`, `email`, `college`,`hashedpass`,`acticode`,`vstat`,`debut`,`user_imgext`) VALUES ('$name','$username','admin','$email','$college','$hashedpass','$acticode',1,1,'0');";
        $query=mysqli_query($conn,$sql1);
        // email verify
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

echo "<script>window.location = 'index';</script>";

}

else

{

echo "<script>alert('Data not inserted');</script>";

}
        
        }

}
?>


    <main class="log">
      <div class="benefits">
        BENEFITS
      </div>
      <div class="card2 middle2">
        <div class="front">
          <div class="front-content">
            <h1>REGISTER</h1>
            <img src="register.svg" width="300px" height="300px" />
          </div>
        </div>
        <div class="back">
          <form class="back-content" method='POST'>
            <h2>REGISTER</h2>
            <div class="inputs2">
              <input type="text" name="name" autocomplete="off" value='<?php echo$name; ?>' required />
              <label for="name" class="label-names1">
                <span>Name</span>
              </label><span class='error'> <?php echo $nameerr;?></span>
              <input type="email" name="email" autocomplete="off" value='<?php echo$email; ?>' required />
              <label for="email" class="label-names2">
                <span>Email</span>
              </label><span class='error'> <?php echo $emailerr;?></span>
              <input type="text" name="username" autocomplete="off" value='<?php echo$username; ?>' required />
              <label for="username" class="label-names3">
                <span>Username</span>
              </label><span class='error'> <?php echo $usererr;?></span>
              <input
                type="text"
                name="college"
                autocomplete="off"
                value='<?php echo$college; ?>'
                required
              />
              <label for="college" class="label-names4">
                <span>College</span>
              </label><span class='error'> <?php echo $collegeerr;?></span>
              <input
                type="password"
                name="pass"
                autocomplete="off"
                value='<?php echo$pass; ?>'
                required
              />
              <label for="pass" class="label-names5">
                <span>Password</span>
              </label><span class='error'> <?php echo $passerr;?></span>
              <input
                type="password"
                name="cpass"
                autocomplete="off"
                value='<?php echo$cpass; ?>'
                required
              />
              <label for="cpass" class="label-names6">
                <span>Confirm Password</span>
              </label>
              <button type="submit" class="signb" name='submit'>SIGNUP</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <script src="" async defer></script>
  </body>
</html>
