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
          <th style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['ID_NUMBER'];?></center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Full_Name'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center> <?php echo $lang['DATE_OF_JOIN'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DATE_OF_BIRTH'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['MOBILE_NUMBER'];?></center> </th>
          
          
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DEPARTMENT1'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Status'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['ACTION'];?></center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("emp_profile where  name LIKE '$search%'  ORDER BY id DESC  limit 10 offset  $id");
          if ($sql->res->num_rows==0) {
  echo '<div class="alert alert-danger"><center><b> not found</b> </center></div>';
 }

     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
      
      ?>

       <tr>
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$row["name"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?php
      $date=date_create($row["join_date"]);
echo date_format($date,"Y/m/d");
?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$row["birth_date"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><a href="tel:<?=$row["phone"]?>"><?=$row["phone"]?></a></center></td>
      

    
    <td style="padding: .625rem 0.25rem;"><center><?php
$dep=$row["depart"];
$sql->select1("department","where id=$dep");

     while ($row1 = $sql->res1->fetch_assoc()) {

echo $row1['name'];
      }


    ?></center></td>


     <td style="padding: .625rem 0.25rem;"><center><?php
     if ($row["stat"]==1) {
      echo 'نشط';
     }else{
      echo 'غير نشط';
     }


   ?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
<a href="?prev=list&id=<?=$row["id"]?>">
         <button type="button" class="id btn btn-primary"  >
        <i class='bx bxs-edit'></i>

              </button></a>
             
            </center></td>

                  
      
     
      
      </tr>      <?php
     }


      ?>

       </tbody>
    </table>

<div class="dataTables_paginate paging_simple_numbers" >
<br>
<ul class="pagination">
<?php

        $sql->selectall("emp_profile  where  name LIKE '$search%' ");
    $num=$sql->res->num_rows;
   $n=ceil($num/10+1) ;
             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?hrms=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?hrms=list&page='.$page.'">Next</a>';
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
          <th style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['ID_NUMBER'];?></center></th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Full_Name'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center> <?php echo $lang['DATE_OF_JOIN'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DATE_OF_BIRTH'];?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['MOBILE_NUMBER'];?></center> </th>
          
          
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['DEPARTMENT1'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['Status'];?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['ACTION'];?></center> </th>
        </tr>


      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("emp_profile  ORDER BY id DESC limit 10   offset  $id ");
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
       <tr>
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$row["name"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?php
      $date=date_create($row["join_date"]);
echo date_format($date,"Y/m/d");
?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$row["birth_date"]?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><a href="tel:<?=$row["phone"]?>"><?=$row["phone"]?></a></center></td>
      

    
    <td style="padding: .625rem 0.25rem;"><center><?php
$dep=$row["depart"];
$sql->select1("department","where id=$dep");

     while ($row1 = $sql->res1->fetch_assoc()) {

echo $row1['name'];
      }


    ?></center></td>


     <td style="padding: .625rem 0.25rem;"><center><?php
     if ($row["stat"]==1) {
      echo 'نشط';
     }else{
      echo 'غير نشط';
     }


   ?></center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
<a href="?prev=list&id=<?=$row["id"]?>">
         <button type="button" class="id btn btn-primary"  >
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

       $sql->check('emp_profile',["1"=>1]);
       $n=ceil($sql->check/10+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?hrms=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?hrms=list&page='.$page.'">Next</a>';
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
      var name=$(this).attr('name'); //name
      var besho=$(this).attr('besho'); //name
      var email =$(this).attr('email');  //civil
      var phone=$(this).attr('phone'); //date
      var photo=$(this).attr('photo'); //phone
      var password=$(this).attr('password'); //phone
      var emp_marital_status=$(this).attr('emp_marital_status'); //email
      var address=$(this).attr('address'); //address
      var country=$(this).attr('country'); //nat
      var city=$(this).attr('city'); //insta
      var region=$(this).attr('region'); //password
      var join_date=$(this).attr('join_date'); //password
      var birth_date=$(this).attr('birth_date'); //password
      var emp_passport=$(this).attr('emp_passport'); //password
      var depart=$(this).attr('depart'); //password
      var job_title=$(this).attr('job_title'); //password
      var stat=$(this).attr('stat'); //stat
 var bank=$(this).attr('bank'); //stat


      $(".bank").val(bank);

$(".stat").val(stat);
      $(".name").val(name);
      $(".email").val(email);
      $(".phone").val(phone);
      $(".photo").val(photo);
      $(".password").val(password);

      $(".emp_marital_status").val(emp_marital_status);
      $(".address").val(address);
      $(".country").val(country);
      $(".city").val(city);
      $(".region").val(region);
      $(".region").val(region);
      $(".join_date").val(join_date);
      $(".birth_date").val(birth_date);
      $(".emp_passport").val(emp_passport);
      $(".depart").val(depart);
      $(".job_title").val(job_title);
      $(".zz").val(besho);
      
  })
</script>