<!doctype html>
<html>
<head>
<title>Putter</title>
<link rel="shortcut icon" href="images\favicon.ico">
</head>

<body>


<?php

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['accname']))
{
	// let the user access the main page
}
elseif(!empty($_POST['accname']) && !empty($_POST['password']))
{
	// let the user login
}
else
{
	// display the login form
}

$a=$_GET["a"];
$acn=$_GET["acn"];

//signup
if($a=="signup")
{
$an=$_POST["accname"];


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("minor", $con);

$sql1="INSERT INTO user (accname,password) VALUES ('$_POST[accname]','$_POST[pwd1]')";

$sql2="INSERT INTO alldata (firstname,lastname,date,month,year,accname,emailid,country) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[date]','$_POST[month]','$_POST[year]','$_POST[accname]','$_POST[email]','$_POST[country]')";



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
$fol1= $fol . "/myputter";



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
$sql3=mysql_query("INSERT INTO putter VALUES ('myputter','$_POST[accname]')");

if (!$sql3)
  {
  die('Error: ' . mysql_error());
  }
else
{

}

$sql4=mysql_query("select * from putter where accname='$_POST[accname]'");

if (!$sql4)
  {
  die('Error: ' . mysql_error());
  }
else
{
while($row=mysql_fetch_array($sql4))
{
$pn=$row['pname'];
}
}

}


mysql_close($con);
}

//login
if($a=="null")
{

$an=$_POST['accname'];
$p=$_POST['password'];
$pro=mysql_connect("localhost","root","");
mysql_select_db("minor",$pro);
$a=mysql_query("select accname,password from user");
$b=0;
while($row = mysql_fetch_array($a))
 {
if(($an==$row[0] && $p==$row[1]))
{
$b=1;
}
}
if($b==1)
{
$sql4=mysql_query("select * from putter where accname='$_POST[accname]'");

if (!$sql4)
  {
  die('Error: ' . mysql_error());
  }
else
{
while($row=mysql_fetch_array($sql4))
{
$an=$row['accname'];
$pn=$row['pname'];
}
}
}
else
{
echo"invalid username/password";
return false;

}
}

if($a=="back")
{
$an=$acn;
}

//login and back
if($a=="null" ||$a=="back")
{

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$sql4=mysql_query("select * from putter where accname='$an'");

if (!$sql4)
  {
  die('Error: ' . mysql_error());
  }
else
{
while($row=mysql_fetch_array($sql4))
{
$pn=$row['pname'];
}
}


$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='article'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";

$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='photo'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";

$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='video'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";

$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='collage'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	$r="folders/shubhi/Myputter/Baby.jpg";
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";

$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='slideshow'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";

$res= mysql_query("SELECT * FROM stuff where accname='$an' and category='maps'");
if (!$res)
{
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($res))
  {
 
	
	$p=$row['loc'];
	
	echo '<img src='.$p.' >';
	echo "&emsp;&emsp;";
	
  }
echo "<br/>";



mysql_close($con);
}

?>
<a href="http://localhost/minor/create.php?type=article&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Article</a>&emsp;&emsp;
<a href="http://localhost/minor/create.php?type=photo&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Photo</a>&emsp;&emsp;
<a href="http://localhost/minor/create.php?type=video&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Video</a>&emsp;&emsp;
<a href="http://localhost/minor/create.php?type=collage&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Collage</a>&emsp;&emsp;
<a href="http://localhost/minor/create.php?type=slideshow&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Slideshow</a>&emsp;&emsp;
<a href="http://localhost/minor/create.php?type=maps&acc=<?php echo $an ?>&pn=<?php echo $pn ?>">Streetview map</a>&emsp;&emsp;&emsp;&emsp;
<a href="http://localhost/minor/home.php">Logout</a>
<br/><br/><br/>


</body>

</html>