<?php
session_start();
$a=$_POST['ans'];
$i=$_GET['id'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$q=mysql_query("insert into answers values('$i','$a','$_SESSION[username]')");


echo '<meta http-equiv="refresh" content="0;hview.php?q='.$i.'">';

?>