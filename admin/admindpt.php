<?php
session_start();
if(isset($_SESSION['username'])){
 $count=$_GET['c'];
 
 while($count>0){
     
     echo"<input type='text' name='$count'  id='$count' placeholder='dept name' required />
     <label class='label-name' for='$count'> </label>";
     $count--;
 }
}
?>