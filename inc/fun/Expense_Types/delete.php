<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?Expense_Types=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	
$sql->delete("Expense_Types",$b);
header("location:../../../index.php?Expense_Types=list&delete1=su");

}
