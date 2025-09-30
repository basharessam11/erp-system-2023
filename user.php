<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-4 mb-4">

    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title" style="float:left;"><?=$lang['USERS']?></h5>

        <?php
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

            <label>Search:<input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>

          </div>
        </div>
        <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
          <div id="DataTables_Table_1_filter" class="dataTables_filter">
            <br>
            <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1">
              Add New User
            </button>
            <br><br>
            <button type="button" style="display: none;width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2">
              <?=$lang['DELETE1']?>
            </button>
          </div>
        </div>
      </div>

      <br>
      <div class="kk">
        <table width="100%" class="datatables-basic  table table-bordered">
          <thead>
            <tr>
              <th style="padding: .625rem 0.25rem;">
                <center><input value="<?=$row["id"]?>" class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center>
              </th>
              <th style="padding: .625rem 0.25rem;">
                <center>#</center>
              </th>
              <th style="padding: .625rem 0.25rem;">
                <center>Name</center>
              </th>

              <th style="padding: .625rem 0.25rem;">
                <center>edit</center>
              </th>
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
   $id=$id+100;
  }
  
  $sql->selectall("user where  name LIKE '%$search%'   limit 100 offset  $id");
  }else{
    error_reporting(0);
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+100;
  }
    $sql->selectall("user ORDER BY id DESC limit 100 offset  $id ");
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
                <center><?=$row["name"]?></center>
              </td>

              <td style="padding: .625rem 0.25rem;">
                <center>

                  <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" na="<?=$row["name"]?>" pr="<?=$row["pr"]?>" dash="<?=$row["dash"]?>" cust="<?=$row["cust"]?>" cust_g="<?=$row["cust_g"]?>" account="<?=$row["account"]?>" emp_id="<?=$row["emp_id"]?>" account_ge="<?=$row["account_ge"]?>" account_ex="<?=$row["account_ex"]?>" account_in="<?=$row["account_in"]?>" account_cc="<?=$row["account_cc"]?>" account_ass="<?=$row["account_ass"]?>" hr="<?=$row["hr"]?>" hr_sd="<?=$row["hr_sd"]?>" hr_le="<?=$row["hr_le"]?>" hr_pm="<?=$row["hr_pm"]?>" hr_ph="<?=$row["hr_ph"]?>" hr_rr="<?=$row["hr_rr"]?>" hr_si="<?=$row["hr_si"]?>" hr_es="<?=$row["hr_es"]?>" hr_es1="<?=$row["hr_es1"]?>" hr_ad="<?=$row["hr_ad"]?>" hr_sr="<?=$row["hr_sr"]?>" hr_qu="<?=$row["hr_qu"]?>" project="<?=$row["project"]?>" projects="<?=$row["projects"]?>" manger1="<?=$row["manger1"]?>" manger2="<?=$row["manger2"]?>" project_tm="<?=$row["project_tm"]?>" project_cat="<?=$row["project_cat"]?>" report_tb="<?=$row["report_tb"]?>" report_cost="<?=$row["report_cost"]?>" report_lr="<?=$row["report_lr"]?>" report_gl="<?=$row["report_gl"]?>" user="<?=$row["user"]?>" setting="<?=$row["setting"]?>" setting_tax="<?=$row["setting_tax"]?>" besho="<?=$row["id"]?>" pass="<?=$row["password"]?>">
                    <i class='bx bxs-edit'></i>

                  </button>
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
              $sql->selectall("user  where  name LIKE '%$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/100+1);
    }else{
      $sql->check('user',["1"=>1]);
       $n=ceil($sql->check/100+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?user=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?user=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?user=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?user=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?user=list&page='.$page.'">Next</a>';
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
      $.post('inc/fun/user/select.php', {
        search: value
      }, function(data) {
        $(".kk").html(data)
      });
    });
  });
</script>

<!-- groub update -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 70rem" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php
$page='?page='.$_GET['page']??1;

                    ?>
          <form method="post" action="inc/fun/user/update.php<?=$page?>">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="nameBasic" class="form-label"><?=$lang['USER_NAME']?></label>
                  <input type="text" id="nameBasic" class=" na form-control" name="name" required="" placeholder="<?=$lang['USER_NAME']?>">
                  <input class="zz" type="hidden" name="id">
                </div>

                <div class="col-md-6">
                  <label for="nameBasic" class="form-label"><?=$lang['PASSWORD']?></label>
                  <input type="text" id="nameBasic" class="form-control" name="password" minlength="8" placeholder="<?=$lang['PASSWORD']?>">

                </div>

                <div class="col-md-6"><br>
                  <label for="nameBasic" class="form-label"><?=$lang['Role']?></label>
                  <select name="pr" class="pr form-select" required>
                    <option value="0">اﻟﺮﺟﺎء اﻻﺧﺘﻴﺎﺭ</option>
                    <option value="1">مشرف</option>
                    <option value="2">بياع</option>
                    <option value="3">مدخل بيانات</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br>

                  <label for="nameBasic" class="emp_id form-label"><?php echo $lang['EMPLOYEE_NAME'];?></label>
                  <select class="form-select emp_id" name="emp_id">
                    <?php
                                   $sql->selectall("emp_profile");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                  </select>

                </div>
              </div>
              <br>
              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['Dashboard']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Dashboard']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="dash"></center>
                  </td>

                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['Customers']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Customer_List']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Group']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="cust"></center>
                  </td>
                  <td>
                    <center class=" cust_g"></center>
                  </td>

                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['Accounts']?></center>
                  </th>

                  <th>
                    <center><?=$lang['gl']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Expenses']?></center>
                  </th>
                  <th>
                    <center><?=$lang['incomes']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Accounts']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Cost_Center'];?></center>
                  </th>
                  <th>
                    <center><?=$lang['ASSETS']?></center>
                  </th>
                  <th>
                    <center><?=$lang['manger_accounting']?></center>
                  </th>
                  <th>
                    <center><?=$lang['manger_o']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="account_ge"></center>
                  </td>
                  <td>
                    <center class="account_ex"></center>
                  </td>
                  <td>
                    <center class="account_in"></center>
                  </td>
                  <td>
                    <center class="account"></center>
                  </td>
                  <td>
                    <center class="account_cc"></center>
                  </td>
                  <td>
                    <center class="account_ass"></center>
                  </td>
                  <td>
                    <center class="manger1"></center>
                  </td>
                  <td>
                    <center class="manger2"></center>
                  </td>
                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['hrms']?></center>
                  </th>

                  <th>
                    <center><?=$lang['MENU_PROFILES_LIST']?></center>
                  </th>
                  <th>
                    <center> <?=$lang['DEPARTMENT']?></center>
                  </th>
                  <th>
                    <center><?=$lang['LEAVE']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Pending_approval_m']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Pending_approval_hr']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Resume_Request']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Salary_Item']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Employees_salaries']?> </center>
                  </th>
                  <th>
                    <center><?=$lang['Employees_salaries2']?> </center>
                  </th>
                  <th>
                    <center><?=$lang['Advances']?></center>
                  </th>
                  <th>
                    <center><?=$lang['salary_rallies']?> </center>
                  </th>
                  <th>
                    <center><?=$lang['qu']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="hr"></center>
                  </td>
                  <td>
                    <center class="hr_sd"></center>
                  </td>
                  <td>
                    <center class="hr_le"></center>
                  </td>
                  <td>
                    <center class="hr_pm"></center>
                  </td>
                  <td>
                    <center class="hr_ph"></center>
                  </td>
                  <td>
                    <center class="hr_rr"></center>
                  </td>
                  <td>
                    <center class="hr_si"></center>
                  </td>
                  <td>
                    <center class="hr_es"></center>
                  </td>
                  <td>
                    <center class="hr_es1"></center>
                  </td>
                  <td>
                    <center class="hr_ad1"></center>
                  </td>
                  <td>
                    <center class="hr_sr"></center>
                  </td>
                  <td>
                    <center class="hr_qu"></center>
                  </td>
                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['Projects']?></center>
                  </th>
                  <th>
                    <center><?=$lang['AllProjects']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Projects']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Task_Manager']?></center>
                  </th>
                  <th>
                    <center><?=$lang['category']?> </center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="projects"></center>
                  </td>

                  <td>
                    <center class="project"></center>
                  </td>
                  <td>
                    <center class="project_tm"></center>
                  </td>
                  <td>
                    <center class="project_cat"></center>
                  </td>

                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['Reports']?></center>
                  </th>

                  <th>
                    <center><?=$lang['Trial_Balance']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Ledger_Report']?></center>
                  </th>
                  <th>
                    <center><?=$lang['General_Ledger_Report']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Cost_Report']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="report_tb"></center>
                  </td>
                  <td>
                    <center class="report_lr"></center>
                  </td>
                  <td>
                    <center class="report_gl"></center>
                  </td>
                  <td>
                    <center class="report_cost"></center>
                  </td>

                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['USERS']?></center>
                  </th>

                  <th>
                    <center><?=$lang['USERS']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="user"></center>
                  </td>

                </tr>
              </table>

              <table width="100%" class="datatables-basic  table table-bordered">
                <tr>
                  <th rowspan="2" style="width: 15%">
                    <center><?=$lang['General_Settings']?></center>
                  </th>

                  <th>
                    <center><?=$lang['Currencies']?></center>
                  </th>
                  <th>
                    <center><?=$lang['Tax']?></center>
                  </th>

                </tr>
                <tr>
                  <td>
                    <center class="setting"></center>
                  </td>
                  <td>
                    <center class="setting_tax"></center>
                  </td>

                </tr>
              </table>

            </div>
        </div>

      </div>

      <input class="zz" type="hidden" name="id">
      <input class="pass" type="hidden" name="pass">
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- updat -->
<script>
  $(".id").click(function() {
    var na = $(this).attr('na');
    var emp_id = $(this).attr('emp_id');
    var pr = $(this).attr('pr');
    var dash = $(this).attr('dash');
    var cust = $(this).attr('cust');
    var cust_g = $(this).attr('cust_g');
    var account = $(this).attr('account');
    var manger1 = $(this).attr('manger1');
    var manger2 = $(this).attr('manger2');
    var account_ge = $(this).attr('account_ge');
    var account_ex = $(this).attr('account_ex');
    var account_in = $(this).attr('account_in');
    var pass = $(this).attr('pass');
    var account_cc = $(this).attr('account_cc');
    var account_ass = $(this).attr('account_ass');
    var hr = $(this).attr('hr');
    var hr_sd = $(this).attr('hr_sd');
    var hr_le = $(this).attr('hr_le');
    var hr_pm = $(this).attr('hr_pm');
    var hr_ph = $(this).attr('hr_ph');
    var hr_rr = $(this).attr('hr_rr');
    var hr_si = $(this).attr('hr_si');
    var hr_es = $(this).attr('hr_es');
    var hr_es1 = $(this).attr('hr_es1');
    var hr_ad = $(this).attr('hr_ad');
    var hr_sr = $(this).attr('hr_sr');
    var hr_qu = $(this).attr('hr_qu');
    var projects = $(this).attr('projects');
    var project = $(this).attr('project');
    var project_tm = $(this).attr('project_tm');
    var project_cat = $(this).attr('project_cat');
    var report_tb = $(this).attr('report_tb');
    var report_lr = $(this).attr('report_lr');
    var report_gl = $(this).attr('report_gl');
    var report_cost = $(this).attr('report_cost');
    var user = $(this).attr('user');
    var setting = $(this).attr('setting');
    var setting_tax = $(this).attr('setting_tax');
    var id = $(this).attr('besho');
    $('.zz').val(id);
    $(".na").val(na);
    $(".emp_id").val(emp_id);
    $(".pass").val(pass);
    $(".pr").val(pr);
    if (dash == 1) {
      $(".dash").html('<input type="checkbox" class=" form-check-input" checked value="1" name="dash">');
    } else {
      $(".dash").html('<input type="checkbox" class=" form-check-input"  value="1" name="dash">');
    }
    if (cust == 1) {
      $(".cust").html('<input type="checkbox" class=" form-check-input" checked value="1" name="cust">');
    } else {
      $(".cust").html('<input type="checkbox" class=" form-check-input"  value="1" name="cust">');
    }
    if (cust_g == 1) {
      $(".cust_g").html('<input type="checkbox" class=" form-check-input" checked value="1" name="cust_g">');
    } else {
      $(".cust_g").html('<input type="checkbox" class=" form-check-input"  value="1" name="cust_g">');
    }
    if (account == 1) {
      $(".account").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account">');
    } else {
      $(".account").html('<input type="checkbox" class=" form-check-input"  value="1" name="account">');
    }
    if (account_ge == 1) {
      $(".account_ge").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ge">');
    } else {
      $(".account_ge").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ge">');
    }
    ////
    if (manger1 == 1) {
      $(".manger1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="manger1">');
    } else {
      $(".manger1").html('<input type="checkbox" class=" form-check-input"  value="1" name="manger1">');
    }
    if (manger2 == 1) {
      $(".manger2").html('<input type="checkbox" class=" form-check-input" checked value="1" name="manger2">');
    } else {
      $(".manger2").html('<input type="checkbox" class=" form-check-input"  value="1" name="manger2">');
    }
    ////
    if (account_ex == 1) {
      $(".account_ex").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ex">');
    } else {
      $(".account_ex").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ex">');
    }
    if (account_in == 1) {
      $(".account_in").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_in">');
    } else {
      $(".account_in").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_in">');
    }
    if (account_cc == 1) {
      $(".account_cc").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_cc">');
    } else {
      $(".account_cc").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_cc">');
    }
    if (account_ass == 1) {
      $(".account_ass").html('<input type="checkbox" class=" form-check-input" checked value="1" name="account_ass">');
    } else {
      $(".account_ass").html('<input type="checkbox" class=" form-check-input"  value="1" name="account_ass">');
    }
    if (hr == 1) {
      $(".hr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr">');
    } else {
      $(".hr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr">');
    }
    if (hr_sd == 1) {
      $(".hr_sd").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_sd">');
    } else {
      $(".hr_sd").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_sd">');
    }
    if (hr_le == 1) {
      $(".hr_le").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_le">');
    } else {
      $(".hr_le").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_le">');
    }
    if (hr_pm == 1) {
      $(".hr_pm").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_pm">');
    } else {
      $(".hr_pm").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_pm">');
    }
    if (hr_ph == 1) {
      $(".hr_ph").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_ph">');
    } else {
      $(".hr_ph").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_ph">');
    }
    //
    if (hr_rr == 1) {
      $(".hr_rr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_rr">');
    } else {
      $(".hr_rr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_rr">');
    }
    //
    if (hr_si == 1) {
      $(".hr_si").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_si">');
    } else {
      $(".hr_si").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_si">');
    }
    //
    if (hr_es == 1) {
      $(".hr_es").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_es">');
    } else {
      $(".hr_es").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_es">');
    }
    //   
    if (hr_es1 == 1) {
      $(".hr_es1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_es1">');
    } else {
      $(".hr_es1").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_es1">');
    }
    //
    if (hr_ad == 1) {
      $(".hr_ad1").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_ad">');
    } else {
      $(".hr_ad1").html('<input type="checkbox" class="form-check-input" value="1" name="hr_ad">');
    }
    //
    if (hr_sr == 1) {
      $(".hr_sr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_sr">');
    } else {
      $(".hr_sr").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_sr">');
    }
    //
    if (hr_qu == 1) {
      $(".hr_qu").html('<input type="checkbox" class=" form-check-input" checked value="1" name="hr_qu">');
    } else {
      $(".hr_qu").html('<input type="checkbox" class=" form-check-input"  value="1" name="hr_qu">');
    }
    //
    if (project == 1) {
      $(".project").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project">');
    } else {
      $(".project").html('<input type="checkbox" class=" form-check-input"  value="1" name="project">');
    }
    //
    if (projects == 1) {
      $(".projects").html('<input type="checkbox" class=" form-check-input" checked value="1" name="projects">');
    } else {
      $(".projects").html('<input type="checkbox" class=" form-check-input"  value="1" name="projects">');
    }
    //
    if (project_tm == 1) {
      $(".project_tm").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project_tm">');
    } else {
      $(".project_tm").html('<input type="checkbox" class=" form-check-input"  value="1" name="project_tm">');
    }
    //
    if (project_cat == 1) {
      $(".project_cat").html('<input type="checkbox" class=" form-check-input" checked value="1" name="project_cat">');
    } else {
      $(".project_cat").html('<input type="checkbox" class=" form-check-input"  value="1" name="project_cat">');
    }
    //
    if (report_tb == 1) {
      $(".report_tb").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_tb">');
    } else {
      $(".report_tb").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_tb">');
    }
    //
    if (report_lr == 1) {
      $(".report_lr").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_lr">');
    } else {
      $(".report_lr").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_lr">');
    }
    //
    if (report_gl == 1) {
      $(".report_gl").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_gl">');
    } else {
      $(".report_gl").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_gl">');
    }
    //
    if (report_cost == 1) {
      $(".report_cost").html('<input type="checkbox" class=" form-check-input" checked value="1" name="report_cost">');
    } else {
      $(".report_cost").html('<input type="checkbox" class=" form-check-input"  value="1" name="report_cost">');
    }
    //  
    if (user == 1) {
      $(".user").html('<input type="checkbox" class=" form-check-input" checked value="1" name="user">');
    } else {
      $(".user").html('<input type="checkbox" class=" form-check-input"  value="1" name="user">');
    }
    //
    if (setting == 1) {
      $(".setting").html('<input type="checkbox" class=" form-check-input" checked value="1" name="setting">');
    } else {
      $(".setting").html('<input type="checkbox" class=" form-check-input"  value="1" name="setting">');
    }
    //
    if (setting_tax == 1) {
      $(".setting_tax").html('<input type="checkbox" class=" form-check-input" checked value="1" name="setting_tax">');
    } else {
      $(".setting_tax").html('<input type="checkbox" class=" form-check-input"  value="1" name="setting_tax">');
    }
    //
  })
</script>

<!-- <?=$lang['Group']?> insert -->
<div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 70rem" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" action="inc/fun/user/insert.php<?=$page?>">
            <div class="form-group">
              <div class="row">

                <div class="col-md-6">
                  <label for="nameBasic" class="form-label"><?=$lang['USER_NAME']?></label>
                  <input type="text" id="nameBasic" class="form-control" name="name" required="" placeholder="<?=$lang['USER_NAME']?>">

                </div>
                <div class="col-md-6">
                  <label for="nameBasic" class="form-label"><?=$lang['PASSWORD']?></label>
                  <input type="text" id="nameBasic" class="form-control" minlength="8" name="password" required="" placeholder="<?=$lang['PASSWORD']?>">

                </div>

                <div class="col-md-6">
                  <br>
                  <label for="nameBasic" class="form-label"><?=$lang['Role']?></label>
                  <select name="pr" class="form-select" required>
                    <option>اﻟﺮﺟﺎء اﻻﺧﺘﻴﺎﺭ</option>
                    <option value="1">مشرف</option>
                    <option value="2">بياع</option>
                    <option value="3">مدخل بيانات</option>
                  </select>

                </div>
                <div class="col-md-6">
                  <br>

                  <label for="nameBasic" class="form-label"><?php echo $lang['EMPLOYEE_NAME'];?></label>
                  <select class="form-select c3" name="emp_id">
                    <?php
                                   $sql->selectall("emp_profile");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                  </select>

                </div>

              </div>
            </div>
            <br><br>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['Dashboard']?></center>
                </th>
                <th>
                  <center><?=$lang['Dashboard']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="dash"></center>
                </td>

              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['Customers']?></center>
                </th>
                <th>
                  <center><?=$lang['Customer_List']?></center>
                </th>
                <th>
                  <center><?=$lang['Group']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="cust"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="cust_g"></center>
                </td>

              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['Accounts']?></center>
                </th>

                <th>
                  <center><?=$lang['gl']?></center>
                </th>
                <th>
                  <center><?=$lang['Expenses']?></center>
                </th>
                <th>
                  <center><?=$lang['incomes']?></center>
                </th>
                <th>
                  <center><?=$lang['Accounts']?></center>
                </th>
                <th>
                  <center><?=$lang['Cost_Center'];?></center>
                </th>
                <th>
                  <center><?=$lang['ASSETS']?></center>
                </th>
                <th>
                  <center><?=$lang['manger_accounting']?></center>
                </th>
                <th>
                  <center><?=$lang['manger_o']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account_ge"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account_ex"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account_in"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account_cc"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="account_ass"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="manger1"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="manger2"></center>
                </td>
              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['hrms']?></center>
                </th>

                <th>
                  <center><?=$lang['MENU_PROFILES_LIST']?></center>
                </th>
                <th>
                  <center> <?=$lang['DEPARTMENT']?></center>
                </th>
                <th>
                  <center><?=$lang['LEAVE']?></center>
                </th>
                <th>
                  <center><?=$lang['Pending_approval_m']?></center>
                </th>
                <th>
                  <center><?=$lang['Pending_approval_hr']?></center>
                </th>
                <th>
                  <center><?=$lang['Resume_Request']?></center>
                </th>
                <th>
                  <center><?=$lang['Salary_Item']?></center>
                </th>
                <th>
                  <center><?=$lang['Employees_salaries']?> </center>
                </th>
                <th>
                  <center><?=$lang['Employees_salaries2']?> </center>
                </th>
                <th>
                  <center><?=$lang['Advances']?></center>
                </th>
                <th>
                  <center><?=$lang['salary_rallies']?> </center>
                </th>
                <th>
                  <center><?=$lang['qu']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_sd"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_le"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_pm"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_ph"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_rr"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_si"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_es"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_es1"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_ad"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_sr"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="hr_qu"></center>
                </td>
              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['Projects']?></center>
                </th>

                <th>
                  <center><?=$lang['AllProjects']?></center>
                </th>
                <th>
                  <center><?=$lang['Projects']?></center>
                </th>
                <th>
                  <center><?=$lang['Task_Manager']?></center>
                </th>
                <th>
                  <center><?=$lang['category']?> </center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="projects"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="project"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="project_tm"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="project_cat"></center>
                </td>

              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['Reports']?></center>
                </th>

                <th>
                  <center><?=$lang['Trial_Balance']?></center>
                </th>
                <th>
                  <center><?=$lang['Ledger_Report']?></center>
                </th>
                <th>
                  <center><?=$lang['General_Ledger_Report']?></center>
                </th>
                <th>
                  <center><?=$lang['Cost_Report']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="report_tb"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="report_lr"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="report_gl"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="report_cost"></center>
                </td>

              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['USERS']?></center>
                </th>

                <th>
                  <center><?=$lang['USERS']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="user"></center>
                </td>

              </tr>
            </table>

            <table width="100%" class="datatables-basic  table table-bordered">
              <tr>
                <th rowspan="2" style="width: 15%">
                  <center><?=$lang['General_Settings']?></center>
                </th>

                <th>
                  <center><?=$lang['Currencies']?></center>
                </th>
                <th>
                  <center><?=$lang['Tax']?></center>
                </th>

              </tr>
              <tr>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="setting"></center>
                </td>
                <td>
                  <center><input type="checkbox" class="form-check-input" value="1" name="setting_tax"></center>
                </td>

              </tr>
            </table>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <?=$lang['Group']?> <?=$lang['DELETE1']?> -->
<div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['DELETE1']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" action="inc/fun/user/delete.php<?=$page?>">
            <div id="name" class=" col mb-3">

              Are you sure to delete this user?

            </div>
            <input class="val" type="hidden" name="id">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"><?=$lang['DELETE1']?></button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function data() {
    var Brand = get_filter('mat');
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
    var Brand = get_filter('mat');

    function get_filter(class_name) {
      var filter = [];
      $('.' + class_name + ':checked').each(function() {
        filter.push($(this).val())
      })
      $(".val").val(filter)
      $(".de").show()
    }
  }
  $(document).ready(function() {
    $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='user=list'");
    $(".en").attr("href", "inc/des/lang.php?lang=en&page='user=list'");
  });
</script>