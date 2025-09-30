<?php

include"../../sql.php";

if (isset($_POST['n'])) {
		$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
	$account_c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


		$sql->select1("account_c3","where id=$account_c3");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];


     }
	$sql->update('account_no',$id,["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3"]);
 header("location:../../../index.php?account_no=list&id=$account_c3&add=su");


}else{
	$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$account_c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


		$sql->select1("account_c3","where id=$account_c3");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];


     }
	$sql->update('account_no',$id,["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3"]);
 header("location:../../../index.php?acco=list&add=su");


}






