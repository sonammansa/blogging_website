<?php
include 'simple_html_dom.php';
//echo '<img src="http://dl6.iq8download.com/icnmedia/1be94c61-747e-4d83-b7e5-f314730ce44d.jpg" height=500 width=700>'

$url= 'http://hdw.eweb4.com/search/large/';
$html = file_get_html($url);
$i=0;
foreach ($html->find('div[class=cont1] div[class=cont2] div[id=scont]  div[class=images] table ') as $cont)
{

foreach ($cont->find('a') as $e)
{$ar[$i]= $e->href; 
$i++;
}
}
//print_r($ar);

echo '<br>';
$aa=array();
$j=0;
for($k=3;$k<19;$k=$k+2)
{
$url1='http://hdw.eweb4.com'.$ar[$k];
$html1 = file_get_html($url1);

foreach( $html1->find('div[class=cont1] div[class=cont2] div[class=c2] div table') as $cont1) 
{
foreach ($cont1->find('a') as $e )
{
$aa[$j]= $e->href; 
$j++;
break;
}
}
}
//print_r($aa);

?>
<a href="#" onclick="img('i1')"><img id="i1" src= <?php echo $aa[0]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i2')"><img id="i2" src= <?php echo $aa[2]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i3')"><img id="i3" src= <?php echo $aa[4]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i4')"><img id="i4" src= <?php echo $aa[6]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i5')"><img id="i5" src= <?php echo $aa[8]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i6')"><img id="i6" src= <?php echo $aa[10]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i7')"><img id="i7" src= <?php echo $aa[12]; ?> height=100 width=100></a>&emsp;
<a href="#" onclick="img('i8')"><img id="i8" src= <?php echo $aa[14]; ?> height=100 width=100></a>&emsp;

<br>
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">