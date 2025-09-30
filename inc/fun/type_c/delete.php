<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?type_c=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("type_c",$b);
header("location:../../../index.php?type_c=list&delete1=su");

}
