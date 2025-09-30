<?php

include"../../sql.php";


$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);
$date=filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
$amount=filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);
$salary=filter_var($_POST['salary'], FILTER_VALIDATE_INT);


$sql->select1("salary","where id=$salary");

     while ($row1 = $sql->res1->fetch_assoc()) {


 $type=$row1['type'];
 }


$sql->update('salary_slip2',$id,["amount"=>$amount,"type"=>$type,"date"=>$date,"stat"=>1,"salary_id"=>$salary,"des"=>"$des","emp_id"=>$user,"emp_slip"=>0,"from1"=>2]);




	  header("location:../../../index.php?salary_slip=list&add=su");
