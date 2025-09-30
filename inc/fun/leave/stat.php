<?php

include"../../sql.php";


$id=filter_var($_GET['id'], FILTER_VALIDATE_INT);

$stat=filter_var($_GET['stat'], FILTER_VALIDATE_INT);


$sql->update('emp_leave',$id,["stat"=>"$stat"]);

if ($stat==2) {
	header("location:../../../index.php?manger=list&add=su");
}elseif ($stat==3) {
	header("location:../../../index.php?hr=list&add=su");
}elseif ($stat==4) {
	header("location:../../../index.php?leave_resume=list&add=su");
}


