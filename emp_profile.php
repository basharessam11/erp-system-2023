<div class="container-xxl flex-grow-1 container-p-y">
<div class="row g-4 mb-4">



<div class="card">
  <div class="card-header border-bottom">
<h5 class="card-title" style="float:left;"><?php echo $lang['MENU_PROFILES_LIST'];?></h5>


          <?php
          if (isset($_GET['img_exe'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>(jpg,png,jpeg) ﻣﻦ ﻓﻀﻠﻚ ﻗﻢ ﺑﻮﺿﻊ ﺻﻮﺭﺓ ﺑﺘﻨﺴﻴﻖ  </center>
</div>';
          }
           if (isset($_GET['img'])=='no') {
          echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>ﻻ ﻳﻤﻜﻦ اﺿﺎﻓﺔ اﻛﺜﺮ ﻣﻦ  ﺻﻮﺭة</center>
</div>';
          }


               if (isset($_GET['delete2'])=='no') {
          echo '<br><br><div id="success-alert2" class="alert alert-danger" role="alert">
        <center>  اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﺒﻴﺎﻧﺎﺕ اﻟﻤﺮاﺩ ﺣﺬﻓﻬﺎ </center>
          </div>';
          }
          if (isset($_GET['name'])=='no') {
          echo '<br><br><div id="success-alert" class="alert alert-danger" role="alert">
 <center>هذا الموظف موجود بالفعل</center>
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
      
<label> <?php echo $lang['SEARCH'];?> <input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>
     


    </div>
  </div>
  <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
    <div id="DataTables_Table_1_filter" class="dataTables_filter">
<br>
       <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1" >
       <?php echo $lang['Add'];?>
          </button>
          <br><br>
    <button type="button" style="display: none;width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2" >
    <?=$lang['DELETE1']?>
          </button>
    </div>
  </div>
</div>





<br>
<div class="kk">

    <table width="10%"  class="datatables-basic  table table-bordered">
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

if (isset($_GET['search'])) {
   $search=$_GET['search'];

    error_reporting(0);
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  
  $sql->selectall("emp_profile where  name LIKE '%$search%'   limit 10 offset  $id");
  }else{
    error_reporting(0);
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("emp_profile ORDER BY id DESC limit 10 offset  $id ");
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
              $sql->selectall("emp_profile  where  name LIKE '%$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('emp_profile',["1"=>1]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?hrms=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?hrms=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?hrms=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?hrms=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?hrms=list&page='.$page.'">Next</a>';
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
  


$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();

    $.post('inc/fun/emp_profile/select.php' , {

  
      search : value
     

    } , function(data){

      $(".kk").html(data)
      
    });


  });
});


  </script>

<!-- groub update -->
          <div class="modal fade" id="basicModal5" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 70rem" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">priview emp_profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/emp_profile/update.php" enctype="multipart/form-data">
              <div  class="col-md-6 col-sm-12 form-group" style="float:left;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['Full_Name'];?></label>
                      <input type="text" disabled="" id="nameBasic" class="name form-control" name="name" required=""  placeholder="<?php echo $lang['Full_Name'];?>">
                
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PASSPORT_NO'];?></label>
                      <input type="text" id="nameBasic" disabled="" class="emp_passport form-control" name="emp_passport" required=""  placeholder="<?php echo $lang['PASSPORT_NO'];?>">
                     
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DATE_OF_BIRTH'];?></label>
                      <input type="date" id="nameBasic" disabled="" class="birth_date date form-control" name="birth_date" required=""  >
                
                    </div>

                     
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['MOBILE_NUMBER'];?></label>
                      <input type="text" id="nameBasic" disabled="" class="phone form-control" name="phone" required=""  placeholder="Phone">
                     
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["MARTIAL_STATUS"]?></label>
                      <select disabled="" class="emp_marital_status form-select" name="emp_marital_status">
                        <option value="1">اعزب</option>
                        <option value="2">متزوج</option>
                      </select>
                      
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Country"]?></label>
                      <input disabled="" type="text" id="nameBasic" class="country form-control" name="country"  required=""  placeholder="<?php echo $lang["Country"]?>">
                
                    </div>
                                        <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Region"]?></label>
                      <input disabled="" type="text" id="nameBasic" class="region form-control" name="region"   placeholder="<?php echo $lang["Region"]?>">
                
                    </div>
<div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['STATUS'];?></label>
                      <select  class="stat select form-select js-example-basic-single" name="stat">
                             
  <option   value="1">نشط</option>
  <option   value="0">غير نشط</option>

</select>
                
                    </div>
                  </div>
              <div  class="col-md-6 col-sm-12 form-group" style="float:right;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['ADDRESS'];?></label>
                      <input disabled="" type="text" id="nameBasic" class="address form-control" name="address"   placeholder="<?php echo $lang["Address"]?>">
                
                    </div>
                                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["City"]?></label>
                      <input disabled="" type="text" id="nameBasic" class="city form-control" name="city"   placeholder="<?php echo $lang["City"]?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['EMAIL'];?></label>
                      <input disabled="" type="email" id="nameBasic" class="email form-control" name="email"   placeholder="<?php echo $lang['EMAIL'];?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["emp_passport"]?></label>
                      <input disabled="" type="text" id="nameBasic" class="form-control" name="pass"   placeholder="<?php echo $lang["emp_passport"]?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DEPARTMENT1'];?></label>
                      <select disabled="" class="depart select form-select js-example-basic-single" name="depart">
                              <?php

 $sql->select1("department","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option   value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select>
                
                    </div>
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">jop title :</label>
                      <input disabled="" type="text" id="nameBasic" class="job_title form-control" name="job_title"   placeholder="jop title">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PHOTO'];?></label>
                      <input disabled="" type="file" id="nameBasic" multiple="" class=" form-control" name="photo[]"   >
                
                    </div>

      
                  </div>


                 </div>
                 
                </div>
                <input class="photo" type="hidden" name="img_last">
                <input class="password" type="hidden" name="password">
                <input class="zz" type="hidden" name="id">

                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$row["Close"]?></button>
                
</form>
                </div>
              </div>
            </div>
          </div>




 <!-- groub update -->
          <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 70rem" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Edit emp_profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/emp_profile/update.php" enctype="multipart/form-data">
              <div  class="col-md-6 col-sm-12 form-group" style="float:left;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['Full_Name'];?></label>
                      <input type="text" id="nameBasic" class="name form-control" name="name" required=""  placeholder="<?php echo $lang['Full_Name'];?>">
                
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PASSPORT_NO'];?></label>
                      <input type="text" id="nameBasic" class="emp_passport form-control" name="emp_passport" required=""  placeholder="<?php echo $lang['PASSPORT_NO'];?>">
                     
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DATE_OF_BIRTH'];?></label>
                      <input type="date" id="nameBasic" class="birth_date date form-control" name="birth_date" required=""  >
                
                    </div>

                     
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['MOBILE_NUMBER'];?></label>
                      <input type="text" id="nameBasic" class="phone form-control" name="phone" required=""  placeholder="<?php echo $lang['MOBILE_NUMBER'];?>">
                     
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["MARTIAL_STATUS"]?></label>
                      <select class="emp_marital_status form-select" name="emp_marital_status">
                        <option value="1">اعزب</option>
                        <option value="2">متزوج</option>
                      </select>
                      
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Country"]?></label>
                      <input type="text" id="nameBasic" class="country form-control" name="country"  required=""  placeholder="<?php echo $lang["Country"]?>">
                
                    </div>
                                        <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Region"]?></label>
                      <input type="text" id="nameBasic" class="region form-control" name="region"   placeholder="<?php echo $lang["Region"]?>">
                
                    </div>
<div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['STATUS'];?></label>
                      <select  class="stat select form-select js-example-basic-single" name="stat">
                             
  <option   value="1">نشط</option>
  <option   value="0">غير نشط</option>

</select>
                
                    </div>
                  </div>
              <div  class="col-md-6 col-sm-12 form-group" style="float:right;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Address"]?></label>
                      <input type="text" id="nameBasic" class="address form-control" name="address"   placeholder="<?php echo $lang["Address"]?>">
                
                    </div>
                                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["City"]?></label>
                      <input type="text" id="nameBasic" class="city form-control" name="city"   placeholder="<?php echo $lang["City"]?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Email"]?></label>
                      <input type="email" id="nameBasic" class="email form-control" name="email"   placeholder="<?php echo $lang["Email"]?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['Password'];?></label>
                      <input type="text" id="nameBasic" class="form-control" name="pass"   placeholder="<?php echo $lang['Password'];?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DEPARTMENT1'];?></label>
                      <select class="depart select form-select js-example-basic-single" name="depart">
                              <?php

 $sql->select1("department","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option   value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select>
                
                    </div>
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['JOB_TITLE'];?></label>
                      <input type="text" id="nameBasic" class="job_title form-control" name="job_title"   placeholder="<?php echo $lang['JOB_TITLE'];?>">
                
                    </div>
<div class="col mb-3">
                      <label for="nameBasic" class="form-label">bank </label>
                      <input type="text" id="nameBasic" class="bank form-control" name="bank"   placeholder="bank">
                
                    </div>
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PHOTO'];?></label>
                      <input type="file" id="nameBasic" multiple="" class=" form-control" name="photo[]"   >
                
                    </div>

                  </div>


                 </div>
                 
                </div>
                <input class="photo" type="hidden" name="img_last">
                <input class="password" type="hidden" name="password">
                <input class="zz" type="hidden" name="id">

                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?php echo $lang["Close"]?></button>
                  <button type="submit" class="btn btn-primary"><?php echo $lang["Save"]?></button>
</form>
                </div>
              </div>
            </div>
          </div>
<!-- updat -->

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


      <!-- group insert -->
          <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 70rem" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Add New emp_profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/emp_profile/insert.php" enctype="multipart/form-data">
              <div  class="col-md-6 col-sm-12 form-group" style="float:left;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['Full_Name'];?></label>
                      <input type="text" id="nameBasic" class="form-control" name="name" required=""  placeholder="<?php echo $lang['Full_Name'];?>">
                
                    </div>

                            
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PASSPORT_NO'];?></label>
                      <input type="text" id="nameBasic" class="passport form-control" name="emp_passport" required=""  placeholder="<?php echo $lang['PASSPORT_NO'];?>">
                     
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DATE_OF_BIRTH'];?></label>
                      <input type="date" id="nameBasic" class="date form-control" name="birth_date" required=""  >
                
                    </div>

                     
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['MOBILE_NUMBER'];?></label>
                      <input type="text" id="nameBasic" class=" form-control" name="phone" required=""  placeholder="<?php echo $lang['MOBILE_NUMBER'];?>">
                     
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["MARTIAL_STATUS"]?></label>
                      <select class="form-select" name="emp_marital_status">
                        <option value="1">اعزب</option>
                        <option value="2">متزوج</option>
                      </select>
                     
                    </div>

                                 
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Country"]?></label>
                      <input type="text" id="nameBasic" class="form-control" name="country"  required=""  placeholder="<?php echo $lang["Country"]?>">
                
                    </div>
                                        <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Region"]?></label>
                      <input type="text" id="nameBasic" class="form-control" name="region"   placeholder="<?php echo $lang["Region"]?>">
                
                    </div>
<div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['STATUS'];?></label>
                      <select  class="stat select form-select js-example-basic-single" name="stat">
                             
  <option   value="1">نشط</option>
  <option   value="0">غير نشط</option>

</select>
                
                    </div>
                  </div>
              <div  class="col-md-6 col-sm-12 form-group" style="float:right;width: 48%">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Address"]?></label>
                      <input type="text" id="nameBasic" class="form-control" name="address"   placeholder="<?php echo $lang["Address"]?>">
                
                    </div>
                                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Country"]?></label>
                      <input type="text" id="nameBasic" class="form-control" name="city"   placeholder="<?php echo $lang["Country"]?>">
                      
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang["Email"]?></label>
                      <input type="email" id="nameBasic" class="form-control" name="email"   placeholder="<?php echo $lang["Email"]?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['Password'];?></label>
                      <input type="text" id="nameBasic" class="form-control" name="pass"   placeholder="<?php echo $lang['Password'];?>">
                
                    </div>

                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['DEPARTMENT1'];?></label>
                      <select class="select form-select js-example-basic-single" name="depart">
                              <?php

 $sql->select1("department","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option   value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select>
                
                    </div>
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['JOB_TITLE'];?></label>
                      <input type="text" id="nameBasic" class="form-control" name="job_title"   placeholder="<?php echo $lang['JOB_TITLE'];?>">
                
                    </div>
<div class="col mb-3">
                      <label for="nameBasic" class="form-label">bank </label>
                      <input type="text" id="nameBasic" class="form-control" name="bank"   placeholder="bank">
                
                    </div>
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label"><?php echo $lang['PHOTO'];?></label>
                      <input type="file" id="nameBasic" class="form-control" multiple="" name="photo[]"   >
                
                    </div>

                  </div>


                 </div>
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?php echo $lang['Close'];?></button>
                  <button type="submit" class="btn btn-primary"><?php echo $lang['Save'];?></button>
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
<form method="post" action="inc/fun/emp_profile/delete.php">
                    <div id="name" class=" col mb-3">
                        
                    <?php echo $lang['Are_you'];?>
                      
                    </div>
                    <input class="val" type="hidden" name="id">
                  </div>
                 
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"> <?php echo $lang['Close'];?></button>
                  <button type="submit" class="btn btn-danger"> <?=$lang['DELETE1']?></button>
</form>
                </div>
              </div>
            </div>
          </div>
                                       <script>
      
  function data(){
  var Brand= get_filter('mat');
  var check=get_filter('mat');


  function get_filter(class_name){
    var filter=[];

    $('.'+class_name+':checked').each(function(){
      filter.push($(this).val());

    })


    $(".val").val(filter);

  $(".de").show();


  }
}
  

function data1(){

if ($('.mat').attr('checked')) {
  $(".mat").removeAttr('checked')

} else {

  $(".mat").attr('checked', '');
}



  var Brand= get_filter('mat');



  function get_filter(class_name){
    var filter=[];

    $('.'+class_name+':checked').each(function(){
      filter.push($(this).val())
    })
    $(".val").val(filter);

  $(".de").show();


  };

  
};


                
    $(document).ready(function() {
                    $(".ar").attr("href","inc/des/lang.php?lang=ar&page='hrms=list'");

                    $(".en").attr("href","inc/des/lang.php?lang=en&page='hrms=list'");
                  });
                 </script>
