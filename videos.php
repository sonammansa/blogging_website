<?php
session_start();
$u=$_GET['us']; ?>

<html >

<head>
<title>Putter-Videos</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
</script>
<link href="css/links.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/lightbox-form.css" rel="stylesheet" />
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
mode();
font();
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
xmlhttp.open("GET","like.php?type="+v+"&table=videos&s_id="+id,true);
xmlhttp.send();
}

function col()
{
var z=document.forms["form1"]["a5"].value;
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
$("#nn").css("color","black");
}
if(z=="green")
{
$("#random").css("background-color","YellowGreen");

}
if(z=="blue")
{
$("#random").css("background-color","CornflowerBlue ");

}
if(z=="orch")
{
$("#random").css("background-color","MediumOrchid ");

}
if(z=="yellow")
{
$("#random").css("background-color","Yellow ");

}
if(z=="teal")
{
$("#random").css("background-color","Teal");

}
else
return false;
}






function ll()
{ var f=$("#fff").val();
  $("#title").css("font-family",f);
}

function font()
{ var m=$("#ppp").val();
  $("#title").css("font-size",m);
}



function kk()
{
var k=document.getElementById('text1').value;
document.getElementById('title').innerHTML=k;
	//var k=$("#text1").val();
	//$("#nn").html(k);	
}

function fun()
{
var z=document.forms["form1"]["w4"].value;
if(z=="left")
{
$("#tx").css("left","50px");
	$("#tx").css("top","520px");
}
if(z=="middle")
{
$("#tx").css("left","500px");
	$("#tx").css("top","520px");
}
if(z=="right")
{
$("#tx").css("left","1000px");
	$("#tx").css("top","520px");
}
else 
return false;
}


function fun11()
{

var k= $("#file").val();
var x=String(k);
var l=x.substring(12);

setTimeout(function(){
$("#kkk").attr('src','upload/'+l);
},1000);

}

/*function side()
{
var z=document.forms["form1"]["a3"].value;
if(z=="On right")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","28%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","70%");
$("#kkk").css("top","15%");
}

if(z=="On left")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","30%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","20%");
$("#kkk").css("top","15%");
}
if(z=="In between")
{
$("#kkk").css("height","75%");
$("#kkk").css("width","28%");
$("#kkk").css("z-index","-1");
$("#kkk").css("left","49%");
$("#kkk").css("top","15%");
}
else 
return false;
}*/

function mode()
{
var z=document.forms["form1"]["a2"].value;
if(z=="big")
{
$("#kkk").css("height","650");
$("#kkk").css("width","1200");
//$("#kkk").css("z-index","-1");
$("#kkk").css("left","50px");
$("#kkk").css("top","20px");
}

if(z=="normal")
{
$("#kkk").css("height","600px");
$("#kkk").css("width","1100px");
//$("#kkk").css("z-index","-1");
//$("#kkk").css("position","absolute");
$("#kkk").css("left","100px");
$("#kkk").css("top","50px");
}

if(z=="small")
{
$("#kkk").css("height","400");
$("#kkk").css("width","800");
//$("#kkk").css("z-index","-1");
$("#kkk").css("left","250px");
$("#kkk").css("top","150px");
}
else 
return false;
}

function vidch()
{
var s=document.forms["form1"]["v"].value;
var sb=s.substr(31,11);
//alert(sb);

document.getElementById("vid").value="http://youtube.com/embed/"+sb;
document.getElementById("kkk").src="http://youtube.com/embed/"+sb;

}

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
		openbox('Videos',2,'sbox');
		document.getElementById("form2").innerHTML =xmlhttp.responseText;
		$('#l').removeClass('load');
	//document.getElementById("form2").createElement("input");
    }
	
  }
xmlhttp.open("GET","v_crawl.php",true);
xmlhttp.send();

}

function again()
{
document.getElementById("vid").value=document.getElementById("kkk").src;
}

function img(i)
{
var s=document.getElementById(i).src;
//alert(s);
var ss=s.substr(26,11);
//alert(ss);

closebox('sbox');

document.getElementById("kkk").src="http://youtube.com/embed/"+ss;


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
  <form name="form2" id="form2">
<input type="submit" value="Search" class="form" >
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
</form>
</div>
<!--<form id="form" onsubmit="fun11()" action="upload.php" method="post" enctype="multipart/form-data" >
Choose image :
<input type="file" name="file" id="file"  /> 
<input type="submit" name="upload" value="done"  />

</form>-->

<iframe width="1100" height="600" controls="controls" style="position:absolute;left:100px;top:50px;" name="kkk" id="kkk" src="http://www.youtube.com/embed/4RSR3RJnUHE">
  </iframe>
  
<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;">Title</div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:none;word-wrap: break-word;"><div id="content"></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $_SESSION['username']?></a></div>
</div>

<div style="position:absolute; left:1000px; top: 10px; width: 300px; height: auto;background:white;opacity:0.8;padding:10px;">
<form name="form1" onsubmit="again()" action="vidsave.php" method="post" >
Video url :<input type="text" name="v" id="v" onchange="vidch()">
<br>Or<br>
<input type="button" value="Choose from here" id="l" onclick="crawl()"/>
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

<p>Set the Mood</p>
<select id="w5" name="a5" onchange="col()" >
<option value='gray' >gray</option>
<option value='white' selected="selected">white</option>
<option value='black'>black</option>
<option value='pink'>pink</option>
<option value='green'>green</option>
<option value='blue'>blue</option>
<option value='orch'>orch</option>
<option value='yellow'>yellow</option>
<option value='teal'>teal</option>

</select>

<br><br>
Title : <input type="text" name="tit" value="Title" onkeyup="chtitle()"><br><br>
Content : <input type="text" name="con" placeholder="Content" onkeyup="chcontent()"><br><br>

Text style :<select id="fff" name='sss' onchange="ll()">
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
<option value='times new roman' selected="selected" >times new roman</option>
<option value='verdana' >verdana</option>
<option value='westminster' >westminster</option>
<option value='wide latin' >wide latin</option>

</select>
<br><br>

Text size :<select id="ppp" name='so' onchange="font()">
<option value='10' selected="selected">10</option>
<option value='12' >12</option>
<option value='14' >14</option>
<option value='16' >16</option>
<option value='18' >18</option>
<option value='20' >20</option>
<option value='22' >22</option>
<option value='24' >24</option>
<option value='26' >26</option>
<option value='28' >28</option>
<option value='30' >30</option>
<option value='32' >32</option>
<option value='34' >34</option>
<option value='36' >36</option>
<option value='38' >38</option>
<option value='40' >40</option>
<option value='42' >42</option>
</select>

<br><br>
Video size :<select id="w2" name='a2' onchange="mode()" >
<option value='big' >big</option>
<option value='small'>small</option>
<option value='normal' selected="selected">Normal</option>
</select>
<br><br>

Text position :
<select id="w4" name='a4' onchange="fun()" >
<option value='left'>left</option>
<option value='right'>right</option>
<option value='middle'>middle</option>
</select>
<!--<select id="w3" name='a3' onchange="side()" style="position:absolute;left:1%;bottom:44%;">
<option value='On right' >On right</option>
<option value='On left'>On left</option>
<option value='In between'>In between</option>
</select>-->

<br><br>
<input type="hidden" name="vid" id="vid" value="http://www.youtube.com/embed/4RSR3RJnUHE" />

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
  <span id="boxtitle">Videos</span>
<form name="form1" method="get" action="videos.php" >
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
$r1=mysql_query("select * from videos where accname='$u'");

echo '<select name="what">';
while($myrow = mysql_fetch_array($r1)) {
                        $id = $myrow['id'];
			
                        echo "<option  value='$id'>Video-".$n."-".$myrow['putter']."</option>";
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
$rr = mysql_query("select * from videos where id='$w'");

while($row=mysql_fetch_array($rr))
{
$r1=$row['video'];
//$r2=$row['putter'];
$r3=$row['bgcol'];
$r4=$row['content'];
$r10=$row['title'];
$r5=$row['date'];
$r6=$row['size'];
$r7=$row['position'];
$r8=$row['t_size'];
$r9=$row['t_style'];
}
?>
<body bgcolor= <?php echo $r3; ?> onload="init()">
<form name="form1">
<input type="hidden" name="a2" value="<?php echo $r6; ?>">
<input type="hidden" id="w4" value="<?php echo $r7; ?>">
<input type="hidden" id="ppp" value="<?php echo $r8; ?>"><input type="hidden" id="fff" value="<?php echo $r9; ?>">
</form>
<iframe width="1100" height="600" controls="controls" style="position:absolute;left:100px;top:50px;" name="kkk" id="kkk" src="<?php echo $r1; ?> ">
  </iframe>
  
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

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;"><?php echo $r10; ?></div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:block;word-wrap: break-word;"><div id="content"><?php echo $r4; ?></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $u; ?></a><?php echo "|".$r5; ?></div>
</div>


</body>
<?php
}
?>

</html>