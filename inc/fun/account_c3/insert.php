<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$a=filter_var($_POST['a'], FILTER_VALIDATE_INT);


$sql->selectall("account_c2 where id=$a");
while ($row = $sql->res->fetch_assoc()) {
	$c1=$row['c1'];
}

$sql->check("account_c3",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?account_c3=list&id=$a&name=no");
}else{
	$sql->insert('account_c3',["name"=>"$name","c2"=>"$a","c1"=>"$c1"]);
header("location:../../../index.php?account_c3=list&id=$a&add=su");
}
