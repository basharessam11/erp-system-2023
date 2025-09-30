<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$aa=filter_var($_POST['a'], FILTER_VALIDATE_INT);


if (empty($id)) {
header("location:../../../index.php?account_c3=list&id=$a&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("account_c3",$b);
header("location:../../../index.php?account_c3=list&id=$aa&delete1=su");

}
