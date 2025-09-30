<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);



$sql->check("paymen_method",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?paymen_method=list&name=no");
}else{
	$sql->insert('paymen_method',["name"=>"$name"]);
header("location:../../../index.php?paymen_method=list&add=su");
}
