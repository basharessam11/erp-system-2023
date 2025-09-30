<?php

include"../../sql.php";

$emp_name=filter_var($_POST['emp_name'], FILTER_SANITIZE_STRING);
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);
$emp_depart=filter_var($_POST['emp_depart'], FILTER_VALIDATE_INT);
$leave_type=filter_var($_POST['leave_type'], FILTER_VALIDATE_INT);
$from_date=filter_var($_POST['from_date'], FILTER_SANITIZE_STRING);
$to_date=filter_var($_POST['to_date'], FILTER_SANITIZE_STRING);
$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
$days=filter_var($_POST['days'], FILTER_VALIDATE_INT);

$sql->selectall("emp_profile where id=$emp_id");
while ($row=$sql->res->fetch_assoc()) {

$emp_name=$row['name'];
$emp_depart=$row['depart'];

}

                            


	$sql->insert('emp_leave',["emp_name"=>"$emp_name","emp_id"=>"$emp_id","emp_depart"=>"$emp_depart","leave_type"=>"$leave_type","from_date"=>"$from_date","to_date"=>"$to_date","stat"=>1,"des"=>"$des","days"=>"$days"]);
header("location:../../../index.php?leave=list&add=su");

