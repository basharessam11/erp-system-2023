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
   $id=$id+100;
  }

if (!empty($search)) {
  ?>
<table width="100%"  class="datatables-basic table table-bordered ">
      <thead>
     <tr>
          <th style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center>Num</center></th>
          <th style="padding: .625rem 0.25rem;"><center>Name</center> </th>
          
         <th style="padding: .625rem 0.25rem;"><center>edit</center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("user where  name LIKE '%$search%'   limit 100 offset  $id");
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


                  <td style="padding: .625rem 0.25rem;"><center>
          
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" na="<?=$row["name"]?>" pr="<?=$row["pr"]?>"  dash="<?=$row["dash"]?>"   cust="<?=$row["cust"]?>" cust_g="<?=$row["cust_g"]?>" account="<?=$row["account"]?>" emp_id="<?=$row["emp_id"]?>" account_ge="<?=$row["account_ge"]?>" account_ex="<?=$row["account_ex"]?>"  account_in="<?=$row["account_in"]?>" account_cc="<?=$row["account_cc"]?>" account_ass="<?=$row["account_ass"]?>" hr="<?=$row["hr"]?>" hr_sd="<?=$row["hr_sd"]?>" hr_le="<?=$row["hr_le"]?>" hr_pm="<?=$row["hr_pm"]?>" hr_ph="<?=$row["hr_ph"]?>" hr_rr="<?=$row["hr_rr"]?>" hr_si="<?=$row["hr_si"]?>" hr_es="<?=$row["hr_es"]?>" hr_es1="<?=$row["hr_es1"]?>" hr_ad="<?=$row["hr_ad"]?>" hr_sr="<?=$row["hr_sr"]?>" hr_qu="<?=$row["hr_qu"]?>" project="<?=$row["project"]?>" projects="<?=$row["projects"]?>" manger1="<?=$row["manger1"]?>" manger2="<?=$row["manger2"]?>" project_tm="<?=$row["project_tm"]?>" project_cat="<?=$row["project_cat"]?>" report_tb="<?=$row["report_tb"]?>" report_cost="<?=$row["report_cost"]?>" report_lr="<?=$row["report_lr"]?>" report_gl="<?=$row["report_gl"]?>" user="<?=$row["user"]?>" setting="<?=$row["setting"]?>" setting_tax="<?=$row["setting_tax"]?>" besho="<?=$row["id"]?>" pass="<?=$row["password"]?>">
        <i class='bx bxs-edit'></i>

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

        $sql->selectall("user  where  name LIKE '%$search%' ");
    $num=$sql->res->num_rows;
   $n=ceil($num/100+1) ;
             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?user=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?user=list&page='.$page.'">Next</a>';
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
          <th style="padding: .625rem 0.25rem;"><center>Num</center></th>
          <th style="padding: .625rem 0.25rem;"><center>Name</center> </th>
          
         <th style="padding: .625rem 0.25rem;"><center>edit</center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
          <?php

  
  $sql->selectall("user limit 100 offset  $id ");
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
           <tr>
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center><?=$row["name"]?></center></td>


                  <td style="padding: .625rem 0.25rem;"><center>
          
        <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" na="<?=$row["name"]?>" pr="<?=$row["pr"]?>"  dash="<?=$row["dash"]?>"   cust="<?=$row["cust"]?>" cust_g="<?=$row["cust_g"]?>" account="<?=$row["account"]?>" emp_id="<?=$row["emp_id"]?>" account_ge="<?=$row["account_ge"]?>" account_ex="<?=$row["account_ex"]?>"  account_in="<?=$row["account_in"]?>" account_cc="<?=$row["account_cc"]?>" account_ass="<?=$row["account_ass"]?>" hr="<?=$row["hr"]?>" hr_sd="<?=$row["hr_sd"]?>" hr_le="<?=$row["hr_le"]?>" hr_pm="<?=$row["hr_pm"]?>" hr_ph="<?=$row["hr_ph"]?>" hr_rr="<?=$row["hr_rr"]?>" hr_si="<?=$row["hr_si"]?>" hr_es="<?=$row["hr_es"]?>" hr_es1="<?=$row["hr_es1"]?>" hr_ad="<?=$row["hr_ad"]?>" hr_sr="<?=$row["hr_sr"]?>" hr_qu="<?=$row["hr_qu"]?>" project="<?=$row["project"]?>" projects="<?=$row["projects"]?>" manger1="<?=$row["manger1"]?>" manger2="<?=$row["manger2"]?>" project_tm="<?=$row["project_tm"]?>" project_cat="<?=$row["project_cat"]?>" report_tb="<?=$row["report_tb"]?>" report_cost="<?=$row["report_cost"]?>" report_lr="<?=$row["report_lr"]?>" report_gl="<?=$row["report_gl"]?>" user="<?=$row["user"]?>" setting="<?=$row["setting"]?>" setting_tax="<?=$row["setting_tax"]?>" besho="<?=$row["id"]?>" pass="<?=$row["password"]?>">
        <i class='bx bxs-edit'></i>

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

       $sql->check('user',["1"=>1]);
       $n=ceil($sql->check/100+1) ;

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
                  echo '<li class="page-item "><a class="page-link" href="?user=list&page='.$pp.'" tabindex="">Previous</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&page='.$i.'">'.$i.'</a></li>';
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

                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&page='.$i.'">'.$i.'</a></li>';
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                echo '<a class="page-link" href="?user=list&page='.$page.'">Next</a>';
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


     


      var na=$(this).attr('na'); 
      var emp_id=$(this).attr('emp_id'); 
      var pr=$(this).attr('pr');
      var dash=$(this).attr('dash'); 
      var cust=$(this).attr('cust'); 
      var cust_g=$(this).attr('cust_g'); 

      var account=$(this).attr('account'); 
      var manger1=$(this).attr('manger1'); 
      var manger2=$(this).attr('manger2'); 
      var account_ge=$(this).attr('account_ge'); 
      var account_ex=$(this).attr('account_ex'); 
      var account_in=$(this).attr('account_in'); 
      var pass=$(this).attr('pass'); 
      var account_cc=$(this).attr('account_cc'); 
      var account_ass=$(this).attr('account_ass'); 

      var hr=$(this).attr('hr'); 
      var hr_sd=$(this).attr('hr_sd'); 
      var hr_le=$(this).attr('hr_le'); 
      var hr_pm=$(this).attr('hr_pm'); 
      var hr_ph=$(this).attr('hr_ph'); 
      var hr_rr=$(this).attr('hr_rr'); 
      var hr_si=$(this).attr('hr_si'); 
      var hr_es=$(this).attr('hr_es'); 
      var hr_es1=$(this).attr('hr_es1'); 
      var hr_ad=$(this).attr('hr_ad'); 
      var hr_sr=$(this).attr('hr_sr'); 
      var hr_qu=$(this).attr('hr_qu'); 

      var projects=$(this).attr('projects'); 
      var project=$(this).attr('project'); 
      var project_tm=$(this).attr('project_tm'); 
      var project_cat=$(this).attr('project_cat'); 
      var report_tb=$(this).attr('report_tb'); 
      var report_lr=$(this).attr('report_lr'); 
      var report_gl=$(this).attr('report_gl'); 
      var report_cost=$(this).attr('report_cost'); 


      var user=$(this).attr('user'); 
      var setting=$(this).attr('setting'); 
      var setting_tax=$(this).attr('setting_tax'); 
     
      var id=$(this).attr('besho');


      $('.zz').val(id);

      $(".na").val(na);
      $(".emp_id").val(emp_id);
 $(".pass").val(pass);

         
        $(".pr").val(pr);
    
      if (dash==1) {

        $(".dash").html('<input type="checkbox" class=" form-check-input" checked value="1" name="dash">');

       }else{
        $(".dash").html('<input type="checkbox" class=" form-check-input"  value="1" name="dash">');
       }
        if (cust==1) {

        $(".cust").html('<input type="checkbox" class=" form-check-input" checked value="1" name="cust">');

       }else{
        $(".cust").html('<input type="checkbox" class=" form-check-input"  value="1" name="cust">');
       }

        if (cust_g==1) {

        $(".cust_g").html('<input type="checkbox" class=" form-check-input" checked value="1" name="cust_g">');

       }else{
        $(".cust_g").html('<input type="checkbox" class=" form-check-input"  value="1" name="cust_g">');
       }

        if (account==1) {

        $(".account").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account">');

       }else{
        $(".account").html('<input type="checkbox" class=" form-check-input"  value="1" name="account">');
       }

        if (account_ge==1) {

        $(".account_ge").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ge">');

       }else{
        $(".account_ge").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ge">');
       }

////
       if (manger1==1) {

        $(".manger1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="manger1">');

       }else{
        $(".manger1").html('<input type="checkbox" class=" form-check-input"  value="1" name="manger1">');
       }

       if (manger2==1) {

        $(".manger2").html('<input type="checkbox" class=" form-check-input" checked value="1" name="manger2">');

       }else{
        $(".manger2").html('<input type="checkbox" class=" form-check-input"  value="1" name="manger2">');
       }
////




        if (account_ex==1) {

        $(".account_ex").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ex">');

       }else{
        $(".account_ex").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ex">');
       }

        if (account_in==1) {

        $(".account_in").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_in">');

       }else{
        $(".account_in").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_in">');
       }

        if (account_cc==1) {

        $(".account_cc").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_cc">');

       }else{
        $(".account_cc").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_cc">');
       }

        if (account_ass==1) {

        $(".account_ass").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ass">');

       }else{
        $(".account_ass").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ass">');
       }
        if (hr==1) {

        $(".hr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr">');

       }else{
        $(".hr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr">');
       }

        if (hr_sd==1) {

        $(".hr_sd").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_sd">');

       }else{
        $(".hr_sd").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_sd">');
       }
        if (hr_le==1) {

        $(".hr_le").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_le">');

       }else{
        $(".hr_le").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_le">');
       }
        if (hr_pm==1) {

        $(".hr_pm").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_pm">');

       }else{
        $(".hr_pm").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_pm">');
       }
    
        if (hr_ph==1) {

        $(".hr_ph").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_ph">');

       }else{
        $(".hr_ph").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_ph">');
       }

       //
       if (hr_rr==1) {

        $(".hr_rr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_rr">');

       }else{
        $(".hr_rr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_rr">');
       }
       //
       if (hr_si==1) {

        $(".hr_si").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_si">');

       }else{
        $(".hr_si").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_si">');
       }

       //
       if (hr_es==1) {

        $(".hr_es").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_es">');

       }else{
        $(".hr_es").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_es">');
       }
       //   
       if (hr_es1==1) {

        $(".hr_es1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_es1">');

       }else{
        $(".hr_es1").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_es1">');
       }
       //
       if (hr_ad==1) {

        $(".hr_ad1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_ad">');

       }else{
        $(".hr_ad1").html('<input type="checkbox" class="form-check-input" value="1" name="hr_ad">');
       }
       //
       if (hr_sr==1) {

        $(".hr_sr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_sr">');

       }else{
        $(".hr_sr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_sr">');
       }

       //
       if (hr_qu==1) {

        $(".hr_qu").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_qu">');

       }else{
        $(".hr_qu").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_qu">');
       }


       //
       if (project==1) {

        $(".project").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project">');

       }else{
        $(".project").html('<input type="checkbox" class=" form-check-input"  value="1" name="project">');
       }
       //
       if (projects==1) {

        $(".projects").html('<input type="checkbox" class=" form-check-input" checked value="1" name="projects">');

       }else{
        $(".projects").html('<input type="checkbox" class=" form-check-input"  value="1" name="projects">');
       }
       //
       if (project_tm==1) {

        $(".project_tm").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project_tm">');

       }else{
        $(".project_tm").html('<input type="checkbox" class=" form-check-input"  value="1" name="project_tm">');
       }
       //
       if (project_cat==1) {

        $(".project_cat").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project_cat">');

       }else{
        $(".project_cat").html('<input type="checkbox" class=" form-check-input"  value="1" name="project_cat">');
       }

       //
       if (report_tb==1) {

        $(".report_tb").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_tb">');

       }else{
        $(".report_tb").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_tb">');
       }
       //
       if (report_lr==1) {

        $(".report_lr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_lr">');

       }else{
        $(".report_lr").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_lr">');
       }
       //
       if (report_gl==1) {

        $(".report_gl").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_gl">');

       }else{
        $(".report_gl").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_gl">');
       }
        //
       if (report_cost==1) {

        $(".report_cost").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_cost">');

       }else{
        $(".report_cost").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_cost">');
       }
       //  
       if (user==1) {

        $(".user").html('<input type="checkbox" class=" form-check-input" checked value="1" name="user">');

       }else{
        $(".user").html('<input type="checkbox" class=" form-check-input"  value="1" name="user">');
       }
       //
       if (setting==1) {

        $(".setting").html('<input type="checkbox" class=" form-check-input" checked value="1" name="setting">');

       }else{
        $(".setting").html('<input type="checkbox" class=" form-check-input"  value="1" name="setting">');
       }
       //
       if (setting_tax==1) {

        $(".setting_tax").html('<input type="checkbox" class=" form-check-input" checked value="1" name="setting_tax">');

       }else{
        $(".setting_tax").html('<input type="checkbox" class=" form-check-input"  value="1" name="setting_tax">');
       }
       //
     


       
       


     
      
  })
</script>