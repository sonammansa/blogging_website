<?php session_start();
$t=$_GET['type'];
$table=$_GET['table'];
$s_id=$_GET['s_id'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

if($t=="Like")
{
$r=mysql_query("insert into liked values('$table','$s_id','$_SESSION[username]')");
echo "Unlike";
}
else if($t=="Unlike")
{
$r=mysql_query("delete from liked where stuff_id='$s_id' and accname='$_SESSION[username]'");
echo "Like";
}
?>