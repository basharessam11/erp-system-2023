<?php

include"../../sql.php";
$id=filter_var($_GET['id'], FILTER_VALIDATE_INT);
$a=filter_var($_GET['a'], FILTER_VALIDATE_INT);

$sql->update('trans',$id,["stat"=>1]);
$sql->update1('transaction',"trans_id=$id",["stat"=>1]);
if ($a==1) {
  header("location:../../../index.php?manger1=list&add=su");
 }elseif($a==2){
   header("location:../../../index.php?manger2=list&add=su");
 }