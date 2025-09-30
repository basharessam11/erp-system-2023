<?php

include"../../sql.php";


	$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);



$sql->check("department",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?department=list&name=no");
}else{
	$sql->insert('department',["name"=>"$name","user_id"=>"$user","stat"=>1]);
	
 header("location:../../../index.php?department=list&add=su");
}


