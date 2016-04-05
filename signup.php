<?php 
     include "home.php";
	  
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
	  
$username=$_POST["accname"];
$pass=md5($_POST[pwd1]);
$putter="myputter";
$sql1="INSERT INTO user (accname,password) VALUES ('$_POST[accname]','$pass')";

$sql2="INSERT INTO alldata (firstname,lastname,date,month,year,accname,emailid,country) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[date]','$_POST[month]','$_POST[year]','$_POST[accname]','$_POST[email]','$_POST[country]')";



$r1=mysql_query($sql1);
$r2=mysql_query($sql2);


if (!$r1)
  {
  die('Error: ' . mysql_error());
  }
else
{
$_SESSION['username']=$username;
$_SESSION['putter']=$putter;
}

if (!$r2)
  {
  die('Error: ' . mysql_error());
  }
else
{
 $_SESSION['username']=$username;
$_SESSION['putter']=$putter;
$fol= "folders/ " . $username;
$fol1= $fol . "/".$putter;



 if ( !is_dir($fol1) ) 
   {
      // folder created
	mkdir($fol1,0777,true);
	chmod($fol1,0777);


  } 
   else 
   {
      opendir($fol1);
	chmod($fol1,0777);
	
   }
echo "<meta http-equiv='refresh' content='0;home.php'>"; 
}

$sql3=mysql_query("INSERT INTO putter VALUES ('myputter','$_POST[accname]')");

if (!$sql3)
  {
  die('Error: ' . mysql_error());
  }
else
{

}

?>