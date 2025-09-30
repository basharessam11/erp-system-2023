<?php

include"../../sql.php";

	$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

	$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);



$sql->check("department",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?department=list&name=no");
}else{
	$sql->update('department',$id,["name"=>"$name","user_id"=>"$user","stat"=>1]);
	
 header("location:../../../index.php?department=list&add=su");
}


