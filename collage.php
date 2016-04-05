<?php session_start(); 
$u=$_GET['us']; ?>
<!doctype html>
<html>
<head>
<title>Putter-collage</title>
<link rel="stylesheet" href="css/coll.css"/>
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

		document.getElementById("coll").value=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","like.php?type="+v+"&table=collage&s_id="+id,true);
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
</script>
</head>
<body>
<?php
$w=$_GET['what'];
if($w=="new")
{
$a=array();
$path="temp";
if(!is_dir($path))
{
 mkdir($path,0777,true);

}
else
 {
      opendir($path);
	
   }
$c=0;
for($n=1;$n<=10;$n++)
{
if($_FILES["file".$n]["name"]!="")
{
$c++;
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file".$n]["name"]));
if ((($_FILES["file".$n]["type"] == "image/gif")
|| ($_FILES["file".$n]["type"] == "image/jpeg")
|| ($_FILES["file".$n]["type"] == "image/png")
|| ($_FILES["file".$n]["type"] == "image/jpg")
|| ($_FILES["file".$n]["type"] == "image/pjpeg")
|| ($_FILES["file".$n]["type"] == "image/GIF")
|| ($_FILES["file".$n]["type"] == "image/JPEG")
|| ($_FILES["file".$n]["type"] == "image/PNG")
|| ($_FILES["file".$n]["type"] == "image/JPG")
|| ($_FILES["file".$n]["type"] == "image/PJPEG"))
&& in_array($extension, $allowedExts))
  {
if ($_FILES["file".$n]["error"] > 0)
  {
  echo "Error in uploading file " . "<br />";
  }
else
  {

$_FILES["file".$n]["name"]= $c .'-' .$_FILES["file".$n]["name"];

   if (file_exists($path . "/" . $_FILES["file".$n]["name"]))
      {
      unlink($path . "/" . $_FILES["file".$n]["name"]);
	$a[$c]=$_FILES["file".$n]["name"];
	$name=$_FILES["file".$n]["name"];
	move_uploaded_file($_FILES["file".$n]["tmp_name"],$path . "/" . $_FILES["file".$n]["name"]);
	
      }
    else
      {
	$a[$c]=$_FILES["file".$n]["name"];
	$name=$_FILES["file".$n]["name"];
	move_uploaded_file($_FILES["file".$n]["tmp_name"],$path . "/" . $_FILES["file".$n]["name"]);
	
	}
  }
}
}
}
?>
<div id="photos">
<?php
$t=2*$c;
$b=array();
for($j = 1; $j <= 15; $j++)
{

	$r=array_rand($a, 1);
	//echo array_rand($a, 1);
	echo "<img src='temp/".$a[$r]."'>";
	$b[$j]=$a[$r];
	

}

?>
</div>

<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;">Title</div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto; display:none;word-wrap: break-word;"><div id="content"></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $_SESSION['username']?></a></div>
</div>

<div style="position:absolute; left:1000px; top: 10px; width: 300px; height: auto;background:white;opacity:0.8;padding:10px;">
Refresh page to refresh collage<br><br>
<form name="form1" method="post" action="collsave.php" >
<input type='hidden' name='order' value='<?php echo serialize($b); ?>' />
<input type='hidden' name='nmbr' value='<?php echo $c; ?>' />
<?php
for($k=1;$k<=$c;$k++)
{
?> 
<input type='hidden' name=<?php echo 'im'.$k; ?> value='<?php echo $a[$k]; ?>' />
<?php
}
?>
Select Putter<select name="p" id="p" >
<?php
$s=$_GET["pn"];
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
<input type="submit" value="Save"/>
</form>
</div>
<?php
}
else if($w=="view")
{
?>
<div id="shadowing" style="display:block"></div>
<div id="box" style="top:100px;height:130px;display:block;">
  <span id="boxtitle">Collage</span>
<form name="form1" method="get" action="collage.php" >
<input type="hidden" name="us" value="<?php echo $u; ?>"/>
<input type="hidden" name="pn" value=""><br>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$n=1;
$r1=mysql_query("select * from collage where accname='$u'");

echo '<select name="what">';
while($myrow = mysql_fetch_array($r1)) {
                        $id = $myrow['id'];
			
                        echo "<option  value='$id'>Collage-".$n."-".$myrow['putter']."</option>";
			$n++;
                    }   


?>
</select><br><br><br>
<input type="submit" class="form" value="Show"/>
<?php
if(isset($_SESSION['username']) && $_GET['us']==$_SESSION['username'])
{ ?>
<input type="button" value="Cancel" class="form" onclick="javascript:window.location.href='main.php?us='">
<?php
} else { ?>
<input type="button" value="Cancel" class="form" onclick="javascript:window.location.href='main.php?us=<?php echo $_GET['us']; ?> '">
<?php } ?>
</form>
</div>
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

$rr = mysql_query("select * from collage where id='$w'");

while($row=mysql_fetch_array($rr))
{
$r1=$row['putter'];
$r2=$row['date'];
$r3=$row['title'];
$r4=$row['caption'];
}
?>
<div id="photos">
<?php
$path1="folders/".$u."/".$r1."/collage/".$w;

$k=1;
$doc = new DOMDocument();
$doc->load( $path1."/".$w.".xml");

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

?>
</div>

<?php if(isset($_SESSION['username']) && $_GET['us']!=$_SESSION['username'])
{ ?>
<div id="like" style="position:fixed;top:630px;left:50px;background:red">
<?php
$rr=mysql_num_rows(mysql_query("select * from liked where stuff_id='$w' and accname='$_SESSION[username]'"));
if($rr==0) {
	?> <input type="button" id="coll" value="Like" onclick="like(this.value,'<?php echo $w; ?>')"> <?php }
	else {
	?> <input type="button" id="coll" value="Unlike" onclick="like(this.value,'<?php echo $w; ?>')"> <?php }
	 ?>
</div>
<?php
} ?>

<div id="tx" style="position:fixed; left:50px; top: 520px; width: 350px; height: 100px; background:yellow;">

<div id="title" style="position:absolute; left:20px; top: 10px; width: 310px; height: auto;font-size:30px;font-weight:bold;word-wrap: break-word;"><?php echo $r3; ?> </div>
<div id="cont" style="position:absolute; left:20px; top: 40px; width: 310px;height:auto;word-wrap: break-word;"><div id="content"><?php echo $r4; ?></div></div>
<div id="by" style="position:absolute; left:20px; top: 70px; width: 180px; height: auto;font-size:13px"><a href="main.php?us=<?php echo $u; ?> "><?php echo $u; ?></a><?php echo "|".$r2; ?></div>
</div>
<?php
}
?>
</body>
</html>