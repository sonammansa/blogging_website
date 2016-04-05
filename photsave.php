<?php session_start();

 $i=uniqid();
 $pn=$_POST['p'];
 $path="folders/".$_SESSION['username']."/".$pn."/photos/";
 if(!is_dir($path))
{
 mkdir($path,0777,true);

}
else
 {
      opendir($path);
	
   }
   if (copy("temp/new1.jpg", $path.$i.".jpg")) {
  unlink("temp/new1.jpg");
  }
  $u=$_SESSION['username'];
  $im=$path.$i.".jpg";
  $t=$_POST['tit'];
  $c=$_POST['con'];
  $ts=$_POST['sss'];
  $pos=$_POST['a4'];


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$q = mysql_query("INSERT INTO photos VALUES ('$i','$u','$pn','$im','$t','$c','$ts','$pos',curdate())");
if (!$q)
{
    die('Invalid query: ' . mysql_error());
}
else
{
echo "saved";
echo '<meta http-equiv="refresh" content="1;main.php?us=">'; 
}
?>

