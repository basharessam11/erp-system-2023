<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);


$sql->check("pro_cat",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?pro_cat=list&name=no");
}else{
	$sql->update('pro_cat',$id,["name"=>"$name"]);
header("location:../../../index.php?pro_cat=list&add=su");
}
