<?php session_start();
if(!isset($_SESSION['username']))
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
else
{
$id=uniqid();
$r1=$_SESSION['username'];
$r2=$_POST['place'];
$r3=$_POST['p'];
$r4=$_POST['tit'];
$r5=$_POST['con'];
$r14=0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("INSERT INTO maps(id,accname,place,putter,title,caption,date) VALUES ('$id','$r1','$r2','$r3','$r4','$r5',curdate())");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}
else
{
echo "saved";
echo '<meta http-equiv="refresh" content="1;main.php?us=">'; 
}
?>

<?php
}
?>