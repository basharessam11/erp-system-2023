<?php

include"../../sql.php";

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$start_date=filter_var($_POST['start_date'], FILTER_SANITIZE_STRING);
$end_date=filter_var($_POST['end_date'], FILTER_SANITIZE_STRING);
$pro_cat=filter_var($_POST['pro_cat'], FILTER_VALIDATE_INT);

$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);

$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);

$sql->check("project",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?project=list&name=no");
}else{




$sql->check("account_no",["account_name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?project=list&name=no");
}else{

$sql->select1("account_c3","where id=21");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];
$account_c3=$row1['id'];


     }
	$sql->insert('account_no',["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3"]);
}

	

	
	

$sql->insert('project',["name"=>"$name","start_date"=>"$start_date","end_date"=>"$end_date","cat_id"=>"$pro_cat","user_id"=>"$user","des"=>"$des"]);









header("location:../../../index.php?project=list&add=su");
}
