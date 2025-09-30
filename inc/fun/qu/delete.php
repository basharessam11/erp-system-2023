<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?qu=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("qu",$b);
header("location:../../../index.php?qu=list&delete1=su");

}
