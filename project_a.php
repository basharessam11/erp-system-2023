         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"> <?=$lang['Feasibility_study']?></h5>

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
                         <center><?php echo $lang['NAME'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Amount'];?></center>
                       </th>
                       

                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['EDIT']?></center>
                       </th>
                     </tr>

                   </thead>
                   <tbody id="myTable">
                     <?php
$get=$_GET['id'];
if (isset($_GET['search'])) {
   $search=$_GET['search'];

   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  
  $sql->selectall("pro_a where pro_id=$get and name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("pro_a where pro_id=$get ORDER BY id desc limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     $pro_a1=$row["name"];
      ?>
                     <tr>
                       <td style="padding: .625rem 0.25rem;">
                         <center><input value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox"></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$name=$row["name"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["amount"]?></center>
                       </td>
                       

                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" name="<?=$row["name"]?>" type11="<?=$row["type"]?>" amount="<?=$row["amount"]?>" besho="<?=$row["id"]?>">
                             <i class='bx bxs-edit'></i>

                           </button>
                         </center>
                       </td>

                     </tr>
                     <?php
     }


      ?>
                     <tr bgcolor="#e5e5e5">
                       <td colspan="2">
                         <center> </center>
                       </td>

                       <td colspan="2">
                         <center>اجمالي الميزانية</center>
                       </td>
                       <td>
                         <center>المنصرف الفعلي</center>
                       </td>
                       
                     </tr>




                     <tr bgcolor="#e5e5e5">
                       <td colspan="2">
                         <center>total</center>
                       </td>

                       <td colspan="2">
                         <center>
                           <?php

  $sql->selectsum("amount","pro_a"," pro_id=$get");
     while ($row = $sql->res_sum->fetch_assoc()) {
echo $row['SUM(amount)'];

}
          ?></center>
                       </td>
                       <td>
                         <center>
                           <?php
          $sql->select1("project"," where id=$get");

     while ($row1 = $sql->res1->fetch_assoc()) {
$name=$row1['name'];

     }
$sql->select1("account_no"," where account_name='$name'");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_id=$row1['id'];

     }

  $sql->selectsum("dr","transaction"," account_id=$account_id");
     while ($row = $sql->res_sum->fetch_assoc()) {
echo $row['SUM(dr)'];

}
          ?></center>
                       </td>
                    
                     </tr>

                   </tbody>
                 </table>

                 <div class="dataTables_paginate paging_simple_numbers">
                   <br>
                   <ul class="pagination">
                     <?php
    if (isset($_GET['search'])) {
              $search=$_GET['search'];
              $sql->selectall("pro_a  where  name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('pro_a',["1"=>1]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?pro_a=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?pro_a=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_a=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_a=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_a=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_a=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?pro_a=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?pro_a=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/pro_a/select.php', {
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
                 <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['EDIT']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/pro_a/update.php" enctype="multipart/form-data">
                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"> <?= $lang['Type'];?></label>
                       <select id="account" name="type" class="type form-select">
                         <?php

                                       $sql->selectall("pro_type");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        
                                        ?>

                         <option value="<?=$row['id']?>"><?=$row['name']?></option>
                         <?php

                                      }
                                        ?>
                       </select>

                     </div>
                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"> <?= $lang['NAME'];?></label>
                       <input type="text" id="nameBasic" class="name form-control" name="name" required="" placeholder=" <?php echo $lang['Name'];?>">

                     </div>

                     <div class="col mb-3">
                       <label for="nameBasic" class="form-label"> <?php echo $lang['Amount'];?> </label>
                       <input type="text" class="amount form-control" name="amount" required="" placeholder="<?php echo $lang['Amount'];?> ">

                     </div>

                 </div>

               </div>
               <input type="hidden" value="<?=$_GET['id']?>" name="pro_id">
               <input class="zz" type="hidden" name="id">

               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
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
             var amount = $(this).attr('amount');
             var type = $(this).attr('type11');
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".name").val(name);
             $(".type").val(type);
             $(".amount").val(amount);
           })
         </script>

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['Add']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/pro_a/insert.php" enctype="multipart/form-data">

                     <div class="kk">
                       <br><br>

                       <table width="10%" class="datatables-basic  table table-bordered">
                         <thead>
                           <tr>

                             <th style="padding: .625rem 0.25rem;"><?php echo $lang['Type'];?></center>
                             </th>
                             <th style="padding: .625rem 0.25rem;">
                               <center><?= $lang['NAME'];?></center>
                             </th>

                             <th style="padding: .625rem 0.25rem;"><?php echo $lang['Amount'];?></center>
                             </th>

                             <th style="padding: .625rem 0.25rem;">
                               <center><?php echo $lang['ACTION'];?></center>
                             </th>
                           </tr>

                         </thead>
                         <tbody id="myTable">

                           <tr class="ttt">
                             <td colspan="4"></td>
                           </tr>
                           <tr>
                             <td colspan="4"> <button type="button" onclick="add()" class=" btn btn-success">
                                 add new

                               </button></td>
                           </tr>

                         </tbody>
                       </table>

                     </div>
                 </div>
                 <input type="hidden" value="<?=$_GET['id']?>" name="pro_id">
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
                   <form method="post" action="inc/fun/pro_a/delete.php">
                     <div id="name" class=" col mb-3">

                       <?php echo $lang['Are_you'];?>

                     </div>
                     <input class="val" type="hidden" name="id">
                 </div>
                 <input type="hidden" value="<?=$_GET['id']?>" name="pro_id">

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
             var pro_a = get_filter('mat');
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
             var pro_a = get_filter('mat');

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
         <select class="ex" style="display: none;">
           <?php

                                       $sql->selectall("pro_type");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        
                                        ?>

           <option value="<?=$row['id']?>"><?=$row['name']?></option>
           <?php

                                      }
                                        ?>
         </select>
         <script type="text/javascript">
           $(document).ready(function() {
             add()
           });
           var x = 0;

           function add() {
             x++;
             var ex = $(".ex").html();
             $(".ttt").before('<tr  class="tr' + x + '"><td style="padding: .625rem 0.25rem;"><center ><select id="account" name="type[]" class="form-select"  >' + ex + '</select></center></td><td style="padding: .625rem 0.25rem;"><center ><input type="text" id="nameBasic" class=" form-control" name="name[]" required=""  placeholder="<?= $lang['
               NAME '];?> "></center></td><td style="padding: .625rem 0.25rem;"><center ><input type="number" class="form-control" name="amount[]" placeholder="<?=$lang['
               Amount ']?>"></center></td><td style="padding: .625rem 0.25rem;"><center><button type="button" class=" btn btn-danger"  onclick="del(' + x + ')"><i class="bx bxs-trash-alt" ></i></button></center></td></tr>');
           }

           function del(a) {
             $(".tr" + a).remove()
           }
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='pro_a=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='pro_a=list'");
           });
         </script>