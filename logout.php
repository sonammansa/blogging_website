

<?php session_start();


if(isset($_SESSION['username']))
   unset($_SESSION['username']);
else if(isset($_SESSION['admin']))
	unset($_SESSION['admin']);
echo "<meta http-equiv='refresh' content='0;home.php'>";
?>