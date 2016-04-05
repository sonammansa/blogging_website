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
</head>
<body bgcolor=#2a2a2a>
<?php
if(isset($_SESSION['admin']))
{ ?>
<h1 id="n" >
<font face="Segoe Print" color="White">Welcome Admin!</font>
</h1><hr>

<a href="logout.php" class="ln" style="float:right;">Logout</a>
<br><br>



<?php
} else
{
echo '<meta http-equiv="refresh" content="0;home.php">';
}
?>
</body>
</html>