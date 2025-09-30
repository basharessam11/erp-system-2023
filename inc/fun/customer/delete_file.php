<?php
include"../../sql.php";
  $id=filter_var($_GET['id'], FILTER_SANITIZE_STRING);




$sql->select("file","where id =$id");
while ($row=$sql->res->fetch_assoc()) {
	$value=$row['file'];
	$emp_id=$row['emp_id'];

		unlink("file/$value");
	
	
	
}

$sql->delete("file",$id);
header("location:../../../index.php?cust_file=list&id=$emp_id&delete1=su");


