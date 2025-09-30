         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title"><?=$lang['Ledger_Report']?></h5>

               </div>
               <br>
               <div class="card-body ">
                 <form method="post" action="<?=$_SERVER['PHP_SELF']?>?rep=f2">
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

                                       $sql->selectall("account_no");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                         <option value="<?=$row['id']?>"><?=$row['account_name']?></option>
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

                                              
                
                             

                                      $sql->select2("account_no","$id");
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                        
                                            $id_n=  $row2['id'];
                                        

                                        ?>
                     <tr bgcolor="#e5e5e5">
                       <td colspan="9">
                         <center><?=$row2['account_name'] ?></center>
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
                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>الرصيد </center>
                       </th>

                     </tr>
                     <tr>

                       <th>
                         <center>مدين (EGP) </center>
                       </th>
                       <th>
                         <center>دائن (EGP) </center>
                       </th>
                       <th>
                         <center>الرصيد قبل</center>
                       </th>
                       <th>
                         <center>الرصيد بعد</center>
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
  $sql->selectall("transaction where stat=1 and account_id=$id_n $where order by id  ");
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
                                          $trans_id=$row['trans_id'];
                                      $sql->select3("trans","where id=$trans_id");
                                       while($row3=$sql->res3->fetch_assoc())
                                        {
                                        $date=date_create($row3['date2']);
                                    echo date_format($date,"Y/m/d");
                               
                                        

                                        
}
                                        ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['des'] ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                       if ($row['dr'] !=0) {
                                        if ($row['drr'] !=0) {
                                         $dr=$row['drr'] ;
                                        echo number_format($dr, 2);

                                        }else{
                                           $dr=$row['dr'];
                                        echo number_format($dr, 2);

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
                                          $cr=$row['crr'] ;
                                        echo number_format($cr, 2);

                                        }else{
                                          $cr=$row['cr'];
                                        echo number_format($cr, 2);
                                         
                                        }
                                       
                                       }else{
                                        echo 0;
                                       }

                                        ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                       if ($row['cr'] !=0) {
                                        echo number_format($row['balance']+$cr, 2);
                                        
                                       }else{
                                        echo number_format($row['balance']-$dr, 2);
                                        
                                       }

                                        ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
  echo  number_format($row['balance'], 2);

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

 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$id_n $where and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$id_n $where and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$drd+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2);
 }

 
  ?></center>
                       </td>
                       <td>
                         <center><?php


 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$id_n $where and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crc=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$id_n $where and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

$cr1=$crc+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2);
 }

 


                                       ?></center>
                       </td>
                       <td>
                         <center><?php

   $sql->select4("transaction","where stat=1 and account_id=$id_n $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
                       echo  number_format($row4['balance']+$cr, 2);
                                    
                                       $total1=$total1+$row4['balance']+$cr;

                                       }else{
                                       
                       echo  number_format($row4['balance']-$cr, 2);

                                      $total1=$total1+$row4['balance']-$dr;
                                       }
}

  ?></center>
                       </td>
                       <td>
                         <center><?php
  $sql->select4("transaction","where stat=1 and account_id=$id_n order by id desc  limit 1");
 while($row4=$sql->res4->fetch_assoc())
                                        {
                    
                    
                       echo  number_format($row4['balance'], 2);
                                       
                                        $total2=$total2+$row4['balance'];
                                       
                           }


  ?></center>
                       </td>
                     </tr>

                     </tr>

                     </tr>
                     <?php
                                      }
                                        ?>
                     <tr>

                     <tr>
                       <td></td>
                     </tr>
                     <td colspan="8"></td>
                     </tr>

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
                       <th style="padding: .625rem 0.25rem;" colspan="10">
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
                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>الرصيد </center>
                       </th>

                     </tr>

                     <tr>

                       <th>
                         <center>مدين (EGP) </center>
                       </th>
                       <th>
                         <center>دائن (EGP) </center>
                       </th>
                       <th>
                         <center>الرصيد قبل</center>
                       </th>
                       <th>
                         <center>الرصيد بعد</center>
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
$id='and account_id='.$_POST['type'];
}else{
  $id='';
}
  $sql->selectsum("dr",'transaction',"stat=1 $id $where and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $dr=$row['SUM(dr)']??0;

 }
  $sql->selectsum("drr",'transaction',"stat=1 $id $where and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
$dr1=$dr+$row['SUM(drr)']??0;
                       echo  number_format($dr1, 2);

 }

  ?></center>
                       </td>
                       <td>
                         <center><?php
 $sql->selectsum("cr",'transaction',"stat=1 $id $where and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $cr=$row['SUM(cr)']??0;
 }
  $sql->selectsum("crr",'transaction',"stat=1 $id $where and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
 $cr1=$cr+$row['SUM(crr)']??0;
 echo  number_format($cr1, 2);
 }
               


                                       ?></center>
                       </td>

                       <td>
                         <center><?=number_format($total1, 2);?></center>
                       </td>
                       <td>
                         <center><?=number_format($total2, 2);?></center>
                       </td>

                     </tr>

                   </tbody>
                 </table>
         </div>
                 
                 
                 <?php
}
?>
               </div>
             </div>

             <!--/ DataTable with Buttons -->
             <br>
             <br>

        
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
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='rep=f2'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='rep=f2'");
           });
         </script>

         <!-- groub update -->