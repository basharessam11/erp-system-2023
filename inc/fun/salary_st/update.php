<?php

include"../../sql.php";


$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$user1=filter_var($_POST['user1'], FILTER_VALIDATE_INT);
$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);


$amount1=$_POST['amount'];
$salary1=$_POST['salary'];


$sql->delete1("salary1"," where emp_id=$user1 ");



for ($i=0; $i <= count($amount1)-1 ; $i++) { 
$amount=filter_var($amount1[$i], FILTER_VALIDATE_FLOAT);
$salary=filter_var($salary1[$i], FILTER_VALIDATE_INT);

$sql->select1("salary","where id=$salary");

     while ($row1 = $sql->res1->fetch_assoc()) {


 $type=$row1['type'];
 }

$sql->insert('salary1',["amount"=>$amount,"type"=>$type,"stat"=>1,"salary_id"=>$salary,"emp_id"=>$user]);

}


	 header("location:../../../index.php?salary_st=list&add=su");
