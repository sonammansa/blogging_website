<?php
include 'simple_html_dom.php';

$url= 'http://www.youtube.com/videos?feature=mh';
$html = file_get_html($url);
$i=0;

/*foreach ($html->find('a') as $e)
{
echo $e->href.'<br>'; 
}*/


foreach ($html->find('div[id=body-container] div[id=page] div[id=content-container] div[id=baseDiv] div div div[id=browse-main-column] div div   ') as $cont)
{
foreach ($cont->find('a') as $e)
{
$s=substr($e->href,0,8);
if(strcmp($s,'/watch?v')==0)
{$h= $e->href;
$hs=substr($h,9,11);
$ar[$i]=$hs; 
$i++; }
}
}
//print_r($ar);

/*$ap='http://www.youtube.com';
$m=0;
for($j=0;$j<8;$j++)
{
$arr[$j]= $ap.$ar[$m];
$v[$j]=substr($arr[$j],31,11);
$m=$m+2;
}*/
//print_r($arr);
//echo '<br>';
//print_r($v);

$embed='http://www.youtube.com/embed/';
for($j=0;$j<50;$j++)
{
$em[$j]=$embed.$ar[$j];
}
//echo '<br>';
//print_r($em);
?>
<a href="#" onclick="img('i1')"><img id="i1" src="http://img.youtube.com/vi/<?php echo $ar[0]; ?>/0.jpg" height=100 width=100></a>&emsp;
<a href="#" onclick="img('i2')"><img id="i2" src="http://img.youtube.com/vi/<?php echo $ar[2]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i3')"><img id="i3" src="http://img.youtube.com/vi/<?php echo $ar[46]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i4')"><img id="i4" src="http://img.youtube.com/vi/<?php echo $ar[18]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i5')"><img id="i5" src="http://img.youtube.com/vi/<?php echo $ar[20]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i6')"><img id="i6" src="http://img.youtube.com/vi/<?php echo $ar[22]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i7')"><img id="i7" src="http://img.youtube.com/vi/<?php echo $ar[24]; ?>/0.jpg" height=100 width=100>&emsp;
<a href="#" onclick="img('i8')"><img id="i8" src="http://img.youtube.com/vi/<?php echo $ar[37]; ?>/0.jpg" height=100 width=100><br><br>
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
<?php
/*echo '<iframe width="100" height="100" src="'. $em[0]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[2]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[46]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[18]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[20]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[22]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[24]. '" frameborder="0" allowfullscreen></iframe>&emsp;';
echo '<iframe width="100" height="100" src="'. $em[37]. '" frameborder="0" allowfullscreen></iframe>&emsp;';*/



$url1='http://www.youtube.com/watch?v=vmSIJhfmXq0';

/*$html1 = file_get_html($url1);

print_r ( $html1->find('div[id=body-container] div[id=page] div[id=content-container] div[id=content] div[id=watch-container] div[id=watch-main-container] div[id=watch-main] div[id=watch-panel] div[id=watch-actions-area-container]'));

foreach ($html1->find('div[id=body-container] div[id=page] div[id=content-container] div[id=content] div[id=watch-container] div[id=watch-main-container] div[id=watch-main] div[id=watch-panel] div[id=watch-actions-area-container] div[id=watch-actions-area] div[id=watch-actions-share] div[id=watch-actions-share-panel] div[id=browse-main-column] div div div textarea[class=yt-uix-form-textarea share-embed-code]  ') as $cont)
{
echo $cont->innertext;
}*/

?>

