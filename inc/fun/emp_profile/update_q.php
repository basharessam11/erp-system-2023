<?php
include"../../sql.php";


$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);

$id1=$_POST['id'];
$qu1=$_POST['qu'];
$wa1=$_POST['wa'];
$date=filter_var($_POST['date'], FILTER_SANITIZE_STRING);





for ($i=0; $i <= count($_POST['qu'])-1 ; $i++) { 
$wa=filter_var($wa1[$i], FILTER_VALIDATE_INT);
$qu=filter_var($qu1[$i], FILTER_VALIDATE_INT);
$id=filter_var($id1[$i], FILTER_VALIDATE_INT);

$a=filter_var($_POST['a'.$i], FILTER_VALIDATE_INT);

$sql->update('qu_r',$id,["q_id"=>"$qu","emp_id"=>"$emp_id","q_reslt"=>"$a","q_waith"=>"$wa","date"=>"$date"]);
}
header("location:../../../index.php?all_rate=list&id=$emp_id&add=su");