<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?tax=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("tax",$b);
header("location:../../../index.php?tax=list&delete1=su");

}
