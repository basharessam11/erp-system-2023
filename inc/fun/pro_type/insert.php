<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


$sql->check("pro_type",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?group=list&name=no");
}else{
	$sql->insert('pro_type',["name"=>"$name"]);
header("location:../../../index.php?pro_type=list&add=su");
}
