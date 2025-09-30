<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


$sql->check("pro_cat",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?pro_cat=list&name=no");
}else{
	$sql->insert('pro_cat',["name"=>"$name"]);
header("location:../../../index.php?pro_cat=list&add=su");
}
