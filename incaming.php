         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;">incaming list</h5>

                 <?php
                    if (isset($_GET['total'])=='error') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>يجب ان يتساوي الطرف المدين مع الطرف الدائن</center>
</div>';
          }
          if (isset($_GET['img_exe'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>(jpg,png,jpeg) ﻣﻦ ﻓﻀﻠﻚ ﻗﻢ ﺑﻮﺿﻊ ﺻﻮﺭﺓ ﺑﺘﻨﺴﻴﻖ  </center>
</div>';
          }
           if (isset($_GET['img'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>ﻻ ﻳﻤﻜﻦ اﺿﺎﻓﺔ اﻛﺜﺮ ﻣﻦ ﺻﻮﺭﺓ </center>
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
                     <a href="?gl=add&a=3">
                       <button type="button" class=" btn btn-success">

                         <?php echo $lang['Add'];?>

                       </button></a>
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
                         <center><?php echo $lang['DESCRIPTION'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Ref'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Currency'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Date'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['attach'];?></center>
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
  
  $sql->selectall("trans where t_type=3 and stat=0 and name LIKE '%$search%'  ORDER BY id DESC limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("trans where t_type=3 and stat=0 ORDER BY id DESC limit 10 offset  $id ");
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
                         <center><?=$row['name'];?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['ref'];?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php

$currency_id=$row["currency_id"];
  $sql->select1("currencies"," where id=$currency_id");
          while($row1=$sql->res1->fetch_assoc())
       {
echo $row1['code'];

       }
?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
 $date=date_create($row['date2']);
                                    echo date_format($date,"Y/m/d");
                                    ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;width: 20%;height: auto;">
                         <center><a target="_blank" href="inc/photo/<?=$row['photo']?>"><img src="inc/photo/<?=$row['photo']?>" style="width: 30%;height: auto;"></a></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center>
                           <a href="?exp=edit&id=<?=$row['id'];?>">
                             <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                               <i class='bx bxs-edit'></i>

                             </button></a>
                           <a href="?print=show&id=<?=$row['id'];?>">
                             <button type="button" class="id btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">

                               <i class="bx bxs-printer"></i>
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
              $sql->selectall("trans  where t_type=3 name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('trans',["t_type"=>3]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?incaming=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?incaming=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?incaming=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?incaming=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?incaming=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?incaming=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?incaming=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?incaming=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/expenses/select1.php', {
                 search: value
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
         </script>

         <!-- groub update -->

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['incomes']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/expenses/insert.php" enctype="multipart/form-data">

                     <div class="form-group">
                       <div class="col mb-3">
                         <label for="description"><span class="h6 "><?php echo $lang['DESCRIPTION'];?></span></label>

                         <textarea class="form-control" id="description" name="name"></textarea>

                       </div>

                     </div>

                     <table width="10%" class="datatables-basic  table table-bordered">
                       <thead>
                         <tr>

                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['From'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['DESCRIPTION'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['DEPIT'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['CRIDT'];?></center>
                           </th>
                           <th style="padding: .625rem 3.25rem;">
                             <center><?php echo $lang['ACTION'];?></center>
                           </th>

                         </tr>

                       </thead>
                       <tbody class="myTable">

                         <tr class="a" tx="tx" de="de" ce="ce" del="del">

                           <td>

                             <select name="from[]" class=" form-select ">

                               <?php

                                       $sql->selectall("account_no where account_c3=11 or account_c3=12 and stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $c3=$row['account_c3'];
                                        $sql->select1("account_c3","where id=$c3");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c3_n=$row1['name'];
                                          $c2=$row1['c2']?? 0;
                                        }


                                         $sql->select1("account_c2","where id=$c2");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        $c2_n=$row1['name'];
                                        }
                                        ?>

                               <option value="<?=$row['id']?>"><?=$c2_n." > ".$c3_n." > ".$row['account_name']?></option>
                               <?php

                                      }
                                        ?>

                             </select>
                           </td>

                           <td><input type="text" class=" form-control" name="des[]"></td>
                           <td><input type="number" class=" de0 form-control" ce="ce0" cost="cost0" de_t="0" del="del0" name="debit[]"></td>
                           <td><input type="number" class="ce0 form-control" de="de0" cost="cost0" ce_t="0" del="del0" name="cridt[]"></td>

                           <td style="padding: .625rem 0.25rem;">
                             <center><button type="button" style="float:left;" class="del del0 btn btn-danger" de="" ce="" a="a"><i class="bx bxs-trash-alt"></i></button><button style="float:right;" type="button" onclick="add(1,0)" de="0" ce="0" class="cost cost0  btn btn-success">+</button></center>
                           </td>

                         </tr>

                       </tbody>
                       <tr class="ss">
                         <td>
                           <div class="col mb-3">
                             <label for="account"><span class="h6"></span></label>
                             <button type="button" style="width: 100%" class="add btn btn-success">
                               <?php echo $lang['Add'];?> </button>

                           </div>
                         </td>
                         <td><?php echo $lang['Total'];?> </td>
                         <td><input type="text" disabled="" value="0" class="form-control de_t" name=""></td>
                         <input type="hidden" value="0" class="form-control de_t" name="total1">
                         <input type="hidden" value="0" class="form-control ce_t" name="total2">
                         <td><input type="text" disabled="" value="0" class="form-control ce_t" name=""></td>
                         <td></td>
                       </tr>

                     </table>
                     <select class="ex" style="display: none;">
                       <?php

                                       $sql->selectall("account_no where account_c3=39 and stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $c3=$row['account_c3'];
                                        $sql->select1("account_c3","where id=$c3");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c3_n=$row1['name'];
                                          $c2=$row1['c2']?? 0;
                                        }


                                         $sql->select1("account_c2","where id=$c2");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        $c2_n=$row1['name'];
                                        }
                                        ?>

                       <option value="<?=$row['id']?>"><?=$c2_n." > ".$c3_n." > ".$row['account_name']?></option>
                       <?php

                                      }
                                        ?>
                     </select>
                     <script type="text/javascript">
                       var z = 1;
                       $(".del0").click(function() {
                         var a = $(this).attr("a")
                         $("." + a).remove()
                         ///////////////////////////
                         var ce = Number($(this).attr("ce"));
                         var c_t1 = Number($(".ce_t").val());
                         $(".ce_t").val(c_t1 - ce);
                         //////////////////////////
                         var de = Number($(this).attr("de"));
                         var d_t1 = Number($(".de_t").val());
                         $(".de_t").val(d_t1 - de);
                       });
                       $(".de0").keyup(function() {
                         var de_t = Number($(this).attr("de_t"));
                         var d_t = Number($(".de_t").val());
                         var val = Number($(this).val());
                         $(".de_t").val(d_t - de_t);
                         var d_t = Number($(".de_t").val());
                         $(".de_t").val(d_t + val);
                         $(this).attr("de_t", val);
                         ////////////
                         var del = $(this).attr("del");
                         $("." + del).attr("de", val);
                         $("." + del).attr("ce", 0);
                         ////////////////
                         var cost = $(this).attr("cost");
                         $("." + cost).attr("de", val);
                         $("." + cost).attr("ce", 0);
                         ///
                         var ce = $(this).attr("ce");
                         var c_t = Number($("." + ce).attr("ce_t"));
                         var c_t1 = Number($(".ce_t").val());
                         $(".ce_t").val(c_t1 - c_t);
                         $("." + ce).attr("ce_t", 0);
                         $("." + ce).val(0);
                         ///
                       });
                       $(".ce0").keyup(function() {
                         var ce_t = Number($(this).attr("ce_t"));
                         var c_t = Number($(".ce_t").val());
                         var val = Number($(this).val());
                         $(".ce_t").val(c_t - ce_t);
                         $(this).attr("ce_t", val);
                         var c_t = Number($(".ce_t").val());
                         $(".ce_t").val(c_t + val);
                         ////////
                         var del = $(this).attr("del");
                         $("." + del).attr("ce", val);
                         $("." + del).attr("de", 0);
                         ////////////////
                         var cost = $(this).attr("cost");
                         $("." + cost).attr("ce", val);
                         $("." + cost).attr("de", 0);
                         ///
                         var de = $(this).attr("de");
                         var d_t = Number($("." + de).attr("de_t"));
                         var d_t1 = Number($(".de_t").val());
                         $(".de_t").val(d_t1 - d_t);
                         $("." + de).attr("de_t", 0);
                         $("." + de).val(0);
                         ///
                       });
                       $(".add").click(function() {
                         var n = z++;
                         var s = $(".ex").html()
                         $(".myTable").append('<tr class="a' + n + '"><td><select id="account" name="from[]" class="form-select"  >' + s + '</select></td><td><input type="text" class=" form-control" name="des[]"></td><td><input type="number" cost="cost' + n + '" del="del' + n + '" de_t="0" ce="ce' + n + '" name="debit[]" class="de' + n + ' form-control" name=""></td><td><input cost="cost' + n + '" del="del' + n + '" type="number" ce_t="0" class="ce' + n + ' form-control" de="de' + n + '" name="cridt[]"></td><td style="padding: .625rem 0.25rem;"><center><button type="button" style="float:left;"  class="del del' + n + '   btn btn-danger" de="0" ce="0" a="a' + n + '"><i class="bx bxs-trash-alt"></i></button><button type="button" style="float:right;" class="cost' + n + '  btn btn-success" onclick="add(1,0)" de="0" ce="0">+</button></center></td></tr>');
                         ////////////////////////////////////////////////
                         /////////////////////////////////////////////////
                         $(".de" + n).keyup(function() {
                           var de_t = Number($(this).attr("de_t"));
                           var d_t = Number($(".de_t").val());
                           var val = Number($(this).val());
                           $(".de_t").val(d_t - de_t);
                           var d_t = Number($(".de_t").val());
                           $(".de_t").val(d_t + val);
                           $(this).attr("de_t", val);
                           ////////////
                           var del = $(this).attr("del");
                           $("." + del).attr("de", val);
                           $("." + del).attr("ce", 0);
                           /////////////
                           var cost = $(this).attr("cost");
                           $("." + cost).attr("de", val);
                           $("." + cost).attr("ce", 0);
                           ///
                           var ce = $(this).attr("ce");
                           var c_t = Number($("." + ce).attr("ce_t"));
                           var c_t1 = Number($(".ce_t").val());
                           $(".ce_t").val(c_t1 - c_t);
                           $("." + ce).attr("ce_t", 0);
                           $("." + ce).val(0);
                           ///
                         });
                         $(".ce" + n).keyup(function() {
                           var ce_t = Number($(this).attr("ce_t"));
                           var c_t = Number($(".ce_t").val());
                           var val = Number($(this).val());
                           $(".ce_t").val(c_t - ce_t);
                           $(this).attr("ce_t", val);
                           var c_t = Number($(".ce_t").val());
                           $(".ce_t").val(c_t + val);
                           ///////
                           var del = $(this).attr("del");
                           $("." + del).attr("ce", val);
                           $("." + del).attr("de", 0);
                           ///
                           ///////
                           var cost = $(this).attr("cost");
                           $("." + cost).attr("ce", val);
                           $("." + cost).attr("de", 0);
                           ///
                           var de = $(this).attr("de");
                           var d_t = Number($("." + de).attr("de_t"));
                           var d_t1 = Number($(".de_t").val());
                           console.log(d_t, d_t1)
                           $(".de_t").val(d_t1 - d_t);
                           $("." + de).attr("de_t", 0);
                           $("." + de).val(0);
                           ///
                         });
                         $(".del" + n).click(function() {
                           var a = $(this).attr("a")
                           $("." + a).remove()
                           ///////////////////////////
                           var ce = Number($(this).attr("ce"));
                           var c_t1 = Number($(".ce_t").val());
                           $(".ce_t").val(c_t1 - ce);
                           //////////////////////////
                           var de = Number($(this).attr("de"));
                           var d_t1 = Number($(".de_t").val());
                           $(".de_t").val(d_t1 - de);
                         });
                         //////////////////
                         $(".de" + n).change(function() {
                           var b = $(this).attr("ce");
                           var cost = $(this).attr("cost");
                           var c = $("." + b).val()
                           var a = 'add(' + $(this).val() + ',' + c + ')';
                           $("." + cost).attr("onclick", a);
                         });
                         $(".ce" + n).change(function() {
                           var b = $(this).attr("de");
                           var cost = $(this).attr("cost");
                           var c = $("." + b).val()
                           var a = 'add(' + c + ',' + $(this).val() + ')';
                           $("." + cost).attr("onclick", a);
                         });
                         ////////////
                       });
                     </script>

                     <br>

                     <select style="display: none" class="ex1 form-select ">

                       <?php

                                       $sql->selectall("cost1 where stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $id=$row['id'];
                                        $sql->select1("cost2","where c1=$id");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c2_n=$row1['name'];
                                         $id_c=$row1['id'];
                                        }


                                        
                                        ?>

                       <option value="<?=$id_c?>"><?=$row['account_name']." > ".$c2_n?></option>
                       <?php

                                      }
                                        ?>

                     </select>

                     <table width="10%" style="display: none;" class="costd datatables-basic  table table-bordered">
                       <thead>
                         <tr>
                           <th colspan="4">
                             <center><?php echo $lang['cost_centers'];?></center>
                           </th>

                         </tr>
                         <tr>

                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['cost_centers'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['percentage'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['Amount'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['DELETE'];?></center>
                           </th>

                         </tr>

                       </thead>
                       <tbody class="myTable1">

                       </tbody>
                       <tr class="ss">
                         <td>
                           <div class="col mb-3">
                             <label for="account"><span class="h6"></span></label>
                             <button type="button" style="width: 100%" onclick="add(10,0)" class=" btn btn-success">
                               <?php echo $lang['Add'];?> </button>

                           </div>
                         </td>
                         <td><input type="text" disabled="" value="0" class="form-control nn" name=""></td>
                         <td><input type="text" disabled="" value="0" class="form-control price_p" name=""></td>

                         <td></td>
                       </tr>
                     </table>

                     <br>
                     <table width="10%" style="display: none;" class="costc datatables-basic  table table-bordered">
                       <thead>
                         <tr>
                           <th colspan="4">
                             <center>credit</center>
                           </th>

                         </tr>
                         <tr>

                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['cost_centers'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['percentage'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?php echo $lang['Amount'];?></center>
                           </th>
                           <th style="padding: .625rem 0.25rem;">
                             <center><?=$lang['DELETE1']?></center>
                           </th>

                         </tr>

                       </thead>
                       <tbody class="myTable2">

                       </tbody>
                       <tr class="ss">
                         <td>
                           <div class="col mb-3">
                             <label for="account"><span class="h6"></span></label>
                             <button type="button" style="width: 100%" onclick="add(0,10)" class=" btn btn-success">
                               <?php echo $lang['Add'];?> </button>

                           </div>
                         </td>
                         <td><input type="text" disabled="" value="0" class="form-control nnn" name=""></td>
                         <td><input type="text" disabled="" value="0" class="form-control price_pp" name=""></td>

                         <td></td>
                       </tr>
                     </table>

                     <div class="form-group">
                       <div class="row">

                         <div class="col mb-3">

                           <label for="currency"><span class="h6"><?php echo $lang['Currency'];?></span></label>
                           <select id="currency" name="currency" class="form-select ">

                             <?php

                                       $sql->selectall("currencies");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                             <option value="<?=$row['id']?>"><?=$row['code']?></option>
                             <?php

                                      }
                                        ?>

                           </select>
                         </div>

                         <div class="col mb-3">
                           <label for="ref"><span class="h6"><?php echo $lang['Ref'];?></span></label>
                           <input type="text" class="form-control" id="ref" name="ref">
                         </div>

                       </div>
                     </div>

                 </div>

               </div>

               <input type="hidden" value="3" name="a">
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
                   <form method="post" action="inc/fun/expenses/delete.php">
                     <div id="name" class=" col mb-3">

                       <?php echo $lang['Are_you'];?>

                     </div>
                     <input class="val" type="hidden" name="id">
                     <input type="hidden" value="3" name="a">
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
             var expenses = get_filter('mat');
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
             var expenses = get_filter('mat');

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

         <!-- aaaaaaaaaaaaaaaaaaaa -->
         <script type="text/javascript">
           $(".de0").change(function() {
             var b = $(this).attr("ce");
             var cost = $(this).attr("cost");
             var c = $("." + b).val()
             var a = 'add(' + $(this).val() + ',' + c + ')';
             $("." + cost).attr("onclick", a);
           });
           $(".ce0").change(function() {
             var b = $(this).attr("de");
             var cost = $(this).attr("cost");
             var c = $("." + b).val()
             var a = 'add(' + c + ',' + $(this).val() + ')';
             $("." + cost).attr("onclick", a);
           });
           //////////////////////
           function add(dr, cr) {
             if (cr == 0) {
               var v = 1;
               if (v == 1) {
                 $(this).attr({
                   disabled: ''
                 });
               }
               var n = z++;
               var s = $(".ex1").html();
               $(".costd").show();
               $(".myTable1").append('<tr class="d' + n + '"><td><select id="account" name="cost2_d[]" class="form-select">' + s + '</select></td><td><input type="text"  price="price' + n + '" step="10" min="0" max="100" price_p="0" nn="0" class="n' + n + ' form-control" name="rate_d[]"></td><td><input type="text" name="price_d[]" class="price' + n + ' form-control" nn="0" n="n' + n + '" name=""></td><td style="padding: .625rem 0.25rem;"><center><button type="button"  class="del del' + n + '   btn btn-danger" nn="0" price_p="0" de="0" ce="0" a="d' + n + '"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');
               ///////////////////////////////////////
               $(".n" + n).change(function() {
                 var d_t1 = Number($(".de_t").val());
                 var price = Number($(this).val());
                 if (price > 100) {
                   var price = 100;
                   $(this).val(100)
                 } else if (price < 0) {
                   var price = 0;
                   $(this).val(0)
                 }
                 var total = Math.round(d_t1 / 100 * price);
                 var price1 = $(this).attr("price");
                 $("." + price1).val(Math.round(total))
                 var price_p = Number($(this).attr("price_p"));
                 var nn = Number($(".nn").val()) - price_p
                 $(".nn").val(Math.round(nn))
                 $(".nn").val(Math.round(nn + (total / d_t1 * 100)))
                 $(this).attr("price_p", price);
                 /////////////
                 var nn1 = Number($(this).attr("nn"));
                 var nn = Number($(".price_p").val()) - nn1
                 $(".price_p").val(Math.round(nn))
                 $(".price_p").val(nn + Math.round(total))
                 $(this).attr("nn", Math.round(total));
                 $(".del" + n).attr("price_p", Math.round(price));
                 $(".del" + n).attr("nn", Math.round(total));
               });
               /////////////////////////////////////////////
               $(".price" + n).change(function() {
                 var d_t1 = Number($(".de_t").val());
                 var nb = Number($(this).val());
                 if (nb > d_t1) {
                   var nb = d_t1;
                   $(this).val(d_t1)
                 } else if (nb < 0) {
                   var nb = 0;
                   $(this).val(0)
                 }
                 var total = Math.round(nb / d_t1 * 100);
                 var n1 = $(this).attr("n");
                 $("." + n1).val(Math.round(total))
                 var price_p = Number($("." + n1).attr("price_p"));
                 var nn = Number($(".nn").val()) - price_p;
                 $(".nn").val(Math.round(nn));
                 $(".nn").val(Math.round(nn + total));
                 $("." + n1).attr("price_p", total);
                 /////////
                 var nn1 = Number($("." + n1).attr("nn"));
                 var nn2 = Number($(".price_p").val()) - nn1;
                 $(".price_p").val(Math.round(nn2 + nb))
                 $(".nn").val(Math.round(nn + total));
                 $("." + n1).attr("nn", nb);
                 $(".del" + n).attr("price_p", Math.round(total));
                 $(".del" + n).attr("nn", Math.round(nb));
               });
               //////////////////////////////////////////////
               $(".del" + n).click(function() {
                 var a = $(this).attr("a")
                 var nn = Number($(this).attr("nn"));
                 var price_p = Number($(this).attr("price_p"));
                 var cc = Number($(".nn").val()) - price_p;
                 $(".nn").val(Math.round(cc))
                 var nn = Number($(".price_p").val()) - nn;
                 $(".price_p").val(Math.round(nn))
                 $("." + a).remove()
                 ///////////////////////////
               });
               /////////////////
             } else {
               var v = 1;
               if (v == 1) {
                 $(this).attr({
                   disabled: ''
                 });
               }
               var n = z++;
               var s = $(".ex1").html();
               $(".costc").show();
               ''
               $(".myTable2").append('<tr class="d' + n + '"><td><select id="account" name="cost2_c[]" class="form-select"  >' + s + '</select></td><td><input type="text"  price="price' + n + '" step="10" min="0" max="100" price_p="0" nn="0" class="n' + n + ' form-control" name="rate_c[]"></td><td><input type="text" name="price_c[]" class="price' + n + ' form-control" nn="0" n="n' + n + '" name=""></td><td style="padding: .625rem 0.25rem;"><center><button type="button"  class="del del' + n + '   btn btn-danger" nn="0" price_p="0" de="0" ce="0" a="d' + n + '"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');
               ///////////////////////////////////////
               $(".n" + n).change(function() {
                 var d_t1 = Number($(".ce_t").val());
                 var price = Number($(this).val());
                 if (price > 100) {
                   var price = 100;
                   $(this).val(100)
                 } else if (price < 0) {
                   var price = 0;
                   $(this).val(0)
                 }
                 var total = Math.round(d_t1 / 100 * price);
                 var price1 = $(this).attr("price");
                 $("." + price1).val(Math.round(total))
                 var price_p = Number($(this).attr("price_p"));
                 var nn = Number($(".nnn").val()) - price_p
                 $(".nnn").val(Math.round(nn))
                 $(".nnn").val(nn + Math.round(total / d_t1 * 100))
                 $(this).attr("price_p", Math.round(price));
                 /////////////
                 var nn1 = Number($(this).attr("nn"));
                 var nn = Number($(".price_pp").val()) - nn1
                 $(".price_pp").val(Math.round(nn))
                 $(".price_pp").val(nn + Math.round(total))
                 $(this).attr("nn", Math.round(total));
                 $(".del" + n).attr("price_p", Math.round(price));
                 $(".del" + n).attr("nn", Math.round(total));
               });
               /////////////////////////////////////////////
               $(".price" + n).change(function() {
                 var d_t1 = Number($(".ce_t").val());
                 var nb = Number($(this).val());
                 if (nb > d_t1) {
                   var nb = d_t1;
                   $(this).val(d_t1)
                 } else if (nb < 0) {
                   var nb = 0;
                   $(this).val(0)
                 }
                 var total = nb / d_t1 * 100;
                 var n1 = $(this).attr("n");
                 $("." + n1).val(Math.round(total))
                 var price_p = Number($("." + n1).attr("price_p"));
                 var nn = Number($(".nnn").val()) - price_p;
                 $(".nnn").val(Math.round(nn));
                 $(".nnn").val(Math.round(nn + total));
                 $("." + n1).attr("price_p", Math.round(total));
                 /////////
                 var nn1 = Number($("." + n1).attr("nn"));
                 var nn2 = Number($(".price_pp").val()) - nn1;
                 $(".price_pp").val(Math.round(nn2 + nb));
                 $(".nnn").val(nn + Math.round(total));
                 $("." + n1).attr("nn", Math.round(nb));
                 $(".del" + n).attr("price_p", Math.round(total));
                 $(".del" + n).attr("nn", Math.round(nb));
               });
               //////////////////////////////////////////////
               $(".del" + n).click(function() {
                 var a = $(this).attr("a")
                 var nn = Number($(this).attr("nn"));
                 var price_p = Number($(this).attr("price_p"));
                 var cc = Number($(".nnn").val()) - price_p;
                 $(".nnn").val(cc)
                 var nn = Number($(".price_pp").val()) - nn;
                 $(".price_pp").val(nn)
                 $("." + a).remove()
                 ///////////////////////////
               });
               /////////////////
             }
             //////////////////////
           }
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='incaming=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='incaming=list'");
           });
         </script>