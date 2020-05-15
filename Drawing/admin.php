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
					<a class='database' href='data.php' >database</a>
					<form method='POST' class="select" class="table-btn">
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
						<?php
						$key=0;
						?>
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
								<img class='image-draw' id='$key' src='images/$img' alt='drawing' />
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
						</li>";
								
						$key++;
					
                                 }
                            }else{
                                echo"NO entries YET";
                            }
                     } ?>

					</ul>
				</section>
			</article>
		</main>

		<div id="Modal" class="modal">
			<span class="close">
				<svg
					role="img"
					xmlns="http://www.w3.org/2000/svg"
					width="25px"
					height="25px"
					viewBox="0 0 24 24"
					aria-labelledby="closeIconTitle"
					stroke="#2329D6"
					stroke-width="1.7142857142857142"
					stroke-linecap="round"
					stroke-linejoin="round"
					fill="none"
					color="#2329D6"
				>
					<title id="closeIconTitle">Close</title>
					<path
						d="M6.34314575 6.34314575L17.6568542 17.6568542M6.34314575 17.6568542L17.6568542 6.34314575"
					/>
				</svg>
			</span>

			<img class="modal-content" id="modal-img" />
		</div>

		<script>
			const modal = document.getElementById("Modal")

			
			const modalImg = document.getElementById("modal-img")
			</script>
			<?php
			$key1=0;
			
			

            while($key1<$key){
				$imgname="name".$key1;
			echo"<script>let $imgname = document.getElementById('$key1')
			$imgname.onclick = function () {
				modal.style.display = 'block'
				modalImg.src = this.src
			}</script>";
			
			$key1+=1;
		}?>
		<script>
			const closeBtn = document.getElementsByClassName("close")[0]

			closeBtn.onclick = function () {
				modal.style.display = "none"
			}

			window.onclick = function (event) {
				if (event.target == modal) {
					modal.style.display = "none"
				}
			}
		</script>
	</body>
</html>
