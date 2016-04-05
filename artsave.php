<?php
session_start();
if(!isset($_SESSION['username']))
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
else
{
$id=uniqid();
$u=$_SESSION['username'];
$pn=$_POST['p'];
$t=$_POST['tit'];
$c=$_POST['con'];
$bg=$_POST['a5'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("INSERT INTO articles VALUES ('$id','$u','$pn','$t','$c','$bg',curdate())");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}
else
{
echo "saved";
echo '<meta http-equiv="refresh" content="1;main.php?us=">'; 
}
}

?>