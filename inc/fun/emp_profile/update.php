<?php

include "../../sql.php";
$id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);


$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

$stat = filter_var($_POST['stat'], FILTER_VALIDATE_INT);


$emp_marital_status = filter_var($_POST['emp_marital_status'], FILTER_VALIDATE_INT);

$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);

$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
$region = filter_var($_POST['region'], FILTER_SANITIZE_STRING);

$birth_date = filter_var($_POST['birth_date'], FILTER_SANITIZE_STRING);
$emp_passport = filter_var($_POST['emp_passport'], FILTER_SANITIZE_STRING);

$depart = filter_var($_POST['depart'], FILTER_VALIDATE_INT);
$job_title = filter_var($_POST['job_title'], FILTER_SANITIZE_STRING);
$bank = filter_var($_POST['bank'], FILTER_SANITIZE_STRING);

$img_name = $_FILES['photo']['name'];
$size = $_FILES['photo']['size'];
$tmp = $_FILES['photo']['tmp_name'];

if (empty($_POST['pass'])) {

	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
} else {
	$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
	$password = md5($pass);
}
$img_last = filter_var($_POST['img_last'], FILTER_SANITIZE_STRING);

$img_name = $_FILES['photo']['name'];
$size = $_FILES['photo']['size'];
$tmp = $_FILES['photo']['tmp_name'];


$sql->check("emp_profile", ["emp_passport" => "$emp_passport", "id !" => "$id"]);
if ($sql->check > 0) {
	header("location:../../../index.php?hrms=list&name=no");
} else {
	if (count($img_name) > 1) {
		header("location:../../../index.php?hrms=list&img=no");
	} else {

		$sql->update_img('emp_profile', $id, ["name" => "$name", "stat" => "$stat", "email" => "$email", "password" => "$password", "phone" => "$phone", "emp_marital_status" => "$emp_marital_status", "address" => "$address", "country" => "$country", "city" => "$city", "region" => "$region", "birth_date" => "$birth_date", "emp_passport" => "$emp_passport", "depart" => "$depart", "job_title" => "$job_title", "bank" => "$bank"], $img_last, $img_name, $size, $tmp);



		if (!empty($sql->error)) {
			$aa = '&' . implode("&", $sql->error);
			header("location:../../../index.php?hrms=list$aa");
		} else {
			header("location:../../../index.php?hrms=list&add=su");
		}
	}
}
