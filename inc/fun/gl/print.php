<?php

include"../../sql.php";

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
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="../../../" data-template="vertical-menu-template">

  
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
    <link rel="stylesheet" href="../../../vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../../vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../../vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../../vendor/libs/typeahead-js/typeahead.css" />
    

    <!-- Page CSS -->
    
<link rel="stylesheet" href="../../../vendor/css/pages/app-invoice-print.css" />
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
 
  <div class="col-xl-12 col-md-12 col-12 mb-md-12 mb-12">
    <div class="card invoice-preview-card col-12">
      <div class="card-body col-12">



 <div style="float: right; " >
              <img style="float: right;width: 80%; height: auto" src="../../../img/logo.png">
            </div>


  <div class="row d-flex justify-content-between mb-4">
    <div class="col-sm-12 w-50">

      <table>
        <tbody>
                      <?php




$id=$_GET['id'];

 $sql->selectall("trans where id=$id");
  
 while ($row = $sql->res->fetch_assoc()) {
$stat22=$row['c_stat'];

?>
          <tr >
            <td class="pe-3">قيد اليومية:</td>
            <td><strong>#<?=$row['ref']?></strong></td>
          </tr>
          <tr>
            <td class="pe-3">Date Issues:</td>
            <td><?=$row['date2']?></td>
          </tr>

          <tr>
            <td class="pe-3">Description:</td>
            <td><?=$row['name']?></td>
          </tr>
          <tr>
            <td class="pe-3">Currency:</td>
            <td><?php
              $currency=$row['currency_id'];
$sql->select3("currencies","where id=$currency  ");
        while($row3=$sql->res3->fetch_assoc())
                {

echo$row3['code'];


                }

              ?></td>
          </tr>
          <tr>
            <td class="pe-3">Currency Rate:</td>
            <td><?=$row['currency_rate']?></td>
          </tr>
          
              <?php
  }?>

        </tbody>
      </table>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table border-top m-0">
      <thead>
        <tr bgcolor="#e5e5e5" >
        <th ><center>#</center> </th>

        <th ><center>account</center> </th>
             
              <th><center>Description</center> </th>
              <th><center>depit</center> </th>
              <th><center>crdit</center> </th>
                  <?php

if ($stat22!=1) {


              ?>         
              <th><center>مدين محلي</center> </th>
              <th><center>دائن محلي </center> </th>
            <?php
}
            ?>
        </tr>
      </thead>
      <tbody>
 <?php



$get=$_GET['id'];

 $sql->selectall("transaction where  trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
$des=$row['des'];
$acc=$row['account_id'];
?>
            <tr>
              <td ><center>
                <?php


            $sql->select1("account_no"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['account_name'];

                                        
}
?></center></td>
              <td ><center><?=$name?></center></td>
              <td ><center><?=$des?></center></td>
              <td><center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center></td>
              <td><center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center></td>
                            <?php
              if ($stat22!=1) {
?>
<td ><center><?=$row['drr']?></center></td>
              <td ><center><?=$row['crr']?></center></td>

<?php
}
?>
              
            </tr>
<?php
}
?>

             <tr bgcolor="#e5e5e5"  >
    <td colspan="3"><center>Total :</center></td>
     <td><center><?php 
 $sql->selectsum("dr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(dr)'];
 }
  ?></center></td>


       <td><center><?php 
 $sql->selectsum("cr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(cr)'];
 }
  ?></center></td>
   <?php
              if ($stat22!=1) {
?>
   <td><center><?php 
 $sql->selectsum("drr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(drr)'];
 }
  ?></center></td>


       <td><center><?php 
 $sql->selectsum("crr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(crr)'];
 }
  ?></center></td><?php
}
?>
   </tr>

      </tbody>
    </table>

<?php

$get=$_GET['id'];
$sql->check("costs",['trans_id'=>$get]);
 $num=$sql->check;


if ($num>=1) {


?>
    <br>
    <br>

        <table class="table border-top m-0">
      <thead>
                <tr bgcolor="#e5e5e5">
          <th colspan="7" ><center>costs</center> </th>
        </tr>
        <tr >
        <th ><center>#</center> </th>
        <th ><center>cost</center> </th>
             
              <th><center>Rate</center> </th>
              <th><center>depit</center> </th>
              <th><center>crdit</center> </th>
                 <?php

if ($stat22!=1) {


              ?>         
              <th><center>مدين محلي</center> </th>
              <th><center>دائن محلي </center> </th>
            <?php
}
            ?>
        </tr>
      </thead>
      <tbody>
 <?php



 $sql->selectall("costs where dr!=0 and trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
// $des=$row['des'];
$acc=$row['cost2_id'];
?>
            <tr>
              <td ><center>
                <?php


            $sql->select1("cost2"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['name'];

                                        
}
?></center></td>
              <td ><center><?=$name?></center></td>
              <td ><center><?=$row['rate']?> %</center></td> 
              <td><center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center></td>
              <td><center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center></td>
               <?php
               if ($stat22!=1) {
?>
<td ><center><?=$row['drr']?></center></td>
              <td ><center><?=$row['crr']?></center></td>

<?php
}
?>


            </tr>
<?php
}
?>

<tr><td colspan="7"><br></td></tr>
 <?php



$get=$_GET['id'];

 $sql->selectall("costs where cr!=0 and trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
// $des=$row['des'];
$acc=$row['cost2_id'];
?>
            <tr>
              <td ><center>
                <?php


            $sql->select1("cost2"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['name'];

                                        
}
?></center></td>
              <td ><center><?=$name?></center></td>
              <td ><center><?=$row['rate']?> %</center></td> 
              <td><center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center></td>
              <td><center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center></td>
              <?php
               if ($stat22!=1) {
?>
<td ><center><?=$row['drr']?></center></td>
              <td ><center><?=$row['crr']?></center></td>

<?php
}
?>

            </tr>
<?php
}
?>
        <tr>
             <tr bgcolor="#e5e5e5"  >
    <td colspan="2"><center>Total :</center></td>
         <td><center><?php 
 $sql->selectsum("rate",'costs'," trans_id=$get  ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$rate=$row['SUM(rate)'].' %';
 }
  ?></center></td>
     <td><center><?php 
 $sql->selectsum("dr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(dr)'];
 }
  ?></center></td>


       <td><center><?php 
 $sql->selectsum("cr",'costs'," trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(cr)'];
 }

 }
  ?></center></td>

    <?php
              if ($stat22!=1) {
?>
   <td><center><?php 
 $sql->selectsum("drr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(drr)'];
 }
  ?></center></td>


       <td><center><?php 
 $sql->selectsum("crr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(crr)'];
 }
  ?></center></td><?php
}
?>
   </tr>
  
      </tbody>
    </table>

        <br>
    <br>

       
  </div>


</div>


<!-- / Content -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../../../vendor/libs/jquery/jquery.js"></script>
  <script src="../../../vendor/libs/popper/popper.js"></script>
  <script src="../../../vendor/js/bootstrap.js"></script>
  <script src="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="../../../vendor/libs/hammer/hammer.js"></script>
  <script src="../../../vendor/libs/i18n/i18n.js"></script>
  <script src="../../../vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="../../../vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="../../../js/main.js"></script>

  <!-- Page JS -->
  <script src="../../../js/app-invoice-print.js"></script>
  
</body>


<!-- Mirrored from themeselection.com/demo/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Feb 2022 00:25:54 GMT -->
</html>
