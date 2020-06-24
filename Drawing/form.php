<?php
if(isset($_POST['small'])){
    $valu=0;
}else if(isset($_POST['large'])){
    $valu=1;
}
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="form.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body>
        <?php
    if(isset($_POST['submit'])){
    include 'dbh.php';

    $name=$_POST['name'];
    $phone=$_POST['Pnumber'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $file=$_FILES["file"];
    $filename=$_FILES["file"]["name"];
    $filetype=$_FILES["file"]["type"];
    $filetmpname=$_FILES["file"]["tmp_name"];
    $fileerror=$_FILES["file"]["error"];
    $filesize=$_FILES["file"]["size"];
    $username=$name.$phone;   
    $fileext=explode(".",$filename);
    $fileactext=strtolower(end($fileext));
    $allowedext=array("jpg","png","jpeg");
     if(in_array($fileactext,$allowedext)){
         if($fileerror===0){
             if($filesize<1000000){
                 $filenewname=$username.".".$fileactext;
                 $filedestin="C:/xampp/htdocs/projectc/Drawing/images/".$filenewname;
                 $sql="INSERT INTO `drawing`(`name`, `phone`,`address`, `age`, `img_name`) VALUES ('$name','$phone','$address','$age','$filenewname');";
                 mysqli_query($conn,$sql);  
                 move_uploaded_file($filetmpname,$filedestin);

                 echo"THANK YOU FOR PARTICIPATING...RESULTS WILL BE DECLARED SOON";
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



}else{?>
		<main>
			<header class="head">
				<h1>Drawing competition</h1>
			</header>
			<!--modal-->
			<form class="form" method='POST' enctype="multipart/form-data">
				<h2>
					Info
				</h2>
				<div class="input">
					<input type="text" name='name' class="input-field" id="name" required />
					<label class="label-name" for="name"
						><span class="content-name">Name</span></label
					>
				</div>

				<div class="input">
					<input
                        type="text"
                        name='Pnumber'
						class="input-field"
						id="number"
						required
						autofill="off"
					/>
					<label class="label-name" for="number"
						><span class="content-name">Mobile no.</span></label
					>
				</div>
				<div class="input">
					<input type="text" name='address' class="input-field" id="add" required />
					<label class="label-name" for="add"
						><span class="content-name">Address</span></label
					>
				</div>
				<div class="input">
					<input type="file" name="file" class="inputb" id="browse" required />
                </div>
                <input type='hidden' name='age' value='<?php echo$valu; ?>'>

				<button class="submit-btn" type='submit' name='submit'>Submit</button>
			</form>
		</main>

        <script src="" async defer></script>
        <?php 
    }?>
	</body>
</html>
