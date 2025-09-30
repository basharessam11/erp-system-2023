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
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['customers_name'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Email'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Phone'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['EDIT']?></center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("customer where  name LIKE '$search%'  ORDER BY id DESC  limit 10 offset  $id");
          if ($sql->res->num_rows==0) {
  echo '<div class="alert alert-danger"><center><b> not found</b> </center></div>';
 }

     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      
      ?>

  <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["name"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["email"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["phone"]?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
          
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" name="<?=$row["name"]?>" city="<?=$row["city"]?>" fax="<?=$row["fax"]?>"  group1="<?=$row["group1"]?>" phone="<?=$row["phone"]?>" email="<?=$row["email"]?>" type_c="<?=$row["type_c"]?>" address="<?=$row["address"]?>" region="<?=$row["region"]?>" currency="<?=$row["currency"]?>" des="<?=$row["des"]?>" zip="<?=$row["zip"]?>" besho="<?=$row["id"]?>">
        <i class='bx bxs-edit'></i>

              </button>  <button type="button" class="id btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal4" name="<?=$row["name"]?>" city="<?=$row["city"]?>" fax="<?=$row["fax"]?>"  group1="<?=$row["group1"]?>" phone="<?=$row["phone"]?>" email="<?=$row["email"]?>" type_c="<?=$row["type_c"]?>" address="<?=$row["address"]?>" region="<?=$row["region"]?>" currency="<?=$row["currency"]?>" des="<?=$row["des"]?>" zip="<?=$row["zip"]?>" besho="<?=$row["id"]?>">
        <i class='bx bxs-show'></i>

              </button></center></td>

                  
      
     
      
      </tr>      <?php
     }


      ?>

       </tbody>
    </table>

<div class="dataTables_paginate paging_simple_numbers" >
<br>
<ul class="pagination">
<?php

        $sql->selectall("customer  where  name LIKE '$search%' ");
    $num=$sql->res->num_rows;
   $n=ceil($num/10+1) ;
             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?customers=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?customers=list&page='.$page.'">Next</a>';
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
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['customers_name'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Email'];?></center> </th>
           <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Phone'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['EDIT']?></center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("customer  ORDER BY id DESC limit 10   offset  $id ");
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
  <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["name"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["email"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$row["phone"]?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
          
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" name="<?=$row["name"]?>" city="<?=$row["city"]?>" fax="<?=$row["fax"]?>"  group1="<?=$row["group1"]?>" phone="<?=$row["phone"]?>" email="<?=$row["email"]?>" type_c="<?=$row["type_c"]?>" address="<?=$row["address"]?>" region="<?=$row["region"]?>" currency="<?=$row["currency"]?>" des="<?=$row["des"]?>" zip="<?=$row["zip"]?>" besho="<?=$row["id"]?>">
        <i class='bx bxs-edit'></i>

              </button>  <button type="button" class="id btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal4" name="<?=$row["name"]?>" city="<?=$row["city"]?>" fax="<?=$row["fax"]?>"  group1="<?=$row["group1"]?>" phone="<?=$row["phone"]?>" email="<?=$row["email"]?>" type_c="<?=$row["type_c"]?>" address="<?=$row["address"]?>" region="<?=$row["region"]?>" currency="<?=$row["currency"]?>" des="<?=$row["des"]?>" zip="<?=$row["zip"]?>" besho="<?=$row["id"]?>">
        <i class='bx bxs-show'></i>

              </button></center></td>

                  
      
     
      
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

       $sql->check('customer',["1"=>1]);
       $n=ceil($sql->check/10+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?customers=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?customers=list&page='.$page.'">Next</a>';
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
      var type_c=$(this).attr('type_c'); 
      var fax=$(this).attr('fax');
      var zip=$(this).attr('zip'); 

      var group1=$(this).attr('group1'); 
      var phone=$(this).attr('phone'); 
      var email=$(this).attr('email'); 
      var city=$(this).attr('city'); 
      var address=$(this).attr('address'); 
      var region=$(this).attr('region'); 
      var currency=$(this).attr('currency'); 
      var des=$(this).attr('des'); 
     
      var id=$(this).attr('besho');

      $('.zz').val(id);
      $(".name").val(name);
      $(".type_c").val(type_c);
      $(".fax").val(fax);
      $(".zip").val(zip);
      $(".group1").val(group1);
      $(".phone").val(phone);
      $(".email").val(email);
      $(".city").val(city);
      $(".address").val(address);
      $(".region").val(region);
      $(".currency").val(currency);
      $(".des").html(des);

      
  })
</script>