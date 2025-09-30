<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);


$sql->check("Expense_Types",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?Expense_Types=list&name=no");
}else{
	$sql->insert('Expense_Types',["name"=>"$name","c3"=>"$c3"]);
header("location:../../../index.php?Expense_Types=list&add=su");
}
