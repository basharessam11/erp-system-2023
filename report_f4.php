         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title"><?=$lang['Cost_Report']?></h5>

               </div>
               <!-- DataTable with Buttons -->
               <br>

               <div class="card-body ">
                 <form method="post" action="<?=$_SERVER['PHP_SELF']?>?rep=f4">
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
                       <input type="date" name="to" class="address form-control" value="<?=date("Y-m-d")?>">
                     </div>

                     <div class="col-md-3">
                       <label>المصدر :</label> <br>
                       <select class=" form-select" name="type">
                         <option value="0">All</option>

                         <?php
$total1=0;
$total2=0;

                                       $sql->selectall("cost2");
                                       while($row=$sql->res->fetch_assoc())
                                        {
                                       ?>
                         <option value="<?=$row['id']?>"><?=$row['name']?></option>
                         <?php

                                      }
                                        ?>

                       </select>
                     </div>
                     <div class="col-md-3">
                       <label> </label> <br>
                       <input type="submit" class="btn btn-success form-control" value="ok">
                     </div>

                   </div>
                 </form>
               </div>
               <!-- DataTable with Buttons -->
               <br>
               <br>
               <?php

if (isset($_POST['from'])) {



?>
               <div class="kk">

                 <table width="10%" class="datatables-basic  table table-bordered">

                   <tbody id="myTable">
                     <?php

                 $type=$_POST['type'];  
if (isset($_POST['type']) and $_POST['type'] !=0 ) {
$id='where id='.$_POST['type'];
}else{
  $id='';
}

                                              
                
                             

                                      $sql->select2("cost2","$id");
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                        
                                            
                                         $id_n=  $row2['id'];

                     ?>
                     <tr bgcolor="#e5e5e5">
                       <td colspan="7">
                         <center><?=$row2['name']?></center>
                       </td>
                     </tr>
                     <tr>
                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>رقم</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>رقم القيد</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>التاريخ </center>
                       </th>
                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>الوصف </center>
                       </th>
                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>العملية </center>
                       </th>

                     </tr>
                     <tr>

                       <th>
                         <center>مدين (EGP) </center>
                       </th>
                       <th>
                         <center>دائن (EGP) </center>
                       </th>

                     </tr>
                     <?php

                                        
                                       
$x=1;

if (isset($_POST['from'])  ) {
                   $from=$_POST['from'];
                 $to=$_POST['to'];                   
$where ="and date2 BETWEEN '".$from."' AND '".$to."'";
}else{
  $where='';
}
  $sql->selectall("costs where  cost2_id=$id_n $where order by id  ");
  while ($row=$sql->res->fetch_assoc()) {

                             
                                        ?>

                     <tr>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><a target="_blank" href="?print=show&id=<?=$row['trans_id'] ?>"><?=$row['trans_id'] ?></a></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                          
                                        $date=date_create($row['date2']);
                                    echo date_format($date,"Y/m/d");
                               
                                        

                                        

                                        ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row2['name']?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
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
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                       if ($row['cr'] !=0) {
                                        if ($row['crr'] !=0) {
                                         echo  number_format($row['cr'], 2);

                                           }else{
                                         echo  number_format($row['cr'], 2);
                                         
                                        }
                                       
                                       }else{
                                        echo 0;
                                       }

                                        ?></center>
                       </td>

                       <?php

                                      }
                                      ?>
                     <tr bgcolor="#e5e5e5">
                       <td colspan="4">
                         <center>Total</center>
                       </td>
                       <td>
                         <center><?php
if (isset($_POST['from'])  ) {
                   $from=$_POST['from'];
                 $to=$_POST['to'];                   
$where ="and date2 BETWEEN '".$from."' AND '".$to."'";
}else{
  $where='';
}
 $sql->selectsum("dr",'costs'," cost2_id=$id_n $where and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $dr=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'costs'," cost2_id=$id_n $where and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$dr+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2);
 }
  ?></center>
                       </td>
                       <td>
                         <center><?php
                                    
 $sql->selectsum("cr",'costs'," cost2_id=$id_n $where and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $cr=$row['SUM(cr)']??0;
 }
  $sql->selectsum("crr",'costs'," cost2_id=$id_n $where and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
$cr=$cr+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2);
 }

                                       ?></center>
                       </td>

                     </tr>

                     </tr>

                     </tr>
                     <tr>

                       <td colspan="8"></td>
                     </tr>
                     <tr>

                       <td colspan="8"></td>
                     </tr>
                     <?php
                                      }
                                        ?>

                   </tbody>
                 </table>

                 <?php

}
?>
                 <?php


if (isset($_POST['type'])) {
  

        ?>
                 <table width="10%" class="datatables-basic  table table-bordered">

                   <tbody id="myTable">

                     <tr bgcolor="#e5e5e5">
                       <th style="padding: .625rem 0.25rem;" colspan="8">
                         <center> الاجمالي </center>
                       </th>
                     </tr>
                     <tr>
                       <th style="padding: .625rem 0.25rem;" rowspan="2" colspan="6">
                         <center>رقم</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>العملية </center>
                       </th>

                     </tr>
                     <tr>

                       <th>
                         <center>مدين (EGP) </center>
                       </th>
                       <th>
                         <center>دائن (EGP) </center>
                       </th>

                     </tr>

                     <tr bgcolor="#e5e5e5">
                       <td colspan="6">
                         <center>Total</center>
                       </td>
                       <td>
                         <center><?php

               $type=$_POST['type'];  
if (isset($_POST['type']) and $_POST['type'] !=0 ) {
$type='and cost2_id='.$_POST['type'];
}else{
  $type='';
}
if (isset($_POST['from'])  ) {
                   $from=$_POST['from'];
                 $to=$_POST['to'];                   
$where ="and date2 BETWEEN '".$from."' AND '".$to."'";
}else{
  $where='';
}
 $sql->selectsum("dr",'costs'," 1=1 $type $where and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $dr=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'costs',"1=1 $type $where and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

$dr1=$dr+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2);
 }
  ?></center>
                       </td>
                       <td>
                         <center><?php
                                    
 $sql->selectsum("cr",'costs'," 1=1 $type $where and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $cr=$row['SUM(cr)']??0;
 }
  $sql->selectsum("crr",'costs'," 1=1 $type $where and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $cr=$cr+$row['SUM(crr)']??0;
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

             <!--/ DataTable with Buttons -->
             <br>
             <br>

           </div>
         </div>
         <script type="text/javascript" class="init">
           $(document).ready(function() {
             $("#myInput").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $.post('inc/fun/gl/select.php', {
                 search: value
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='rep=f4'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='rep=f4'");
           });
         </script>

             </div>
         <!-- groub update -->