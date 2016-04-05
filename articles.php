<?php
session_start();
$u=$_GET['us']; 
?>


<!DOCTYPE html>
<html>
<head>


    
    <title>Putter-articles</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
</script>
       <link href="css/lightbox-form.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/links.css" rel="stylesheet" />

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
xmlhttp.open("GET","like.php?type="+v+"&table=articles&s_id="+id,true);
xmlhttp.send();
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

function col()
{
var z=document.forms["form1"]["a5"].value;
if(z=="gray")
{
$("#tx").css("background-color","grey");
}
if(z=="black")
{
$("#tx").css("background-color","black");
}
if(z=="pink")
{
$("#tx").css("background-color","lightpink");
}
if(z=="green")
{
$("#tx").css("background-color","YellowGreen");
}
if(z=="blue")
{
$("#tx").css("background-color","CornflowerBlue ");
}
if(z=="orch")
{
$("#tx").css("background-color","MediumOrchid ");
}
if(z=="yellow")
{
$("#tx").css("background-color","Yellow ");
}
if(z=="teal")
{
$("#tx").css("background-color","Teal");
}
else
return false;
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

<body >

<div id="tx" style="position:fixed; left:0px; top: 0px; width: 1366px; height: 667px;background:CornflowerBlue ;">

<div id="title" style="position:absolute;text-align:center;left:370px;  top: 30px; width: 660px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;">Title</div>
<div id="cont" style="position:absolute;top:100px;left:370px; width: 660px;height:auto; display:none;word-wrap: break-word;"><div id="content" style="text-align:center; "></div></div>
<div id="by" style="position:absolute; left:20px; top: 570px; width: 200px; height: 50px;font-size:13px;background:yellow;"><br>&emsp;By <a href="main.php?us=<?php echo $u; ?> "><?php echo $_SESSION['username']?></a></div>
</div>

<div style="position:absolute; left:1000px; top: 10px; width: 300px; height: auto;background:white;opacity:0.8;padding:10px;">
<form name="form1" action="artsave.php" method="post">
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
Background:
<select id="w5" name="a5" onchange="col()" >
<option value='gray' >gray</option>
<option value='white' >white</option>
<option value='pink'>pink</option>
<option value='green'>green</option>
<option value='blue' selected="selected">blue</option>
<option value='orch'>orch</option>
<option value='yellow'>yellow</option>
<option value='teal'>teal</option>

</select>

<br><br>

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
  <span id="boxtitle">Articles</span>
<form name="form1" method="get" action="articles.php" >
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
$r1=mysql_query("select * from articles where accname='$u'");

echo '<select name="what">';
while($myrow = mysql_fetch_array($r1)) {
                        $id = $myrow['id'];
			
                        echo "<option  value='$id'>Article-".$n."-".$myrow['putter']."</option>";
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
$rr = mysql_query("select * from articles where id='$w'");

while($row=mysql_fetch_array($rr))
{
$r1=$row['title'];
//$r2=$row['putter'];
$r3=$row['content'];
$r4=$row['bgcol'];
$r10=$row['date'];

}
?>
<body onload="col()">
<form name="form1">
<input type="hidden" name="a5" value="<?php echo $r4; ?>">
</form>

 <?php if(isset($_SESSION['username'])&& $_GET['us']!=$_SESSION['username'])
{ ?>
<div id="like" style="position:fixed;top:630px;left:50px;background:red;z-index:10;">
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

<div id="tx" style="position:fixed; left:0px; top: 0px; width: 1366px; height: 667px;">

<div id="title" style="position:absolute;text-align:center;left:370px;  top: 30px; width: 660px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;"><?php echo $r1; ?></div>
<div id="cont" style="position:absolute;top:100px;left:370px; width: 660px;height:auto; display:block;word-wrap: break-word;"><div id="content" style="text-align:center; "><?php echo $r3; ?></div></div>
<div id="by" style="position:absolute; left:20px; top: 570px; width: 200px; height: 50px;font-size:13px;background:yellow;"><br>&emsp;By <a href="main.php?us=<?php echo $u; ?> "><?php echo $u; ?></a><?php echo "|".$r10; ?></div>
</div>
<?php
}
?>
</html>



