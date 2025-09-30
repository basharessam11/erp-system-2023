<?php
$lang=$_GET['lang'];
$page=$_GET['page'];
$e = str_replace("'", '', $page);
if ($lang=="en") {
	setcookie("lang","en",time()+(60*60*24*30),"/");
	header("location:../../index.php?$e");
}

if ($lang=="ar") {
	setcookie("lang","ar",time()+60*60*24*30,"/");
	header("location:../../index.php?$e");
}



?>