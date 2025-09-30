<?php

include"../../sql.php";


	$stat=filter_var($_POST['stat'], FILTER_VALIDATE_INT);
	$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);




$sql->check("salary",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?salary=list&name=no");
}else{
	$sql->insert('salary',["name"=>"$name","type"=>"$type","stat"=>"$stat"]);
	
 header("location:../../../index.php?salary=list&add=su");
}


