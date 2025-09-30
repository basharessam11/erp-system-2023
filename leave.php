         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?php echo $lang['LEAVE'];?></h5>

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
                   <div class="dataTables_length" id="DataTables_Table_1_length">

                     <label><?php echo $lang['SEARCH'];?><input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>

                   </div>
                 </div>
                 <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                   <div id="DataTables_Table_1_filter" class="dataTables_filter">
                     <br>
                     <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1">
                       <?php echo $lang['APPLY_ANNUAL_LEAVE'];?>
                     </button>
                     <br><br>
                     <button type="button" style="display: none;width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2">
                       <?=$lang['DELETE1']?>
                     </button>
                   </div>
                 </div>
               </div>

               <br>
               <div class="kk">
                 <table width="10%" class="datatables-basic  table table-bordered">
                   <thead>
                     <tr>
                       <th style="padding: .625rem 0.25rem;">
                         <center><input class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['EMPLOYEE_ID'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['EMPLOYEE_NAME'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Departments'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['From'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['To'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Status'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['EDIT']?></center>
                       </th>
                     </tr>

                   </thead>
                   <tbody id="myTable">
                     <?php

if (isset($_GET['search'])) {
   $search=$_GET['search'];

   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  
  $sql->selectall("emp_leave where emp_id=$emp_id and  emp_name LIKE '$search%'  ORDER BY id desc limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("emp_leave where emp_id=$emp_id ORDER BY id desc limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
 
      ?>
                     <tr>
                       <td style="padding: .625rem 0.25rem;">
                         <center><input value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['emp_name'];?> </center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php


      $id=$row["emp_depart"];

      $sql->select1("department","where id=$id");
                                   while ($row1=$sql->res1->fetch_assoc()) {
                                     echo$row1['name'];
                                   }

                                   ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['from_date'];?> </center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['to_date'];?> </center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
      $stat=$row['stat'];
if ($stat==1) {
  echo '<div class="alert alert-warning">Waiting for manager approval<div>';
}elseif ($stat==2) {
    echo '<div class="alert alert-warning">Waiting for hr . approval<div>';
}elseif ($stat==3) {
    echo '<div class="alert alert-success">Been approved<div>';
}elseif ($stat==4) {
    echo '<div class="alert alert-success">Vacation is over<div>';
}

      ?> </center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>
                           <?php

if ($row['stat']==1) {
 ?>

                           <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" emp_id="<?=$row["emp_id"]?>" emp_name="<?=$row["emp_name"]?>" emp_depart="<?=$row["emp_depart"]?>" leave_type="<?=$row["leave_type"]?>" from_date="<?=$row["from_date"]?>" to_date="<?=$row["to_date"]?>" des="<?=$row["des"]?>" days="<?=$row["days"]?>" besho="<?=$row["id"]?>">
                             <i class='bx bxs-edit'></i>

                           </button>
                           <?php
}
          ?>
                         </center>
                       </td>

                     </tr>
                     <?php
     }


      ?>

                   </tbody>
                 </table>

                 <div class="dataTables_paginate paging_simple_numbers">
                   <br>
                   <ul class="pagination">
                     <?php
    if (isset($_GET['search'])) {
              $search=$_GET['search'];
              $sql->selectall("emp_leave  where emp_id=$emp_id and name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('emp_leave',["emp_id"=>$emp_id]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?leave=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?leave=list&page='.$pp.'" tabindex="">Previous</a></li>';
              }
                 
                }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Previous</a>
                         </li>' ;
              }


              $get=$_GET['page']-5;
              if ($get<0) {
               $get=1;
              }

                           for ($i=$get; $i <$_GET['page'] ; $i++) { 


                    if ($n!=0) {

                    if ($_GET['page']==$i) {
                     $a="active";
                    }else{
                      $a="";
                    } 
                     if (isset($_GET['search'])) {
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?leave=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?leave=list&page='.$i.'">'.$i.'</a></li>';              }

                 
                }
                          } 


              for ($i=$_GET['page']; $i <$n ; $i++ ) { 




                  if ($i<=$_GET['page']+5) {

                    if ($n!=0) {

                    if ($_GET['page']==$i) {
                     $a="active";
                    }else{
                      $a="";
                    }
                    if (isset($_GET['search'])) {
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?leave=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?leave=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?leave=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?leave=list&page='.$page.'">Next</a>';
                  }
                
              }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
              }

            ?>
                   </ul>
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
             $("#myInput").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $.post('inc/fun/leave/select.php', {
                 search: value,
                 emp_id: < ? = $emp_id ? >
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
                 <h5 class="modal-title" id="exampleModalLabel1"><?php echo $lang['LEAVE'];?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/leave/update.php" enctype="multipart/form-data">

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-6">
                           <br>
                           <label> <?php echo $lang['EMPLOYEE_NAME'];?> </label>

                           <select class="form-select  emp_id" name="emp_id">
                             <?php
                                   $sql->selectall("emp_profile");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                           </select>

                         </div>
                         <div class="col-md-6">
                           <br>
                           <label><?php echo $lang['LEAVE_TYPE'];?></label>

                           <select class="form-select leave_type" name="leave_type">
                             <?php
                                   $sql->selectall("leave_type");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                           </select>

                         </div>

                       </div>
                     </div>

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['FROM_DATE'];?></label>

                           <input type="date" required name="from_date" class="from_date form-control">

                         </div>

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['TO_DATE'];?></label>

                           <input type="date" name="to_date" required class="to_date form-control">
                         </div>

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['TOTAL_DAYS'];?> </label>

                           <input type="text" name="days" readonly="readonly" class="total_days days form-control">

                         </div>

                       </div>
                     </div>

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-12">
                           <br>
                           <label><?php echo $lang['T_INFORMATION'];?></label>

                           <textarea rows="5" cols="5" name="des" placeholder="<?php echo $lang
                   ['If_you1']; ?>" class="des elastic form-control"></textarea>

                         </div>

                       </div>
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
             var emp_id = $(this).attr('emp_id');
             var emp_name = $(this).attr('emp_name');
             var emp_depart = $(this).attr('emp_depart');
             var leave_type = $(this).attr('leave_type');
             var from_date = $(this).attr('from_date');
             var to_date = $(this).attr('to_date');
             var des = $(this).attr('des');
             var days = $(this).attr('days');
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".emp_id").val(emp_id);
             $(".emp_name").val(emp_name);
             $(".emp_depart").val(emp_depart);
             $(".leave_type").val(leave_type);
             $(".from_date").val(from_date);
             $(".to_date").val(to_date);
             $(".des").html(des);
             $(".days").val(days);;
           })
         </script>

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['LEAVE']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/leave/insert.php" enctype="multipart/form-data">

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-6">
                           <br>

                           <label><?php echo $lang['EMPLOYEE_NAME'];?></label>
                           <select class="form-select c3" name="emp_id">
                             <?php
                                   $sql->selectall("emp_profile");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                           </select>

                         </div>
                         <div class="col-md-6">
                           <br>
                           <label><?php echo $lang['LEAVE_TYPE'];?></label>

                           <select class="form-select c3" name="leave_type">
                             <?php
                                   $sql->selectall("leave_type");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                           </select>

                         </div>

                       </div>
                     </div>

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['FROM_DATE'];?></label>

                           <input type="date" required name="from_date" class="from_date1 form-control">

                         </div>

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['TO_DATE'];?></label>

                           <input type="date" name="to_date" required class="to_date1 form-control">
                         </div>

                         <div class="col-md-4">
                           <br>
                           <label><?php echo $lang['TOTAL_DAYS'];?> </label>

                           <input type="text" name="days" readonly="readonly" class="total_days1 form-control">

                         </div>

                       </div>
                     </div>

                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-12">
                           <br>
                           <label><?php echo $lang['DESCRIPTION'];?></label>

                           <textarea rows="5" cols="5" name="des" placeholder="<?php echo $lang
                   ['If_you1']; ?>" class="elastic form-control"></textarea>

                         </div>

                       </div>
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
                   <form method="post" action="inc/fun/leave/delete.php">
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
             var emp_leave = get_filter('mat');
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
             var emp_leave = get_filter('mat');

             function get_filter(class_name) {
               var filter = [];
               $('.' + class_name + ':checked').each(function() {
                 filter.push($(this).val())
               })
               $(".val").val(filter)
               $(".de").show()
             }
           }
         </script>
         <script>
           $(".to_date").change(function() {
             var from1 = $(".from_date").val()
             var to1 = $(".to_date").val()
             var days = daysdifference('' + from1 + '', '' + to1 + '');
             $(".total_days").val(days)

             function daysdifference(firstDate, secondDate) {
               var startDay = new Date(firstDate);
               var endDay = new Date(secondDate);
               var millisBetween = startDay.getTime() - endDay.getTime();
               var days = millisBetween / (1000 * 3600 * 24);
               return Math.round(Math.abs(days));
             }
           });
         </script>

         <script>
           $(document).ready(function() {});
           $(".to_date1").change(function() {
             var from1 = $(".from_date1").val()
             var to1 = $(".to_date1").val()
             var days = daysdifference('' + from1 + '', '' + to1 + '');
             $(".total_days1").val(days)

             function daysdifference(firstDate, secondDate) {
               var startDay = new Date(firstDate);
               var endDay = new Date(secondDate);
               var millisBetween = startDay.getTime() - endDay.getTime();
               var days = millisBetween / (1000 * 3600 * 24);
               return Math.round(Math.abs(days));
             }
           });
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='leave=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='leave=list'");
           });
         </script>