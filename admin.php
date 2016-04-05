<?php session_start(); ?>
<html>
<head>
<title>Admin</title>

</head>

<body bgcolor=#2a2a2a>

<?php
$i=$_POST['aid'];
$p=$_POST['pas'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("minor", $con);

$q=mysql_query("select * from admin");
if (!$q)
{
    die('Invalid query: ' . mysql_error());
}

while($r=mysql_fetch_array($q))
{
$ai=$r['id'];
$ap=$r['pass'];
if($i==$ai && $p==$ap)
{
$_SESSION['admin']=$ai;
echo '<meta http-equiv="refresh" content="0;adminpage.php">';
}
else
{
echo '<font color="white">invalid id/password</font>';
}
}
mysql_close($con);
?>
</body>
</html>