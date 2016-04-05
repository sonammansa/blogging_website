<?php
session_start();
$u=$_GET['us']; ?>


<!DOCTYPE html>
<html >

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
</script>
<link href="css/lightbox-form.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/links.css" rel="stylesheet" />
<style>
.load{
background-image:url(img/loader.gif);
background-position:right;
background-repeat:no-repeat;
}
</style>
<script type="text/javascript">

function init()
{
fun();
ll();
}

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
xmlhttp.open("GET","like.php?type="+v+"&table=photos&s_id="+id,true);
xmlhttp.send();
}

function col()
{
var z=document.forms["form1"]["w5"].value;
if(z=="gray")
{
$("#random").css("background-color","grey");
}
if(z=="black")
{
$("#random").css("background-color","black");
}
if(z=="pink")
{
$("#random").css("background-color","lightpink");
}
if(z=="green")
{
$("#random").css("background-color","DarkSeaGreen");
}
else
return false;
}

function effect()
{
var z=document.forms["form1"]["w6"].value;
var im=document.getElementById("kkk").src;
if(z=="negative")
{
$.get('neg1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
if(z=="b & w")
{

$.get('bla1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
if(z=="greenish")
{
$.get('col1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
if(z=="bright")
{
$.get('bri1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
if(z=="sharpen")
{
$.get('sha1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
if(z=="bluish")
{
$.get('blu1.php?im='+im,function(data){
	$("#kkk").attr("src","temp/new1.jpg");	
});
}
else 
return false;
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

function ll()
{ var f=$("#fff").val();
  $("#title").css("font-family",f);
}

function kk()
{
	var k=$("#text1").val();
	$("#title").html(k);	
}

function fun()
{
var z=document.forms["form1"]["w4"].value;
if(z=="left")
{
$("#tx").css("left","50px");
	$("#tx").css("top","520px");
}
if(z=="right")
{
$("#tx").css("left","1000px");
	$("#tx").css("top","520px");
}
if(z=="bottom")
{
$("#tx").css("left","500px");
	$("#tx").css("top","520px");
}
else 
return false;
}

function side()
{
var z=document.forms["form1"]["w3"].value;

if(z=="Full screen")
{
$("#kkk").css("height","100%");
$("#kkk").css("width","1000");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","100%");
$("#kkk").css("top","0%");
}
if(z=="On right")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","50%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","380%");
$("#kkk").css("top","15%");
}

if(z=="On left")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","50%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","105%");
$("#kkk").css("top","15%");
}
if(z=="In between")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","50%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","250%");
$("#kkk").css("top","15%");
}
else 
return false;
}


/*function fun11()
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
	alert(String(xmlhttp.responseText));
	document.getElementById('kkk').src=String(xmlhttp.responseText);
    	//$("#uploadframe").attr("src",xmlhttp.responseText);
	
    }
	
  }
xmlhttp.open("GET","upload.php?type=photos",true);
xmlhttp.send();
}*/

function crawl()
{
$('#l').addClass('load');
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
		openbox('Photos',2,'sbox');
		document.getElementById("lform").innerHTML =xmlhttp.responseText;
		$('#l').removeClass('load');
	//document.getElementById("form2").createElement("input");
    }
	
  }
xmlhttp.open("GET","p_crawl.php",true);
xmlhttp.send();

}

function img(i)
{
var s=document.getElementById(i).src;
//alert(s);
//alert(ss);

closebox('sbox');

document.getElementById("kkk").src=s;
}

function fun11()
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
	document.getElementById("kkk").src= "temp/new1.jpg";
	//alert(String(xmlhttp.responseText));
	//document.getElementById('kkk').src=String(xmlhttp.responseText);
    	//$("#uploadframe").attr("src",xmlhttp.responseText);
	
    }
	
  }
xmlhttp.open("GET","upload.php?type=photos",true);
xmlhttp.send();

}

/*function init()
{
var t=document.getElementById("uploadframe");
var oImg=document.createElement("img");
oImg.setAttribute('src', 'img/1.jpg');
oImg.setAttribute('alt', '');
oImg.setAttribute('height', '667px');
oImg.setAttribute('width', '1366px');
document.t.appendChild(oImg);
//document.getElementById("uploadframe").innerHTML='<img border="0" name="rr" src="img/1.jpg" alt="" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;" id="kkk">';
}*/

</script>
</head>

<?php
$w=$_GET["what"];


$s=$_GET["pn"];
$_SESSION['putter']=$s;

if($w=="new")
{
?>

<body id="random">
<div id="shadowing"></div>
<div id="sbox" style="position:absolute;height:300px;width:500px;top:100px">
  <span id="boxtitle" style="width:600px"></span>
  <form name="lform" id="lform">

</form>
</div>

<img border="0" src="img/1.jpg" alt="" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;" id="kkk">


<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;">Title</div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:none;word-wrap: break-word;"><div id="content"></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $_SESSION['username']?></a></div>
</div>

<div style="position:absolute; left:1000px; top: 10px; width: 300px; height: auto;background:white;opacity:0.8;padding:10px;">
<form id="form" onsubmit="fun11()" action="upload.php?type=photos" method="post" enctype="multipart/form-data" target="kkk" >
Choose image :
<input type="file" name="file" id="file"  /> 
<br><input type="submit" name="upload" value="upload"  />
</form>
<br>or<br>
<input type="button" value="Choose from here" id="l" onclick="crawl()">
<form id="form1" action="photsave.php" method="post"  >
 
<br><br>
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

Photo Effects :
<select id="w6" name='a6' onchange="effect()" >
<option value="none">None</option>
<option value='negative'>negative</option>
<option value='b & w'>b & w</option>
<option value='greenish'>greenish</option>
<option value='bright'>bright</option>
<option value='sharpen'>sharpen</option>
<option value='bluish'>bluish</option>
</select>
</br><br>

Title : <input type="text" name="tit" value="Title" onkeyup="chtitle()"><br><br>
Content : <input type="text" name="con" placeholder="Content" onkeyup="chcontent()"><br><br>

<!--<p>Description</p>
<textarea  id="text1" onkeyup=kk() name="tt"></textarea>-->
 
Title style :<select id="fff" name='sss' onchange=ll() >
<option value='algerian' >algerian</option>
<option value='arial black' >arial black</option>
<option value='bimini' >bimini</option>
<option value='chiller' >chiller</option>
<option value='comic sans ms' >comic sans ms</option>
<option value='bookman old style' >bookman old style</option>
<option value='britannic bold' >britannic bold</option>
<option value='brush script mt' >brush script mt</option>
<option value='century gothic' >century gothic</option>
<option value='cursive' >cursive</option>
<option value='footlight mt light' >footlight mt light</option>
<option value='garamond' >garamond</option>
<option value='helvetica' >helvetica</option>
<option value='impact' >impact</option>
<option value='lucida console' >lucida console</option>
<option value='matura mt script capitals' >matura mt script capitals</option>
<option value='playbill' >playbill</option>
<option value='puppylike' >puppylike</option>
<option value='swis721 bt' >swis721 bt</option>
<option value='tempus sans itc' >tempus sans itc</option>
<option value='times' >times</option>
<option value='times new roman' selected="selected">times new roman</option>
<option value='verdana' >verdana</option>
<option value='westminster' >westminster</option>
<option value='wide latin' >wide latin</option>
</select><br><br>


Text position: <select id="w4" name='a4' onchange="fun()" >
<option value='left' selected="selected">left</option>
<option value='right'>right</option>
<option value='bottom'>bottom</option>
</select>

<br><br>
<input type="submit" name="save" value="Save"   />



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
  <span id="boxtitle">Photos</span>
<form name="form1" method="get" action="photos.php" >
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
$r1=mysql_query("select * from photos where accname='$u'");

echo '<select name="what">';
while($myrow = mysql_fetch_array($r1)) {
                        $id = $myrow['id'];
			
                        echo "<option  value='$id'>Photo-".$n."-".$myrow['putter']."</option>";
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
$rr = mysql_query("select * from photos where id='$w'");

while($row=mysql_fetch_array($rr))
{
$r1=$row['image'];
$r2=$row['putter'];
$r3=$row['title'];
$r4=$row['content'];
$r5=$row['t_style'];
$r6=$row['position'];
$r7=$row['date'];
}
?>
<body onload="init()">
<img border="0" src="<?php echo $r1; ?>" alt="" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;" id="kkk">
<form name="form1">
<input type="hidden" id="fff" value="<?php echo $r5; ?>">
<input type="hidden" id="w4" value="<?php echo $r6; ?>">
</form>

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

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;"><?php echo $r3; ?></div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:block;word-wrap: break-word;"><div id="content"><?php echo $r4; ?></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $u; ?></a><?php echo "|".$r7; ?></a></div>
</div>
</body>
<?php
}
?>

</html>