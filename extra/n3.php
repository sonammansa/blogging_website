<html>
<head>
<title>terms and conditions</title>
<link href="css/login-box.css" rel="stylesheet" type="text/css" >
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<!--[if IE 6]>
<style type="text/css">
html { overflow-y: hidden; }
body { overflow-y: auto; }
img#bg { position:absolute; z-index:-1; }
#content { position:static; }
</style>
<![endif]-->
</head>

<BODY  text="WHITE" link="YELLOW">

<?php

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
$t=$r['tnc'];
}
?>

<img src="h.jpg" alt="background image" id="bg" />
<div id="content">
<div style="margin:50px 50px 300px 200px">

<h2>Using our Services</h2>
<h3><marquee behavior="alternate"><font color="yellow">So follow all the terms and conditions</font></marquee></h3>
<?php
echo '<p>'.$t.'</p>';
?>
</div>
</div>
</body>
</html>