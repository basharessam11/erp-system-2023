<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);

$sql->check("Expense_Types",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?Expense_Types=list&name=no");
}else{
	$sql->update('Expense_Types',$id,["name"=>"$name","c3"=>"$c3"]);
header("location:../../../index.php?Expense_Types=list&add=su");
}
