<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$rate=filter_var($_POST['rate'], FILTER_VALIDATE_FLOAT);

$sql->check("tax",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?tax=list&name=no");
}else{
	$sql->insert('tax',["name"=>"$name","rate"=>"$rate"]);
header("location:../../../index.php?tax=list&add=su");
}
