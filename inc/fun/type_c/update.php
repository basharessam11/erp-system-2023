<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);


$sql->check("type_c",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?type_c=list&name=no");
}else{
	$sql->update('type_c',$id,["name"=>"$name"]);
header("location:../../../index.php?type_c=list&add=su");
}
