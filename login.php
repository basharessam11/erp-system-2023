<?php 
ob_start();
include "inc/sql.php";


if (!isset($_COOKIE['lang'])) {
  header("location:inc/des/lang.php?lang=en");

}else{
  $lang1=$_COOKIE['lang'];
  if ($lang1=="ar") {
    include"languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"languages/lang.en.php";
}
}


 session_start();



if (isset($_SESSION['login'])) {
  $user=$_SESSION['login'];
  $sql->selectall(" user where name = '$user'");
     while ($row1 = $sql->res->fetch_assoc()) {
          $dash=$row1['dash'];
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
      $project_tm=$row1['project_tm'];
      $project_cat=$row1['project_cat'];

      $report_tb=$row1['report_tb'];
      $report_lr=$row1['report_lr'];
      $report_gl=$row1['report_gl'];

      $user=$row1['user'];

      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];
     
     }
    if ($dash==1) {
       header("location:index.php");
exit();
     }elseif ($cust==1) {
        header("location:index.php?customers=list");
exit();
     }elseif ($cust_g==1) {
        header("location:index.php?group=list");
exit();
     }elseif ($account==1) {
        header("location:index.php?acco=list");
  
exit();
     }elseif ($account_ex==1) {
        header("location:index.php?exp=list");
exit();
     }elseif ($account_in==1) {
        header("location:index.php?incaming=list");
exit();
     }elseif ($account_cc==1) {
        header("location:index.php?cost1=list");
exit();
     }elseif ($account_ass==1) {
        header("location:index.php?assets=list");
exit();///
 
     }elseif ( $hr==1) {
        header("location:index.php?hrms=list");
exit();
     }elseif ($hr_sd==1) {
        header("location:index.php?department=list");
exit();
     }elseif ($hr_le==1) {
        header("location:index.php?leave=list");
exit();
     }elseif ($hr_pm==1) {
        header("location:index.php?manger=list");
exit();
     }elseif ($hr_ph==1) {
        header("location:index.php?hr=list");
exit();
     }elseif ($hr_rr==1) {
        header("location:index.php?leave_resume=list");
exit();
     }elseif ($hr_si==1) {
        header("location:index.php?salary=list");
exit();
     }elseif ($hr_es==1) {
        header("location:index.php?salary_st=list");
exit();
     }elseif ($hr_es1==1) {
        header("location:index.php?salary_all=list");
exit();
     }elseif ($hr_ad==1) {
        header("location:index.php?salary2=list");
exit();
     }elseif ($hr_sr==1) {
        header("location:index.php?salary_slip=list");
exit();
     }elseif ($hr_qu==1) {
        header("location:index.php?qu=list");
exit();


     }elseif ($project==1) {
        header("location:index.php?project=list");
exit();
     }elseif ($project_tm==1) {
        header("location:index.php?task=list");
exit();
     }elseif ($project_cat==1) {
        header("location:index.php?pro_cat=list");
exit();
     }elseif ($report_tb==1) {
        header("location:index.php?rep=f1");
exit();
     }elseif ($report_lr==1) {
        header("location:index.php?rep=f2");
exit();
     }elseif ($report_gl==1) {
        header("location:index.php?rep=f3");
exit();

      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];
     }elseif ($user==1) {
        header("location:index.php?user=list");
exit();
     }elseif ($setting==1) {
        header("location:index.php?Currencies=list");
exit();
     }elseif ($setting_tax==1) {
        header("location:index.php?tax=list");
exit();
     }
}
 if(isset($_POST["username"])){
 $username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
 $password =filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$pass=md5($password);



if(!empty($_POST["check"])) {
  $check =filter_var($_POST['check'], FILTER_VALIDATE_INT);
        setcookie ("name",$username,time()+ 31556926);
         setcookie ("pass",$password,time()+ 31556926);
      } 

$sql->check('user',['name'=>"$username",'password'=>"$pass"]);
$sql->check;
if ($sql->check ==1) {
 
 $_SESSION['login']=$username;

 $sql->selectall(" user where name = '$username'");
     while ($row1 = $sql->res->fetch_assoc()) {
                  $dash=$row1['dash'];
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
      $project_tm=$row1['project_tm'];
      $project_cat=$row1['project_cat'];

      $report_tb=$row1['report_tb'];
      $report_lr=$row1['report_lr'];
      $report_gl=$row1['report_gl'];

      $user=$row1['user'];

      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];
     
     }
    if ($dash==1) {
       header("location:index.php");
exit();
     }elseif ($cust==1) {
        header("location:index.php?customers=list");
exit();
     }elseif ($cust_g==1) {
        header("location:index.php?group=list");
exit();
     }elseif ($account==1) {
        header("location:index.php?acco=list");
  
exit();
     }elseif ($account_ex==1) {
        header("location:index.php?exp=list");
exit();
     }elseif ($account_in==1) {
        header("location:index.php?incaming=list");
exit();
     }elseif ($account_cc==1) {
        header("location:index.php?cost1=list");
exit();
     }elseif ($account_ass==1) {
        header("location:index.php?assets=list");
exit();///
 
     }elseif ( $hr==1) {
        header("location:index.php?hrms=list");
exit();
     }elseif ($hr_sd==1) {
        header("location:index.php?department=list");
exit();
     }elseif ($hr_le==1) {
        header("location:index.php?leave=list");
exit();
     }elseif ($hr_pm==1) {
        header("location:index.php?manger=list");
exit();
     }elseif ($hr_ph==1) {
        header("location:index.php?hr=list");
exit();
     }elseif ($hr_rr==1) {
        header("location:index.php?leave_resume=list");
exit();
     }elseif ($hr_si==1) {
        header("location:index.php?salary=list");
exit();
     }elseif ($hr_es==1) {
        header("location:index.php?salary_st=list");
exit();
     }elseif ($hr_es1==1) {
        header("location:index.php?salary_all=list");
exit();
     }elseif ($hr_ad==1) {
        header("location:index.php?salary2=list");
exit();
     }elseif ($hr_sr==1) {
        header("location:index.php?salary_slip=list");
exit();
     }elseif ($hr_qu==1) {
        header("location:index.php?qu=list");
exit();


     }elseif ($project==1) {
        header("location:index.php?project=list");
exit();
     }elseif ($project_tm==1) {
        header("location:index.php?task=list");
exit();
     }elseif ($project_cat==1) {
        header("location:index.php?pro_cat=list");
exit();
     }elseif ($report_tb==1) {
        header("location:index.php?rep=f1");
exit();
     }elseif ($report_lr==1) {
        header("location:index.php?rep=f2");
exit();
     }elseif ($report_gl==1) {
        header("location:index.php?rep=f3");
exit();

      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];
     }elseif ($user==1) {
        header("location:index.php?user=list");
exit();
     }elseif ($setting==1) {
        header("location:index.php?Currencies=list");
exit();
     }elseif ($setting_tax==1) {
        header("location:index.php?tax=list");
exit();
     }

}
}

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="" data-template="vertical-menu-template">

  
<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:22:53 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login </title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="vendor/js/helpers.js"></script>
 <script src="https://www.google.com/recaptcha/api.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">

                <span class="app-brand-text demo text-body fw-bolder">
                  <center><img style="width: 65%;height: auto" src="img/logo.png"></center>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2"><?=$lang['Welcome']?></h4>
            <p class="mb-4"><?=$lang['Welcome1']?></p>

            <form id="formAuthentication" class="mb-3" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label"></label><?=$lang['Username']?></label>
                <input type="text" class="form-control" name="username" value="<?php
if (isset($_COOKIE["name"])) {
 echo $_COOKIE["name"];
}
              ?>" placeholder="اسم المستخدم" autofocus>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password"><?=$lang['Password']?></label>

                </div>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" minlength="8" value="<?php
if (isset($_COOKIE["pass"])) {
 echo $_COOKIE["pass"];
}
              ?>" name="password" placeholder="***********" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <?php


             if(isset($_POST["username"])){
            if ($sql->check !=1) {
             echo '<br><div id="success-alert2" class="alert alert-danger" role="alert">
                       '.$lang['error_login'].'
                      </div>';
            }
          }
            ?>
              <div class="mb-3">
                <div class="form-check">

                  <?=$lang['Remember']?><input class="form-check-input" type="checkbox" value="1" name="check" id="remember-me">

                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit"><?=$lang['Sign']?></button>
              </div>
            </form>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Vendors JS -->
  <script src="vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="js/main.js"></script>

  <!-- Page JS -->
  <script src="js/pages-auth.js"></script>

</body>

<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:22:54 GMT -->

</html>
<?php
ob_end_flush();
?>