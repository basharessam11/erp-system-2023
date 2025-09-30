<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);



$sql->check("cost1",["account_name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?cost1=list&id=$a&name=no");
}else{
	$sql->insert('cost1',["account_name"=>"$name"]);
header("location:../../../index.php?cost1=list&id=$a&add=su");
}
