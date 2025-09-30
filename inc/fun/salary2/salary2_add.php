
         <div class="container-xxl flex-grow-1 container-p-y">
<div class="row g-4 mb-4">

<div class="card">      

  <div class="card-header border-bottom">
<h5 class="card-title" style="float:left;"><?php echo $lang['Advances'];?></h5>


         
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

                                <form method="post" action="inc/fun/salary2/insert.php">

<div class="form-group">
   <div class="row">

               
<div class="col-md-6">



                   <br>
                  <label><?php echo $lang['EMPLOYEE_ID'];?></label>
                                 
                             <select class="form-select js-example-basic-single" name="emp_id">
                              <?php

 $sql->select1("emp_profile","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option  value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select>
                
                </div>
<div class="col-md-6">
  
                   <br>
                  <label><?php echo $lang['date_of_submission'];?></label>
                                 
                            <input type="date" value="<?=date("Y-m-d")?>" class="form-control" name="date">
                
                </div>
                <div class="col-md-6">
  
                   <br>
                  <label> <?php echo $lang['Amount'];?></label>
                                 
                            <input type="text" class="amount form-control" name="amount">
                
                </div>
                 <div class="col-md-4">
  
                   <br>
                  <label> <?php echo $lang['installment_amount'];?></label>
                                 
                            <input type="text" class="price_a form-control" name="price_a">
                
                </div>
                <div class="col-md-2">
  
                   <br>
                  <label><?php echo $lang['number_of_installments'];?>
</label>
                                 
                            <input type="text" disabled="" class="num form-control" >
                            <input type="hidden" class="num form-control" name="num">
                
                </div>

                <div class="col-md-6">
  
                   <br>
                  <label>

<?php echo $lang['Installment_start_date'];?></label>
                                 
                            <input type="date" value="<?=date("Y-m-d")?>" class="form-control" name="date_start">
                
                </div>
<div class="col-md-6">
                   <br>
                  <label><?php echo $lang['Account_Name'];?></label>
                                 
                             <select class="form-select js-example-basic-single" name="account_no">
                              <?php


                                   $sql->selectall("account_no where account_c3=11 or account_c3=12");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['account_name'].'</option>';
                                   }

                                   ?>
</select>
                
                </div>

<div class="col-md-12">
                   <br>
                  <label> <?php echo $lang['DESCRIPTION'];?></label>
                                 
                           <textarea class="form-control" name="des"></textarea>
                
                </div>

                </div>
                </div>
                 <br><br>
 
<button type="submit" class="btn btn-primary" style="float: right;">Save</button>
<br><br><br>
<script type="text/javascript">
  $(document).ready(function(){
     $("select").select2();
  })

  $(".price_a").keyup(function(){
    var price=$(this).val();
    var amount=$(".amount").val();
    var total =Math.ceil(amount/ price); // 2
 
    $(".num").val(total);
    
  })
 
</script>


















