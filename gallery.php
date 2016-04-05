<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>Putter</title>
<script src="js/lightbox-form.js"></script>
<link href="css/lightbox-form.css" rel="stylesheet" />
<link href="css/links.css" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet" />

<link rel="shortcut icon" href="images\favicon.ico">

</head>

<body bgcolor="white" >

<style type="text/css">

.wt
{
color:lightgrey;
font-family:arial;
}

</style>

<div id="shadowing"></div>
<div id="box">
  <span id="boxtitle"></span>
  <form name="loginform" method="post" action="login.php" target="_parent">
      
    <p class="wt">Username: 
      <input id="accname" type="text" name="accname" placeholder="username" maxlength="60" size="60">
    </p>
      
    <p class="wt">Password<br/>
      <input type="password" name="password" placeholder="Password">

    </p>
      
	<p class="wt">
	<font size=2>New user? <a class="ln" href="1.php" > Register</a> here.</font>
	</p>
	<p class="wt">
	<font size=2>Login as <a class="ln" href="#" style="color:yellow;" onclick="openbox('Admin Login', 2,'box1')"> Admin !</a></font>
	</p>
    
    <p class="wt" style="left:170px;position:absolute;"> 
      <input class="form" type="submit" name="Login" value="Login">&emsp;
      <input class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box')" >
    </p>
  </form>
</div>

<div id="shadowing"></div>
<div id="box1">
 <span id="boxtitle"></span>
  <form name="aloginform" method="post" action="admin.php" target="_parent">
      <br>
    <p class="wt">Admin ID: <br>
      <input id="accname" type="text" name="aid" placeholder="Admin id" maxlength="40" size="40">
    </p>
      
    <p class="wt">Password<br>
      <input type="password" name="pas" placeholder="Password">

    </p>
      
	
    <p class="wt" style="left:170px;position:absolute;"> 
      <input class="form" type="submit" name="Login" value="Login">&emsp;
      <input class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box1')" >
    </p>
  </form>
</div>

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("select * from about");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}

while($r=mysql_fetch_array($rr))
{
$a=$r['home1'];
}
?>

<div id="head" >
<img src="img/logo_120.png" height="106" width="110" style="margin-left:85px">
<div id="putter">
<a href="home.php" class="ab"><h1 style="float:left;margin-top:46px;color:pink;">  UTTER..</h1></a>
<?php
echo '<h1 style="margin-top:43px;color:#0bf;width:550px;"><font size=5px face="Segoe Print">'.$a.'</font> </h1>'; 
?>
</div>


<div id="tabs">
<?php
if(!isset($_SESSION['username']))
	 {
?>
<a class="but" href="#" onClick="openbox('Login', 2,'box')"  >Login</a> &emsp;&emsp;&emsp;&emsp;
<?php
}
else
{
?>
<a class="but" href="#" onClick="openbox('Login', 2,'box')"  >Create new</a> &emsp;&emsp;&emsp;&emsp;
<?php
}
?>
<a id="s" href="gallery.php" >Gallery</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="help.php"  >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="contactus.php">Contact Us</a>
</div>

</div>



<div style="background-color:lightblue;position:absolute;top:100px;width:1350px;left:0px;height:auto;">
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$users= mysql_query("SELECT * FROM alldata");
if (!$users)
{
    die('Invalid query: ' . mysql_error());
}
while($row = mysql_fetch_array($users))
  {
  $u = $row['accname'];
	$res=mysql_query("SELECT * FROM stuff where accname='$u' and gallery=1");
	if (!$res)
{
    die('Invalid query: ' . mysql_error());
}
	while($row1 = mysql_fetch_array($res))
	{
	$p=$row1['loc'];
	//echo $p;
	//echo "<br/>";
	$s1= $row1['accname'];
	$s2= $row1['date'];
	$s3= $row1['category'];
	$s4=$s1."/".$s2."/".$s3;
	echo $s4;
	echo '<img src='.$p.' style="margin:10px;" >';
	echo "&emsp;&emsp;";
	
	}


  }



mysql_close($con);

?>

</div>
</body>

</html>