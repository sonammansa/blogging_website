<?php
session_start();

$type=$_GET["type"];

$path="temp";
if(!is_dir($path))
{
 mkdir($path,0777,true);

}
else
 {
      opendir($path);
	
   }

$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/GIF")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/PNG")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/PJPEG"))
&& in_array($extension, $allowedExts))
  {
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error in uploading file " . "<br />";
  }
else
  {

$_FILES["file"]["name"]= 'new1.jpg';
   if (file_exists($path . "/" . $_FILES["file"]["name"]))
      {
	   unlink($path . "/" . $_FILES["file"]["name"]);
       move_uploaded_file($_FILES["file"]["tmp_name"],$path . "/" . $_FILES["file"]["name"]);
	$p=$path . "/" . $_FILES["file"]["name"];
	//echo $p;
	
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],$path . "/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . $path . "/" . $_FILES["file"]["name"];
	$p=$path . "/" . $_FILES["file"]["name"];
	//echo $p;
	//echo '<iframe id="kkk" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;" src="'.$p.'>
//</iframe>';
	//echo '<img border="0" name="rr" src="'.$p.'" alt="" style="position:absolute; left:0px; top: 0px; width: 1366px; height: 667px;" id="kkk">';
	
	 

  }
  }
  }
else
  {
  echo "Invalid file";
  }


?>

</html>
