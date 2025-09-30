<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$pro_id=filter_var($_POST['pro_id'], FILTER_VALIDATE_INT);


$sql->check("pro_stag",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?pro_stag=list&name=no");
}else{
	$sql->insert('pro_stag',["name"=>"$name","pro_id"=>"$pro_id"]);
header("location:../../../index.php?pro_stag=list&id=$pro_id&add=su");
}
