<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?project=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("project",$b);
$sql->delete1("task","where pro_id=$b");
header("location:../../../index.php?project=list&delete1=su");

}
