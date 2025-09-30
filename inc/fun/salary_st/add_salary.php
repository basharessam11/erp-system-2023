<?php

include"../../sql.php";


$date=date("Y-m-d");
$date1=date("Y-m");

$sql->select1("emp_slip","where  date_format(date, '%Y-%m')='$date1'");

   if ($sql->res1->num_rows>=1) {
   	header("location:../../../index.php?salary_st=list&add12=error");
   	exit();
   }else{
   	$sql->insert('emp_slip',["date"=>$date,"stat"=>1,"stat1"=>1]);




	 header("location:../../../index.php?salary_st=list&add22=su");

   }

