<?php
session_start();
$q=$_POST['ques'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);


$i=uniqid();
$r=mysql_query("insert into questions values('$i','$_SESSION[username]','$q')");
echo '<meta http-equiv="refresh" content="0;hview.php?q='.$i.'">';
?>