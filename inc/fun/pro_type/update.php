<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);


$sql->check("pro_type",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?group=list&name=no");
}else{
	$sql->update('pro_type',$id,["name"=>"$name"]);
header("location:../../../index.php?pro_type=list&add=su");
}
