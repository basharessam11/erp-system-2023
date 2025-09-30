<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$amount=filter_var($_POST['amount'], FILTER_VALIDATE_INT);
$pro_id=filter_var($_POST['pro_id'], FILTER_VALIDATE_INT);
$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);

$sql->check("pro_a",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?pro_a=list&name=no");
}else{
	$sql->update('pro_a',$id,["name"=>"$name","amount"=>"$amount","pro_id"=>$pro_id,"type"=>$type]);
header("location:../../../index.php?pro_a=list&id=$pro_id&add=su");
}
