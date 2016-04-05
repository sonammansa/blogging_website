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

<body >

<style type="text/css">
#shadow{-moz-box-shadow: 22px  15px  16px  #000000;-webkit-box-shadow: 22px  15px  5px  #000000;box-shadow: 22px  15px  16px  #000000;}

.ln1:link
{
text-decoration:none;
color:black;
}
.ln1:visited
{
text-decoration:none;
color:black;
}
.wt
{
color:lightgrey;
font-family:arial;
}

</style>

<div id="shadowing"></div>
<div id="sbox" style="height:120px;" >
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


<div id="head">

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

?>
<a class="but"  href="#" onClick="openbox('Search', 2,'sbox')" >Search</a> &emsp;&emsp;&emsp;&emsp;
<a class="but" id="s" href="help.php"  >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="contactus.php">Contact Us</a>
<?php
if(isset($_SESSION['username']))
{
?>
 &emsp;&emsp;&emsp;&emsp;<a class="but" href="logout.php">Logout</a>
<?php } ?>
</div>

</div>

<div style="background-color:#2a2a2a;position:absolute;top:104px;left:0px;width:1350px;height:100%">
<?php
if(isset($_SESSION['username']))
{ ?>
<div id="ask" style="position:absolute;top:30px;left:100px;width:1100px;height:auto">
<form action="ask.php" method="post">
<input type="text" name="ques" placeholder="Ask Question" size=100 required="required" style="height:25px"><input type="submit" class="form" value="ASK">
</form>
</div>
<?php } ?>

<div id="shadow" style="background-color:grey;position:absolute;top:90px;left:100px;width:700px;height:auto;">
<p class="wt">
<table style="position:relative;top:0px;left:130px;text-align:center">
<?php
$m=1;
$qq=mysql_query("select * from questions");
echo '<tr><th><h2>QUESTIONS</h2></th></tr>';
while($row=mysql_fetch_array($qq))
{
echo '<tr><td>';
echo $m.') <a href="hview.php?q='.$row['qid'].'" class="ln1">'.$row['ques'].'</a></td>';
//echo '<td><a href="hview.php?q='.$row['qid'].'" class="ln1">View</a></td>';
echo '</tr>';
$m++;
}
?>
</table>
</p>
</div>

<div id="vline" style="border-left:solid lightgrey;border-left-width:2px;position:absolute;top:30px;left:850px;height:auto;padding:20px;">
<h3 class="wt">FAQ's</h3>
<?php
$q=mysql_query('select * from faqs');
echo '<p style="color:lightgrey;font-family:calibri">';
while($rw=mysql_fetch_array($q))
{
echo $rw['ques'].'<br>';
echo $rw['ans'].'<br><br>';
}
echo '</p>';
?>
</div>

<!--<h3 style="color:lightgrey;position:absolute;left:500px;top:200px">This page is under construction...</h3>-->
</div>

</body>

</html>