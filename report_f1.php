         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">

               <div class="card-header border-bottom">
                 <h5 class="card-title"><?=$lang['Trial_Balance']?></h5>

               </div>
               <!-- DataTable with Buttons -->

               <br>
               <div class="kk">

                 <?php
  $sql->select3("account_c1","");
                               
                                       while($row3=$sql->res3->fetch_assoc())
                                        {
  ?>
                 <table width="10%" class="datatables-basic  table table-bordered">
                   <thead>
                     <tr bgcolor="#e5e5e5">
                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>ﻛﻮﺩ </center>
                       </th>
                       <th style="padding: .625rem 0.25rem;" rowspan="2">
                         <center>اﻻﺳﻢ</center>
                       </th>

                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>اﻟﺮﺻﻴﺪ ﻗﺒﻞ </center>
                       </th>
                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>ﺭﺻﻴﺪ اﻟﺤﺮﻛﺎﺕ </center>
                       </th>
                       <th style="padding: .625rem 0.25rem;" colspan="2">
                         <center>اﻟﺮﺻﻴﺪ ﺑﻌﺪ </center>
                       </th>

                     </tr>
                     <tr bgcolor="#e5e5e5">
                       <th>ﻣﺪﻳﻦ (EGP) </th>
                       <th>ﺩاﺋﻦ (EGP) </th>
                       <th>ﻣﺪﻳﻦ (EGP) </th>
                       <th>ﺩاﺋﻦ (EGP) </th>
                       <th>ﻣﺪﻳﻦ (EGP) </th>
                       <th>ﺩاﺋﻦ (EGP) </th>

                     </tr>
                   </thead>
                   <tbody id="myTable">
                     <?php




$array=[];

$account_c1=$row3['id'];
                                       $sql->select1("account_c3","where c1= $account_c1");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        
                                      $id_c3=$row1['id'];
                                      $sql->select2("account_no","where account_c3=$id_c3");
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                        
                                        array_push($array, $row2['id']);
                                        }

                                        }
                                       


                                         

                                        
                                        ?>
                     <tr bgcolor="#e5e5e5">
                       <?php
                                       $sql->selectall("account_c1 where id= $account_c1");
                                       while($row=$sql->res->fetch_assoc())
                                        {
                                       ?>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['id'] ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row['account_name'] ?></center>
                       </td>

                       <?php
                                     }
?>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 



                                                                              if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or account_id = ", $array);  
                                                                              }
                                    


 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$b  and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$b  and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

$dr=$drd+$row['SUM(drr)']??0;

 }


 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$b  and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crd=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$b  and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr=$crd+$row['SUM(crr)']??0;

 }



                                       $total=0;
                                         if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or id = ", $array);  
                                                                              }
                                        $sql->select2("account_no","where id=$b");
                               
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                        
                                        $id_c2= $row2['id'];
                                    
                                       
$sql->select4("transaction","where stat=1 and account_id=$id_c2 $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
                                       $total=$total+$row4['balance']+$row4['cr']??0;
                                       }else{
                                        $total=$total+ $row4['balance']-$row4['dr']??0;
                                       }
}
  }
  echo  number_format($total, 2)??0;

?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php

      $total=0;
                                         if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or id = ", $array);  
                                                                              }
                                        $sql->select2("account_no","where id=$b");
                               
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                        
                                        $id_c2= $row2['id'];
                                    
                                       
$sql->select4("transaction","where stat=1 and account_id=$id_c2 $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
                                       $total=$total+$row4['balance']-$row4['cr']??0;
                                       }else{
                                        $total=$total+ $row4['balance']+$row4['dr']??0;
                                       }
}
  }
  echo  number_format($total, 2)??0;

                                       ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                                                              if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or account_id = ", $array);  
                                                                              }
                                    

 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$b  and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$b  and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$drd+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2)??0;

 }


                                       ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                    
 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$b  and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crd=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$b  and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr1=$crd+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2)??0;

 }
                                       ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php 
                                         if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or account_id = ", $array);  
                                                                              }
                              
 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$b  and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$b  and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$drd+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2)??0;

 }      

?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                                                   if (empty($array)) {
                                                                                 $b= 0;  
                                                                              }else{
                                                                                  $b= implode(" or account_id = ", $array);  
                                                                              }
                                    

 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$b  and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crd=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$b  and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr1=$crd+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2)??0;

 }                    ?></center>
                       </td>

                     </tr>

                     <?php

                  $sql->select1("account_c3","where c1= $account_c1");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        
                           
                                      
                                                  $id_c3=$row1['id'];
                                      $sql->select2("account_no","where account_c3=$id_c3");
                                       while($row2=$sql->res2->fetch_assoc())
                                        {

                                       $id_c2=$row2['id'];
      ?>
                     <tr>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row2['id'] ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row2['account_name'] ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                                                             
                                  



 $sql->select4("transaction","where stat=1 and account_id=$id_c2 $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
  echo  number_format($row4['balance']+$row4['cr'], 2)??0;

                                       
                                       }else{
  echo  number_format($row4['balance']-$row4['dr'], 2)??0;

                                
                                       }
}

                                       ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                                                             
                                  



 $sql->select4("transaction","where stat=1 and account_id=$id_c2 $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
  echo  number_format($row4['balance']-$row4['cr'], 2)??0;

                                       
                                       }else{
  echo  number_format($row4['balance']+$row4['dr'], 2)??0;

                                
                                       }
}

                                       ?></center>
                       </td>

                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                                  

 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$id_c2  and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$id_c2  and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$drd+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2);

 }     

                                       ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                    


 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$id_c2  and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crd=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$id_c2  and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr1=$crd+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2);

 }     

                                       ?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php

 $sql->selectsum("dr",'transaction'," stat=1 and account_id=$id_c2  and drr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $drd=$row['SUM(dr)']??0;
 }
$sql->selectsum("drr",'transaction'," stat=1 and account_id=$id_c2  and drr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $dr1=$drd+$row['SUM(drr)']??0;
  echo  number_format($dr1, 2)??0;

 }     
?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?php
                                    
 $sql->selectsum("cr",'transaction'," stat=1 and account_id=$id_c2  and crr=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

  $crd=$row['SUM(cr)']??0;
 }
$sql->selectsum("crr",'transaction'," stat=1 and account_id=$id_c2  and crr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {

 $cr1=$crd+$row['SUM(crr)']??0;
  echo  number_format($cr1, 2);

 }     
                                       ?></center>
                       </td>

                     </tr>
                     <?php
}
}
?>

                   </tbody>
                 </table>

                 <br>
                 <br>
                 <br>
                 <?php
}
?>

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
               $.post('inc/fun/gl/select.php', {
                 search: value
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='rep=f1'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='rep=f1'");
           });
         </script>

         <!-- groub update -->