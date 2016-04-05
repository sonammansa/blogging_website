<?php
session_start();
$u=$_GET['us']; ?>


<!DOCTYPE html>
<html>
  <head>
    
    <title>Putter-Google Streetview Maps</title>
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
	<link href="css/lightbox-form.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/links.css" rel="stylesheet" />
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
 <script>
function like(v,id)
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

		document.getElementById("mapss").value=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","like.php?type="+v+"&table=maps&s_id="+id,true);
xmlhttp.send();
}

function initialize() {
	


	var l1=document.getElementById('l1').innerHTML;
	var l2=document.getElementById('l2').innerHTML;
	var fenway = new google.maps.LatLng(l1,l2);

        var mapOptions = {
          center: fenway,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
       

     var panoramaOptions = {
          position: fenway,
          pov: {
            heading: 34,
            pitch: 10,
            zoom: 1
          }
        };
        var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
        map.setStreetView(panorama);

      }

function chtitle()
{
var x=document.forms["form1"]["tit"].value;

var t=document.getElementById('title');
t.innerHTML =x;
}

function chcontent()
{
var x=document.forms["form1"]["con"].value;
var t1=document.getElementById('cont');
var t=document.getElementById('content');
t1.style.display="block";
t.innerHTML =x;
}

function chplace()
{
var x=document.forms["form1"]["place"].value;
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
		document.getElementById("l1").innerHTML=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","map1.php?loc="+x,true);
xmlhttp.send();

var xmlhttp1;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
		document.getElementById("l2").innerHTML=xmlhttp1.responseText;
	initialize();
    }
	
  }
xmlhttp1.open("GET","map2.php?loc="+x,true);
xmlhttp1.send();

}

function create()
{
var canvas  = document.getElementById("main");
canvas.innerHTML=document.getElementById("pano").innerHTML;
canvas.innerHTML+=document.getElementById("tx").innerHTML;
var dataUrl = canvas.toDataURL();
window.open(dataUrl, "toDataURL() image", "width=600, height=200");

}


</script>
</head>

<?php
$w=$_GET["what"];


$s=$_GET["pn"];
$_SESSION['putter']=$s;

if($w=="new")
{
?>

<body onload="initialize()">


	<div id="map" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;"></div>
 
  <div id="pano" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;">

</div>

<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;">Title</div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:none;word-wrap: break-word;"><div id="content"></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $_SESSION['username']?></a></div>
</div>


<div style="position:absolute; left:1000px; top: 10px; width: 300px; height: auto;background:white;opacity:0.8;padding:10px;">
<form name="form1" action="mapsave.php" method="post">
Place : <input type="text" name="place" id="place" onchange="chplace()"/><br><br>
<div id="l1" style="display:none">42.345573</div><div id="l2" style="display:none">-71.098326</div><br><br>
Select Putter<select name="p" id="p" >
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$r1=mysql_query("select * from putter where accname='$_SESSION[username]'");
while($myrow = mysql_fetch_array($r1)) {
                        $pname = $myrow['pname'];
			if($s==$pname)
                        echo "<option  value='$pname' selected='selected'>$pname</option>\n";
			else
			echo "<option  value='$pname'>$pname</option>\n";
                    }   

$pn = $_SESSION['putter'];

?>
</select><br><br>
Title : <input type="text" name="tit" value="Title" onkeyup="chtitle()"><br><br>
Content : <input type="text" name="con" placeholder="Content" onkeyup="chcontent()"><br><br>
<input type="submit" value="Done" onclick="getval()">
</form>

</div>

  </body>
<?php
}

else if($w=="view")
{
?>
<div id="shadowing" style="display:block"></div>
<div id="box" style="top:100px;height:130px;display:block;">
  <span id="boxtitle">Streetviews</span>
<form name="form1" method="get" action="maps.php" >
<input type="hidden" name="us" value="<?php echo $u; ?>"/>
<input type="hidden" name="pn" value="">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$n=1;
$r1=mysql_query("select * from maps where accname='$u'");

echo '<select name="what">';
while($myrow = mysql_fetch_array($r1)) {
                        $id = $myrow['id'];
			
                        echo "<option  value='$id'>Streetview-".$n."-".$myrow['putter']."</option>";
			$n++;
                    }   


?>
</select><br><br>
<br>
<input type="submit" class="form" value="Show"/>
<?php
if(isset($_SESSION['username']) && $_GET['us']==$_SESSION['username'])
{ ?>
<input type="button" value="Cancel" class="form" onclick="javascript:window.location.href='main.php?us='">
<?php
} else { ?>
<input type="button" value="Cancel" class="form" onclick="javascript:window.location.href='main.php?us=<?php echo $u; ?> '">
<?php } ?>
</form>
<?php
}

else
{
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("select * from maps where id='$w'");

while($row=mysql_fetch_array($rr))
{
$r1=$row['place'];
$r2=$row['putter'];
$r3=$row['title'];
$r4=$row['caption'];
$r5=$row['date'];
}

?>

<body onload="chplace()">


	 <div id="map" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;"></div>
    <div id="pano" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;">

</div>

<?php if(isset($_SESSION['username'])&& $_GET['us']!=$_SESSION['username'])
{ ?>
<div id="like" style="position:fixed;top:630px;left:50px;background:red">
<?php
$rr=mysql_num_rows(mysql_query("select * from liked where stuff_id='$w' and accname='$_SESSION[username]'"));
if($rr==0) {
	?> <input type="button" id="mapss" value="Like" onclick="like(this.value,'<?php echo $w; ?>')"> <?php }
	else {
	?> <input type="button" id="mapss" value="Unlike" onclick="like(this.value,'<?php echo $w; ?>')"> <?php }
	 ?>
</div>
<?php
} ?>

<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;"><?php echo $r3; ?> </div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto;word-wrap: break-word;"><div id="content"><?php echo $r4; ?></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $u; ?></a><?php echo "|".$r5; ?></div>
</div>
<div id="l1" style="display:none"></div><div id="l2" style="display:none"></div>
<form name="form1" style="display:none">
<input type="text" name="place" value="<?php echo $r1; ?>"/><form name="form1" >


  </body>

<?php
}
?>
</html>



