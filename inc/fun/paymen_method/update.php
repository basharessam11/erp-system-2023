<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);


$sql->check("paymen_method",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?paymen_method=list&name=no");
}else{
	$sql->update('paymen_method',$id,["name"=>"$name"]);
header("location:../../../index.php?paymen_method=list&add=su");
}
