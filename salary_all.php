         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?=$lang['Employees_salaries2']?></h5>

                 <?php
          if (isset($_GET['img_exe'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>(jpg,png,jpeg) ﻣﻦ ﻓﻀﻠﻚ ﻗﻢ ﺑﻮﺿﻊ ﺻﻮﺭﺓ ﺑﺘﻨﺴﻴﻖ  </center>
</div>';
          }
           if (isset($_GET['img'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>ﻻ ﻳﻤﻜﻦ اﺿﺎﻓﺔ اﻛﺜﺮ ﻣﻦ صورة </center>
</div>';
          }


               if (isset($_GET['delete2'])=='no') {
          echo '<br><br><div id="success-alert2" class="alert alert-danger" role="alert">
        <center>  اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﺒﻴﺎﻧﺎﺕ اﻟﻤﺮاﺩ ﺣﺬﻓﻬﺎ </center>
          </div>';
          }
          if (isset($_GET['name'])=='no') {
          echo '<br><br><div id="success-alert" class="alert alert-danger" role="alert">
 <center> ﻫﺬا اﻻﺳﻢ ﻣﻮﺟﻮﺩﻩ ﺑﺎﻟﻔﻌﻞ </center>
</div>';
          }
           if (isset($_GET['add'])=='su') {
          echo '<br><br><div id="success-alert1" class="alert alert-success" role="alert">
 <center>  ﺗﻢ اﻻﺿﺎﻓﺔ ﺑﻨﺠﺎﺡ</center>
</div>';
          }
                    if (isset($_GET['delete'])=='no') {
          echo '<br><br><div id="success-alert2" class="alert alert-danger" role="alert">
       <center>    ﻻ ﻳﻤﻜﻦ ﺣﺬﻑ ﻫﺬﻩ ﺑﺴﺒﺐ اﻧﻬﺎ ﻣﺪﺧﻠﻪ ﻓﻲ اﺣﺪ اﻟﺠﺪاﻭﻝ</center>
          </div>';
          }
      
           if (isset($_GET['delete1'])=='su') {
          echo '<br><br><div id="success-alert3" class="alert alert-success" role="alert">
<center> ﺗﻢ اﻟﺤﺬﻑ ﺑﻨﺠﺎﺡ</center></div>';
          }
          if (isset($_GET['nam'])=='su') {
          echo '<br><br><div id="success-alert1" class="alert alert-success" role="alert">
<center> ﺗﻢ ﺗﻐﻴﻴﺮ اﺳﻢ اﻟﻤﻮﻗﻊ ﺑﻨﺠﺎﺡ</center>
</div>';
}
          ?>

               </div>
               <!-- DataTable with Buttons -->
               <br>

               <div class="row">
                 <div class="col-sm-12 col-md-6">

                 </div>

               </div>

               <br>
               <div class="kk">
                 <table id="example" class="datatables-basic  table table-bordered">
                   <thead>
                     <tr>

                       <th style="padding: .625rem 0.25rem;">
                         <center>#</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;">
                         <center>التاريخ</center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center>الاجمالي</center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center>عرض</center>
                       </th>
                     </tr>

                   </thead>
                   <tbody id="myTable">

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>1</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'01';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=01"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>
                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>3</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'02';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=02"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>3</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'03';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=03"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>4</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'04';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=04"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>5</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'05';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=05"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>6</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'06';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=06"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>7</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'07';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=07"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>8</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'08';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=08"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>9</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'09';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=09"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>10</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'10';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=10"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>11</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'11';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=11"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center>12</center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$date=date('Y').'-'.'12';
$date1=date_create($date);
echo date_format($date1,"y-M ");
      ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=1");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount=$row['SUM(amount)'];
 }

 $sql->selectsum("amount",'salary_slip2'," date_format(date, '%Y-%m')='$date' and type=2");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $amount1=$row['SUM(amount)'];
 }
    echo$amount-$amount1??0;
  ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="inc/fun/print_salary/print_salary.php?month=12"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-eye'></i>

                             </button></a>
                         </center>
                       </td>

                     </tr>

                   </tbody>
                 </table>

                 <div class="dataTables_paginate paging_simple_numbers">
                   <br>

                 </div>
               </div>
             </div>

             <!--/ DataTable with Buttons -->
             <br>
             <br>

           </div>
         </div>
         <script type="text/javascript" class="init">
           $(document).ready(function() {
             $("#myInput").on("change", function() {
               var value = $(this).val().toLowerCase();
               var emp_id = < ? = $emp_id ? > ;
               $.post('inc/fun/emp_salary/select.php', {
                 search: value,
                 emp_id: emp_id
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
         </script>

         <!-- groub update -->
         <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1">edit tax</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/tax/update.php" enctype="multipart/form-data">

                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['NAME']?></label>
                       <input type="text" id="nameBasic" class="name form-control" name="name" required="" placeholder="<?=$lang['NAME']?>">

                     </div>

                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['Rate']?></label>
                       <input type="hidden" name="img_last" class="ph">
                       <input type="text" id="nameBasic" multiple="" class="rate form-control" name="rate" placeholder="Rate">

                     </div>

                 </div>

               </div>

               <input class="zz" type="hidden" name="id">

               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-primary"><?=$lang['Save']?></button>
                 </form>
               </div>
             </div>
           </div>
         </div>
         <!-- updat -->
         <script>
           $(".id").click(function() {
             var name = $(this).attr('name');
             var rate = $(this).attr('rate');
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".name").val(name);
             $(".rate").val(rate);
           })
         </script>

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['tax']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/tax/insert.php" enctype="multipart/form-data">
                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['NAME']?> :</label>
                       <input type="text" id="nameBasic" class=" form-control" name="name" required="" placeholder="<?=$lang['NAME']?>">

                     </div>

                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['Rate']?></label>
                       <input type="text" id="nameBasic" class=" form-control" name="rate" required="" placeholder="<?=$lang['Rate']?>">

                     </div>

                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-primary"><?=$lang['Save']?></button>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <!-- group delete -->
         <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['DELETE1']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/tax/delete.php">
                     <div id="name" class=" col mb-3">

                       Are you sure to delete these items?

                     </div>
                     <input class="val" type="hidden" name="id">
                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-danger"><?=$lang['DELETE1']?></button>
                 </form>
               </div>
             </div>
           </div>
         </div>
         <script>
           function data() {
             var tax = get_filter('mat');
             var check = get_filter('mat')

             function get_filter(class_name) {
               var filter = [];
               $('.' + class_name + ':checked').each(function() {
                 filter.push($(this).val())
               })
               $(".val").val(filter)
               $(".de").show()
             }
           }

           function data1() {
             if ($('.mat').attr('checked')) {
               $(".mat").removeAttr('checked')
             } else {
               $(".mat").attr('checked', '');
             }
             var tax = get_filter('mat');

             function get_filter(class_name) {
               var filter = [];
               $('.' + class_name + ':checked').each(function() {
                 filter.push($(this).val())
               })
               $(".val").val(filter)
               $(".de").show()
             }
           }
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='salary_all=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='salary_all=list'");
           });
         </script>