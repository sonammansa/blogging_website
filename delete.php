<?php
$p=$_GET["loc"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$r1=mysql_query("DELETE FROM stuff WHERE loc='$p'");

if (!$r1)
{
    die('Invalid query: ' . mysql_error());
}

else
{echo "deleted";
}


mysql_close($con);

unlink($p);
?>