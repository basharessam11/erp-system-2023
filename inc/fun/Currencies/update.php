<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$rate=filter_var($_POST['rate'], FILTER_VALIDATE_FLOAT);

$sql->check("currencies",["code"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?Currencies=list&name=no");
}else{
	$sql->update('currencies',$id,["code"=>"$name","rate"=>"$rate"]);
header("location:../../../index.php?Currencies=list&add=su");
}
