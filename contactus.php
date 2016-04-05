<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>
Putter.Show your creativity! 
</title>
<link href="css/links.css" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/lightbox-form.css" rel="stylesheet" />
<style type="text/css">
.classname{-moz-box-shadow: 22px  15px  16px  #000000;-webkit-box-shadow: 22px  15px  5px  #000000;box-shadow: 22px  15px  16px  #000000;}
h2 {
     text-shadow: 0 0 10px #fff,
                   0 0 20px #fff,
                   0 0 30px #fff,
                   0 0 40px blue,
                   0 0 70px blue,
                   0 0 80px blue,
                   0 0 100px blue,
                   0 0 150px blue;
}
.wt
{
color:lightgrey;
font-family:arial;
}


</style>
</head>
<body bgcolor="darkgrey">

<div id="shadowing"></div>
<div id="sbox" style="height:120px">
  <span id="boxtitle"></span>
<form name="form2" action="search.php" method="post">
<p class="wt">Username : <input type="text" name="us"></p>
<br>
<input type="submit" value="Search" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
</form>
</div>

<div id="shadowing"></div>
<div id="box">
  <span id="boxtitle"></span>
  <form name="loginform" method="post" action="login.php" target="_parent">
      
    <p class="wt">Username: <br>
      <input id="accname" type="text" name="accname" placeholder="username" maxlength="60" size="60">
    </p>
      
    <p class="wt">Password<br>
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
<a href="home.php"> <h1 style="float:left;margin-top:46px;color:pink;">  UTTER..</h1></a>
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

?>
<a class="but"  href="#" onClick="openbox('Search', 2,'sbox')" >Search</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="help.php" >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but" id="s" href="contactus.php" >Contact Us</a>
<?php
if(isset($_SESSION['username']))
{
?>
 &emsp;&emsp;&emsp;&emsp;<a class="but" href="logout.php">Logout</a>
<?php } ?>
</div>

</div>

<div class="classname" style="background-color:#2a2a2a;position:absolute;top:120px;left:150px;width:1000px;height:475px;">

<div style="text-align:center;">



<h2 style="background-color:black; margin-left:20px;margin-right:20px">
<font face="Segoe Print" color="White">Contact us..!!</font>
</h2>

</div >

<div id="description" style="width:960px;height:365px;margin-left:20px;margin-right:20px;">
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$rr = mysql_query("select * from contact");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}

while($r=mysql_fetch_array($rr))
{
$i=$r['img'];
$n=$r['name'];
$d1=$r['id1'];
$d2=$r['id2'];
$l=$r['left'];
$il=$r['ileft'];
echo '<img src='.$i.' height="150" width="150" border="6" alt='.$n.' style="left:'.$il.';top:120px;border-color:black;position:absolute;">';

echo'<div id="details" style="width:900px ;height:150px;margin-left:30px;margin-top:2px">
<font size="4px" color="white" FACE="Segoe Print">';


echo '<div style="position:absolute;left:'.$l.';top:320px;">';
echo $n.'<br/>';
echo'<font size="2px" color="white">'
      .$d1.'<br/>'
.$d2.'</font>';
echo '</div>';
echo '</font>';
}
?>


</div>
</div>
</div>
</body>
</html>