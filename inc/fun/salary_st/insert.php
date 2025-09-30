<?php

include"../../sql.php";


$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$type=filter_var($_POST['type'], FILTER_VALIDATE_INT);


$amount1=$_POST['amount'];
$salary1=$_POST['salary'];






for ($i=0; $i <= count($amount1)-1 ; $i++) { 
$amount=filter_var($amount1[$i], FILTER_VALIDATE_FLOAT);
$salary=filter_var($salary1[$i], FILTER_VALIDATE_INT);

$sql->select1("salary","where id=$salary");

     while ($row1 = $sql->res1->fetch_assoc()) {


 $type=$row1['type'];
 }


$sql->insert('salary1',["amount"=>$amount,"stat"=>1,"salary_id"=>$salary,"type"=>$type,"emp_id"=>$user]);

}


	 header("location:../../../index.php?salary_st=list&add=su");
