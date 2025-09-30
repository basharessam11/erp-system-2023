<?php

include"../../sql.php";

error_reporting(0);
if (isset($_POST['n'])) {

$account_c3=filter_var($_POST['a'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);





	$sql->select1("account_c3","where id=$account_c3");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];


     }

	$sql->insert('account_no',["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3"]);
	
 header("location:../../../index.php?account_no=list&id=$account_c3&add=su");


}else{

$account_c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);





		$sql->select1("account_c3","where id=$account_c3");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];


     }
	$sql->insert('account_no',["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3"]);
 header("location:../../../index.php?acco=list&add=su");

}