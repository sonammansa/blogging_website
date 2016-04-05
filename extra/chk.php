<html>
<?PHP
$i=$_POST['accname'];
$p=$_POST['password'];
$pro=mysql_connect("localhost","root","");
mysql_select_db("minor",$pro);
$a=mysql_query("select accname,password from usepass");
$b=0;
while($row = mysql_fetch_array($a))
 {
if(($i==$row[0] && $p==$row[1]))
{
$b=1;
}
}
if($b==1)
{
session_start();
include"create1.php?from=login&a=$i";
}
else
{
?>
<script>
alert("wrong id or password");
</script>
<?php

}
?>
</html>