<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$rate=filter_var($_POST['rate'], FILTER_VALIDATE_FLOAT);

$sql->check("currencies",["code"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?Currencies=list&name=no");
}else{
	$sql->insert('currencies',["code"=>"$name","rate"=>"$rate"]);
header("location:../../../index.php?Currencies=list&add=su");
}
