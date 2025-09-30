<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

$a=filter_var($_POST['a'], FILTER_VALIDATE_INT);

$sql->check("account_c2",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?account_c2=list&id=$a&name=no");
}else{
	$sql->update('account_c2',$id,["name"=>"$name","c1"=>"$a"]);
header("location:../../../index.php?account_c2=list&id=$a&add=su");
}
