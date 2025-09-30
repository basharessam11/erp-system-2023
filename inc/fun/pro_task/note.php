<?php

include"../../sql.php";
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

$user_id=filter_var($_POST['user_id'], FILTER_VALIDATE_INT);



$des1=$_POST['des'];

$status_t=filter_var($_POST['status_t'], FILTER_VALIDATE_INT);



$sql->delete1("task_note","where task_id=$id");
for ($i=0; $i <= count($_POST['des'])-1 ; $i++) { 

$des=filter_var($des1[$i], FILTER_SANITIZE_STRING);




$sql->insert('task_note',["des"=>"$des","task_id"=>"$id","user_id"=>"$user_id"]);
	
}
$sql->update('pro_task',$id,["stat"=>"$status_t"]);
 header("location:../../../index.php?task=list&add=su");
