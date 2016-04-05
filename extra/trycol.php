<html>
<head>
	<style type=text/css  >

#collage-container{
	width:700px;
	height:500px;
	margin: 30px auto;
	position: relative;
	border: 2px solid #777;
}
#collage-one,#collage-two,#collage-three,#collage-four,
#collage-five,#collage-six,#collage-seven{
	width:168px;
	height:224px;
	padding:10px;
	background#eee;
	border-radius:20px;
	-moz-border-radius:20px;
	-webkit-border-radius:20px;
	position:absolute;
}
		
#collage-one{
z-index:1;
top:30px;
left:50px;
transform:rotate(-20deg);
-o-transform:rotate(-20deg);
-moz-transform:rotate(-20deg);
-webkit-transform:rotate(-20deg);
}
#collage-two{
z-index:2;
top:50px;
right:50px;
transform:rotate(10deg);
-o-transform:rotate(10deg);
-moz-transform:rotate(10deg);
-webkit-transform:rotate(10deg);
}
#collage-three{
z-index:3;
top:20px;
left:150px;
transform:rotate(30deg);
-o-transform:rotate(30deg);
-moz-transform:rotate(30deg);
-webkit-transform:rotate(30deg);
}
#collage-four{
z-index:4;
top:250px;
left:100px;
transform:rotate(-40deg);
-o-transform:rotate(-40deg);
-moz-transform:rotate(-40deg);
-webkit-transform:rotate(-40deg);
}
#collage-five{
z-index:5;
top:150px;
left:350px;
transform:rotate(-40deg);
-o-transform:rotate(-43deg);
-moz-transform:rotate(-40deg);
-webkit-transform:rotate(-40deg);
}
#collage-six{
z-index:6;
top:50px;
left:280px;
transform:rotate(-10deg);
-o-transform:rotate(-10deg);
-moz-transform:rotate(-10deg);
-webkit-transform:rotate(-10deg);
}
#collage-seven{
z-index:7;
top:250px;
left:250px;
transform:rotate(30deg);
-o-transform:rotate(30deg);
-moz-transform:rotate(30deg);
-webkit-transform:rotate(30deg);
}	
</style>
</head>
<body>	
	<div id=collage-container>
   <img src=img/1.jpg id=collage-one />
   <img src=img/2.jpg id=collage-two />
   <img src=img/3.jpg id=collage-three />
   <img src=img/4.jpg id=collage-four />
   <img src=img/5.jpg id=collage-five />
   <img src=img/6.jpg id=collage-six />
   <img src=img/11.jpg id=collage-seven />
</div>
</body>
</html>