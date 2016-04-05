<?php
session_start();
$type = $_GET["type"];
$_SESSION['putter'] = $_GET['value'];
echo '<meta http-equiv="refresh" content="0;create.php?type='.$type.'&pn='.$_SESSION['putter'].'">';
?>