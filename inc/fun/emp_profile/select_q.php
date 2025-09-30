<?php

include "../../sql.php";
$lang1=$_COOKIE['lang'];


if ($lang1=="ar") {
    include"../../../languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"../../../languages/lang.en.php";
}
  $search=filter_var($_POST['search'], FILTER_SANITIZE_STRING);
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);


error_reporting(0);
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }

if (!empty($search)) {
  ?>
<table width="100%"  class="datatables-basic table table-bordered ">
      <thead>
         <tr>
         
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          
           <th style="padding: .625rem 0.25rem;"><center>التاريخ</center> </th>
         <th style="padding: .625rem 0.25rem;"><center>عرض التفاصيل</center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("qu_r where  id =$search  and emp_id=$emp_id ORDER BY id DESC  limit 10 offset  $id");
          if ($sql->res->num_rows==0) {
  echo '<div class="alert alert-danger"><center><b> not found</b> </center></div>';
 }

     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      
      ?>

        <tr >
   
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$date=$row["date"];?></center></td>


      
          
        <td><center >

                <a href="emp_salary_v.php?&id=<?=$emp_id?>&date=<?=$date?>"><button type="button" class="id btn btn-primary">
        <i class='bx bxs-eye'></i>

              </button></a>
            </center></td>

                  
      
     
      
      </tr>
            <?php
     }


      ?>

       </tbody>
    </table>
<br>


<?php

}else{
  ?>
  <table width="100%"  class="datatables-basic table table-bordered ">
      <thead>
                 <tr>
         
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          
           <th style="padding: .625rem 0.25rem;"><center>التاريخ</center> </th>
         <th style="padding: .625rem 0.25rem;"><center>عرض التفاصيل</center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
          <?php
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);

$array=[];
$array1=[];
 $sql->select1("qu_r","where emp_id=$emp_id");

     while ($row1 = $sql->res1->fetch_assoc()) {
      if (!in_array($row1['date'],$array)) {
       array_push($array, $row1['date']);
       array_push($array1, $row1['id']);
      }

     }
$imp=implode(" or id = ", $array1);

  
    $sql->selectall("qu_r where id=$imp order by id desc limit 10 offset  $id ");
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      $emp_slip=$row["id"];
      ?>
        <tr >
   
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$date=$row["date"];?></center></td>


      
          
        <td><center >

                <a href="emp_salary_v.php?&id=<?=$emp_id?>&date=<?=$date?>"><button type="button" class="id btn btn-primary">
        <i class='bx bxs-eye'></i>

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

       $sql->check('qu_r',["id"=>"$imp"]);
       $n=ceil($sql->check/10+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?all_rate=list&id='.$emp_id.'&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?all_rate=list&id='.$emp_id.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?all_rate=list&id='.$emp_id.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?all_rate=list&id='.$emp_id.'&page='.$page.'">Next</a>';
              }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
              }

            ?>
</ul>


<?php
}

?>
