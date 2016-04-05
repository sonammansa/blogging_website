<?php
session_start();
if(!isset($_SESSION['username']))
{

$u=$_GET['us'];

}
else
{
$u=$_SESSION['username'];
}
if(!isset($_SESSION['username']) && ($_GET['us']=="" || $_GET['us']=="#"))
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
?>
<html>

<head><title><?php echo $u;  ?></title></head>
<link href="css/links.css" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet" />
<link rel="stylesheet" href="css/coll.css"/>
<link href="css/lightbox-form.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<style>
.wt
{
color:lightgrey;
font-family:arial;
}
</style>
<script>
function val()
{
var fu1 = document.getElementById("f1").value;
var fu2 = document.getElementById("f2").value;
var fu3 = document.getElementById("f3").value;
var fu4 = document.getElementById("f4").value;
var fu5 = document.getElementById("f5").value;
var fu6 = document.getElementById("f6").value;
var fu7 = document.getElementById("f7").value;
var fu8 = document.getElementById("f8").value;
var fu9 = document.getElementById("f9").value;
var fu10 = document.getElementById("f10").value;
var c=0;
if (fu1=="") c++;
if (fu2=="") c++;
if (fu3=="") c++;
if (fu4=="") c++;
if (fu5=="") c++;
if (fu6=="") c++;
if (fu7=="") c++;
if (fu8=="") c++;
if (fu9=="") c++;
if (fu10=="") c++;
if(c>6) { alert("upload atleast 4 images"); return false; }
else	return true;

}
function myFunction()
{

var name=prompt("Please enter name of putter","");

if (name!="")
  {
 window.location.href = "create.php?type="+name+"&pn=";
  }
else
 {
	
	window.location.href = "main.php?us=" ;
 }
}

function newdiv()
{
document.getElementById('new').style.display="block";
document.getElementById('createnew').onclick="closediv()";
}

function closediv()
{
document.getElementById('new').style.display=none;
}

function like(v,table,id)
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
	if(table=="maps")
		document.getElementById("mapss").value=xmlhttp.responseText;
	elseif(table=="collage")
		document.getElementById("coll").value=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","like.php?type="+v+"&table="+table+"&s_id="+id,true);
xmlhttp.send();
}

</script>

<body bgcolor= #2a2a2a>
<div id="shadowing"></div>
<div id="sbox" >
  <span id="boxtitle"></span>
<form name="form2" action="search.php" method="post">
<p class="wt">Username : <input type="text" name="us"></p>
<br><br>
<input type="submit" value="Search" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
</form>
</div>

<div id="shadowing"></div>
<div id="boxx" style="top:200px;height:80px;">
  <span id="boxtitle"></span>

<?php
if(isset($_SESSION['username']) && $_GET['us']!="")
{ ?>
<form name="form2" action="view.php?us=<?php echo $_GET['us']; ?> " method="post" style="align:center">
<?php
}
else
{ ?>
<form name="form2" action="view.php?us=<?php echo $u; ?> " method="post" style="align:center">
<?php }
?>
<select name="view">
<option value="collage">Collage</option>
<option value="maps">Streetviews</option>
<option value="photos">Photos</option>
<option value="videos">Videos</option>
<option value="articles">Articles</option>
<option value="slideshow">Slideshow</option>
</select>
<br><br>
<input type="submit" value="View" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('boxx')">
</form>
</div>
<?php if(isset($_SESSION['username']))
{
?>
<div id="shadowing"></div>
<div id="box" style="top:100px;height:500px;">
  <span id="boxtitle"></span>
<form name="form1" action="collage.php?pn=myputter&what=new&us=<?php echo $u; ?>" method="post" enctype="multipart/form-data" onsubmit="return val()">
<p class="wt">Upload images : (maximum 10)</p><br>
<p class="wt">Image : </p><input type="file" name="file1" id="f1" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file2" id="f2" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file3" id="f3" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file4" id="f4" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file5" id="f5" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file6" id="f6" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file7" id="f7" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file8" id="f8" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file9" id="f9" class="wt" /><br>
<p class="wt">Image : </p><input type="file" name="file10" id="f10" class="wt" /><br><br>
<input type="submit" value="Create" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('box')">
</form>
</div>

<?php
}
else
{
?>
<div id="shadowing"></div>
<div id="box">
  <span id="boxtitle"></span>
  <form name="loginform" method="post" action="login.php" target="_parent">
      <br>
    <p class="wt">Username: <br>
      <input id="accname" type="text" name="accname" placeholder="username" maxlength="60" size="60">
    </p><br>
      
    <p class="wt">Password<br>
      <input type="password" name="password" placeholder="Password">

    </p>
      <br>
	<p class="wt">
	<font size=2>New user? <a class="ln" href="1.php" > Register</a> here.</font>
	</p>
	<p class="wt">
	<font size=2>Login as <a class="ln" href="#" style="color:yellow;" onclick="openbox('Admin Login', 2,'box1')"> Admin !</a></font>
	</p>
    <br>
    <p class="wt" style="left:170px;position:absolute;"> 
      <input style="width:60px;" class="form" type="submit" name="Login" value="Login">&emsp;
      <input style="width:60px;" class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box')" >
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
    </p><br>
      
    <p class="wt">Password<br>
      <input type="password" name="pas" placeholder="Password">

    </p>
      <br><br/>
	
    <p class="wt" style="left:170px;position:absolute;"> 
      <input style="width:60px;" class="form" type="submit" name="Login" value="Login">&emsp;
      <input style="width:60px;" class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box1')" >
    </p>
  </form>
</div>

<?php
}

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
<?php if(isset($_SESSION['username']))
{
?>
<a href="main.php?us=">
<?php
}
else { ?> <a href="home.php"> <?php } ?> <h1 style="float:left;margin-top:46px;color:pink;font-size:29px;font-weight:bold;">  UTTER..</h1></a>
<?php
echo '<h1 style="margin-top:43px;color:#0bf;width:550px;font-weight:bold;"><font size=5px face="Segoe Print">'.$a.'</font> </h1>'; 
?>
</div>
<?php
if(isset($_SESSION['username']))
{
?>
<div id="tabs">
<!--<a id="createnew" class="but" href="#" onclick="newdiv()" >Create new</a> &emsp;&emsp;&emsp;&emsp;-->
<a class="but" href="#" onclick="openbox('Search',2,'sbox')">Search</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="help.php" >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="contactus.php" >Contact Us</a>&emsp;&emsp;&emsp;&emsp;
<a class="but" href="logout.php">Logout</a>
</div>

<!--<div id="new">
<a class="newt" href="http://localhost/minor/create.php?type=article&pn=myputter">Article</a>&emsp;&emsp;&emsp;&emsp;
<a class="newt" href="http://localhost/minor/create.php?type=photo&pn=myputter">Photo</a>&emsp;&emsp;&emsp;&emsp;
<a class="newt" href="http://localhost/minor/create.php?type=video&pn=myputter">Video</a>&emsp;&emsp;&emsp;&emsp;<br><br>
<a class="newt" href="#" onclick="openbox('Collage', 2,'box')">Collage</a>&emsp;&emsp;&emsp;&emsp;
<a class="newt" href="http://localhost/minor/create.php?type=slideshow&pn=myputter">Slideshow</a>&emsp;&emsp;&emsp;&emsp;
<a class="newt" href="http://localhost/minor/maps.php?what=new&pn=myputter&us=<?php echo $u; ?>">Streetview map</a>&emsp;&emsp;&emsp;&emsp;<br><br>
<a class="newt" href="#" onclick="myFunction()">new putter</a>
</div>-->
<?php
}
else
{
?>
<div id="tabs">
<a class="but" href="#" onClick="openbox('Login', 2,'box')">Login</a> &emsp;&emsp;&emsp;&emsp;
<a class="but" href="#" onclick="openbox('Search',2,'sbox')">Search</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="help.php" >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="contactus.php" >Contact Us</a>
</div>
<?php
} 
?>

</div>



<?php
$dom = new DOMDocument();
$html="main.php";
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);
$divContent = $xpath->query('div[id="who"]');
if(((isset($_SESSION['username']) && $_GET['us']!="")) || (!isset($_SESSION['username'])) )
{
?>
<div id="who" style="position:absolute;left:550px;top:280px;width:150px;">
<h2 style="color:yellow;font-size:50px;font-style:italic;">
<?php  echo $_GET['us']; ?>
</h2><br>
<a href="#" onclick="openbox('View',2,'boxx')" class="form" style="text-decoration:none;">View all my stuff here</a>
</div>
<?php
}

else
{
?>
<div id="who" style="position:absolute;left:100px;top:150px;width:1120px;">
<h2 style="color:yellow;font-size:30px;font-style:italic;float:left">
<?php  echo $u; ?>
</h2>
<a href="#" onclick="openbox('View',2,'boxx')"  class="form" style="text-decoration:none;position:absolute;top:5px;left:1000px">View all my stuff</a>
</div>
<?php
}

if(((isset($_SESSION['username']) && $_GET['us']!="")) || (!isset($_SESSION['username'])) )
{
}
else
{
?>

<div style="position:absolute;top:200px;">
<br>
<hr style="position:absolute;width:350px;left:250px">
<p class="wt" style="position:absolute;left:622px;top:8px;width:110px;font-size:20px">Create new</p>
<hr style="position:absolute;width:360px;left:740px"><br>

<div style="position:absolute;left:130px;width:1200px"> 

<div style="float:left"><a href="http://localhost/minor/photos.php?what=new&pn=myputter&us=<?php echo $u; ?>"><img src="img/1.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:140px;top:240px;color:white;font-family:Comic Sans MS">PHOTOS</div></a></div>
<div style="float:left"><a href="http://localhost/minor/videos.php?what=new&pn=myputter&us=<?php echo $u; ?>"><img src="img/2.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:500px;top:240px;color:white;font-family:Comic Sans MS">VIDEOS</div></div>
<div style="float:left"><a href="#" onclick="openbox('Collage', 2,'box')"><img src="img/3.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:850px;top:240px;color:white;font-family:Comic Sans MS">COLLAGE</div></a></div>
<div style="float:left"><a href="http://localhost/minor/articles.php?what=new&pn=myputter&us=<?php echo $u; ?>"><img src="img/5.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:140px;top:490px;color:white;font-family:Comic Sans MS">ARTICLE</div></div>
<div style="float:left"><a href="http://localhost/minor/maps.php?what=new&pn=myputter&us=<?php echo $u; ?>"><img src="img/6.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:500px;top:490px;color:white;font-family:Comic Sans MS">STREETVIEW</div></a></div>
<div style="float:left"><a href="#" onclick="myFunction()"><img src="img/newp.jpg" width=300 height=200 style="padding:30px"/><div style="position:absolute;left:850px;top:490px;color:white;font-family:Comic Sans MS">NEW PUTTER</div></a></div>

</div>
<?php

/*$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$res= mysql_query("SELECT * FROM stuff where accname='$_SESSION[username]'");
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

$res1= mysql_query("SELECT * FROM maps where accname='$u'");

	
if (!$res1)
{
    die('Invalid query: ' . mysql_error());
}

function lat($loc)
{
$string=str_replace(" ","+",urlencode($loc));

   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
   $response = json_decode(curl_exec($ch), true);
 
   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
   if ($response['status'] != 'OK') {
    echo "error";
   }
 
   //print_r($response);
 echo "       ";
   $geometry = $response['results'][0]['geometry'];
 
    return $geometry['location']['lat'];
}

function long($loc)
{
$string=str_replace(" ","+",urlencode($loc));

   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
   $response = json_decode(curl_exec($ch), true);
 
   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
   if ($response['status'] != 'OK') {
    echo "error";
   }
 
   //print_r($response);
 echo "       ";
   $geometry = $response['results'][0]['geometry'];
 
   
    return $geometry['location']['lng'];
}


while($row = mysql_fetch_array($res1))
  {
 	$i=$row['id'];
	$p1=$row['place'];
	$p2=$row['title'];
	$put=$row['putter'];
	$lat=lat($p1);
	$long=long($p1);
	$rr=mysql_num_rows(mysql_query("select * from liked where stuff_id='$i' and accname='$u'"));
	echo '<a href="maps.php?pn='.$put.'&what='.$i.'&us='.$u.'"><img src="http://maps.googleapis.com/maps/api/streetview?size=500x300&location='.$lat.','.$long.'&sensor=false"/></a>';
	if(isset($_SESSION['username'])) 
	{
	if($rr==0) {
	?> <input type="button" id="mapss" value="Like" onclick="like(this.value,'maps','<?php echo $i; ?>')"> <?php }
	else {
	?> <input type="button" id="mapss" value="Unlike" onclick="like(this.value,'maps','<?php echo $i; ?>')"> <?php }
	}
	//echo '<a class="ln" href="maps.php?pn='.$put.'&what='.$i.'">'.$p1.'/'.$p2.'</a>';
	echo "&emsp;&emsp;";
	
  }

$res2= mysql_query("SELECT * FROM collage where accname='$u'");
if (!$res1)
{
    die('Invalid query: ' . mysql_error());
}	

while($row = mysql_fetch_array($res2))
  {
	$put=$row['putter'];
	$i=$row['id'];
	echo '<div id="photos" style="height:300px;width:500px;"><a href="collage.php?pn='.$put.'&what='.$i.'&us='.$u.'">';
 	$i=$row['id'];
	$put=$row['putter'];
	$path1="folders/".$u."/".$put."/collage/".$i;

	$rr=mysql_num_rows(mysql_query("select * from liked where stuff_id='$i' and accname='$u'"));
	$k=1;
	$doc = new DOMDocument();
	$doc->load( $path1."/".$i.".xml");

	$orders = $doc->getElementsByTagName( "order" );
	foreach( $orders as $order )
	{
	for($m=1;$m<=15;$m++)
	{
	$img = $order->getElementsByTagName( "image".$m );
	$ar[$k] = $img->item(0)->nodeValue;
	$k++;
	}
	}
	for($j = 1; $j <= 15; $j++)
	{
	echo "<img src=".$path1."/".$ar[$j].">";
	}
	//echo '<a href="collage.php?pn='.$put.'&what='.$i.'&us='.$u.'">'.$i.'</a>';
	echo '</a>';
	if(isset($_SESSION['username'])) 
	{
	if($rr==0) {
	?> <input type="button" id="coll" value="Like" onclick="like(this.value,'collage','<?php echo $i; ?>')"> <?php }
	else {
	?> <input type="button" id="coll" value="Unlike" onclick="like(this.value,'collage','<?php echo $i; ?>')"> <?php }
	}
	echo '</div>';
	echo "&emsp;&emsp;";
  }  

*/	
	  
?>
</div>
<?php
}
?>
</body>
</html>