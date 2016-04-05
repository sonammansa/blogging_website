<?php session_start(); 

if(isset($_SESSION['admin']))
{ 
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("select * from admin");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}
$p1=$_POST["old"];
$p2=$_POST["new"];
while($row=mysql_fetch_array($rr))
	{
	if($p1==$row['pass'])
		{
		$r = mysql_query("UPDATE admin SET pass='$p2' WHERE pass='$p1'");
		if (!$r)
		{
   		 die('Invalid query: ' . mysql_error());
		}
		else
		{
		echo "password changed";
		echo '<meta http-equiv="refresh" content="1;adminpage.php">';
		}
		}
	else
		{
		echo "old password is incorrect!";
		echo '<meta http-equiv="refresh" content="1;ad_pass.php">';
		}
	}
} 

else
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
?>
