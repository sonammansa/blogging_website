<?php
$u=$_POST['us'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$q=mysql_num_rows(mysql_query("select * from user where accname='$u'"));
if($q==0)
{
echo "invalid username";
echo '<meta http-equiv="refresh" content="1;home.php">';
}
else
{
echo '<meta http-equiv="refresh" content="0;main.php?us='.$u.'">';
}
?>