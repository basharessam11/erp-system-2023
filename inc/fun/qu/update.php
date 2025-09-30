<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$amount=filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

$sql->check("qu",["name"=>"$name","id !"=>"$id","emp_id"=>$user]);
if ($sql->check>0) {
	header("location:../../../index.php?qu=list&name=no");
}else{
	$sql->update('qu',$id,["waith"=>$amount,"name"=>"$name","emp_id"=>$user]);
header("location:../../../index.php?qu=list&add=su");
}
