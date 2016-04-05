<?php   session_start();
	
	 if(!isset($_SESSION['username']) && !isset($_SESSION['admin']))
	 {
	    ?>


<!DOCTYPE html>
<html>
<head>
<title>Putter.Show your creativity!</title>
<script src="js/lightbox-form.js"></script>
<script type="text/javascript" src="js/sliderman.1.3.7.js"></script>
<link rel="stylesheet" type="text/css" href="css/sliderman.css" />
<link href="css/lightbox-form.css" rel="stylesheet" />
<link href="css/links.css" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet" />
<link href="style1.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/stimenu.css" />
<link rel="stylesheet" type="text/css" href="css/css1.css" />

<link rel="shortcut icon" href="images\favicon.ico">
</head>



<body bgcolor=white>

<style type="text/css">

* { margin: 0; outline: none; }
		
.c { clear: both; }

.classname{-moz-box-shadow: 22px  15px  16px  #000000;-webkit-box-shadow: 22px  15px  5px  #000000;box-shadow: 22px  15px  16px  #000000;}

.wt
{
color:lightgrey;
font-family:arial;
}

h6 {
     text-shadow: 0 0 10px #fff,
                   0 0 20px #fff,
                   0 0 30px #fff,
                   0 0 40px blue,
                   0 0 70px blue,
                   0 0 80px blue,
                   0 0 100px blue,
                   0 0 150px blue;
font-size:23px;
text-align:center;
}

</style>

<div id="shadowing"></div>
<div id="sbox" >
  <span id="boxtitle"></span>
<form name="form2" action="search.php" method="post">
<p class="wt">Username : <input type="text" name="us"></p>
<br><br>
<input type="submit" value="Search" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
</form>
</div>

<div id="shadowing"></div>
<div id="box">
  <span id="boxtitle"></span>
  <form name="loginform" method="post" action="login.php" target="_parent">
      <br>
    <p class="wt">Username: <br>
      <input id="accname" type="text" name="accname" placeholder="username" maxlength="60" size="60">
    </p><br>
      
    <p class="wt">Password<br>
      <input type="password" name="password" placeholder="Password">

    </p>
      <br>
	<p class="wt">
	<font size=2>New user? <a class="ln" href="1.php" > Register</a> here.</font>
	</p>
	<p class="wt">
	<font size=2>Login as <a class="ln" href="#" style="color:yellow;" onclick="openbox('Admin Login', 2,'box1')"> Admin !</a></font>
	</p>
    <br>
    <p class="wt" style="left:170px;position:absolute;"> 
      <input style="width:60px;" class="form" type="submit" name="Login" value="Login">&emsp;
      <input style="width:60px;" class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box')" >
    </p>
  </form>
</div>

<div id="shadowing"></div>
<div id="box1">
 <span id="boxtitle"></span>
  <form name="aloginform" method="post" action="admin.php" target="_parent">
      <br>
    <p class="wt">Admin ID: <br>
      <input id="accname" type="text" name="aid" placeholder="Admin id" maxlength="40" size="40">
    </p><br>
      
    <p class="wt">Password<br>
      <input type="password" name="pas" placeholder="Password">

    </p>
      <br><br/>
	
    <p class="wt" style="left:170px;position:absolute;"> 
      <input style="width:60px;" class="form" type="submit" name="Login" value="Login">&emsp;
      <input style="width:60px;" class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box1')" >
    </p>
  </form>
</div>

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
$a=$r['home1'];
$b=$r['home2'];
$m1=$r['ab1'];
$m2=$r['ab2'];
$m3=$r['ab3'];
$m4=$r['ab4'];
}
?>


    



<div id="head">
<img src="img/logo_120.png" height="106" width="110" style="margin-left:85px">

<div id="putter">
<a href="home.php"> <h1 style="float:left;margin-top:46px;color:pink;font-size:29px;font-weight:bold;">  UTTER..</h1></a>
<?php
echo '<h1 style="margin-top:43px;color:#0bf;width:550px;font-weight:bold;"><font size=5px face="Segoe Print">'.$a.'</font> </h1>'; 
?>
</div>


<div id="tabs">
<a class="but" href="#" onClick="openbox('Login', 2,'box')">Login</a> &emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;<a class="but"  href="#" onClick="openbox('Search', 2,'sbox')" >Search</a> &emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;<a class="but"  href="help.php" >Help</a> &emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;<a class="but"  href="contactus.php" >Contact Us</a>
</div>

</div>

<div style="background-color:#2a2a2a;position:absolute;top:104px;left:0;width:1350px;height:625px">
<div class="classname" style="background-color:#191919;position:absolute;top:14px;left:150px;width:1050px;height:50px;">
<?php
echo '<h6  style="margin-top:10px; color:white">'.$b.'</h6>';
?>


</div>

<div style="position:absolute;top:-4px;left:1220px;height:20px;">
<a id="but1" href="1.php" class="wt">
<span></span>
    <span>Start here</span>
    <span>Sign Up!</span>
</a>
</div>

<div style="margin-top:45px;position:absolute;left:215px; padding:40px">

<!--code for menu transition-->
<ul id="sti-menu" class="sti-menu">
				<li data-hovercolor="#37c5e9">
					<a href="#">
			<?php
					echo '<h2 data-type="mText" class="sti-item">'.$m1.' </h2>';
                        echo '<h5 data-type="mText" class="sti-item">'.$m2.'</h5>';
					echo '<h3 data-type="sText" class="sti-item">'.$m3.'</h3>';
                        echo '<h4 data-type="sText" class="sti-item">'.$m4.'</h4>';
			?>
                        
						<span data-type="icon" class="sti-icon  sti-item"></span>
					</a>
				</li>
			</ul>
			
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.iconmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sti-menu').iconmenu();
			});
		</script>
</div>

<div style="margin-top:50px;position:absolute;left:100px; padding:40px">


<!--slider-->
<div id="slider_container_2" class="classname">
                         <div id="one-edge-shadow"> </div>
				<div id="SliderName_2" class="SliderName_2" usemap="#img1map">
                                  
					<map name="img1map">
						<area href="#img1map-area1" shape="rect" coords="100,100,200,200" />
						<area href="#img1map-area2" shape="rect" coords="300,100,400,200" />
					</map>
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$rr = mysql_query("select * from des");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}

while($r=mysql_fetch_array($rr))
{
$i=$r['img'];
$h=$r['heading'];
$d=$r['des'];
$c=$r['dcolor'];
echo '<img src='.$i.' width=900 height=450 >';
echo '<div class="SliderName_2Description" style="text-align:center; margin-top:10px;">
                     
                     <font size="30" face="comic sans ms" color="pink"> '.$h.' </font>
                                          
                     <font size="4"  color='.$c.'>'.$d.'  </font>
                                        
            </div>';
}
mysql_close($con);
?>

		</div>
				<div class="c"></div>
				<div id="SliderNameNavigation_2">
                                 </div>
				<div class="c"></div>

				<script type="text/javascript">
                                        effectsDemo2 = 'rain,stairs';
					<!--effectsDemo2 = 'rain,stairs,fade';-->
					var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: 700, height: 450, effects: effectsDemo2,
						display: {
							autoplay: 4000,
							loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
							buttons: {opacity: 30, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
							description: {background: '#000000', opacity: 0.5, height: 100, position: 'bottom'},
                                                        
							navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
						}
					});
				</script>
       </div>



</div>



</div>

</body>

</html>

<?php
	 }
	 else if(!isset($_SESSION['admin']))
	 {
	 ?>
	<meta http-equiv="refresh" content="0;main.php?us=">
	<?php
	  }

 else if(!isset($_SESSION['username']))
	 {
	 ?>
	<meta http-equiv="refresh" content="0;adminpage.php">
	<?php
	  }
?>