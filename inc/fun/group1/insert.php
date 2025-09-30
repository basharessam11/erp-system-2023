<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


$sql->check("group1",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?group=list&name=no");
}else{
	$sql->insert('group1',["name"=>"$name"]);
header("location:../../../index.php?group=list&add=su");
}
