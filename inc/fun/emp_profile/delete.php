<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?hrms=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	

$sql->select("emp_profile","where id =$b");
while ($row=$sql->res->fetch_assoc()) {
	$value=$row['photo'];

		unlink("../../photo/$value");
	
	
	
}

$sql->delete("emp_profile",$b);
header("location:../../../index.php?hrms=list&delete1=su");

}
