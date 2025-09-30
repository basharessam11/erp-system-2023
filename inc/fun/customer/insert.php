<?php

include"../../sql.php";


$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);

$phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);

$fax=filter_var($_POST['fax'], FILTER_VALIDATE_INT);

$address=filter_var($_POST['address'], FILTER_SANITIZE_STRING);

$city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
$region=filter_var($_POST['region'], FILTER_SANITIZE_STRING);
$zip=filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$currency=filter_var($_POST['currency'], FILTER_VALIDATE_INT);
$group=filter_var($_POST['group'], FILTER_VALIDATE_INT);
$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);





$sql->check("customer",["email"=>"$email"]);
if ($sql->check>0) {
	header("location:../../../index.php?customers=list&name=no");
}else{
	$sql->insert('customer',["name"=>"$name","type_c"=>"$type","fax"=>"$fax","group1"=>"$group","phone"=>"$phone","email"=>"$email","city"=>"$city","address"=>"$address","region"=>"$region","currency"=>"$currency","des"=>"$des","zip"=>"$zip"]);


	$sql->select1("customer","  order by id desc limit 1 ");
          while($row1=$sql->res1->fetch_assoc())
       {
$id_c=$row1['id'];

       }

if ($type==1) {
	$sql->insert('account_no',["account_name"=>"$name","account_c3"=>39,"account_number"=>"$id_c","balance"=>0]);
}else{
	$sql->insert('account_no',["account_name"=>"$name","account_c3"=>17,"account_number"=>"$id_c","balance"=>0]);
}


 header("location:../../../index.php?customers=list&add=su");
}
