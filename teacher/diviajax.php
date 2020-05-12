 <?php
$count=$_GET['c'];
$ref=$_GET['ref'];


while($count>0){
    $name=$ref.$count;
    echo"<div class='inputs'><input type='text' name='$name' id='div-name' class='div-name' required />
		<label for='div-name' class='label-name'>Name of Division</label></div>";
     $count--;
}
 
