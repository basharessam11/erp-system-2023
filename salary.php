         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?=$lang['Salary_Item']?></h5>

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
 <center>رقم الحساب موجود بالفعل</center>
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
                       <?php echo $lang['Add'];?>
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
                         <center>#</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Salary_Item'];?></center>
                       </th>

                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Salary_Item'];?></center>
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
  
  $sql->selectall("salary where  name LIKE '$search%' and id!=10   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("salary where id!=10 ORDER BY name limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
  
      ?>
                     <tr>
                       <td style="padding: .625rem 0.25rem;">
                         <center><input value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox"></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["name"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$type=$row["type"];
if ($type==1) {
  echo 'مستحق';

}else{
  echo 'غير مستحق';
}

?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
$stat=$row["stat"];
if ($stat==1) {
  echo 'نشط';

}else{
  echo 'غير نشط';
}

?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" name="<?=$row["name"]?>" stat="<?=$row["stat"]?>" type1="<?=$row["type"]?>" besho="<?=$row["id"]?>">
                             <i class='bx bxs-edit'></i>

                           </button>
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
              $sql->selectall("salary  where id!=10 and name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('salary',["id !"=>10]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?salary=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?salary=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?salary=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?salary=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?salary=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?salary=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?salary=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?salary=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/salary/select.php', {
                 search: value
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
                 <h5 class="modal-title" id="exampleModalLabel1"><?php echo $lang['Edit_Account'];?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/salary/update.php" enctype="multipart/form-data">
                     <div class="form-group">
                       <div class="row">
                         <div class="col-md-6">
                           <br>
                           <label><?php echo $lang['Salary_Item'];?></label>
                           <input type="text" class="name form-control" id="name" name="name" placeholder="<?php echo $lang['Salary_Item'];?>">

                         </div>

                         <div class="col-md-6">
                           <br>
                           <label><?php echo $lang['User'];?></label>

                           <select class="stat form-select" name="stat">
                             <option value="1">نشط</option>
                             <option value="2">غير نشط</option>
                           </select>

                         </div>

                         <div class="col-md-6">
                           <br>
                           <label><?php echo $lang['User'];?></label>

                           <select class="type form-select" name="type">
                             <option value="1">مستحق</option>
                             <option value="2">غير مستحق</option>

                           </select>

                         </div>

                       </div>
                     </div>

                 </div>

               </div>
               <input class="zz" type="hidden" name="id">

               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?php echo $lang['Close'];?></button>
                 <button type="submit" class="btn btn-primary"> <?php echo $lang['Save'];?>
                 </button>
                 </form>
               </div>
             </div>
           </div>
         </div>
         <!-- updat -->

         <script>
           $(".id").click(function() {
             var name = $(this).attr('name');
             var stat = $(this).attr('stat');
             var type = $(this).attr('type1');
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".name").val(name);
             $(".stat").val(stat);
             $(".type").val(type);
           })
         </script>

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['Salary_Item']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/salary/insert.php" enctype="multipart/form-data">
                     <div class="form-group">
                       <div class="row">
                         <div class="row">
                           <div class="col-md-6">
                             <br>
                             <label><?php echo $lang['Salary_Item'];?></label>
                             <input type="text" class=" form-control" id="name" name="name" placeholder="<?php echo $lang['NamSalary_Iteme'];?>">

                           </div>

                           <div class="col-md-6">
                             <br>
                             <label><?php echo $lang['ACTIVE'];?></label>

                             <select class=" form-select" name="stat">
                               <option value="1">نشط</option>
                               <option value="2">غير نشط</option>
                             </select>

                           </div>

                           <div class="col-md-6">
                             <br>
                             <label><?php echo $lang['Status'];?></label>

                             <select class=" form-select" name="type">
                               <option value="1">مستحق</option>
                               <option value="2">غير مستحق</option>

                             </select>

                           </div>

                         </div>
                       </div>

                     </div>

                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"> <?php echo $lang['Close'];?></button>
                 <button type="submit" class="btn btn-primary"> <?php echo $lang['Save'];?></button>
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
                 <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['DELETE1']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/salary/delete.php">
                     <div id="name" class=" col mb-3">

                       <?php echo $lang['Are_you'];?>

                     </div>
                     <input class="val" type="hidden" name="id">
                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-danger"> <?=$lang['DELETE1']?></button>
                 </form>
               </div>
             </div>
           </div>
         </div>
         <script>
           function data() {
             var salary = get_filter('mat');
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
             var salary = get_filter('mat');

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
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='salary=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='salary=list'");
           });
         </script>