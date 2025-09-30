
<?php

//upload.php
include"../../sql.php";
$folder_name = 'file/';

if(!empty($_FILES))
{
	$id=$_GET["id"];
 $temp_file = $_FILES['file']['tmp_name'];
 $name = $_FILES['file']['name'];
 $sql->insert_file('file',["emp_id"=>$id,"from1"=>1],$name,$temp_file,'file');
}
