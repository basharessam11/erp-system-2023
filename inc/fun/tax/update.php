<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$rate=filter_var($_POST['rate'], FILTER_VALIDATE_FLOAT);

$sql->check("tax",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?tax=list&name=no");
}else{
	$sql->update('tax',$id,["name"=>"$name","rate"=>"$rate"]);
header("location:../../../index.php?tax=list&add=su");
}
