<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$aa=filter_var($_POST['a'], FILTER_VALIDATE_INT);


if (empty($id)) {
header("location:../../../index.php?cost1=list&id=$a&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->update('cost1',$b,["stat"=>0]);
header("location:../../../index.php?cost1=list&id=$aa&delete1=su");

}
