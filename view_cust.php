     <?php
$get=$_GET['id'];

                                        $sql->select3("customer","where id=$get");
                                       while($row3=$sql->res3->fetch_assoc())
                                        {
                                       
                                     
                                        ?>

     <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row g-4 mb-4">

         <div class="card">
           <div class="card-header border-bottom">
             <h5 class="card-title"><?php echo $lang['Customer_List'];?> </h5>

           </div>
           <br>
           <br>
           <table width="10%" class="datatables-basic  table table-bordered">

             <tbody class="myTable">
               <tr bgcolor="#cfd5db">

                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['NAME'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Custmer_Type'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Email'];?></center>
                 </th>
               </tr>

               <tr>

                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['name'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?php
          $type=$row3['type_c'];
 if ($type==1) {
   echo 'عميل';
 }else if ($type==2) {
   echo 'مورد';
 }
        ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['email'] ?></center>
                 </td>
               </tr>

               <tr bgcolor="#cfd5db">

                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Phone'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Fax'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Group'];?></center>
                 </th>
               </tr>

               <tr>

                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['phone'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['fax'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?php
          $group=$row3['group1'];

$sql->select2("group1","where id=$group");
              while($row2=$sql->res2->fetch_assoc())
               {
echo $row2['name'];
}
        ?></center>
                 </td>

               </tr>
               <tr bgcolor="#cfd5db">

                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Address'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['City'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Region'];?></center>
                 </th>
               </tr>

               <tr>

                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['address'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['city'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['region'] ?></center>
                 </td>

               </tr>
               <tr bgcolor="#cfd5db">

                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Postal'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Currency'];?></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><?php echo $lang['Description'];?></center>
                 </th>

               </tr>

               <tr>

                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['zip'] ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?php
          $currency=$row3['currency'];

$sql->select2("currencies","where id=$currency");
              while($row2=$sql->res2->fetch_assoc())
               {
echo $row2['code'];
}
        ?></center>
                 </td>
                 <td style="padding: .625rem 0.25rem;">
                   <center><?=$row3['des'] ?></center>
                 </td>

               </tr>
             </tbody>
           </table>
           <br>
           <br>

           <table width="10%" class="datatables-basic  table table-bordered">
             <thead>
               <tr>

                 <th style="padding: .625rem 0.25rem;">
                   <center><input type="button" aa="" value="انشاء فاتورة" class="form-control"></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><input type="button" aa="" value="انشاء عرض سعر" class="form-control"></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><input type="button" aa="view1" value="كشف حساب" class="view form-control"></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><input type="button" aa="cc" value="اضافة رصيد مدفوعات" class="form-control"></center>
                 </th>
                 <th style="padding: .625rem 0.25rem;">
                   <center><input type="button" aa="" value="اضافة مرفقات" class="form-control"></center>
                 </th>

               </tr>

             </thead>
             <tbody class="myTable">

             </tbody>
           </table>
           <br>
           <div class="kk">

             <table style="display: none" width="10%" class="view1 dddd datatables-basic  table table-bordered">

               <tbody id="myTable">
                 <?php
$id=$_GET['id'];
                                      $sql->select2("account_no","where account_number=$id");
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
                     <center><?=$row['id'] ?></center>
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
                     <center><?=$row['dr'] ?></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><?=$row['cr'] ?></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><?php
                                       if ($row['cr'] !=0) {
                                        echo$row['balance']+$row['cr'];
                                       }else{
                                        echo$row['balance']-$row['dr'];
                                       }

                                        ?></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><?=$row['balance'] ?></center>
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

 $sql->selectsum("dr",'transaction',"stat=1 and account_id=$id_n $where");
 while ($row=$sql->res_sum->fetch_assoc()) {
 echo $dr=$row['SUM(dr)']??0;
 }

  ?></center>
                   </td>
                   <td>
                     <center><?php
                                    
 $sql->selectsum("cr",'transaction',"stat=1 and account_id=$id_n $where");
 while ($row=$sql->res_sum->fetch_assoc()) {
 echo $cr=$row['SUM(cr)']??0;
 }

                                       ?></center>
                   </td>
                   <td>
                     <center><?php

   $sql->select4("transaction","where stat=1 and account_id=$id_n $where order by id   limit 1");
   while($row4=$sql->res4->fetch_assoc())
                                        {
                    if ($row4['cr'] !=0) {
                                        echo$row4['balance']+$row4['cr'];
                                       $total1=$total1+$row4['balance']+$row4['cr'];

                                       }else{
                                        echo$row4['balance']-$row4['dr'];
                                      $total1=$total1+$row4['balance']-$row4['dr'];
                                       }
}

  ?></center>
                   </td>
                   <td>
                     <center><?php
  $sql->select4("transaction","where stat=1 and account_id=$id_n order by id desc  limit 1");
 while($row4=$sql->res4->fetch_assoc())
                                        {
                    
                    
                                        echo$row4['balance'];
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

               </tbody>
             </table>
             <br>
           </div>

           <!-- <table width="10%"  class="datatables-basic  table table-bordered">
      <thead>
        <tr>



          <th style="padding: .625rem 0.25rem;"><center><input type="button" value="المرفقات" class="form-control"></center></th>
          
         
        </tr>

      </thead>
   <tbody class="myTable">
<tr>

  <td>  
 <div class="col-12">
    <div class="card">
      <h5 class="card-header">Multiple</h5>
      <div class="card-body">
        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-multi">
          <div class="dz-message needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
          </div>
          
        </form>
      </div>
    </div>
  </div></td>
</tr>


   </tbody>
 </table> -->
         </div>
       </div>
     </div>
     <script type="text/javascript">
       $(".view").click(function() {
         var attr = $(this).attr('aa');
         $(".dddd").hide()
         $("." + attr).show()
       })
     </script>

     <?php
}
?>