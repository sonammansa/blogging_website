<?php session_start(); 
$n=$_POST['nmbr'];
$im=array();
for($m=1;$m<=$n;$m++)
{
$im[$m]=$_POST['im'.$m];
}
$o = unserialize($_POST['order']); 

$i=uniqid();
$pn=$_POST['p'];
$r4=$_POST['tit'];
$r5=$_POST['con'];

////copying images from temp
$path="folders/".$_SESSION['username']."/".$pn."/collage/".$i;
if(!is_dir($path))
{
 mkdir($path,0777,true);

}
else
 {
      opendir($path);
	
   }
for($m=1;$m<=$n;$m++)
{
if (copy("temp/".$im[$m], $path."/".$im[$m])) {
  unlink("temp/".$im[$m]);
}
}

$u=$_SESSION['username'];

$xml = new DOMDocument();
$xml_order = $xml->createElement("order");
$xml->appendChild( $xml_order );
//$xml_order = $xml->createElement("order");
//$xml_orders->appendChild( $xml_order );
for($m=1;$m<=sizeof($o);$m++)
{
$xml_image = $xml->createElement("image".$m);
$xml_order->appendChild( $xml_image );
$t=$xml->createTextNode($o[$m]);
$xml_image->appendChild( $t );
}
$xml->save($path."/".$i.".xml");

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);

$r1=mysql_query("INSERT INTO collage(id,accname,putter,title,caption,date) VALUES ('$i','$u','$pn','$r4','$r5',curdate())");
if (!$r1)
{
    die('Invalid query: ' . mysql_error());
}
else
{
echo "saved";
echo '<meta http-equiv="refresh" content="1;main.php?us=">'; 
}
?>