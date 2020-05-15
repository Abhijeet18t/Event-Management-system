<!DOCTYPE html>
<html class="no-js">
	<head>
        <script>
            
            </script>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="admin.css" />
		<link
			href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body>
		<main class="content">
			<header class="head">
				<h1>Drawing competition</h1>
			</header>
			<article class="main-card">
				<section class="table-btn">
					<button class='database' >database</button></a>
					<form method='POST' class="select">
						<select name="choice" id="">
                            <option value="">select</option>
							<option value=0>age below 12</option>
							<option value=1>age 12 and above</option>
                        </select>
                        <button type='submit' name='display'>SEARCH</button>
                    </form>
				</section>
				<section class="images">
					<ul>
                        <?php if(isset($_POST['display'])){
                            include 'dbh.php';

                            $choice=$_POST['choice'];
                            $sql="SELECT * FROM drawing WHERE age='$choice';";
                            $result=mysqli_query($conn,$sql);
                            $check=mysqli_num_rows($result);
                            if($check>0){
                                while($row=mysqli_fetch_array($result)){
                                 $name=$row['name'];
                                 $phone=$row['phone'];
                                 $address=$row['address'];
                                 $img=$row['img_name'];
                           
						echo"<li>
							<figure>
								<img src='images/$img' alt='drawing' />
							</figure>
							<div class='info'>
								<div class='name'>
									<span class='cat'>Name:</span>$name
								</div>
								<div class='mobile'>
									<span class='cat'>Mobile:</span>$phone
								</div>
								<div class='add'>
									<span class='cat'>Address:</span>$address
								</div>
							</div>
                        </li>";?>
                                <?php }
                            }else{
                                echo"NO entries YET";
                            }
                     } ?>

					</ul>
				</section>
			</article>
		</main>
	</body>
</html>
