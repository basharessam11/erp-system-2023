<?php

include"../../sql.php";


$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$date=filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);


$amount1=$_POST['amount'];
$salary1=$_POST['salary'];






for ($i=0; $i <= count($amount1)-1 ; $i++) { 
$amount=filter_var($amount1[$i], FILTER_VALIDATE_FLOAT);
$salary=filter_var($salary1[$i], FILTER_VALIDATE_INT);


$sql->select1("salary","where id=$salary");

     while ($row1 = $sql->res1->fetch_assoc()) {


 $type=$row1['type'];
 }


$sql->insert('salary_slip2',["amount"=>$amount,"type"=>$type,"date"=>$date,"stat"=>1,"salary_id"=>$salary,"des"=>"$des","emp_id"=>$user,"emp_slip"=>0,"from1"=>2]);

}


	header("location:../../../index.php?salary_slip=list&add=su");
