<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);


$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$account=filter_var($_POST['account'], FILTER_VALIDATE_INT);

$date=filter_var($_POST['date'], FILTER_SANITIZE_STRING);

$currency=filter_var($_POST['currency'], FILTER_VALIDATE_INT);
$amount=filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

$ex_type=filter_var($_POST['ex_type'], FILTER_VALIDATE_INT);

$ref=filter_var($_POST['ref'], FILTER_SANITIZE_STRING);


	$sql->update('transaction',$id,["name"=>"$name","dr"=>$amount,"cr"=>0,"t_type"=>2,"account_id"=>"$ex_type","amount"=>"$amount","date2"=>"$date","currency_id"=>"$currency","account_id2"=>"$account","ref"=>"$ref"]);

  header("location:../../../index.php?gl=list&add=su");
