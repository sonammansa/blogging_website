<?php
session_start();
if( isset($_POST['submit'])) {
   if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) 
            { 
		echo 'Thank you..';
		unset($_SESSION['security_code']);
            } 
   else {
		
		echo 'Sorry, you have provided an invalid security code';
        }
}

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("minor", $con);

$sql1="INSERT INTO usepass (accname,password) VALUES ('$_POST[accname]','$_POST[pwd1]')";

$sql2="INSERT INTO alldata (firstname,lastname,date,month,year,gender,accname,emailid,id,country,question,answer) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[date]','$_POST[month]','$_POST[year]','$_POST[gender]','$_POST[accname]','$_POST[idname]','$_POST[id]','$_POST[country]','$_POST[ques]','$_POST[answer]')";



$r1=mysql_query($sql1);
$r2=mysql_query($sql2);
if (!$r1)
  {
  die('Error: ' . mysql_error());
  }
else
{

}

if (!$r2)
  {
  die('Error: ' . mysql_error());
  }
else
{
$fol= "folders/ " . $_POST['accname'];


 if ( !is_dir($fol) ) 
   {
      // folder created
	mkdir($fol,0777,true);
	chmod($fol,0777);


  } 
   else 
   {
      opendir($fol);
	chmod($fol,0777);
	
   }

$sql3="INSERT INTO putter VALUES ("myputter",'$_POST[accname]')";
}


mysql_close($con);
?>