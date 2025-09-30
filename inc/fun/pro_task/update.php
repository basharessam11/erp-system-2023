<?php

include"../../sql.php";

$stage_id=filter_var($_POST['stage_id'], FILTER_VALIDATE_INT);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

if (empty($_POST['end_date_t'][0])) {
header("location:../../../index.php?pro_task=list&id=$stage_id&add1=no");

}else{
$name1=$_POST['name'];
$des1=$_POST['des'];

$start_date_t1=$_POST['start_date_t'];
$end_date_t1=$_POST['end_date_t'];
$user_t1=$_POST['user_t'];
$status_t1=$_POST['status_t'];



for ($i=0; $i <= count($_POST['name'])-1 ; $i++) { 
$name=filter_var($name1[$i], FILTER_SANITIZE_STRING);
$des=filter_var($des1[$i], FILTER_SANITIZE_STRING);

$end_date_t=filter_var($end_date_t1[$i], FILTER_SANITIZE_STRING);
$start_date_t=filter_var($start_date_t1[$i], FILTER_SANITIZE_STRING);
$status_t=filter_var($status_t1[$i], FILTER_VALIDATE_INT);
$user_t=filter_var($user_t1[$i], FILTER_VALIDATE_INT);


$sql->update('pro_task',$id,["name"=>"$name","des"=>"$des","start_date"=>"$start_date_t","end_date"=>"$end_date_t","stat"=>"$status_t","user_id"=>"$user_t"]);
	
}
header("location:../../../index.php?pro_task=list&id=$stage_id&add=su");
}