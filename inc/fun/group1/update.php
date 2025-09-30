<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);


$sql->check("group1",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?group=list&name=no");
}else{
	$sql->update('group1',$id,["name"=>"$name"]);
header("location:../../../index.php?group=list&add=su");
}
