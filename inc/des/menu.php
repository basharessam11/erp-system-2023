
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">


    <center><img style="width: 85%;height: auto" src="img/logo.png"></center>


    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <br> 
  <div class="menu-inner-shadow"></div>

  
  <?php

 $user=$_SESSION['login'];
  $sql->selectall(" user where name = '$user'");
     while ($row1 = $sql->res->fetch_assoc()) {
$user_id=$row1['id'];
$emp_id=$row1['emp_id'];
      $manger1=$row1['manger1'];
      $manger2=$row1['manger2'];
      $dash=$row1['dash'];
      $cust=$row1['cust'];
      $cust_g=$row1['cust_g'];
      $account=$row1['account'];
      $account_ge=$row1['account_ge'];
      $account_ex=$row1['account_ex'];
      $account_in=$row1['account_in'];
      $account_cc=$row1['account_cc'];
      $account_ass=$row1['account_ass'];
      $hr=$row1['hr'];
      $hr_sd=$row1['hr_sd'];
      $hr_le=$row1['hr_le'];
      $hr_pm=$row1['hr_pm'];
      $hr_ph=$row1['hr_ph'];
      $hr_rr=$row1['hr_rr'];
      $hr_si=$row1['hr_si'];
      $hr_es=$row1['hr_es'];
      $hr_es1=$row1['hr_es1'];
      $hr_ad=$row1['hr_ad'];
      $hr_sr=$row1['hr_sr'];
      $hr_qu=$row1['hr_qu'];
      $project=$row1['project'];
      $projects=$row1['projects'];
      $project_tm=$row1['project_tm'];
      $project_cat=$row1['project_cat'];
      $report_tb=$row1['report_tb'];
      $report_lr=$row1['report_lr'];
      $report_gl=$row1['report_gl'];
      $report_cost=$row1['report_cost'];
      $user=$row1['user'];
      $setting=$row1['setting'];
      $setting_tax=$row1['setting_tax'];

  ?>
  <ul class="menu-inner py-1">
   
  <!-- Dashboards -->
<?php

if ($dash==1) {
?>

<li class="menu-item <?php
if (empty($_GET)) {
    echo "active open";
  }
 ?>">
      <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div ><?=$lang['Dashboard']?></div>
    
      </a>
    </li>
<?php
}

?>
    <!-- Layouts -->
<?php

if ($cust==1 or $cust_g==1) {
?>
 <!-- Customers -->
    <li class="menu-item <?php
if ( $_GET['customers']=="list" or $_GET['group']=="list" or $_GET['Contact']=="list" or $_GET['type_c']=="list") {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div ><?=$lang['Customers']?>  </div>
      </a>

      <ul class="menu-sub">
<!-- Customers list -->
<?php

if ($cust==1) {
?>
        <li class="menu-item <?php
if ($_GET['customers']=="list") {
    echo "active";
  }
 ?>">
          <a href="?customers=list" class="menu-link">
            <div><?=$lang['Customer_List']?></div>
          </a>
        </li>

        <?php
      }
      ?>
<!-- Group -->
<?php

if ($cust_g==1) {
?>
<li class="menu-item <?php
if ($_GET['group']=="list") {
    echo "active";
  }
 ?>">
          <a href="?group=list" class="menu-link">
            <div><?=$lang['Group']?></div>
          </a>
        </li>
<?php
}
?>
<!-- Contact -->
<!-- 
<li class="menu-item <?php
if ($_GET['Contact']=="list") {
    echo "active";
  }
 ?>">
          <a href="?Contact=list" class="menu-link">
            <div><?=$lang['Contact']?></div>
          </a>
        </li>
 -->

<!-- type -->
  <!--  
<li class="menu-item <?php
if ($_GET['type_c']=="list") {
    echo "active";
  }
 ?>">
          <a href="?type_c=list" class="menu-link">
            <div><?=$lang['Custmer_Type']?></div>
          </a>
        </li>
 -->
      </ul>
    </li>

<!-- Suppliers -->
<!--  
    <li class="menu-item <?php
if ($_GET['suppliers']=="list" ) {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['Suppliers']?>  </div>
      </a>

      <ul class="menu-sub">
       -->
<!-- Customers list -->
<!-- 
        <li class="menu-item <?php
if ($_GET['suppliers']=="list") {
    echo "active";
  }
 ?>">
          <a href="?inv=list" class="menu-link">
            <div><?=$lang['Suppliers']?></div>
          </a>
        </li>

      </ul>
    </li> -->
<?php
}
?>

    <?php

if ($account==1 or $account_ass==1 or $account_cc==1 or $account_in==1 or $account_ex==1 or $account_ge==1 or $manger1==1 or $manger2==1) {
?>
    <li class="menu-item <?php
if ( $_GET['dep']=="list" or $_GET['exp']=="list"or $_GET['trans']=="list"or $_GET['bills']=="list" or $_GET['trans1']=="list" or $_GET['acco']=="list"or$_GET['accounts']=="list"or $_GET['gl']=="list" or $_GET['assets']=="list" or $_GET['incaming']=="list"  or $_GET['cost1']=="list" or $_GET['manger1']=="list" or $_GET['manger2']=="list" ) {
echo "active open";
}
?>">












      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-food-menu"></i>
        <div ><?=$lang['Accounts']?>  </div>
      </a>

      <ul class="menu-sub">
          <?php

if ($manger1==1) {
?>
        <li class="menu-item <?php
if ($_GET['manger1']=="list") {
    echo "active";
  }
 ?>">
          <a href="?manger1=list" class="menu-link">
          <div><?=$lang['manger_accounting']?></div>
          </a>
        </li>
          <?php
        }
        ?>
          <?php

if ($manger2==1) {
?>
        <li class="menu-item <?php
if ($_GET['manger2']=="list") {
    echo "active";
  }
 ?>">
          <a href="?manger2=list" class="menu-link">
          <div><?=$lang['manger_o']?></div>
          </a>
        </li>
          <?php
        }
        ?>
<?php

if ($account_ge==1) {
?>
<!-- gl -->
        <li class="menu-item <?php
if ($_GET['gl']=="list") {
    echo "active";
  }
 ?>">
          <a href="?gl=list" class="menu-link">
            <div><?=$lang['gl']?></div>
          </a>
        </li>
<?php
}
?>

<!-- Deposits -->
      <!--
	   <li class="menu-item <?php
if ($_GET['dep']=="list") {
    echo "active";
  }
 ?>">
          <a href="?dep=list" class="menu-link">
            <div><?=$lang['Deposits1']?></div>
          </a>
        </li>

-->
        

<?php

if ($account_ex==1) {
?>
<!-- Expenses -->
<li class="menu-item <?php
if ($_GET['exp']=="list") {
    echo "active";
  }
 ?>">
          <a href="?exp=list" class="menu-link">
            <div><?=$lang['Expenses']?></div>
          </a>
        </li>
<?php
}
?>

<?php

if ($account_in==1) {
?>
<!-- incaming -->
<li class="menu-item <?php
if ($_GET['incaming']=="list") {
    echo "active";
  }
 ?>">
          <a href="?incaming=list" class="menu-link">
             <div><?=$lang['incomes']?></div>
          </a>
        </li>
<?php
}
?>

<!-- Transfer -->
<!--
<li class="menu-item <?php
if ($_GET['trans']=="list") {
    echo "active";
  }
 ?>">
          <a href="?trans=list" class="menu-link">
            <div><?=$lang['Transfer']?></div>
          </a>
        </li> -->
<!-- Bills -->
<!--
        <li class="menu-item <?php
if ($_GET['bills']=="list") {
    echo "active";
  }
 ?>">
          <a href="?bills=list" class="menu-link">
            <div><?=$lang['Bills']?></div>
          </a>
        </li>
-->
<!-- transactions -->
<!--
        <li class="menu-item <?php
if ($_GET['trans1']=="list") {
    echo "active";
  }
 ?>">
          <a href="?trans1=list" class="menu-link">
            <div><?=$lang['transactions']?></div>
          </a>
        </li>
-->
<?php

if ($account==1) {
?>
<!-- Accounts -->
        <li class="menu-item <?php
if ($_GET['acco']=="list") {
    echo "active";
  }
 ?>">
          <a href="?acco=list" class="menu-link">
            <div><?=$lang['Accounts']?></div>
          </a>
        </li>
<?php
}
?>

   
   <!-- Accounts1 
        <li class="menu-item <?php
if ($_GET['accounts']=="list") {
    echo "active";
  }
 ?>">
          <a href="?accounts=list" class="menu-link">
            <div><?=$lang['Accounts']?>1</div>
          </a>
        </li>
        -->
<?php

if ($account_cc==1) {
?>
<!-- cost_center -->
        <li class="menu-item <?php
if ($_GET['cost1']=="list") {
    echo "active";
  }
 ?>">
          <a href="?cost1=list" class="menu-link">
            <div><?=$lang['Cost_Center'];?></div>
          </a>
        </li>

   <?php
 }
 ?>

 <?php

if ($account_ass==1) {
?>
    <!-- ASSETS -->
        <li class="menu-item <?php
if ($_GET['assets']=="list") {
    echo "active";
  }
 ?>">
          <a href="?assets=list" class="menu-link">
            <div><?=$lang['ASSETS']?></div>
          </a>
        </li>
<?php
}
?>


      </ul>
    </li>


<?php
}
?>
    <!-- Sales --> <!--  
    <li class="menu-item <?php
if ($_GET['inv']=="list" or $_GET['sel']=="list" or $_GET['sales']=="list") {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['Sales']?>  </div>
      </a>

      <ul class="menu-sub">   -->
<!-- Invoices --> <!--  
        <li class="menu-item <?php
if ($_GET['inv']=="list") {
    echo "active";
  }
 ?>">
          <a href="?inv=list" class="menu-link">
            <div><?=$lang['Invoices']?></div>
          </a>
        </li>
        -->
<!-- Sell_order --><!-- 
<li class="menu-item <?php
if ($_GET['sel']=="list") {
    echo "active";
  }
 ?>">
          <a href="?sel=list" class="menu-link">
            <div><?=$lang['Sell_order']?></div>
          </a>
        </li>
 -->
<!-- Sales -->  <!-- 
<li class="menu-item <?php
if ($_GET['sales']=="list") {
    echo "active";
  }
 ?>">
          <a href="?sales=list" class="menu-link">
            <div><?=$lang['Sales']?></div>
          </a>
        </li>


      </ul>
    </li>
  -->



    <!-- Purchases -->
    <!--  
    <li class="menu-item <?php
if ($_GET['purchases']=="list" ) {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['Purchases']?>  </div>
      </a>

      <ul class="menu-sub">

      -->
<!-- Purchases -->

<!--  
        <li class="menu-item <?php
if ($_GET['purchases']=="list") {
    echo "active";
  }
 ?>">
          <a href="?purchases=list" class="menu-link">
            <div><?=$lang['Purchases']?></div>
          </a>
        </li>



      </ul>
    </li>
-->
 


   <!-- leads -->
   <!-- 
    <li class="menu-item <?php
if ($_GET['leads']=="list" ) {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['leads']?>  </div>
      </a>

      <ul class="menu-sub">
          -->
<!-- leads -->

<!-- 
        <li class="menu-item <?php
if ($_GET['leads']=="list") {
    echo "active";
  }
 ?>">
          <a href="?leads=list" class="menu-link">
            <div><?=$lang['Add_lead']?></div>
          </a>
        </li>



      </ul>
    </li>

 -->
 <?php


if ($hr_sd==1 or  $hr_le==1 or $hr_pm==1 or  $hr_ph==1 or $hr_rr==1 or $hr_si==1 or $hr_es==1 or $hr_es1==1 or $hr_ad==1 or  $hr_sr==1 or $hr_qu==1 or $hr==1) {
?>
   <!-- hrms -->
    <li class="menu-item <?php
if ($_GET['hrms']=="list" or $_GET['department']=="list"or $_GET['salary']=="list" or $_GET['hr']=="list"or $_GET['manger']=="list"or $_GET['salary_st']=="list" or $_GET['pay_slip']=="list" or $_GET['leave']=="list" or $_GET['leave_resume']=="list" or $_GET['salary_slip']=="list" or $_GET['salary2']=="list" or $_GET['salary_all']=="list"or $_GET['qu']=="list") {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div ><?=$lang['hrms']?>  </div>
      </a>

      <ul class="menu-sub">
         <?php

if ($hr==1) {
?>
<!-- hrms -->
        <li class="menu-item <?php
if ($_GET['hrms']=="list") {
    echo "active";
  }
 ?>">
          <a href="?hrms=list" class="menu-link">
            <div><?=$lang['MENU_PROFILES_LIST']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_sd==1) {
?>
<!-- department -->
<li class="menu-item <?php
if ($_GET['department']=="list") {
    echo "active";
  }
 ?>">
          <a href="?department=list" class="menu-link">
          <div><?=$lang['DEPARTMENT']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_le==1) {
?>

        <li class="menu-item <?php
if ($_GET['leave']=="list") {
    echo "active";
  }
 ?>">
          <a href="?leave=list" class="menu-link">
            <div><?=$lang['LEAVE']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_pm==1) {
?>
        <li class="menu-item <?php
if ($_GET['manger']=="list") {
    echo "active";
  }
 ?>">
          <a href="?manger=list" class="menu-link">
          <div><?=$lang['Pending_approval_m']?></div>
          </a>
        </li>
          <?php
        }
        ?>
                 <?php

if ($hr_ph==1) {
?>
        <!-- hr -->
        <li class="menu-item <?php
if ($_GET['hr']=="list") {
    echo "active";
  }
 ?>">
          <a href="?hr=list" class="menu-link">
            <div><?=$lang['Pending_approval_hr']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_rr==1) {
?>
      <!-- leave_resume -->
      <li class="menu-item <?php
if ($_GET['leave_resume']=="list") {
    echo "active";
  }
 ?>">
          <a href="?leave_resume=list" class="menu-link">
           <div><?=$lang['Resume_Request']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_si==1) {
?>

<!-- salary -->
        <li class="menu-item <?php
if ($_GET['salary']=="list") {
    echo "active";
  }
 ?>">
          <a href="?salary=list" class="menu-link">

            
            <div><?=$lang['Salary_Item']?></div>
          </a>
        </li>
<?php
}
?>
         <?php

if ($hr_es==1) {
?>
        <!-- salary_st -->
        <li class="menu-item <?php
if ($_GET['salary_st']=="list") {
    echo "active";
  }
 ?>">
          <a href="?salary_st=list" class="menu-link">
            <div><?=$lang['Employees_salaries']?></div>
          </a>
        </li>
         <?php
}
if ($hr_es1==1) {
?>
<!-- salary_st -->
        <li class="menu-item <?php
if ($_GET['salary_all']=="list") {
    echo "active";
  }
 ?>">
          <a href="?salary_all=list" class="menu-link">
            <div><?=$lang['Employees_salaries2']?></div>
          </a>
        </li>
         <?php
}
if ($hr_ad==1) {
?>
      <!-- salary2 -->
        <li class="menu-item <?php
if ($_GET['salary2']=="list") {
    echo "active";
  }
 ?>">
          <a href="?salary2=list" class="menu-link">
          <div><?=$lang['Advances']?></div>
          </a>
        </li>
         <?php
}
if ($hr_sr==1) {
?>
      <!-- salary2 -->
        <li class="menu-item <?php
if ($_GET['salary_slip']=="list") {
    echo "active";
  }
 ?>">
          <a href="?salary_slip=list" class="menu-link">
          <div><?=$lang['salary_rallies']?></div>

            
          </a>
        </li>
         <?php
}
if ($hr_qu==1) {
?>
              <!-- qu -->
        <li class="menu-item <?php
if ($_GET['qu']=="list") {
    echo "active";
  }
 ?>">
          <a href="?qu=list" class="menu-link">
          <div><?=$lang['qu']?></div>

            
          </a>
        </li>  
<?php
}
?>
      </ul>
    </li>
<?php
}
?>

         <?php

if ($project==1 or$projects==1 or $pro_cat==1 or $pro_stag==1) {
?>
   <!-- Projects -->
    <li class="menu-item <?php
if ($_GET['project']=="list" or$_GET['projects']=="list" or$_GET['task']=="list" or $_GET['pro_cat']=="list" or $_GET['pro_stag']=="list" or $_GET['pro_type']=="list") {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
        <div ><?=$lang['Projects']?>  </div>
      </a>

      <ul class="menu-sub">
                 <?php

if ($project==1) {
?>
<!-- Projects -->
        <li class="menu-item <?php
if ($_GET['project']=="list") {
    echo "active";
  }
 ?>">
          <a href="?project=list" class="menu-link">
            <div><?=$lang['Projects']?></div>
          </a>
        </li>
             <?php
}if ($projects==1 or $project==1) {
?>
<!-- Projects -->
        <li class="menu-item <?php
if ($_GET['pro_type']=="list") {
    echo "active";
  }
 ?>">
          <a href="?pro_type=list" class="menu-link">
            <div><?=$lang['Type']?></div>
          </a>
        </li>
             <?php
}
if ($projects==1 ) {
?>
<!-- Projects -->
        <li class="menu-item <?php
if ($_GET['projects']=="list") {
    echo "active";
  }
 ?>">
          <a href="?projects=list" class="menu-link">
            <div><?=$lang['Projects_all']?></div>
          </a>
        </li>
             <?php
}
if ($project_tm==1) {
?>
    


        <!-- Projects -->
         <!--
        <li class="menu-item <?php
if ($_GET['pro_stag']=="list") {
    echo "active";
  }
 ?>">
          <a href="?pro_stag=list" class="menu-link">
          <div><?=$lang['Project_Phases']?></div>
          </a>
        </li>
    -->
    <!-- Task -->
    
        <li class="menu-item <?php
if ($_GET['task']=="list") {
    echo "active";
  }
 ?>">
          <a href="?task=list" class="menu-link">
            <div><?=$lang['Task_Manager']?></div>
          </a>
        </li>
          <?php
}
if ($project_cat==1) {
?>
     <!-- Projects -->
    <li class="menu-item <?php
if ($_GET['pro_cat']=="list") {
    echo "active";
  }
 ?>">
          <a href="?pro_cat=list" class="menu-link">
          <div ><?=$lang['category']?>  </div>
          </a>
        </li>

<?php
}
?>
      </ul>
    </li>

<?php
}
?>

  <!-- Document -->

  <!--  
    <li class="menu-item <?php
if ($_GET['Document']=="list" ) {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['Document']?>  </div>
      </a>

      <ul class="menu-sub">
      -->
<!-- Document -->
<!--
        <li class="menu-item <?php
if ($_GET['Document']=="list") {
    echo "active";
  }
 ?>">
          <a href="?Document=list" class="menu-link">
            <div><?=$lang['Document']?></div>
          </a>
        </li>



      </ul>
    </li>

  -->


  <!-- Products_And_Services -->
  <!--  
    <li class="menu-item <?php
if ($_GET['ps']=="list" ) {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['Products_And_Services']?>  </div>
      </a>

      <ul class="menu-sub"> 

       -->
<!-- Products_And_Services -->
<!--  
        <li class="menu-item <?php
if ($_GET['ps']=="list") {
    echo "active";
  }
 ?>">
          <a href="?ps=list" class="menu-link">
            <div><?=$lang['Products_And_Services']?></div>
          </a>
        </li>



      </ul>
    </li>

   -->

   
         <?php

if ($report_tb==1 or $report_lr ==1 or $report_gl==1 ) {
?>
    <!-- reports -->
    <li class="menu-item <?php
if ($_GET['reports']=="list" or $_GET['rep']=="f1" or $_GET['rep']=="f2" or $_GET['rep']=="f3"or $_GET['rep']=="f4") {
echo "active open";
}
?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-bar-chart-alt-2"></i>
        <div ><?=$lang['Reports']?></div>
      </a>

      <ul class="menu-sub">
                 <?php

if ($report_tb==1 ) {
?>
<!-- reports -->
        <li class="menu-item <?php
if ($_GET['rep']=="f1") {
    echo "active";
  }
 ?>">
          <a href="?rep=f1" class="menu-link">
            <div><?=$lang['Trial_Balance']?></div>
          </a>
        </li>
                 <?php
}
if ( $report_lr ==1 ) {
?>
<!-- reports -->
        <li class="menu-item <?php
if ($_GET['rep']=="f2") {
    echo "active";
  }
 ?>">
          <a href="?rep=f2" class="menu-link">
            <div><?=$lang['Ledger_Report']?></div>
          </a>
        </li>
         <?php
}
if ( $report_gl==1 ) {
?>
<!-- reports f3 -->
        <li class="menu-item <?php
if ($_GET['rep']=="f3") {
    echo "active";
  }
 ?>">
          <a href="?rep=f3" class="menu-link">
            
            <div><?=$lang['General_Ledger_Report']?></div>
          </a>
        </li>
<?php
}
if ( $report_cost==1 ) {
?>
<!-- reports f4 -->
        <li class="menu-item <?php
if ($_GET['rep']=="f4") {
    echo "active";
  }
 ?>">
          <a href="?rep=f4" class="menu-link">
            
            <div><?=$lang['Cost_Report']?></div>
          </a>
        </li>
<?php
}
?>
      </ul>
    </li>
                 <?php
}
if ( $user==1 ) {
?>

<!-- user -->
         <li class="menu-item <?php
if ($_GET['user']=="list") {
    echo "active";
  }
 ?>">
          <a href="?user=list" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div ><?=$lang['USERS']?></div>
          </a>
        </li>
                 <?php
}
if ( $setting==1  or $setting_tax==1) {
?>  
   <!-- General_Settings -->
  
      <li class="menu-item <?php
if ($_GET['tax']=="list" or$_GET['Currencies']=="list") {
echo "active open";
}
?>">












      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div ><?=$lang['General_Settings']?>  </div>
      </a>

      <ul class="menu-sub">
                <?php

if ( $setting==1  ) {
?>  
<!-- Currencies -->
        <li class="menu-item <?php
if ($_GET['Currencies']=="list") {
    echo "active";
  }
 ?>">
          <a href="?Currencies=list" class="menu-link">
            <div><?=$lang['Currencies']?></div>
          </a>
        </li>
                <?php
}
if ( $setting_tax==1) {
?>  
<!-- Expense_Types 
<li class="menu-item <?php
if ($_GET['Expense_Types']=="list") {
    echo "active";
  }
 ?>">
          <a href="?Expense_Types=list" class="menu-link">
            <div><?=$lang['Expense_Types']?></div>
          </a>
        </li>

        -->
<!-- tax -->
        <li class="menu-item <?php
if ($_GET['tax']=="list") {
    echo "active";
  }
 ?>">
          <a href="?tax=list" class="menu-link">
            <div><?=$lang['Tax']?></div>
          </a>
        </li>
        <?php
      }
      ?>
<!-- Transfer
<li class="menu-item <?php
if ($_GET['trans']=="list") {
    echo "active";
  }
 ?>">
          <a href="?trans=list" class="menu-link">
            <div><?=$lang['Transfer']?></div>
          </a>
        </li> -->
<!-- Paymen_Method
        <li class="menu-item <?php
if ($_GET['paymen_method']=="list") {
    echo "active";
  }
 ?>">
          <a href="?paymen_method=list" class="menu-link">
            <div><?=$lang['Paymen_Method']?></div>
          </a>
        </li>
 -->
<!-- transactions 
        <li class="menu-item <?php
if ($_GET['trans1']=="list") {
    echo "active";
  }
 ?>">
          <a href="?trans1=list" class="menu-link">
            <div><?=$lang['transactions']?></div>
          </a>
        </li>
-->
<!-- Accounts 
        <li class="menu-item <?php
if ($_GET['acco']=="list") {
    echo "active";
  }
 ?>">
          <a href="?acco=list" class="menu-link">
            <div><?=$lang['Accounts']?></div>
          </a>
        </li>

   -->
    <!-- ASSETS 
        <li class="menu-item <?php
if ($_GET['assets']=="list") {
    echo "active";
  }
 ?>">
          <a href="?assets=list" class="menu-link">
            <div><?=$lang['ASSETS']?></div>
          </a>
        </li>
-->
      </ul>
    </li>
    <?php
  }
}
    ?>
  

</aside>
<!-- / Menu -->
    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->




<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  

  

  

      
      

      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- Search -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
             <i class="menu-icon tf-icons bx bx-user"></i>
              <span class="d-none d-md-inline-block text-muted">welcome bashar</span>
            </a>
          </div>
        </div>
        <!-- /Search -->

<ul class="navbar-nav flex-row align-items-center ms-auto">
          
          <!-- Language -->
          <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='flag-icon flag-icon-<?php
if ($lang1=='ar') {
  echo 'sd';
}else{
  echo 'us';
}
              ?> flag-icon-squared rounded-circle fs-3 me-1'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item en" href="inc/des/lang.php?lang=en" >
                  <i class="flag-icon flag-icon-us flag-icon-squared rounded-circle fs-4 me-1"></i>
                  <span class="align-middle">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item ar" href="inc/des/lang.php?lang=ar" data-language="sd">
                  <i class="flag-icon flag-icon-sd flag-icon-squared rounded-circle fs-4 me-1"></i>
                  <span class="align-middle">Arbic</span>
                </a>
              </li>
             
            </ul>
          </li>
          <!--/ Language -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          
         
          

          <!-- Style Switcher -->
          <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
              <i class='bx bx-sm'></i>
            </a>
          </li>
          <!--/ Style Switcher -->

          

          
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="img/user.png" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">

              <li>
                <a class="dropdown-item" href="inc/des/logout.php" >
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
          

        </ul>
      </div>

      
 
      
      
  </nav>
  

  
<!-- / Navbar -->