<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row invoice-preview">
    <!-- Invoice -->
    <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
      <div class="card invoice-preview-card">
        <div class="card-body">
          <div style="float: left; ">
            <img style="width: 65%; height: auto" src="img/logo.png">
          </div>
          <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
            <div class="mb-xl-0 mb-4">
              <div class="d-flex svg-illustration mb-3 gap-2">
                <span class="app-brand-logo demo">

                </span>

              </div>

            </div>

            <div>
              <?php




$id=$_GET['id'];

 $sql->selectall("trans where id=$id");
  
 while ($row = $sql->res->fetch_assoc()) {

$stat22=$row['c_stat'];
$photo=$row['photo'];
?>
              <h4>قيد اليومية #<?=$row['ref']?></h4>
              <div class="mb-2">
                <span class="me-1">Date Issues:</span>
                <span class="fw-semibold"><?=$row['date2']?></span>
              </div>
              <div class="mb-2">
                <span class="me-1">Description:</span>
                <span class="fw-semibold"><?=$row['name']?></span>

              </div>
              <div class="mb-2">
                <span class="me-1">currency:</span>
                <span class="fw-semibold"><?php
              $currency=$row['currency_id'];
$sql->select3("currencies","where id=$currency  ");
        while($row3=$sql->res3->fetch_assoc())
                {

echo$row3['code'];


                }

              ?></span>

              </div>
              <div class="mb-2">
                <span class="me-1">currency rate:</span>
                <span class="fw-semibold"><?=$row['currency_rate']?></span>

              </div>
              <?php

       
  }?>
            </div>
          </div>
        </div>
        <hr class="my-0" />

        <div class="table-responsive">
          <table width="10%" class="datatables-basic  table table-bordered">
            <thead>
              <tr bgcolor="#e5e5e5">
                <th colspan="2">
                  <center>account</center>
                </th>

                <th>
                  <center>Description</center>
                </th>
                <th>
                  <center>depit</center>
                </th>
                <th>
                  <center>crdit</center>
                </th>
                <?php

if ($stat22!=1) {


              ?>
                <th>
                  <center>مدين محلي</center>
                </th>
                <th>
                  <center>دائن محلي </center>
                </th>
                <?php
}
            ?>
              </tr>
            </thead>
            <tbody>
              <?php



$get=$_GET['id'];

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
                <td>
                  <center><?=$des?></center>
                </td>
                <td>
                  <center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <td>
                  <center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <?php
              if ($stat22!=1) {
?>
                <td>
                  <center><?=$row['drr']?></center>
                </td>
                <td>
                  <center><?=$row['crr']?></center>
                </td>

                <?php
}
?>
              </tr>
              <?php
}
?>
              <tr bgcolor="#e5e5e5">
                <td colspan="3">
                  <center>Total :</center>
                </td>
                <td>
                  <center><?php 
 $sql->selectsum("dr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(dr)'];
 }
  ?></center>
                </td>

                <td>
                  <center><?php 
 $sql->selectsum("cr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(cr)'];
 }
  ?></center>
                </td>
                <?php
              if ($stat22!=1) {
?>
                <td>
                  <center><?php 
 $sql->selectsum("drr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(drr)'];
 }
  ?></center>
                </td>

                <td>
                  <center><?php 
 $sql->selectsum("crr",'transaction',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(crr)'];
 }
  ?></center>
                </td><?php
}
?>
              </tr>
            </tbody>
          </table>
          <?php

$get=$_GET['id'];
$sql->check("costs",['trans_id'=>$get]);
 $num=$sql->check;


if ($num>=1) {


?>
          <br>
          <br>

          <table class="table border-top m-0">
            <thead>
              <tr bgcolor="#e5e5e5">
                <th colspan="7">
                  <center>costs</center>
                </th>
              </tr>
              <tr bgcolor="#e5e5e5">
                <th colspan="2">
                  <center>cost</center>
                </th>

                <th>
                  <center>Rate</center>
                </th>
                <th>
                  <center>depit</center>
                </th>
                <th>
                  <center>crdit</center>
                </th>
                <?php

if ($stat22!=1) {


              ?>
                <th>
                  <center>مدين محلي</center>
                </th>
                <th>
                  <center>دائن محلي </center>
                </th>
                <?php
}
            ?>
              </tr>
            </thead>
            <tbody>
              <?php



$get=$_GET['id'];

 $sql->selectall("costs where dr!=0 and trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
// $des=$row['des'];
$acc=$row['cost2_id'];
?>
              <tr>
                <td>
                  <center>
                    <?php


            $sql->select1("cost2"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['name'];

                                        
}
?></center>
                </td>
                <td>
                  <center><?=$name?></center>
                </td>
                <td>
                  <center><?=$row['rate']?> %</center>
                </td>
                <td>
                  <center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <td>
                  <center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <?php
               if ($stat22!=1) {
?>
                <td>
                  <center><?=$row['drr']?></center>
                </td>
                <td>
                  <center><?=$row['crr']?></center>
                </td>

                <?php
}
?>

              </tr>
              <?php
}
?>

              <tr>
                <td colspan="7"><br></td>
              </tr>
              <?php



$get=$_GET['id'];

 $sql->selectall("costs where cr!=0 and trans_id=$get order by id");
  
 while ($row = $sql->res->fetch_assoc()) {
// $des=$row['des'];
$acc=$row['cost2_id'];
?>
              <tr>
                <td>
                  <center>
                    <?php


            $sql->select1("cost2"," where id=$acc ");
                                       while($row1=$sql->res1->fetch_assoc())

                                        {
echo $row1['id'];
$name=$row1['name'];

                                        
}
?></center>
                </td>
                <td>
                  <center><?=$name?></center>
                </td>
                <td>
                  <center><?=$row['rate']?> %</center>
                </td>
                <td>
                  <center><?php
if ($row['dr'] !=0) {
 echo $row['dr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <td>
                  <center><?php
if ($row['cr'] !=0) {
 echo $row['cr'];
}else{
  echo 0;
}

              ?></center>
                </td>
                <?php
               if ($stat22!=1) {
?>
                <td>
                  <center><?=$row['drr']?></center>
                </td>
                <td>
                  <center><?=$row['crr']?></center>
                </td>

                <?php
}
?>
              </tr>
              <?php
}
?>
              <tr>
              <tr bgcolor="#e5e5e5">
                <td colspan="2">
                  <center>Total :</center>
                </td>
                <td>
                  <center><?php 
 $sql->selectsum("rate",'costs'," trans_id=$get  ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$rate=$row['SUM(rate)'].' %';
 }
  ?></center>
                </td>
                <td>
                  <center><?php 
 $sql->selectsum("dr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(dr)'];
 }
  ?></center>
                </td>

                <td>
                  <center><?php 
 $sql->selectsum("cr",'costs'," trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(cr)'];
 }
  ?></center>
                </td>

                <?php
              if ($stat22!=1) {
?>
                <td>
                  <center><?php 
 $sql->selectsum("drr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(drr)'];
 }
  ?></center>
                </td>

                <td>
                  <center><?php 
 $sql->selectsum("crr",'costs',"trans_id=$get ");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(crr)'];
 }
  ?></center>
                </td><?php
}
?>
              </tr>

            </tbody>
          </table>
          <?php
}
    ?>
        </div>

        <div class="card-body">
          <div class="row">
            <a href="inc/photo/<?=$photo?>" target="_blank">
              <img style="width: 100% ; height: auto" src="inc/photo/<?=$photo?>">
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Invoice -->

    <!-- Invoice Actions -->
    <div class="col-xl-3 col-md-4 col-12 invoice-actions">
      <div class="card">
        <div class="card-body">

          <a class="btn btn-label-secondary d-grid w-100 mb-3 btn-success" target="_blank" href="inc/fun/gl/print.php?id=<?=$_GET['id']?>">
            Print
          </a>
          <a href="?exp=edit&id=<?=$get?>" target="_blank" class="btn btn-label-secondary d-grid w-100 mb-3 btn-primary">
            Edit Invoice
          </a>

        </div>
      </div>
    </div>
    <!-- /Invoice Actions -->
  </div>

  <!-- Offcanvas -->

  <!-- /Send Invoice Sidebar -->

  <!-- Add Payment Sidebar -->
  <!-- /Offcanvas -->

</div>
<!-- / Content -->