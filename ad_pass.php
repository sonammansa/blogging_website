<?php session_start(); ?>
<!doctype html>
<html>
<head><title>admin</title>
<link href="css/links.css" rel="stylesheet" />
<style>
#n {
     text-shadow: 0 0 10px #fff,
                   0 0 20px #fff,
                   0 0 30px #fff,
                   0 0 40px blue,
                   0 0 70px blue,
                   0 0 80px blue,
                   0 0 100px blue,
                   0 0 150px blue;
text-align:center;
}
</style>
<script>


function validateform()
{
var k=0;

if(document.forms["f1"]["new"].value!=document.forms["f1"]["new1"].value)
{alert("Both passwords dont match!");
k=1;
return false;
}
if(k==0)
 return true;

}

function oldpass()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById("pp").innerHTML=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","ad_passf.php?old=document.forms["f1"]["old"].value",true);
xmlhttp.send();
}

function passmatch()
{
var p1=document.forms["f1"]["new"].value;
var p2=document.forms["f1"]["new1"].value;

if(p1!=p2)
document.getElementById("pwd").innerHTML="<font color=red>Both Passwords dont match</font>";
else
document.getElementById("pwd").innerHTML="";
}
</script>
</head>
<body bgcolor=#2a2a2a>
<?php
if(isset($_SESSION['admin']))
{ ?>
<h1 id="n" >
<font face="Segoe Print" color="White">Welcome Admin!</font>
</h1><hr>
<a href="adminpage.php" class="ln" style="float:right;">My Page</a><br>
<a href="logout.php" class="ln" style="float:right;">Logout</a>

<br><br>

<div style="align:center;position:absolute;left:500px;top:200px;">
<form name="f1" style="color:white;" action="ad_passf.php" method="post" onsubmit="return validateform()">
Old password : <input type="password" name="old" required="required" onchange="oldpass()"><br>
<div id="pp"></div><br><br>
New password : <input type="password" name="new" required="required"><br><br>
Confirm new password : <input type="password" name="new1" required="required" onchange="passmatch()"><br>
<div id="pwd"></div><br><br>
<input class="form" type="submit" value="Change">
</form>
</div>

<?php
} else
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
?>
</body>
</html>