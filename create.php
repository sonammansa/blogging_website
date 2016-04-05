<?php
session_start();

if(!isset($_SESSION['username']))
{
?>
<meta http-equiv="refresh" content="0;home.php">
<?php
}
else
{ 
?>
<html>
<head>
<title>Create</title>
<link rel="shortcut icon" href="images\favicon.ico">
<script>



function uploading(){

//$_SESSION['putter']=document.forms["form1"]["p"].value;
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
	
	
    	document.getElementById("uploadframe").innerHTML=xmlhttp.responseText;
	
    }
	
  }
xmlhttp.open("GET","upload.php?type=<?php echo $type ?>",true);
xmlhttp.send();

}


</script>
</head>



<body>
<?php

$type = $_GET["type"];
$acc = $_SESSION["username"];
$s="";



if($type=="article"||$type=="photo"||$type=="video"||$type=="slideshow")
{
$s=$_GET["pn"];
$_SESSION['putter']=$s;
?>

<form>
Select Putter<select name="p" id="p" onchange="window.location='setput.php?type=<?php echo $type ?>&value='+this.value" >
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
</form>
<form id="form1" action="upload.php?type=<?php echo $type ?>" method="post" enctype="multipart/form-data" target="uploadframe" onSubmit="uploading()">
Choose image :
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="upload" value="done" />

</form>
<a href="main.php ">Back to my page</a>
<div id="ifrm" width=100% height=100%>
<iframe id="uploadframe" width=100% height=100% name="uploadframe" frameborder="0" ></iframe>
<div id="b" > </div>
 </div>
<?php
}
else
{
$s=$type;
$_SESSION['putter']=$type;
$pn = $_SESSION['putter'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
if($s!="null")
{
$r1=mysql_query("INSERT INTO putter VALUES ('$pn','$_SESSION[username]')");

if(mysql_errno() == 1062)
{
echo 'putter already exists';
echo '<meta http-equiv="refresh" content="1;main.php?us=">';
}
else {
 $myNewFolderPath = "folders/".$acc."/".$pn;
if(!is_dir($myNewFolderPath))
{
 mkdir($myNewFolderPath,0777,true);

}
else
 {
      opendir($myNewFolderPath);
	
   }
echo '<meta http-equiv="refresh" content="0;main.php?us=">';
}
}
else if($s=="null")
echo '<meta http-equiv="refresh" content="0;main.php?us=">';
?>

<?php
}
?>

</body>

</html>

<?php }
?>