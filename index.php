<?php
error_reporting(0);
ob_start();

include "inc/sql.php";

 $user=$_SESSION['login'];
  $sql->selectall(" user where name = '$user'");
     while ($row1 = $sql->res->fetch_assoc()) {

      $user_id=$row1['id'];

      $dash=$row1['dash'];
      
      $manger1=$row1['manger1'];
      $manger2=$row1['manger2'];

      $cust=$row1['cust'];
      $cust_g=$row1['cust_g'];

      $account=$row1['account'];
      $account_ge=$row1['account_ge'];
      $account_ex=$row1['account_ex'];
      $account_in=$row1['account_in'];
      $account_cc=$row1['account_cc'];
      $account_ass=$row1['account_ass'];
      $hr=$row1['hr'];
      $hr_sd=$row1['hr_sd'];
      $hr_le=$row1['hr_le'];
      $hr_pm=$row1['hr_pm'];
      $hr_ph=$row1['hr_ph'];
      $hr_rr=$row1['hr_rr'];
      $hr_si=$row1['hr_si'];
      $hr_es=$row1['hr_es'];
      $hr_es1=$row1['hr_es1'];
      $hr_ad=$row1['hr_ad'];
      $hr_sr=$row1['hr_sr'];
      $hr_qu=$row1['hr_qu'];
      $project=$row1['project'];
      $projects=$row1['projects'];
      $project_tm=$row1['project_tm'];
      $project_cat=$row1['project_cat'];
      $report_tb=$row1['report_tb'];
      $report_lr=$row1['report_lr'];
      $report_gl=$row1['report_gl'];
      $report_cost=$row1['report_cost'];
      $user=$row1['user'];
      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];

}

session_start();
if (!isset($_SESSION['login'])) {
header("location:login.php");
}else{

$lang1=$_COOKIE['lang'];
if (!isset($_COOKIE['lang'])) {
	header("location:inc/des/lang.php?lang=en");
}

if ($lang1=="ar") {
		include"languages/lang.ar.php";
}elseif ($lang1=="en") {
	include"languages/lang.en.php";
}

include"inc/des/header.php";
include"inc/des/menu.php";




if (isset($_GET)) {


if (empty($_GET) and $dash==1) {
	include"dashbord.php";

}

//customers 

if ($_GET['customers']=="list" and $cust==1) {
	include"customers.php";
}
if ($_GET['customer_p']=="list" and $cust==1) {
	include"customer_p.php";
}
if ($_GET['cust_file']=="list" and $cust==1) {
	include"cust_file.php";
}

//group

if ($_GET['group']=="list" and $cust_g==1) {
	include"group.php";
}

if ($_GET['view_cust']=="list" and $cust==1) {
	include"view_cust.php";
}

if ($_GET['user']=="list" and $user==1) {
	include"user.php";
}

//salary 

if ($_GET['salary']=="list" and $hr_si==1) {
	include"salary.php";
}

//emp_salary 

if ($_GET['emp_salary']=="list") {
	include"emp_salary.php";
}
//salary_print 

if ($_GET['salary_print']=="list" ) {
	include"salary_print.php";
}
//salary_st 

if ($_GET['salary_st']=="list" and $hr_es==1) {
	include"salary_st.php";
}
if ($_GET['salary_st']=="add" and $hr_es==1) {
	include"inc/fun/salary_st/add.php";
}
if ($_GET['salary_st']=="edit" and $hr_es==1) {
	include"inc/fun/salary_st/edit.php";
}
//salary_all 

if ($_GET['salary_all']=="list" and $hr_es1==1) {
	include"salary_all.php";
}


///slip


if ($_GET['salary_slip']=="list" and $hr_sr==1) {
	include"salary_slip.php";
}
if ($_GET['salary_slip']=="add" and $hr_sr==1) {
	include"inc/fun/salary_slip/add.php";
}



if ($_GET['salary_slip']=="edit" and $hr_sr==1) {
	include"inc/fun/salary_slip/edit.php";
}


//
if ($_GET['salary2']=="list" and $hr_ad==1) {
	include"salary2.php";
}
if ($_GET['salary2']=="add" and $hr_ad==1) {
	include"inc/fun/salary2/salary2_add.php";
}
if ($_GET['salary2']=="edit" and $hr_ad==1) {
	include"inc/fun/salary2/salary2_edit.php";
}
///

if ($_GET['hrms']=="list" and $hr==1) {
	include"emp_profile.php";
}
//department 

if ($_GET['department']=="list" and $hr_sd==1) {
	include"department.php";
}

//qu 
if ($_GET['qu']=="list"and $hr_qu==1) {
	include"qu.php";
}
if ($_GET['qu']=="add"and $hr_qu==1) {
	include"inc/fun/qu/add.php";
}
if ($_GET['qu']=="edit"and $hr_qu==1) {
	include"inc/fun/qu/edit.php";
}
if ($_GET['prev']=="list") {
	include"emp_profile_p.php";
}
if ($_GET['rate']=="list") {
	include"rate_q.php";
}
if ($_GET['edit_qu_r']=="list") {
	include"edit_qu_r.php";
}
if ($_GET['all_rate']=="list") {
	include"all_rate.php";
}
//leave 
if ($_GET['leave']=="list"and $hr_le==1) {
	include"leave.php";
}
//leave 
if ($_GET['leave_resume']=="list"and $hr_rr==1) {
	include"leave_resume.php";
}
//manger
if ($_GET['manger']=="list" and $hr_pm==1) {
	include"manger.php";
}
//manger
if ($_GET['manger1']=="list" and $manger1==1) {
	include"manger1.php";
}
//manger
if ($_GET['manger2']=="list" and $manger2==1) {
	include"manger2.php";
}

//hr
if ($_GET['hr']=="list" and $hr_ph==1) {
	include"hr.php";
}
//reports

if ($_GET['rep']=="f1" and $report_tb==1 ) {
	include"report_f1.php";
}

if ($_GET['rep']=="f2"and$report_lr ==1) {
	include"report_f2.php";
}
if ($_GET['rep']=="f3"and$report_gl ==1) {
	include"report_f3.php";
}
if ($_GET['rep']=="f4"and$report_cost ==1) {
	include"report_f4.php";
}
//gl 

if ($_GET['accounts']=="list" ) {
	include"account1.php";
}

if ($_GET['account_c2']=="list") {
	include"account2.php";
}

if ($_GET['account_c3']=="list") {
	include"account3.php";
}

if ($_GET['account_no']=="list") {
	include"account4.php";
}

if ($_GET['acco']=="list"and  $account==1) {

	include"accounts.php";
	
	}

	if ($_GET['assets']=="list"and $account_ass==1) {

	include"assets.php";
	
	}
		if ($_GET['assets']=="add"and $account_ass==1) {

	include"assets_add.php";
	
	}
		if ($_GET['assets']=="edit"and $account_ass==1) {

	include"assets_edit.php";
	
	}

if ($_GET['gl']=="list" and $account_ge==1) {
	include"gl.php";
}
if ($_GET['gl']=="add" and $account_ge==1) {
	include"gl_add.php";
}

if ($_GET['ex']=="add" and $account_ex==1) {
	include"ex_add.php";
}
if ($_GET['inc']=="add"and $account_ex==1) {
	include"inc_add.php";
}
if ($_GET['gl_p']=="list" and $account_ge==1) {
	include"preview_gl.php";
}
if ($_GET['print']=="show" and $account_ge==1) {
	include"preview_gl.php";
}


if ($_GET['cost1']=="list"and $account_cc==1) {
	include"cost1.php";
}
if ($_GET['cost2']=="list"and $account_cc==1) {
	include"cost2.php";
}
if ($_GET['incaming']=="list" and $account_in==1) {
	include"incaming.php";
}
//type 

if ($_GET['type_c']=="list") {
   include"type.php";
  }


//accounting


if ($_GET['dep']=="list") {

	include"deposits.php";

	}
	if ($_GET['exp']=="list"and $account_ex==1) {

	include"expenses.php";
	
	}
	if ($_GET['exp']=="edit"and $account_ex==1) {

	include"exp_edit.php";
	
	}
	if ($_GET['trans']=="list") {

	include"transfer.php";
	
	}
	if ($_GET['bills']=="list") {

	include"bills.php";
	
	}
	if ($_GET['trans1']=="list") {

	include"transactions.php";
	
	}
	

if ($_GET['tax']=="list" and $setting_tax==1) {
	include"tax.php";
}
//sales
if ($_GET['inv']=="list") {
	include"invoices.php";
}

if ($_GET['sel']=="list") {
	include"sell_order.php";
}


if ($_GET['sales']=="list") {
	include"sales.php";
}


//ganeral

//Expense_Types
if ($_GET['Expense_Types']=="list") {
	include"Expense_Types.php";
}



//paymen_method

if ($_GET['paymen_method']=="list") {
	include"paymen_method.php";
}

//Currencies

if ($_GET['Currencies']=="list"and $setting==1) {
	include"Currencies.php";
}


//paymen_method

if ($_GET['paymen_method']=="list") {
	include"paymen_method.php";
}

//paymen_method

if ($_GET['paymen_method']=="list") {
	include"paymen_method.php";
}



//paymen_method

if ($_GET['project']=="list" and $project==1) {
	include"project.php";
}
if ($_GET['projects']=="list" and $projects==1) {
	include"projects.php";
}
if ($_GET['pro_a']=="list" and $project==1) {
	include"project_a.php";
}
if ($_GET['pro_type']=="list" and $project==1) {
	include"pro_type.php";
}
if ($_GET['pro_cat']=="list" and $project_cat==1) {
	include"pro_cat.php";
}




if ($_GET['pro_stag']=="list") {
	include"pro_stag.php";
}

if ($_GET['pro_task']=="list" and $project_tm==1) {
	include"pro_task.php";
}
if ($_GET['task']=="edit" and $project_tm==1) {
	include"task_edit.php";
}
if ($_GET['task']=="list" and $project_tm==1) {
	include"task1.php";
}
if ($_GET['task']=="view" and $project_tm==1) {
	include"task_view.php";
}
if ($_GET['project_add']=="list") {
	include"project_add.php";
}

if ($_GET['project_edit']=="list") {
	include"project_edit.php";
}
}
include"inc/des/footer.php";
}
ob_end_flush();
?>