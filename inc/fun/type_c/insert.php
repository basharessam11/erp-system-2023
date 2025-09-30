<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


$sql->check("type_c",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?type_c=list&name=no");
}else{
	$sql->insert('type_c',["name"=>"$name"]);
header("location:../../../index.php?type_c=list&add=su");
}
