<?php

include"../../sql.php";

$lang1=$_COOKIE['lang'];


if ($lang1=="ar") {
    include"../../../languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"../../../languages/lang.en.php";
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
<html lang="en" class="light-style " dir="rtl" data-theme="theme-default" data-assets-path="../../../" data-template="vertical-menu-template">

  
<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:25:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><center><?php
$get=$_GET['month'];
$date=date('Y').'-'.$get;
$date1=date_create($date);
echo date_format($date1,"Y-M");
   

?> راتب شهر  </center>  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-12 w-50">

      <table>
        <tbody>
                    
         

                <tr>
            <td class="pe-3"><?php echo $lang['Date'];?> </td>
            <td><?php
$get=$_GET['month'];
$date=date('Y').'-'.$get;
$date1=date_create($date);
echo date_format($date1,"Y-M ");
   

    ?></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div></title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
       <link href="../../../css/css2.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../../vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../../vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../../vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../../vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../../vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../../../vendor/libs/flatpickr/flatpickr.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../../vendor/libs/formvalidation/dist/css/formValidation.min.css">
    <link rel="stylesheet" href="../../../vendor/libs/dropzone/dropzone.css" />

    <!-- Helpers -->
    <script src="../../../vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../../vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../../js/config.js"></script>
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../../../table/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="../../../table/css/buttons.bootstrap5.min.css">
  <style type="text/css" class="init">


  </style>

  <script type="text/javascript" language="javascript" src="../../../table/js/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/buttons.bootstrap5.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../../table/js/buttons.colVis.min.js"></script>

   <script type="text/javascript" class="init">
  



$(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          
                           
            
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
                           
            },
                        {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
                           
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
                           
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
                           
            },
                           
           
            'colvis'
        ],
        columnDefs: [ {
            
            visible: false
        } ]
    } );
     $('#example_filter').after('<br>');
     $('#example_filter').after('<br>');
     $('#example_filter').after('<br>');

     $("#example_info").hide();
     $("#example_paginate").hide();
} );
  </script>
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
<h5 class="card-title" style="text-align: center;"><?php
$get=$_GET['month'];
$date=date('Y').'-'.$get;
$date1=date_create($date);
echo date_format($date1,"Y-M");
   

?> راتب شهر  </h5>


        

</div>
  <div class="col-xl-12 col-md-12 col-12 mb-md-12 mb-12">
    <div class="card invoice-preview-card col-12">
      <div class="card-body col-12">
 <div style="float: right; " >
              <img style="float: right;width: 80%; height: auto" src="../../../img/logo.png">
            </div>

<br>
<br>



  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-12 w-50">

      <table>
        <tbody>
                    
         

                <tr>
            <td class="pe-3"><?php echo $lang['Date'];?> </td>
            <td><?php
$get=$_GET['month'];
$date=date('Y').'-'.$get;
$date1=date_create($date);
echo date_format($date1,"Y-M ");
   

    ?></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

  <div class="table-responsive">
    <table id="example" style="width: 100%" class="table border-top m-0">
      <thead>
       
        <tr bgcolor="#e5e5e5" >
        <th ><center>#</center> </th>
             
              <th><center>اسم الموظف </center> </th>
              <th><center>رقم الحساب</center> </th>
              <th><center>المستحق </center> </th>
              <th><center>غير المستحق</center> </th>
              <th><center>الاجمالي</center> </th>
              

             
        </tr>
      </thead>
      <tbody>
                                  <?php
               $get=$_GET['month'];
$date=date('Y').'-'.$get;
               // error_reporting(0);
$array=[];
 $sql->select1("salary_slip2","where date_format(date, '%Y-%m')='$date'");

     while ($row1 = $sql->res1->fetch_assoc()) {
      if (!in_array($row1['emp_id'],$array)) {
       array_push($array, $row1['emp_id']);
      }

     }
$imp=implode(" or id = ", $array);



 $sql->select1("emp_profile","where id=$imp ");
$x=0;
     while ($row1 = $sql->res1->fetch_assoc()) {


      $x++;
?>
            <tr>
              <td ><center><?=$x?></center></td>
                <td ><center><?php


 echo $row1['name'];
 $emp_id=$row1['id'];

                              ?></center></td>


              <td ><center><?=$row1['bank']?></center></td>
              <td ><center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"date_format(date, '%Y-%m')='$date'and emp_id=$emp_id and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount1=$row['SUM(amount)']??0;
 }
  ?></center></td>

   <td ><center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"date_format(date, '%Y-%m')='$date' and emp_id=$emp_id and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount=$row['SUM(amount)']??0;
 }
  ?></center></td>
              
       <td ><center><?=$amount1-$amount??0 ?></center></td>         
            </tr>
<?php
}
?>

  
             <tr bgcolor="#e5e5e5"  >
              <td ><center >الاجمالي</center></td>
              <td ><center></center></td>
              <td ><center></center></td>
     <td ><center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"date_format(date, '%Y-%m')='$date'and  type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount1=$row['SUM(amount)']??0;
 }
  ?></center></td>

   <td ><center><?php 
 
 $sql->selectsum("amount",'salary_slip2',"date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$amount=$row['SUM(amount)']??0;
 }
  ?></center></td>
              
       <td ><center><?=$amount1-$amount??0 ?></center></td>   
   </tr> 

      </tbody>
    </table>




  
     

        <br>

  </div>


</div>


<!-- / Content -->


  
</body>


<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:25:54 GMT -->
</html>

