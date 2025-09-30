<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$pro_id=filter_var($_POST['pro_id'], FILTER_VALIDATE_INT);


if (empty($id)) {
header("location:../../../index.php?pro_stag=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("pro_stag",$b);
header("location:../../../index.php?pro_stag=list&id=$pro_id&delete1=su");

}
