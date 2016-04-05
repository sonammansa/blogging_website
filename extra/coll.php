<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>Putter-collage</title>
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
</script>
</head>
<body>
<?php
$w=$_GET['what'];
$s=$_GET['pn'];
?>
<form name="form1" action="collage.php?pn=<?php echo $s; ?>&what=<?php echo $w; ?>" method="post" enctype="multipart/form-data" onsubmit="return val()">
Upload images : (maximum 10)<br><br>
Image : <input type="file" name="file1" id="f1" /><br><br>
Image : <input type="file" name="file2" id="f2" /><br><br>
Image : <input type="file" name="file3" id="f3" /><br><br>
Image : <input type="file" name="file4" id="f4" /><br><br>
Image : <input type="file" name="file5" id="f5" /><br><br>
Image : <input type="file" name="file6" id="f6" /><br><br>
Image : <input type="file" name="file7" id="f7" /><br><br>
Image : <input type="file" name="file8" id="f8" /><br><br>
Image : <input type="file" name="file9" id="f9" /><br><br>
Image : <input type="file" name="file10" id="f10" /><br><br>
<input type="submit" value="Create">
</form>
</body>
</html>