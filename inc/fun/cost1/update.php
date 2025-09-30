<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);



$sql->check("cost1",["account_name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?cost1=list&id=$a&name=no");
}else{
	$sql->update('cost1',$id,["account_name"=>"$name"]);
header("location:../../../index.php?cost1=list&id=$a&add=su");
}
