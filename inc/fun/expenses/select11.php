<?php

include "../../sql.php";
$lang1=$_COOKIE['lang'];


if ($lang1=="ar") {
    include"../../../languages/lang.ar.php";
}elseif ($lang1=="en") {
  include"../../../languages/lang.en.php";
}
  $search=filter_var($_POST['search'], FILTER_SANITIZE_STRING);

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
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DESCRIPTION'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center>ref</center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Currency'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Date'];?></center> </th>

           
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['ACTION']?></center> </th>
        </tr>




      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("trans where t_type=3 and name LIKE '%$search%' and total <=50000  ORDER BY id DESC limit 10 offset  $id");

          if ($sql->res->num_rows==0) {
  echo '<div class="alert alert-danger"><center><b> not found</b> </center></div>';
 }

     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      
      ?>

        <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['name'];?></center></td>

  <td style="padding: .625rem 0.25rem;"><center ><?=$row['ref'];?></center></td>




<td style="padding: .625rem 0.25rem;"><center ><?php

$currency_id=$row["currency_id"];
  $sql->select1("currencies"," where id=$currency_id");
          while($row1=$sql->res1->fetch_assoc())
       {
echo $row1['code'];

       }
?></center></td>
  <td style="padding: .625rem 0.25rem;"><center ><?=$row["date2"]?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
           <a href="?exp=edit&id=<?=$row['id'];?>">
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" >
        <i class='bx bxs-edit'></i>

              </button></a>
             <a href="?print=show&id=<?=$row['id'];?>">
         <button type="button" class="id btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal" >

<i class="bx bxs-printer"></i>
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

        $sql->selectall("trans  where  t_type=3 and name LIKE '%$search%' and total <=50000 ");
    $num=$sql->res->num_rows;
   $n=ceil($num/10+1) ;
             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?manger1=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger1=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger1=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?manger1=list&page='.$page.'">Next</a>';
              }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
              }

            ?>
</ul>
 <script>
  $(".id").click(function(){
      var name=$(this).attr('name'); 

      var rate=$(this).attr('rate'); 
      var id=$(this).attr('besho');

      $('.zz').val(id);
      $(".name").val(name);
      $(".rate").val(rate);
      
  })
</script>

<?php

}else{
  ?>
  <table width="100%"  class="datatables-basic table table-bordered ">
      <thead>
                <tr>
          <th style="padding: .625rem 0.25rem;"><center><input   class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DESCRIPTION'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center>ref</center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Currency'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Date'];?></center> </th>

           
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['ACTION']?></center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
          <?php

  

          $sql->selectall("trans where t_type=3 and total <=50000 ORDER BY id DESC limit 10 offset  $id ");
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>



        <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row['name'];?></center></td>

  <td style="padding: .625rem 0.25rem;"><center ><?=$row['ref'];?></center></td>




<td style="padding: .625rem 0.25rem;"><center ><?php

$currency_id=$row["currency_id"];
  $sql->select1("currencies"," where id=$currency_id");
          while($row1=$sql->res1->fetch_assoc())
       {
echo $row1['code'];

       }
?></center></td>
  <td style="padding: .625rem 0.25rem;"><center ><?=$row["date2"]?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
 <a href="?exp=edit&id=<?=$row['id'];?>">
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" >
        <i class='bx bxs-edit'></i>

              </button></a>
             <a href="?print=show&id=<?=$row['id'];?>">
         <button type="button" class="id btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal" >

<i class="bx bxs-printer"></i>
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

       $sql->check('trans',["t_type"=>3,"total <"=>50000]);
       $n=ceil($sql->check/10+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?manger1=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger1=list&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?manger1=list&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?manger1=list&page='.$page.'">Next</a>';
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
      var name=$(this).attr('name'); 
      var account_id=$(this).attr('account_id'); 
      var amount=$(this).attr('amount'); 
      var date2=$(this).attr('date2'); 
      var currency_id=$(this).attr('currency_id'); 

      var ref=$(this).attr('ref'); 
      var ex=$(this).attr('ex'); 
    
      var id=$(this).attr('besho');

      $('.zz').val(id);
      $(".name").val(name);
      $(".account_id").val(account_id);
      $(".amount").val(amount);
      $(".date2").val(date2);
      $(".currency_id").val(currency_id);

      $(".ref").val(ref);
    $(".ex").val(ex);
      
  })
</script>