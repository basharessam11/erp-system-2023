<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$pro_id=filter_var($_POST['pro_id'], FILTER_VALIDATE_INT);



$sql->check("pro_stag",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?pro_stag=list&name=no");
}else{
	$sql->update('pro_stag',$id,["name"=>"$name"]);
header("location:../../../index.php?pro_stag=list&id=$pro_id&add=su");
}
