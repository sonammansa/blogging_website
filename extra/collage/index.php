<!DOCTYPE html>

<html>


<head>
	
<meta charset='UTF-8'>
	
	
<title>Seamless Responsive Photo Grid</title>
	
	
<link rel='stylesheet' href='css/style.css'>

</head>


<body>

	
<section id="photos">

		
<?php 
for ($i=0; $i < 30; $i++) 
{

		  
if ($i % 2 == 1) 
	{

			
	echo "<img src='http://placedog.com/300/";
			
	echo rand(200,400);
			
	echo "' alt=''>";
	
			
	} 
else 
	{
	echo "<img src='http://placekitten.com/300/";
	echo rand(200,400);
			
	echo "' alt=''>";
	}

		
} 
?>
</section>


</body>


</html>