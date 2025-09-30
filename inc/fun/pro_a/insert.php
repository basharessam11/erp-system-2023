<?php

include"../../sql.php";



$pro_id=filter_var($_POST['pro_id'], FILTER_VALIDATE_INT);



$amount1=$_POST['amount'];
$pro_a=$_POST['name'];
$type1=$_POST['type'];






for ($i=0; $i <= count($amount1)-1 ; $i++) { 
$amount=filter_var($amount1[$i], FILTER_VALIDATE_FLOAT);
$name=filter_var($pro_a[$i], FILTER_SANITIZE_STRING);
$type=filter_var($type1[$i], FILTER_SANITIZE_STRING);



$sql->insert('pro_a',["amount"=>$amount,"name"=>$name,"pro_id"=>$pro_id,"type"=>$type]);

}


	 header("location:../../../index.php?pro_a=list&id=$pro_id&add=su");
