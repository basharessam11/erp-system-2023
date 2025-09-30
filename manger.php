         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?php echo $lang['Pending_approval'];?></h5>

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

                     <label><?php echo $lang['SEARCH'];?>
                       <input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>

                   </div>
                 </div>
                 <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                   <div id="DataTables_Table_1_filter" class="dataTables_filter">
                     <br>
                     <!--        <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1" >
         Add New emp_leave
          </button>
          <br><br> -->
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
                         <center><?php echo $lang['ACTION'];?></center>
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
  
  $sql->selectall("emp_leave where stat=1 and emp_name LIKE '$search%'  ORDER BY id desc limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("emp_leave where stat=1 ORDER BY id desc limit 10 offset  $id ");
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
}

      ?> </center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center>
                           <a href="inc/fun/leave/stat.php?id=<?=$row["id"]?>&stat=2">
                             <button type="button" class=" btn btn-success" days="<?=$row["days"]?>" besho="<?=$row["id"]?>">
                               approved

                             </button></a>
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
              $sql->selectall("emp_leave  where stat=1  name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('emp_leave',["stat"=>1]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?manger=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?manger=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?manger=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?manger=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/leave/select_m.php', {
                 search: value
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
         </script>

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
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='manger=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='manger=list'");
           });
         </script>