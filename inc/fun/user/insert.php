<?php
include"../../sql.php";

error_reporting(0);
$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$pr=filter_var($_POST['pr'], FILTER_VALIDATE_INT);
$pass=md5($password);
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);
$manger1=filter_var($_POST['manger1'], FILTER_VALIDATE_INT);
$manger2=filter_var($_POST['manger2'], FILTER_VALIDATE_INT);




$page=filter_var($_GET['page'], FILTER_VALIDATE_INT);
$dash=filter_var($_POST['dash'], FILTER_VALIDATE_INT);
$cust=filter_var($_POST['cust'], FILTER_VALIDATE_INT);
$cust_g=filter_var($_POST['cust_g'], FILTER_VALIDATE_INT);
$account=filter_var($_POST['account'], FILTER_VALIDATE_INT);
$account_ge=filter_var($_POST['account_ge'], FILTER_VALIDATE_INT);
$account_ex=filter_var($_POST['account_ex'], FILTER_VALIDATE_INT);
$account_in=filter_var($_POST['account_in'], FILTER_VALIDATE_INT);
$account_cc=filter_var($_POST['account_cc'], FILTER_VALIDATE_INT);
$account_ass=filter_var($_POST['account_ass'], FILTER_VALIDATE_INT);
$hr=filter_var($_POST['hr'], FILTER_VALIDATE_INT);
$hr_sd=filter_var($_POST['hr_sd'], FILTER_VALIDATE_INT);
$hr_le=filter_var($_POST['hr_le'], FILTER_VALIDATE_INT);
$hr_pm=filter_var($_POST['hr_pm'], FILTER_VALIDATE_INT);
$hr_ph=filter_var($_POST['hr_ph'], FILTER_VALIDATE_INT);
$hr_rr=filter_var($_POST['hr_rr'], FILTER_VALIDATE_INT);
$hr_si=filter_var($_POST['hr_si'], FILTER_VALIDATE_INT);
$hr_es=filter_var($_POST['hr_es'], FILTER_VALIDATE_INT);
$hr_es1=filter_var($_POST['hr_es1'], FILTER_VALIDATE_INT);
$hr_ad=filter_var($_POST['hr_ad'], FILTER_VALIDATE_INT);
$hr_sr=filter_var($_POST['hr_sr'], FILTER_VALIDATE_INT);
$hr_qu=filter_var($_POST['hr_qu'], FILTER_VALIDATE_INT);
$project=filter_var($_POST['project'], FILTER_VALIDATE_INT);
$projects=filter_var($_POST['projects'], FILTER_VALIDATE_INT);
$project_tm=filter_var($_POST['project_tm'], FILTER_VALIDATE_INT);
$project_cat=filter_var($_POST['project_cat'], FILTER_VALIDATE_INT);
$report_tb=filter_var($_POST['report_tb'], FILTER_VALIDATE_INT);
$report=filter_var($_POST['report'], FILTER_VALIDATE_INT);
$report_lr=filter_var($_POST['report_lr'], FILTER_VALIDATE_INT);
$report_gl=filter_var($_POST['report_gl'], FILTER_VALIDATE_INT);
$report_cost=filter_var($_POST['report_cost'], FILTER_VALIDATE_INT);
$user=filter_var($_POST['user'], FILTER_VALIDATE_INT);
$setting=filter_var($_POST['setting'], FILTER_VALIDATE_INT);
$setting_tax=filter_var($_POST['setting_tax'], FILTER_VALIDATE_INT);


$a=$sql->check('user',['name'=>"$name"]);
if ($sql->check <1) {




	$sql->insert("user",["name"=>"$name","password"=>"$pass","pr"=>"$pr","emp_id"=>"$emp_id","manger1"=>"$manger1","manger2"=>"$manger2","dash"=>"$dash","cust"=>"$cust","cust_g"=>"$cust_g","account"=>"$account","account_ge"=>"$account_ge","account_ex"=>"$account_ex","account_in"=>"$account_in","account_cc"=>"$account_cc","account_ass"=>"$account_ass","hr"=>"$hr","hr_sd"=>"$hr_sd","hr_le"=>"$hr_le","hr_pm"=>"$hr_pm","hr_ph"=>"$hr_ph","hr_rr"=>"$hr_rr","hr_si"=>"$hr_si","hr_es"=>"$hr_es","hr_es1"=>"$hr_es1","hr_ad"=>"$hr_ad","hr_sr"=>"$hr_sr","hr_qu"=>"$hr_qu","project"=>"$project","projects"=>"$projects","project_tm"=>"$project_tm","project_cat"=>"$project_cat","report_tb"=>"$report_tb","report_lr"=>"$report_lr","report_cost"=>"$report_cost","report_gl"=>"$report_gl","user"=>"$user","setting"=>"$setting","setting_tax"=>"$setting_tax"]);

 header("location:../../../index.php?user=list&page=$page&add=su");

}else{
	header("location:../../../index.php?user=list&page=$page&name=no");

}
