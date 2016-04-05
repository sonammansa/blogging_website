<?php
$p=$_GET["loc"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$r1=mysql_query("UPDATE stuff SET gallery=1 WHERE loc='$p'");

if (!$r1)
{
    die('Invalid query: ' . mysql_error());
}

else
{echo "added";}

mysql_close($con);
?>