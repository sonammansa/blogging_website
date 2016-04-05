<?php session_start(); 
$q=$_GET['q'];
?>
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

.wt
{
color:lightgrey;
font-family:arial;
}

</style>

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

<div id="shadowing"></div>
<div id="boxx" style="height:300px;top:160px">
  <span id="boxtitle"></span>
  <form name="hform" method="post" action="answer.php?id=<?php echo $q; ?>">
      
    <p class="wt">Answer: <br>
      <textarea name="ans" placeholder="Answer" cols="50" rows="10" required="required"></textarea>
    </p>
      
    <p class="wt" style="left:170px;position:absolute;"> 
      <input class="form" type="submit" name="done" value="Done">&emsp;
      <input class="form" type="button" name="cancel" value="Cancel" onClick="closebox('boxx')" >
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
<div id="shadow" style="background-color:grey;position:absolute;top:70px;left:400px;width:500px;height:auto">
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$r=mysql_query("select * from questions where qid='$q'");
while($row=mysql_fetch_array($r))
{
echo '<p class="wt">';
echo $row['ques'];
echo '<br>';
echo "asked by-".$row['accname'];
echo '</p>';
}
if (isset($_SESSION['username']))
{
?>
<input type="button" class="form" value="Answer this question" onclick="openbox('Answer',2,'boxx')">
<?php
} ?>
<div>
<p class="wt">Answers : </p>
<?php
$r1=mysql_query("select * from answers where qid='$q'");
$num=mysql_num_rows($r1);
$m=1;
if($num==0)
{
echo '<p class="wt">No Answers</p>';
}

else
{
while($row1=mysql_fetch_array($r1))
{
echo '<p class="wt">';
echo 'Ans'.$m.')&emsp;';
echo $row1['ans'].'<br>';
echo 'By-'.$row1['accname'];
echo '</p>';
$m++;
}
}
?>
</div>

</div>
<!--<h3 style="color:lightgrey;position:absolute;left:500px;top:200px">This page is under construction...</h3>-->
</div>

</body>

</html>