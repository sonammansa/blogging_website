<?php session_start();
if(!isset($_SESSION['username']))
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
else
{
$vid=$_POST['vid'];
$bg=$_POST['a5'];
$p=$_POST['p'];
$t=$_POST['tit'];
$c=$_POST['con'];
$sz=$_POST['a2'];
$pos=$_POST['a4'];
$sty=$_POST['sss'];
$tsz=$_POST['so'];
$i=uniqid();
	$u = $_SESSION["username"];


        $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

		
	$query="insert into videos values('$i','$u','$p','$vid','$bg','$t','$c','$sz','$pos','$sty','$tsz',curdate())";
	$q=mysql_query($query);
	if (!$q)
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