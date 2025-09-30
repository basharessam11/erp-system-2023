         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?=$lang['Tasks']?></h5>

                 <?php
              $username=$_SESSION['login'];
$sql->selectall(" user where name = '$username'");
     while ($row1 = $sql->res->fetch_assoc()) {
    $user_id=$row1['id'];

     }
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
              if (isset($_GET['add1'])=='no') {
          echo '<br><br><div id="success-alert1" class="alert alert-danger" role="alert">
 <center>الرجاء ملئ جميع الحقول واعادة المحاولة</center>
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

                   </div>
                 </div>

                 <div id="DataTables_Table_1_filter" class="dataTables_filter">
                   <br>
                   <select id="account" name="status_t" class="stat form-select">

                     <option <?php

if ($row['stat']==1) {
echo 'selected';
}?> value="1">المراجعة</option>
                     <option <?php

if ($row['stat']==2) {
echo 'selected';
}?> value="2">قيد التنفيذ</option>
                     <option <?php

if ($row['stat']==3) {
echo 'selected';
}?> value="3">اكتمل</option>
                   </select>
                   <br>
                 </div>
               </div>

               <script type="text/javascript">
                 $(".stat").change(function() {
                   var stat = $(this).val();
                   var user_id = < ? = $user_id ? > ;
                   $.post('inc/fun/pro_task/filter.php',
                   {
                     stat: stat,
                     user_id: user_id,
                   }, function(data) {
                     $(".kk").html(data);
                   });
                 })
               </script>

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
                         <center><?=$lang['staget']?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['NAME']?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['Start_Date']?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['end_Date']?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['manger']?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['Status']?></center>
                       </th>

                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['EDIT']?></center>
                       </th>
                     </tr>

                   </thead>
                   <tbody id="myTable">
                     <?php
 if (isset($_GET['stat'])) {
   $stat='and stat='.$_GET['stat'];
 }else{
  $stat='';
 }
if (isset($_GET['search'])) {
   $search=$_GET['search'];

   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }


  $sql->selectall("pro_task where user_id=$user_id $stat and name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
 
    $sql->selectall("pro_task where user_id=$user_id $stat ORDER BY id limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {

      ?>
                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
      $stage_id=$row["stage_id"];
     $sql->select1("pro_stag"," where id=$stage_id");
while ($row1 = $sql->res1->fetch_assoc()) {
echo $row1['name'];
}



      ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["name"]?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["start_date"]?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["end_date"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
      $user=$row['user_id'];
      $sql->select1("user","where id = $user");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {

echo$row1['name'];

}
                                          ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
      $status=$row['stat'];
if ($status==1) {
  echo'<div class="alert alert-primary">المراجعة</div>';
}else if ($status==2) {
  echo'<div class="alert alert-primary">قيد التنفيذ</div>';
}else if ($status==3) {
  echo'<div class="alert alert-success">اكتمل</div>';
}
                                          ?>

                         </center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="?task=view&id=<?=$row["id"]?>"><button type="button" class="id btn btn-primary">
                               <i class='bx bxs-edit'></i>

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
              $sql->selectall("pro_task  where user_id=$user_id $stat and  name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->selectall("pro_task  where user_id=$user_id $stat ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
      
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?task=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?task=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?task=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?task=list&page='.$page.'">Next</a>';
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
               var value = $(this).val();
               var user_id = < ? = $user_id ? > ;
               $.post('inc/fun/pro_task/select_task.php', {
                 search: value,
                 user_id: user_id
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='task=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='task=list'");
           });
         </script>