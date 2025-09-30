

         <div class="container-xxl flex-grow-1 container-p-y">
<div class="row g-4 mb-4">

<div class="card">      

  <div class="card-header border-bottom">
<h5 class="card-title" style="float:left;">salary edit</h5>


         
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
$id=$_GET['id'];
          ?>

</div>
<!-- DataTable with Buttons -->
 <br> 
           
   <div class="row">

                                <form method="post" action="inc/fun/salary_slip/update.php">


   <div class="form-group">
               <div class="row">
               
<div class="col-md-6">
                   <br>
                  <label><?php echo $lang['User'];?></label>
                                 
                             <select class="form-control js-example-basic-single" name="user">
                              <?php

 $sql->select1("emp_profile","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option   <?php 
if ($row1['id']==$id) {
echo 'selected';
}
   ?> value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select>
                
                </div>
<div class="col-md-6">
                   <br>
                  <label>: التاريخ</label>
                                 
                            <input type="date" class="form-control" value="<?php
 $sql->select2("salary_slip2","where id=$id");

     while ($row2= $sql->res2->fetch_assoc()) {
echo $row2['date'];
     }



                            ?>" name="date">
                
                </div>


                </div></div>
<div class="kk">
  <br><br>

    <table width="10%"  class="datatables-basic  table table-bordered">
      <thead>
        <tr>

       

         <th style="padding: .625rem 0.25rem;"><center>type</center> </th>
  
         <th style="padding: .625rem 0.25rem;"><center>amount</center> </th>

         <th style="padding: .625rem 0.25rem;"><center><?php echo $lang['ACTION'];?></center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
                                 <?php

 $sql->select2("salary_slip2","where id=$id");
$x=0;
     while ($row2= $sql->res2->fetch_assoc()) {
      $x++;
?>
<tr  class="tr<?=$x?>"><td style="padding: .625rem 0.25rem;"><center ><select style="width: 100%;height: 100%" class="form-select " name="salary">
                                <?php

 $sql->select1("salary","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option  <?php 
if ($row1['id']==$row2['salary_id']) {
echo 'selected';
}
   ?> value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select><center ></center></td><td style="padding: .625rem 0.25rem;"><center ><input type="number" value="<?=$row2['amount']?>" class="form-control" name="amount" placeholder="Amount"></center></td><td style="padding: .625rem 0.25rem;"><center><button type="button" class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="del(<?=$x?>)"><i class="bx bxs-trash-alt" ></i></button></center></td></tr>


<?php
}
 
                              ?>
 
      <tr class="ttt"><td colspan="4"></td></tr>


     </tbody>
    </table>


     <div class="col-md-12">
                   <br>
                  <label>: <?php echo $lang['Description'];?></label>
                                 
<textarea class="form-control" name="des"><?=$row1['id']?></textarea>
                
                </div>
<input type="hidden" value="<?=$_GET['id']?>" name="id">
<br>
<br>
<input type="submit" value="save"  class="btn btn-success">
<br>
<br>
</form>

        </div>
 <br><br>
 <div style="display: none"> <select  class="ss form-select  " name="aa">
                              <?php

 $sql->select1("salary","where 1=1");

     while ($row1 = $sql->res1->fetch_assoc()) {


 
                              ?>
  <option  value="<?=$row1['id']?>"><?=$row1['name']?></option>
<?php

    }
?>

</select></div>
              

           </div>
                 </div>
               </div>

               <script type="text/javascript">
  
          var x=<?=$x?>;
                 function add() {
                 x++;
                  var select=$(".ss").html()
                   $(".ttt").before('<tr  class="tr'+x+'"><td style="padding: .625rem 0.25rem;"><center ><select style="width: 100%;height: 100%"  class="form-select " name="salary[]">'+select+'</select><center ></center></td><td style="padding: .625rem 0.25rem;"><center ><input type="number" class="form-control" name="amount[]" placeholder="Amount"></center></td><td style="padding: .625rem 0.25rem;"><center><button type="button" class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="del('+x+')"><i class="bx bxs-trash-alt" ></i></button></center></td></tr>');
                    $("select").select2();
                 }

                 function del(a){
                  $(".tr"+a).remove()
                 }
               </script>

