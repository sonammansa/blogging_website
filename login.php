<?php 
     
	  
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
	  
          function Login($username, $password)
   {
     $query=" SELECT * FROM user where accname='$username' and password='$password'";
	 $result=mysql_query($query);
	 echo mysql_error();
	 $num=mysql_num_rows($result);
	  if($num==0)
	  {
	   return false;
	  }
	  else
	  return true;
 
   
   }
   
   $username=$_POST['accname'];
   $password=md5($_POST['password']);
   
   if(Login($username,$password))
    {
	include "home.php";
	   $_SESSION['username']=$username;
	$_SESSION['putter']="myputter";
	   echo "Welcome :)".$username ;
	   ?>
	    <meta http-equiv="refresh" content="0;home.php"> 
	   <?php
	   
	}
	else 
	{
	  echo "<b> Wrong username and password </b>" ; 
	echo '<meta http-equiv="refresh" content="1;home.php">';
	}
	
	


?>