<?php
$lang1=$_COOKIE['lang'];
if (!isset($_COOKIE['lang'])) {
  header("location:../../des/lang.php?lang=en");
}

if ($lang1=="ar") {
    include"../../../languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"../../../languages/lang.en.php";
}
?>
<table width="10%"  class="datatables-basic  table table-bordered">
      <thead>
        <tr>
         
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          <th style="padding: .625rem 0.25rem;"><center>stage</center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['NAME']?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center>start date</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>end date</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>manger</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>status</center> </th>
       
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['EDIT']?></center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
    <?php
    include "../../sql.php";
$user_id=filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
$stat=filter_var($_POST['stat'], FILTER_VALIDATE_INT);
error_reporting(0);

if (isset($_GET['search'])) {
   $search=$_GET['search'];

   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
 
  $sql->selectall("pro_task where user_id=$user_id and stat=$stat and name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1??0;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
 
    $sql->selectall("pro_task where user_id=$user_id and stat=$stat ORDER BY id limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {

      ?>
      <tr >
     
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?php
      $stage_id=$row["stage_id"];
     $sql->select1("pro_stag"," where id=$stage_id");
while ($row1 = $sql->res1->fetch_assoc()) {
echo $row1['name'];
}



      ?></center></td>
<td style="padding: .625rem 0.25rem;"><center ><?=$row["name"]?></center></td>

      
<td style="padding: .625rem 0.25rem;"><center ><?=$row["start_date"]?></center></td>

      <td style="padding: .625rem 0.25rem;"><center ><?=$row["end_date"]?></center></td>
<td style="padding: .625rem 0.25rem;"><center ><?php
      $user=$row['user_id'];
      $sql->select1("user","where id = $user");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {

echo$row1['name'];

}
                                          ?></center></td>

<td style="padding: .625rem 0.25rem;"><center ><?php
      $status=$row['stat'];
if ($status==1) {
  echo'<div class="alert alert-primary">المراجعة</div>';
}else if ($status==2) {
  echo'<div class="alert alert-primary">قيد التنفيذ</div>';
}else if ($status==3) {
  echo'<div class="alert alert-success">اكتمل</div>';
}
                                          ?>
                                              
                                          </center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
          
         
              <a href="?task=view&id=<?=$row["id"]?>"><button type="button" class="id btn btn-primary" >
        <i class='bx bxs-edit'></i>

              </button></a>
            </center></td>

                  
      
     
      
      </tr>
      <?php
     }


      ?>

     </tbody>
    </table>

<div class="dataTables_paginate paging_simple_numbers" >
<br>
<ul class="pagination">
<?php
    if (isset($_GET['search'])) {
              $search=$_GET['search'];
              $sql->selectall("pro_task  where user_id=$user_id and stat=$stat and name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('pro_task',["user_id"=>"$user_id","stat"=>"$stat"]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?task=list&search='.$search.'&page='.$pp.'&stat='.$stat.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?task=list&page='.$pp.'&stat='.$stat.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&search='.$search.'&page='.$i.'&stat='.$stat.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&page='.$i.'&stat='.$stat.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&search='.$_GET['search'].'&page='.$i.'&stat='.$stat.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?task=list&page='.$i.'&stat='.$stat.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?task=list&search='.$_GET['search'].'&page='.$page.'&stat='.$stat.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?task=list&page='.$page.'&stat='.$stat.'">Next</a>';
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
