<?php
$z= $_GET["q"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("minor", $con);
$result = mysql_query("SELECT * FROM user where accname='$z'");
//echo $result;
//$result="something";
if($r=mysql_fetch_array($result))
echo "<font color=red>username not available</font>";
else
echo "<font color=green>username available</font>";
  mysql_close($con);

?>
