<?php
session_start();
if(isset($_SESSION['username'])&&$_SESSION['user']=='student'){
echo"success";?>
<html>
<form method='POST' action="logout">
<button type='submit' name='submit'>LOGOUT</button>
</form>
<a href='../event/create-event/create_event.php'><button>events</button></a>
</html>

<?php
}else{
    echo "<script>alert('You have logged out!');</script>";

    echo "<script>window.location = '../index';</script>";
}?>