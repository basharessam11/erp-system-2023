<?php

include"../../sql.php";

	$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

	$stat=filter_var($_POST['stat'], FILTER_VALIDATE_INT);
	$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);






$sql->check("salary",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?salary=list&name=no");
}else{
	$sql->update('salary',$id,["name"=>"$name","type"=>"$type","stat"=>"$stat"]);
	
 header("location:../../../index.php?salary=list&add=su");
}


