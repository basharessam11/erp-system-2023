<?php

include"../../sql.php";


$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$start_date=filter_var($_POST['start_date'], FILTER_SANITIZE_STRING);
$end_date=filter_var($_POST['end_date'], FILTER_SANITIZE_STRING);
$pro_cat=filter_var($_POST['pro_cat'], FILTER_VALIDATE_INT);

$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);

$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);

$sql->check("project",["name"=>"$name","id !"=>"$id"]);
if ($sql->check>0) {
	header("location:../../../index.php?project=list&name=no");
}else{


if (empty($_POST['start_date_t'][0])) {
	$sql->update('project',$id,["name"=>"$name","start_date"=>"$start_date","end_date"=>"$end_date","cat_id"=>"$pro_cat","user_id"=>"$user","des"=>"$des"]);
}else{
	$sql->delete1("task","where pro_id=$id");
$sql->update('project',$id,["name"=>"$name","start_date"=>"$start_date","end_date"=>"$end_date","cat_id"=>"$pro_cat","user_id"=>"$user","des"=>"$des"]);



$stage_t1=$_POST['stage_t'];
$start_date_t1=$_POST['start_date_t'];
$end_date_t1=$_POST['end_date_t'];
$user_t1=$_POST['user_t'];
$status_t1=$_POST['status_t'];



for ($i=0; $i <= count($_POST['stage_t'])-1 ; $i++) { 

$stage_t=filter_var($stage_t1[$i], FILTER_VALIDATE_INT);
$end_date_t=filter_var($end_date_t1[$i], FILTER_SANITIZE_STRING);
$start_date_t=filter_var($start_date_t1[$i], FILTER_SANITIZE_STRING);
$status_t=filter_var($status_t1[$i], FILTER_VALIDATE_INT);
$user_t=filter_var($user_t1[$i], FILTER_VALIDATE_INT);


$sql->insert('task',["stag_id"=>"$stage_t","start_date"=>"$start_date_t","end_date"=>"$end_date_t","stat"=>"$status_t","user_id"=>"$user_t","pro_id"=>"$id"]);
	
}

}


	

header("location:../../../index.php?project=list&add=su");
}
