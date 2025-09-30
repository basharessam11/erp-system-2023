<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$a=filter_var($_POST['a'], FILTER_VALIDATE_INT);


$sql->check("account_c2",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?account_c2=list&id=$a&name=no");
}else{
	$sql->insert('account_c2',["name"=>"$name","c1"=>"$a"]);
header("location:../../../index.php?account_c2=list&id=$a&add=su");
}
