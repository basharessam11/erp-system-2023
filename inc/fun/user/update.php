<?php
include"../../sql.php";
error_reporting(0);
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$pr=filter_var($_POST['pr'], FILTER_VALIDATE_INT);


if (empty($password)) {
	$pass=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
}else{
	$pass=md5($password);
}
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);
$manger1=filter_var($_POST['manger1'], FILTER_VALIDATE_INT);
$manger2=filter_var($_POST['manger2'], FILTER_VALIDATE_INT);

$page=filter_var($_GET['page'], FILTER_VALIDATE_INT);
$dash=filter_var($_POST['dash'], FILTER_VALIDATE_INT)??0;
$cust=filter_var($_POST['cust'], FILTER_VALIDATE_INT)??0;
$cust_g=filter_var($_POST['cust_g'], FILTER_VALIDATE_INT)??0;
$account=filter_var($_POST['account'], FILTER_VALIDATE_INT)??0;
$account_ge=filter_var($_POST['account_ge'], FILTER_VALIDATE_INT)??0;
$account_ex=filter_var($_POST['account_ex'], FILTER_VALIDATE_INT)??0;
$account_in=filter_var($_POST['account_in'], FILTER_VALIDATE_INT)??0;
$account_cc=filter_var($_POST['account_cc'], FILTER_VALIDATE_INT)??0;
$account_ass=filter_var($_POST['account_ass'], FILTER_VALIDATE_INT)??0;
$hr=filter_var($_POST['hr'], FILTER_VALIDATE_INT)??0;
$hr_sd=filter_var($_POST['hr_sd'], FILTER_VALIDATE_INT)??0;
$hr_le=filter_var($_POST['hr_le'], FILTER_VALIDATE_INT)??0;
$hr_pm=filter_var($_POST['hr_pm'], FILTER_VALIDATE_INT)??0;
$hr_ph=filter_var($_POST['hr_ph'], FILTER_VALIDATE_INT)??0;
$hr_rr=filter_var($_POST['hr_rr'], FILTER_VALIDATE_INT)??0;
$hr_si=filter_var($_POST['hr_si'], FILTER_VALIDATE_INT)??0;
$hr_es=filter_var($_POST['hr_es'], FILTER_VALIDATE_INT)??0;
$hr_es1=filter_var($_POST['hr_es1'], FILTER_VALIDATE_INT)??0;
$hr_ad=filter_var($_POST['hr_ad'], FILTER_VALIDATE_INT)??0;
$hr_sr=filter_var($_POST['hr_sr'], FILTER_VALIDATE_INT)??0;
$hr_qu=filter_var($_POST['hr_qu'], FILTER_VALIDATE_INT)??0;
$project=filter_var($_POST['project'], FILTER_VALIDATE_INT)??0;
$projects=filter_var($_POST['projects'], FILTER_VALIDATE_INT)??0;
$project_tm=filter_var($_POST['project_tm'], FILTER_VALIDATE_INT)??0;
$project_cat=filter_var($_POST['project_cat'], FILTER_VALIDATE_INT)??0;
$report_tb=filter_var($_POST['report_tb'], FILTER_VALIDATE_INT)??0;
$report=filter_var($_POST['report'], FILTER_VALIDATE_INT)??0;
$report_lr=filter_var($_POST['report_lr'], FILTER_VALIDATE_INT)??0;
$report_cost=filter_var($_POST['report_cost'], FILTER_VALIDATE_INT);
$report_gl=filter_var($_POST['report_gl'], FILTER_VALIDATE_INT)??0;
$user=filter_var($_POST['user'], FILTER_VALIDATE_INT)??0;
$setting=filter_var($_POST['setting'], FILTER_VALIDATE_INT)??0;
$setting_tax=filter_var($_POST['setting_tax'], FILTER_VALIDATE_INT)??0;

$a=$sql->check('user',['name'=>"$name",'id !'=>"$id"]);
if ($sql->check <1) {
	$sql->update("user",$id,["name"=>"$name","password"=>"$pass","pr"=>"$pr","emp_id"=>"$emp_id","manger1"=>"$manger1","manger2"=>"$manger2","dash"=>"$dash","cust"=>"$cust","cust_g"=>"$cust_g","account"=>"$account","account_ge"=>"$account_ge","account_ex"=>"$account_ex","account_in"=>"$account_in","account_cc"=>"$account_cc","account_ass"=>"$account_ass","hr"=>"$hr","hr_sd"=>"$hr_sd","hr_le"=>"$hr_le","hr_pm"=>"$hr_pm","hr_ph"=>"$hr_ph","hr_rr"=>"$hr_rr","hr_si"=>"$hr_si","hr_es"=>"$hr_es","hr_es1"=>"$hr_es1","hr_ad"=>"$hr_ad","hr_sr"=>"$hr_sr","hr_qu"=>"$hr_qu","project"=>"$project","project_tm"=>"$project_tm","project_cat"=>"$project_cat","report_tb"=>"$report_tb","report_lr"=>"$report_lr","projects"=>"$projects","report_cost"=>"$report_cost","report_gl"=>"$report_gl","user"=>"$user","setting"=>"$setting","setting_tax"=>"$setting_tax"]);
header("location:../../../index.php?user=list&page=$page&add=su");

}else{
	header("location:../../../index.php?user=list&page=$page&name=no");

}
