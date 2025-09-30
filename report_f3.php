<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row invoice-preview">
    <!-- Invoice -->
    <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
      <div class="card invoice-preview-card">
        <div class="card-body ">
          <div class="card-header border-bottom">
            <h5 class="card-title"><?=$lang['General_Ledger_Report']?></h5>

          </div>
          <br>

          <div class="card-body ">
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>?rep=f3">
              <div class="row">
                <div class="col-md-3">
                  <label>من تاريخ :

                  </label> <br>
                  <input type="date" name="from" class="address form-control" value="<?php

                  $m=date("m")-1;
if ($m<10) {
  $m='0'.date("m")-1;
}elseif ($m==0) {
  $m=01;
}
if (isset($_POST['from'])) {
echo $_POST['from'];
}else{
  echo  date("Y").'-'.$m.'-'.date("d");
}

               ?>">
                </div>

                <div class="col-md-3">
                  <label>الي تاريخ :</label> <br>
                  <input type="date" name="to" class="address form-control" value="<?php
if (isset($_POST['from'])) {
echo $_POST['to'];
}else{
  echo date("Y-m-d");
}

                                  ?>">
                </div>

                <div class="col-md-3">
                  <label>المصدر :</label> <br>
                  <select class=" form-select" name="type">
                    <option value="0">All</option>
                    <option value="1">gl</option>
                    <!--  <?php

                                       $sql->selectall("currencies");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                                        <option value="<?=$row['id']?>"><?=$row['code']?></option> 
                                        <?php

                                      }
                                        ?>  -->

                  </select>
                </div>
                <div class="col-md-3">
                  <label> </label> <br>
                  <input type="submit" class="btn btn-success form-control" value="ok">
                </div>

              </div>
            </form>
          </div>
          <hr class="my-0" />
          <?php

if (isset($_POST['from'])) {



?>
          <div class="table-responsive">
            <?php 
                 $from=$_POST['from'];
                 $to=$_POST['to'];
                 $type=$_POST['type'];
                 if ($_POST['type']==0) {
                 $type = '';
                 }else{
                  $type='and t_type = '.$_POST['type'];
                 }

 $sql->select2("trans ","where stat=1 $type and date2 BETWEEN '$from' AND '$to'  ");
$array=[];
 while ($row2 = $sql->res2->fetch_assoc()) {
array_push($array, $row2['id']);

             ?>
            <table width="10%" class="datatables-basic  table table-bordered">
              <thead>

                <tr bgcolor="#e5e5e5">
                  <td>
                    <center> قيد اليومية </center>
                  </td>
                  <td>
                    <center>#<?=$row2['ref']?></center>
                  </td>

                  <td>
                    <center>Date Issues:</center>
                  </td>
                  <td>
                    <center><?=$row2['date2']?></center>
                  </td>

                  <td>
                    <center>Description:</center>
                  </td>
                  <td>
                    <center><?=$row2['name']?></center>
                  </td>

                </tr>

                <tr bgcolor="#e5e5e5">
                  <th colspan="2">
                    <center>account</center>
                  </th>

                  <th colspan="2">
                    <center>Description</center>
                  </th>
                  <th>
                    <center>depit</center>
                  </th>
                  <th>
                    <center>crdit</center>
                  </th>

                </tr>
              </thead>
              <tbody>
                <?php












$get=$row2['id'];

 $sql->selectall("transaction where  trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
$des=$row['des'];
$acc=$row['account_id'];
?>

                <tr>
                  <td>
                    <center>
                      <?php


            $sql->select1("account_no"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['account_name'];

                                        
}
?></center>
                  </td>
                  <td>
                    <center><?=$name?></center>
                  </td>
                  <td colspan="2">
                    <center><?=$des?></center>
                  </td>
                  <td>
                    <center><?php
 if ($row['dr'] !=0) {
                                        if ($row['drr'] !=0) {
                                         echo  number_format($row['drr'], 2);
                                        }else{
                                          echo  number_format($row['dr'], 2);
                                        }
                                       
                                       }else{
                                        echo 0;
                                       }


              ?></center>
                  </td>
                  <td>
                    <center><?php
 if ($row['cr'] !=0) {
                                        if ($row['crr'] !=0) {
                                         echo  number_format($row['crr'], 2);
                                        }else{
                                          echo  number_format($row['cr'], 2);
                                         
                                        }
                                       
                                       }else{
                                        echo 0;
                                       }

              ?></center>
                  </td>

                </tr>
                <?php
}
?>
                <tr bgcolor="#e5e5e5">
                  <td colspan="4">
                    <center>Total :</center>
                  </td>
                  <td>
                    <center><?php 

  $sql->selectsum("dr",'transaction',"trans_id=$get and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $dr=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction',"trans_id=$get and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

$dr1=$dr+$row['SUM(drr)']??0;
 echo  number_format($dr1, 2);
 }
  ?></center>
                  </td>

                  <td>
                    <center><?php 
 
  $sql->selectsum("cr",'transaction',"trans_id=$get and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $cr=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction',"trans_id=$get and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

$cr1=$cr+$row['SUM(crr)']??0;
echo  number_format($cr1, 2);
 }
  ?></center>
                  </td>
                </tr>
                <tr>
                  <td colspan="6"></td>
                </tr>
              </tbody>
            </table>

            <?php
  }?>
            <table width="10%" class="datatables-basic  table table-bordered">
              <thead>
                <tr bgcolor="#e5e5e5">
                  <th>
                    <center>total</center>
                  </th>
                  <th>
                    <center>depit</center>
                  </th>
                  <th>
                    <center>credit</center>
                  </th>

                </tr>
              </thead>
              <tbody>
                <tr bgcolor="#e5e5e5">
                  <td>
                    <center>Total :</center>
                  </td>

                  <td>
                    <center><?php 
     $imp=implode(' or  trans_id= ', $array);

       $sql->selectsum("dr",'transaction',"trans_id=$imp and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $dr=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction',"trans_id=$imp and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$dr+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2);
 }



  ?></center>
                  </td>

                  <td>
                    <center><?php 
     $sql->selectsum("cr",'transaction',"trans_id=$imp and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $cr=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction',"trans_id=$imp and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr1=$cr+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2);

 }
  ?></center>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php
}
?>
          <div class="card-body">
            <div class="row">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Invoice -->

    <!-- /Invoice Actions -->
  </div>

  <!-- Offcanvas -->

  <!-- /Send Invoice Sidebar -->

  <!-- Add Payment Sidebar -->
  <!-- /Offcanvas -->

</div>
<!-- / Content -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='rep=f3'");
    $(".en").attr("href", "inc/des/lang.php?lang=en&page='rep=f3'");
  });
</script>