<?php

include"../../sql.php";


$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);



$amount1=$_POST['amount'];
$name1=$_POST['name'];






for ($i=0; $i <= count($amount1)-1 ; $i++) { 
$amount=filter_var($amount1[$i], FILTER_VALIDATE_FLOAT);
$name=filter_var($name1[$i], FILTER_SANITIZE_STRING);



$sql->insert('qu',["waith"=>$amount,"name"=>"$name","emp_id"=>$user]);

}


	 header("location:../../../index.php?qu=list&add=su");
