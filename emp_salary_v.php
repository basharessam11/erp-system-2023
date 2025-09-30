<?php

include"inc/sql.php";

$lang1=$_COOKIE['lang'];


if ($lang1=="ar") {
    include"languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"languages/lang.en.php";
}


$id=$_GET['id'];
$emp_slip=$_GET['emp_slip'];
 $sql->selectall("emp_profile where id=$id");
  
 while ($row = $sql->res->fetch_assoc()) {


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
<html lang="en" class="light-style " dir="rtl" data-theme="theme-default" data-assets-path="" data-template="vertical-menu-template">

  
<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:25:52 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>bashar essam</title>
    
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
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="vendor/css/pages/app-invoice-print.css" />
    <!-- Helpers -->
    <script src="vendor/js/helpers.js"></script>

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
<style type="text/css">
  .invoice-print {
    color: black;
  }
</style>

<body>

  <!-- Content -->

  <div class="invoice-print p-5 col-12">

    <div class="d-flex justify-content-between flex-row">
      <div class="col-12">
        <div class="card-header border-bottom">
          <h5 class="card-title" style="text-align: center;">تفاصيل الراتب</h5>

        </div>
        <div class="col-xl-12 col-md-12 col-12 mb-md-12 mb-12">
          <div class="card invoice-preview-card col-12">
            <div class="card-body col-12">

              <div class="row d-flex justify-content-between mb-4">
                <div class="col-sm-12 w-50">

                  <table>
                    <tbody>

                      <tr>
                        <td> <?php echo $lang['NAME'];?></td>
                        <td><?=$row['name']?></td>
                      </tr>
                      <tr>
                        <td class="pe-3"><?php echo $lang['DEPARTMENT'];?> </td>
                        <td><?php
$dep=$row["depart"];
$sql->select1("department","where id=$dep");

     while ($row1 = $sql->res1->fetch_assoc()) {

echo $row1['name'];
      }


    ?></td>
                      </tr>

                      <tr>
                        <td class="pe-3"><?php echo $lang['Date'];?> </td>
                        <td><?php

$sql->select1("emp_slip","where id=$emp_slip");

     while ($row1 = $sql->res1->fetch_assoc()) {

echo $row1['date'];
      }


    ?></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table border-top m-0">
                  <thead>
                    <tr bgcolor="#e5e5e5">
                      <th colspan="3">
                        <center><?php echo $lang['Payments'];?></center>
                      </th>

                    </tr>
                    <tr bgcolor="#e5e5e5">
                      <th style="width: 15%">
                        <center>#</center>
                      </th>

                      <th style="width: 50%">
                        <center><?php echo $lang['Payments_Types'];?> </center>
                      </th>
                      <th style="width: 35%">
                        <center><?php echo $lang['Amount'];?></center>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                  // error_reporting(0);
$id=$_GET['id'];
 $sql->select2("salary_slip2","where emp_id=$id and emp_slip=$emp_slip and type=1");
$x=0;

     while ($row2= $sql->res2->fetch_assoc()) {

      $x++;
?>
                    <tr>
                      <td>
                        <center><?=$x?></center>
                      </td>
                      <td>
                        <center><?php
$sr=$row2['salary_id'];
 $sql->select1("salary","where id=$sr ");

     while ($row1 = $sql->res1->fetch_assoc()) {


 echo $row1['name'];
 }
                              ?></center>
                      </td>
                      <td>
                        <center><?=$row2['amount']?></center>
                      </td>

                    </tr>
                    <?php
}
?>

                    <tr bgcolor="#e5e5e5">
                      <td colspan="2">
                        <center>Total :</center>
                      </td>
                      <td>
                        <center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"emp_id=$id and emp_slip=$emp_slip and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount=$row['SUM(amount)'];
 }
  ?></center>
                      </td>

                    </tr>

                  </tbody>
                </table>

                <br>

                <table class="table border-top m-0">
                  <thead>
                    <tr bgcolor="#e5e5e5">
                      <th colspan="3">
                        <center><?php echo $lang['Payments'];?></center>
                      </th>

                    </tr>
                    <tr bgcolor="#e5e5e5">
                      <th style="width: 15%">
                        <center>#</center>
                      </th>

                      <th style="width: 50%">
                        <center><?php echo $lang['Payments_Types'];?> </center>
                      </th>
                      <th style="width: 35%">
                        <center><?php echo $lang['Amount'];?></center>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                  // error_reporting(0);
$id=$_GET['id'];
 $sql->select2("salary_slip2","where emp_id=$id and emp_slip=$emp_slip and type=2");
$x=0;

     while ($row2= $sql->res2->fetch_assoc()) {

      $x++;
?>
                    <tr>
                      <td>
                        <center><?=$x?></center>
                      </td>
                      <td>
                        <center><?php
$sr=$row2['salary_id'];
 $sql->select1("salary","where id=$sr ");

     while ($row1 = $sql->res1->fetch_assoc()) {


 echo $row1['name'];
 }
                              ?></center>
                      </td>
                      <td>
                        <center><?=$row2['amount']?></center>
                      </td>

                    </tr>
                    <?php
}
?>

                    <tr bgcolor="#e5e5e5">
                      <td colspan="2">
                        <center>Total :</center>
                      </td>
                      <td>
                        <center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"emp_id=$id and emp_slip=$emp_slip and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount=$row['SUM(amount)'];
 }
  ?></center>
                      </td>

                    </tr>

                  </tbody>
                </table>

                <br>

                <table class="table border-top m-0">
                  <thead>
                    <tr bgcolor="#e5e5e5">
                      <th colspan="3">
                        <center>غير المستحق</center>
                      </th>

                    </tr>
                    <tr bgcolor="#e5e5e5">

                      <th style="width: 15%">
                        <center>#</center>
                      </th>

                      <th style="width: 50%">
                        <center>البند </center>
                      </th>
                      <th style="width: 35%">
                        <center>القيمة</center>
                      </th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td></td>
                      <td>
                        <center>المستحق :</center>
                      </td>
                      <td>
                        <center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"emp_id=$id and emp_slip=$emp_slip and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount=$row['SUM(amount)'];
 }
  ?></center>
                      </td>

                    </tr>

                    <tr>
                      <td></td>
                      <td>
                        <center>غير المستحق:</center>
                      </td>
                      <td>
                        <center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"emp_id=$id and emp_slip=$emp_slip and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount1=$row['SUM(amount)'];
 }
  ?></center>
                      </td>

                    </tr>

                    <tr>
                      <td></td>
                      <td>
                        <center>الاجمالي</center>
                      </td>
                      <td>
                        <center><?php 

  echo$amount-$amount1;

  ?></center>
                      </td>

                    </tr>
                  </tbody>
                </table>

                </tbody>
                </table>

              </div>

            </div>

            <!-- / Content -->

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="vendor/libs/jquery/jquery.js"></script>
            <script src="vendor/libs/popper/popper.js"></script>
            <script src="vendor/js/bootstrap.js"></script>
            <script src="vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

            <script src="vendor/libs/hammer/hammer.js"></script>
            <script src="vendor/libs/i18n/i18n.js"></script>
            <script src="vendor/libs/typeahead-js/typeahead.js"></script>

            <script src="vendor/js/menu.js"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->

            <!-- Main JS -->
            <script src="js/main.js"></script>

            <!-- Page JS -->
            <script src="js/app-invoice-print.js"></script>

</body>

<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:25:54 GMT -->

</html>

<?php
}
?>