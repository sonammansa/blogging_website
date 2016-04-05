<?php 
session_start();

$v=$_POST['view'];
$u=$_GET['us'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$r=mysql_query("select * from ".$v." where accname='$u'");

$row=mysql_fetch_array($r);

	
	$put="";
	$p= $v .".php?pn=".$put."&what=view&us=".$u;
	echo '<meta http-equiv="refresh" content="0;'.$p.'">';
	//echo $v .".php?pn=".$put."&what=view&us=".$u;
	//include 'collage.php';
	
?>