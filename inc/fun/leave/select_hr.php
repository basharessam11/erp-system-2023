<?php

include "../../sql.php";
  $search=filter_var($_POST['search'], FILTER_SANITIZE_STRING);
$lang1=$_COOKIE['lang'];


if ($lang1=="ar") {
    include"../../../languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"../../../languages/lang.en.php";
}
////
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
          <th style="padding: .625rem 0.25rem;"><center><input   class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center>Num</center></th>
          <th style="padding: .625rem 0.25rem;"><center>name</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>department</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>from</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>to</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>status</center> </th>
        
         <th style="padding: .625rem 0.25rem;"><center>approved</center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("emp_leave where stat=2 and  emp_name LIKE '$search%'  ORDER BY id DESC  limit 10 offset  $id");
          if ($sql->res->num_rows==0) {
  echo '<div class="alert alert-danger"><center><b> not found</b> </center></div>';
 }

     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      
      ?>

           <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['emp_name'];?> </center></td>

<td style="padding: .625rem 0.25rem;"><center ><?php


      $id=$row["emp_depart"];

      $sql->select1("department","where id=$id");
                                   while ($row1=$sql->res1->fetch_assoc()) {
                                     echo$row1['name'];
                                   }

                                   ?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['from_date'];?> </center></td>

      <td style="padding: .625rem 0.25rem;"><center ><?=$row['to_date'];?> </center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?php
      $stat=$row['stat'];
if ($stat==1) {
  echo '<div class="alert alert-warning">Waiting for manager approval<div>';
}elseif ($stat==2) {
    echo '<div class="alert alert-warning">Waiting for hr . approval<div>';
}elseif ($stat==3) {
    echo '<div class="alert alert-success">Been approved<div>';
}

      ?> </center></td>

                  <td style="padding: .625rem 0.25rem;"><center>
          <a href="inc/fun/leave/stat.php?id=<?=$row["id"]?>&stat=3">
         <button type="button" class=" btn btn-success"  days="<?=$row["days"]?>"  besho="<?=$row["id"]?>">
        approved

              </button></a></center></td>

                  
      
     
      
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

     	  $sql->selectall("emp_leave  where  stat=2 and emp_name LIKE '$search%' ");
  	$num=$sql->res->num_rows;
	 $n=ceil($num/10+1) ;
             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?hr=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hr=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hr=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?hr=list&page='.$page.'">Next</a>';
              }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
              }

            ?>
</ul>


<?php

}else{
	?>
	<table width="100%"  class="datatables-basic table table-bordered ">
      <thead>
                        <tr>
          <th style="padding: .625rem 0.25rem;"><center><input   class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center>Num</center></th>
          <th style="padding: .625rem 0.25rem;"><center>name</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>department</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>from</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>to</center> </th>
          <th style="padding: .625rem 0.25rem;"><center>status</center> </th>
        
         <th style="padding: .625rem 0.25rem;"><center>approved</center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("emp_leave where stat=2 ORDER BY id DESC limit 10   offset  $id ");
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
      <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['emp_name'];?> </center></td>

<td style="padding: .625rem 0.25rem;"><center ><?php


      $id=$row["emp_depart"];

      $sql->select1("department","where id=$id");
                                   while ($row1=$sql->res1->fetch_assoc()) {
                                     echo$row1['name'];
                                   }

                                   ?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['from_date'];?> </center></td>

      <td style="padding: .625rem 0.25rem;"><center ><?=$row['to_date'];?> </center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?php
      $stat=$row['stat'];
if ($stat==1) {
  echo '<div class="alert alert-warning">Waiting for manager approval<div>';
}elseif ($stat==2) {
    echo '<div class="alert alert-warning">Waiting for hr . approval<div>';
}elseif ($stat==3) {
    echo '<div class="alert alert-success">Been approved<div>';
}

      ?> </center></td>

                  <td style="padding: .625rem 0.25rem;"><center>
          <a href="inc/fun/leave/stat.php?id=<?=$row["id"]?>&stat=3">
         <button type="button" class=" btn btn-success"  days="<?=$row["days"]?>"  besho="<?=$row["id"]?>">
        approved

              </button></a></center></td>

                  
      
     
      
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

       $sql->check('emp_leave',["stat"=>2]);
       $n=ceil($sql->check/10+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?hr=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hr=list&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hr=list&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?hr=list&page='.$page.'">Next</a>';
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

   <script>
  $(".id").click(function(){
      var emp_id=$(this).attr('emp_id'); 
      var emp_name=$(this).attr('emp_name'); 
      var emp_depart=$(this).attr('emp_depart'); 
      var leave_type=$(this).attr('leave_type'); 
      var from_date=$(this).attr('from_date'); 
      var to_date=$(this).attr('to_date'); 
      var des=$(this).attr('des'); 
      var days=$(this).attr('days'); 


      var id=$(this).attr('besho');

      $('.zz').val(id);
      $(".emp_id").val(emp_id);
      $(".emp_name").val(emp_name);
      $(".emp_depart").val(emp_depart);
      $(".leave_type").val(leave_type);
      $(".from_date").val(from_date);
      $(".to_date").val(to_date);
      $(".des").html(des);
      $(".days").val(days);
  ;
      
  })
</script>