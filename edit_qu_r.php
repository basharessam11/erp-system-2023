   <div class="container-xxl flex-grow-1 container-p-y">
     <div class="row g-4 mb-4">

       <div class="card">
         <div class="card-header border-bottom">
           <h5 class="card-title" style="float:left;">تقييم الموظف</h5>

         </div>

         <br><br><br>
         <div class="kk">
           <form method="post" action="inc/fun/emp_profile/update_q.php">
             <table width="10%" class="datatables-basic  table table-bordered">
               <thead>
                 <tr>

                   <th style="padding: .625rem 0.25rem;">
                     <center>SN</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Evaluation Criteria</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center> Well Below Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Below Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Meets Expectations</center>
                   </th>

                   <th style="padding: .625rem 0.25rem;">
                     <center>Above Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Well Above Expectations</center>
                   </th>

                 </tr>

               </thead>
               <tbody id="myTable">
                 <?php


    error_reporting(0);

  $emp_id=$_GET['id'];
  $date=$_GET['date'];
      $sql->selectall("qu_r where emp_id=$emp_id and date='$date'   ");
  
  
  
          
 
     $x=1;
     $x1=0;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
                 <tr>
                   <input type="hidden" value="<?=$row["id"]?>" name="id[]">
                   <input type="hidden" value="<?=$row["date"]?>" name="date">
                   <td style="padding: .625rem 0.25rem;">
                     <center><?=$x?></center>
                   </td>

                   <td style="padding: .625rem 0.25rem;">
                     <center><?php

$qu=$row['q_id'];
$sql->select1("qu","where id=$qu");

     while ($row1 = $sql->res1->fetch_assoc()) {
     echo $row1['name'];

      }
      ?><input type="hidden" value="<?=$row["q_id"]?>" name="qu[]"><input type="hidden" value="<?=$row["q_waith"]?>" name="wa[]"></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><input class="qu" onchange="qu()" value="1" <?php 
if ($row['q_reslt']==1) {
  echo 'checked';
}
      ?> type="radio" name="a<?=$x1?>"></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><input class="qu" onchange="qu()" value="2" <?php 
if ($row['q_reslt']==2) {
  echo 'checked';
}
      ?> type="radio" name="a<?=$x1?>"></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><input class="qu" onchange="qu()" value="3" <?php 
if ($row['q_reslt']==3) {
  echo 'checked';
}
      ?> type="radio" name="a<?=$x1?>"></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><input class="qu" onchange="qu()" value="4" <?php 
if ($row['q_reslt']==4) {
  echo 'checked';
}
      ?> type="radio" name="a<?=$x1?>"></center>
                   </td>
                   <td style="padding: .625rem 0.25rem;">
                     <center><input class="qu" onchange="qu()" value="5" <?php 
if ($row['q_reslt']==5) {
  echo 'checked';
}
      ?> type="radio" name="a<?=$x1?>"></center>
                   </td>

                 </tr>
                 <?php
      $x++;
      $x1++;
     }


      ?>

               </tbody>
               <tfoot>

                 <tr>

                   <th style="padding: .625rem 0.25rem;">
                     <center>SN</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Evaluation Criteria</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center> Well Below Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Below Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Meets Expectations</center>
                   </th>

                   <th style="padding: .625rem 0.25rem;">
                     <center>Above Expectations</center>
                   </th>
                   <th style="padding: .625rem 0.25rem;">
                     <center>Well Above Expectations</center>
                   </th>

                 </tr>
                 <tr>
                   <td colspan="4"></td>
                   <td colspan="4"><b class="total">total:</b></td>
                 </tr>
                 <tr>
                   <td colspan="4"></td>
                   <td colspan="4"><b class="avg">Avage:</b></td>
                 </tr>
                 <tr>
                   <td colspan="4"></td>
                   <td colspan="4"><b class="show">:</b></td>
                 </tr>

               </tfoot>
             </table>
             <br>

             <!--  <div class="col-sm-12">
  Comment:
      <div class="input-group">
      <textarea name="des" class="form-control" id="inlineFormInputName" placeholder="" rows="3" cols="800" ></textarea>
      </div>


  </div> -->
             <br>
             <br>
             <input type="hidden" class="total" name="total">
             <input type="hidden" value="<?=$_GET['id']?>" name="emp_id">
             <button style="width: 30%" type="submit" class="btn btn-success"><?php echo $lang['Save'];?></button>

           </form>

           <br>
           <br>
           <br>
         </div>
       </div>

     </div>

   </div>

   <script type="text/javascript">
     $(document).ready(function() {
       qu();
     });

     function qu() {
       var Brand = get_filter('qu');
       var check = get_filter('qu')

       function get_filter(class_name) {
         var filter = [];
         $('.' + class_name + ':checked').each(function() {
           filter.push($(this).val())
         })
         var total = 0;
         for (var i = filter.length - 1; i >= 0; i--) {
           var total = total + Number(filter[i]);
         }
         var avg = total / filter.length;
         $(".total").html("total : " + total.toFixed(1))
         $(".avg").html("Avage:  " + avg.toFixed(1))
         if (avg > 0 && avg < 0.6) {
           $(".show").html("Well Below Expectations");
         } else if (avg > 0.9 && avg < 1) {
           $(".show").html("Below Expectations");
         } else if (avg > 1.1 && avg < 1.2) {
           $(".show").html("Meets Expectations");
         } else if (avg > 1.3 && avg < 1.5) {
           $(".show").html("Above Expectations");
         } else {
           $(".show").html("Well Above Expectations");
         }
       }
     }
   </script>