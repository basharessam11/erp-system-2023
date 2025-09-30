         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?php echo $lang['category'];?></h5>

                 category

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

                     <label> <?=$lang['SEARCH']?>:<input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>

                   </div>
                 </div>
                 <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                   <div id="DataTables_Table_1_filter" class="dataTables_filter">
                     <br>
                     <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1">
                       <?=$lang['Add']?>
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
                         <center><?=$lang['NAME']?></center>
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
  
  $sql->selectall("pro_cat where  name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("pro_cat ORDER BY name limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     $pro_cat1=$row["name"];
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
                         <center>

                           <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" name="<?=$row["name"]?>" besho="<?=$row["id"]?>">
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
              $sql->selectall("pro_cat  where  name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('pro_cat',["1"=>1]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?pro_cat=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?pro_cat=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_cat=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_cat=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_cat=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_cat=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?pro_cat=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?pro_cat=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/pro_cat/select.php', {
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
                 <h5 class="modal-title" id="exampleModalLabel1"><?php echo $lang['category'];?> </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/pro_cat/update.php" enctype="multipart/form-data">

                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['NAME']?> </label>
                       <input type="text" id="nameBasic" class="name form-control" name="name" required="" placeholder="<?=$lang['NAME']?> ">

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
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".name").val(name);
           })
         </script>

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"><?php echo $lang['category'];?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/pro_cat/insert.php" enctype="multipart/form-data">
                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"><?=$lang['NAME']?> </label>
                       <input type="text" id="nameBasic" class=" form-control" name="name" required="" placeholder="<?=$lang['NAME']?> ">

                     </div>

                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"> <?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-primary"> <?=$lang['Save']?></button>
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
                   <form method="post" action="inc/fun/pro_cat/delete.php">
                     <div id="name" class=" col mb-3">

                       <?php echo $lang['Are_you'];?>

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
             var pro_cat = get_filter('mat');
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
             var pro_cat = get_filter('mat');

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
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='pro_cat=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='pro_cat=list'");
           });
         </script>