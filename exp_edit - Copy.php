     <?php
$get=$_GET['id'];

                                        $sql->select3("trans","where id=$get");
                                       while($row3=$sql->res3->fetch_assoc())
                                        {
                                       
                                     
                                        ?>

     <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row g-4 mb-4">

         <div class="card">

           <div class="card-header border-bottom">
             <h5 class="card-title" style="float:left;"><?php echo $lang['Expenses_List'];?></h5>

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
             <form method="post" action="inc/fun/expenses/update.php" enctype="multipart/form-data">

               <div class="form-group">
                 <div class="col mb-3">
                   <label for="description"><span class="h6 "><?php echo $lang['DESCRIPTION'];?></span></label>

                   <textarea class="name form-control" id="description" name="name"><?=$row3['name']?></textarea>

                 </div>

               </div>

               <table width="10%" class="datatables-basic  table table-bordered">
                 <thead>
                   <tr>

                     <th style="padding: .625rem 0.25rem;">
                       <center>from</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center><?php echo $lang['DESCRIPTION'];?></center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>debit</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>cridt</center>
                     </th>
                     <th style="padding: .625rem 2.25rem;">
                       <center>action</center>
                     </th>

                   </tr>

                 </thead>
                 <tbody class="myTable">
                   <?php
$get=$_GET['id'];
$x=0;
                                        $sql->select2("transaction","where  trans_id=$get order by id");
                                       while($row2=$sql->res2->fetch_assoc())
                                        {
                                       
                                       $x++
                                        ?>
                   <tr class="a<?=$x?>" tx="tx" de="de" ce="ce" del="del">

                     <td>

                       <select name="from[]" class="form-select select">

                         <?php

                                       $sql->selectall("account_no where stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $c3=$row['account_c3'];
                                        $sql->select1("account_c3","where id=$c3");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c3_n=$row1['name'];
                                          $c2=$row1['c2']?? 0;
                                        }


                                         $sql->select1("account_c2","where id=$c2");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        $c2_n=$row1['name'];
                                        }
                                        ?>

                         <option value="<?=$row['id']?>" <?php
$cre=$row2['account_id'];
$cre2=$row['id'];
if ($cre==$cre2) {
  echo 'selected=""';
}

                                    ?>><?=$c2_n." > ".$c3_n." > ".$row['account_name']?></option>
                         <?php

                                      }
                                        ?>

                       </select>
                     </td>

                     <td><input type="text" class=" form-control" value="<?=$row2['des']?>" name="des[]"></td>
                     <td><input type="number" class=" de<?=$x?> form-control" value="<?=$row2['dr']?>" ce="ce<?=$x?>" cost="cost<?=$x?>" de_t="<?=$row2['dr']?>" del="del<?=$x?>" name="debit[]"></td>
                     <td><input type="number" class="ce<?=$x?>  form-control" cost="cost<?=$x?>" value="<?=$row2['cr']?>" de="de<?=$x?>" ce_t="<?=$row2['cr']?>" del="del<?=$x?>" name="cridt[]"></td>

                     <td style="padding: .625rem 0.25rem;"><button style="float: left;" type="button" class="del del<?=$x?> btn btn-danger" de="<?=$row2['dr']?>" ce="<?=$row2['cr']?>" a="a<?=$x?>"><i class="bx bxs-trash-alt"></i></button><button style="float: right;" type="button" class="cost<?=$x?>  btn btn-success" onclick="add(1,0)" de="0" ce="0">+</button></td>

                   </tr>

                   <script type="text/javascript">
                     $(".de<?=$x?>").change(function() {
                       var b = $(this).attr("ce");
                       var cost = $(this).attr("cost");
                       var c = $("." + b).val()
                       var a = 'add(' + $(this).val() + ',' + c + ')';
                       $("." + cost).attr("onclick", a);
                     });
                     $(".ce<?=$x?>").change(function() {
                       var b = $(this).attr("de");
                       var cost = $(this).attr("cost");
                       var c = $("." + b).val()
                       var a = 'add(' + c + ',' + $(this).val() + ')';
                       $("." + cost).attr("onclick", a);
                     });
                     /////////////////////////////
                     $(".de<?=$x?>").keyup(function() {
                       var de_t = Number($(this).attr("de_t"));
                       var d_t = Number($(".de_t").val());
                       var val = Number($(this).val());
                       $(".de_t").val(d_t - de_t);
                       var d_t = Number($(".de_t").val());
                       $(".de_t").val(d_t + val);
                       $(this).attr("de_t", val);
                       ////////////
                       var del = $(this).attr("del");
                       $("." + del).attr("de", val);
                       $("." + del).attr("ce", 0);
                       /////////////
                       var cost = $(this).attr("cost");
                       $("." + cost).attr("de", val);
                       $("." + cost).attr("ce", 0);
                       ///
                       var ce = $(this).attr("ce");
                       var c_t = Number($("." + ce).attr("ce_t"));
                       var c_t1 = Number($(".ce_t").val());
                       $(".ce_t").val(c_t1 - c_t);
                       $("." + ce).attr("ce_t", 0);
                       $("." + ce).val(0);
                       ///
                     });
                     $(".ce<?=$x?>").keyup(function() {
                       var ce_t = Number($(this).attr("ce_t"));
                       var c_t = Number($(".ce_t").val());
                       var val = Number($(this).val());
                       $(".ce_t").val(c_t - ce_t);
                       $(this).attr("ce_t", val);
                       var c_t = Number($(".ce_t").val());
                       $(".ce_t").val(c_t + val);
                       ///////
                       var del = $(this).attr("del");
                       $("." + del).attr("ce", val);
                       $("." + del).attr("de", 0);
                       ///
                       ///////
                       var cost = $(this).attr("cost");
                       $("." + cost).attr("ce", val);
                       $("." + cost).attr("de", 0);
                       ///
                       var de = $(this).attr("de");
                       var d_t = Number($("." + de).attr("de_t"));
                       var d_t1 = Number($(".de_t").val());
                       console.log(d_t, d_t1)
                       $(".de_t").val(d_t1 - d_t);
                       $("." + de).attr("de_t", 0);
                       $("." + de).val(0);
                       ///
                     });
                     $(".del<?=$x?>").click(function() {
                       var a = $(this).attr("a")
                       $("." + a).remove()
                       ///////////////////////////
                       var ce = Number($(this).attr("ce"));
                       var c_t1 = Number($(".ce_t").val());
                       $(".ce_t").val(c_t1 - ce);
                       //////////////////////////
                       var de = Number($(this).attr("de"));
                       var d_t1 = Number($(".de_t").val());
                       $(".de_t").val(d_t1 - de);
                     });
                     //////////////
                   </script>

                   <?php
 }

?>

                 </tbody>
                 <tr class="ss">
                   <td>
                     <div class="col mb-3">
                       <label for="account"><span class="h6"></span></label>
                       <button type="button" style="width: 100%" class="add btn btn-success">
                         Add </button>

                     </div>
                   </td>
                   <td>Total :</td>
                   <?php

 $sql->selectsum("dr",'transaction',"trans_id=$get");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $dr=$row['SUM(dr)'];
 }



  ?>
                   <?php

 $sql->selectsum("cr",'transaction',"trans_id=$get");
 while ($row=$sql->res_sum->fetch_assoc()) {
  $cr=$row['SUM(cr)'];
 }



  ?>
                   <td><input type="text" disabled="" value="<?=$dr?>" class="form-control de_t"></td>

                   <input type="hidden" value="<?=$dr?>" class="form-control de_t" name="total1">
                   <input type="hidden" value="<?=$cr?>" class="form-control ce_t" name="total2">

                   <td><input type="text" disabled="" value="<?=$cr?>" class="form-control ce_t"></td>
                   <td></td>
                 </tr>
               </table>
               <select class="ex" style="display: none;">
                 <?php

                                       $sql->selectall("account_no where stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $c3=$row['account_c3'];
                                        $sql->select1("account_c3","where id=$c3");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c3_n=$row1['name'];
                                          $c2=$row1['c2']?? 0;
                                        }


                                         $sql->select1("account_c2","where id=$c2");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        $c2_n=$row1['name'];
                                        }
                                        ?>

                 <option value="<?=$row['id']?>"><?=$c2_n." > ".$c3_n." > ".$row['account_name']?></option>
                 <?php

                                      }
                                        ?>
               </select>
               <script type="text/javascript">
                 $(document).ready(function() {
                   select();

                   function select() {
                     $(".select").select2()
                   };
                 });
                 $(".del0").click(function() {
                   var a = $(this).attr("a")
                   $("." + a).remove()
                   ///////////////////////////
                   var ce = Number($(this).attr("ce"));
                   var c_t1 = Number($(".ce_t").val());
                   $(".ce_t").val(c_t1 - ce);
                   //////////////////////////
                   var de = Number($(this).attr("de"));
                   var d_t1 = Number($(".de_t").val());
                   $(".de_t").val(d_t1 - de);
                 });
                 $(".de0").keyup(function() {
                   var de_t = Number($(this).attr("de_t"));
                   var d_t = Number($(".de_t").val());
                   var val = Number($(this).val());
                   $(".de_t").val(d_t - de_t);
                   var d_t = Number($(".de_t").val());
                   $(".de_t").val(d_t + val);
                   $(this).attr("de_t", val);
                   ////////////
                   var del = $(this).attr("del");
                   $("." + del).attr("de", val);
                   $("." + del).attr("ce", 0);
                   ///
                   var ce = $(this).attr("ce");
                   var c_t = Number($("." + ce).attr("ce_t"));
                   var c_t1 = Number($(".ce_t").val());
                   $(".ce_t").val(c_t1 - c_t);
                   $("." + ce).attr("ce_t", 0);
                   $("." + ce).val(0);
                   ///
                 });
                 $(".ce0").keyup(function() {
                   var ce_t = Number($(this).attr("ce_t"));
                   var c_t = Number($(".ce_t").val());
                   var val = Number($(this).val());
                   $(".ce_t").val(c_t - ce_t);
                   $(this).attr("ce_t", val);
                   var c_t = Number($(".ce_t").val());
                   $(".ce_t").val(c_t + val);
                   ////////
                   var del = $(this).attr("del");
                   $("." + del).attr("ce", val);
                   $("." + del).attr("de", 0);
                   ///
                   var de = $(this).attr("de");
                   var d_t = Number($("." + de).attr("de_t"));
                   var d_t1 = Number($(".de_t").val());
                   $(".de_t").val(d_t1 - d_t);
                   $("." + de).attr("de_t", 0);
                   $("." + de).val(0);
                   ///
                 });
                 var x = < ? = $x + 1000 ? > ;
                 $(".add").click(function() {
                   var n = x++;
                   var s = $(".ex").html()
                   $(".myTable").append('<tr class="a' + n + '"><td><select id="account"  name="from[]" class=" select form-select"  >' + s + '</select></td><td><input type="text" class=" form-control" name="des[]"></td><td><input type="number" cost="cost' + n + '" del="del' + n + '" de_t="0" ce="ce' + n + '" name="debit[]" class="de' + n + ' form-control" name=""></td><td><input cost="cost' + n + '" del="del' + n + '" type="number" ce_t="0" class="ce' + n + ' form-control" de="de' + n + '" name="cridt[]"></td><td style="padding: .625rem 0.25rem;"><center><button type="button" style="float:left;" class="del del' + n + '   btn btn-danger" de="0" ce="0" a="a' + n + '"><i class="bx bxs-trash-alt"></i></button><button style="float:right;" type="button"  class="cost' + n + '  btn btn-success" style="float: right;" onclick="add(1,0)" de="0" ce="0">+</button></center></td></tr>');
                   $(".select").select2();
                   $(".de" + n).keyup(function() {
                     var de_t = Number($(this).attr("de_t"));
                     var d_t = Number($(".de_t").val());
                     var val = Number($(this).val());
                     $(".de_t").val(d_t - de_t);
                     var d_t = Number($(".de_t").val());
                     $(".de_t").val(d_t + val);
                     $(this).attr("de_t", val);
                     ////////////
                     var del = $(this).attr("del");
                     $("." + del).attr("de", val);
                     $("." + del).attr("ce", 0);
                     ///
                     var ce = $(this).attr("ce");
                     var c_t = Number($("." + ce).attr("ce_t"));
                     var c_t1 = Number($(".ce_t").val());
                     $(".ce_t").val(c_t1 - c_t);
                     $("." + ce).attr("ce_t", 0);
                     $("." + ce).val(0);
                     ///
                   });
                   $(".ce" + n).keyup(function() {
                     var ce_t = Number($(this).attr("ce_t"));
                     var c_t = Number($(".ce_t").val());
                     var val = Number($(this).val());
                     $(".ce_t").val(c_t - ce_t);
                     $(this).attr("ce_t", val);
                     var c_t = Number($(".ce_t").val());
                     $(".ce_t").val(c_t + val);
                     ///////
                     var del = $(this).attr("del");
                     $("." + del).attr("ce", val);
                     $("." + del).attr("de", 0);
                     ///
                     var de = $(this).attr("de");
                     var d_t = Number($("." + de).attr("de_t"));
                     var d_t1 = Number($(".de_t").val());
                     console.log(d_t, d_t1)
                     $(".de_t").val(d_t1 - d_t);
                     $("." + de).attr("de_t", 0);
                     $("." + de).val(0);
                     ///
                   });
                   $(".del" + n).click(function() {
                     var a = $(this).attr("a")
                     $("." + a).remove()
                     ///////////////////////////
                     var ce = Number($(this).attr("ce"));
                     var c_t1 = Number($(".ce_t").val());
                     $(".ce_t").val(c_t1 - ce);
                     //////////////////////////
                     var de = Number($(this).attr("de"));
                     var d_t1 = Number($(".de_t").val());
                     $(".de_t").val(d_t1 - de);
                   });
                 });
               </script>

               <br>

               <select style="display: none" class="ex1 form-select ">

                 <?php

                                       $sql->selectall("cost1 where stat=1");
                                       while($row=$sql->res->fetch_assoc())

                                        {
                                        $id=$row['id'];
                                        $sql->select1("cost2","where c1=$id");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c2_n=$row1['name'];
                                         $id_c=$row1['id'];
                                        }


                                         

                                        ?>

                 <option value="<?=$id_c?>"><?=$row['account_name']." > ".$c2_n?></option>
                 <?php

                                      }
                                        ?>

               </select>

               <table width="10%" class="costd datatables-basic  table table-bordered">
                 <thead>
                   <tr>
                     <th colspan="4">
                       <center>depit</center>
                     </th>

                   </tr>
                   <tr>

                     <th style="padding: .625rem 0.25rem;">
                       <center>ﻣﺮﻛﺰ اﻟﺘﻜﻠﻔﺔ</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>% ﻧﺴﺒﺔ ﻣﺌﻮﻳﺔ</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>اﻟﻤﺒﻠﻎ</center>
                     </th>

                     <th style="padding: .625rem 0.25rem;">
                       <center>delete</center>
                     </th>

                   </tr>

                 </thead>
                 <tbody class="myTable1">

                   <?php
$get=$_GET['id'];

                                        $sql->selectall("costs where  trans_id=$get and dr !=0 order by id");
                                       while($row2=$sql->res->fetch_assoc())
                                        {
                                       
                                     $x++
                                        ?>

                   <tr class="d<?=$x?>">
                     <td><select id="account" name="cost2_d[]" class="select form-select">
                         <?php



                                       $sql->select2("cost1"," where stat=1 ");
                                       while($row=$sql->res2->fetch_assoc())

                                        {
                                        $id=$row['id'];
                                        $sql->select1("cost2","where c1=$id");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c2_n=$row1['name'];
                                         $id_c=$row1['id'];
                                        }
$cost2_id=$row2['cost2_id'];



                                        
                                        ?>
                         <option <?php

if ($id_c==$cost2_id) {
echo 'selected=""';
}
                                        ?> value="<?=$id_c?>"><?=$row['account_name']." > ".$c2_n?></option>

                         <?php

                                      }
                             


?>

                       </select></td>
                     <td><input type="text" price="price<?=$x?>" value="<?=$row2['rate']?>" step="10" min="0" max="100" price_p="<?=$row2['rate']?>" nn="<?=$row2['dr']?>" class="n<?=$x?> form-control" name="rate_d[]"></td>

                     <td><input type="text" name="price_d[]" value="<?=$row2['dr']?>" class="price<?=$x?> form-control" nn="0" n="n<?=$x?>" name=""></td>

                     <td style="padding: .625rem 0.25rem;">
                       <center><button type="button" class="del del<?=$x?>   btn btn-danger" nn="<?=$row2['dr']?>" price_p="<?=$row2['rate']?>" de="0" ce="0" a="d<?=$x?>"><i class="bx bxs-trash-alt"></i></button></center>
                     </td>
                   </tr>

                   <script type="text/javascript">
                     $(".n<?=$x?>").change(function() {
                       var d_t1 = Number($(".de_t").val());
                       var price = Number($(this).val());
                       if (price > 100) {
                         var price = 100;
                         $(this).val(100)
                       } else if (price < 0) {
                         var price = 0;
                         $(this).val(0)
                       }
                       var total = Math.round(d_t1 / 100 * price);
                       var price1 = $(this).attr("price");
                       $("." + price1).val(Math.round(total))
                       var price_p = Number($(this).attr("price_p"));
                       var nn = Number($(".nn").val()) - price_p
                       $(".nn").val(Math.round(nn))
                       $(".nn").val(Math.round(nn + (total / d_t1 * 100)))
                       $(this).attr("price_p", price);
                       /////////////
                       var nn1 = Number($(this).attr("nn"));
                       var nn = Number($(".price_p").val()) - nn1
                       $(".price_p").val(Math.round(nn))
                       $(".price_p").val(nn + Math.round(total))
                       $(this).attr("nn", Math.round(total));
                       $(".del" + n).attr("price_p", Math.round(price));
                       $(".del" + n).attr("nn", Math.round(total));
                     });
                     /////////////////////////////////////////////
                     $(".price<?=$x?>").change(function() {
                       var d_t1 = Number($(".de_t").val());
                       var nb = Number($(this).val());
                       if (nb > d_t1) {
                         var nb = d_t1;
                         $(this).val(d_t1)
                       } else if (nb < 0) {
                         var nb = 0;
                         $(this).val(0)
                       }
                       var total = Math.round(nb / d_t1 * 100);
                       var n1 = $(this).attr("n");
                       $("." + n1).val(Math.round(total))
                       var price_p = Number($("." + n1).attr("price_p"));
                       var nn = Number($(".nn").val()) - price_p;
                       $(".nn").val(Math.round(nn));
                       $(".nn").val(Math.round(nn + total));
                       $("." + n1).attr("price_p", total);
                       /////////
                       var nn1 = Number($("." + n1).attr("nn"));
                       var nn2 = Number($(".price_p").val()) - nn1;
                       $(".price_p").val(Math.round(nn2 + nb))
                       $(".nn").val(Math.round(nn + total));
                       $("." + n1).attr("nn", nb);
                       $(".del<?=$x?>").attr("price_p", Math.round(total));
                       $(".del<?=$x?>").attr("nn", Math.round(nb));
                     });
                     //////////////////////////////////////////////
                     $(".del<?=$x?>").click(function() {
                       var a = $(this).attr("a")
                       var nn = Number($(this).attr("nn"));
                       var price_p = Number($(this).attr("price_p"));
                       var cc = Number($(".nn").val()) - price_p;
                       $(".nn").val(Math.round(cc))
                       var nn = Number($(".price_p").val()) - nn;
                       $(".price_p").val(Math.round(nn))
                       $("." + a).remove()
                       ///////////////////////////
                     });
                   </script>
                   <?php

                                      }
                                      ?>

                 </tbody>
                 <tr class="ss">
                   <td>
                     <div class="col mb-3">
                       <label for="account"><span class="h6"></span></label>
                       <button type="button" style="width: 100%" onclick="add(10,0)" class=" btn btn-success">
                         Add </button>

                     </div>
                   </td>
                   <td><input type="text" disabled="" value="<?php 
 $sql->selectsum("rate",'costs',"trans_id=$get and dr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$rate=$row['SUM(rate)'];
 }
  ?>" class="form-control nn" name=""></td>
                   <td><input type="text" disabled="" value="<?php 
 $sql->selectsum("dr",'costs',"trans_id=$get and dr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$dr=$row['SUM(dr)'];
 }
  ?>" class="form-control price_p" name=""></td>

                   <td></td>
                 </tr>
               </table>

               <br>
               <table width="10%" class="costc datatables-basic  table table-bordered">
                 <thead>
                   <tr>
                     <th colspan="4">
                       <center>credit</center>
                     </th>

                   </tr>
                   <tr>

                     <th style="padding: .625rem 0.25rem;">
                       <center>ﻣﺮﻛﺰ اﻟﺘﻜﻠﻔﺔ</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>% ﻧﺴﺒﺔ ﻣﺌﻮﻳﺔ</center>
                     </th>
                     <th style="padding: .625rem 0.25rem;">
                       <center>اﻟﻤﺒﻠﻎ</center>
                     </th>

                     <th style="padding: .625rem 0.25rem;">
                       <center>delete</center>
                     </th>

                   </tr>

                 </thead>
                 <tbody class="myTable2">

                   <?php
$get=$_GET['id'];

                                        $sql->selectall("costs where  trans_id=$get and cr !=0 order by id");
                                       while($row2=$sql->res->fetch_assoc())
                                        {
                                       
                                     $x++
                                        ?>

                   <tr class="d<?=$x?>">
                     <td><select id="account" name="cost2_c[]" class="select form-select">
                         <?php



                                       $sql->select2("cost1"," where stat=1 ");
                                       while($row=$sql->res2->fetch_assoc())

                                        {
                                        $id=$row['id'];
                                        $sql->select1("cost2","where c1=$id");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                          $c2_n=$row1['name'];
                                         $id_c=$row1['id'];
                                        }
$cost2_id=$row2['cost2_id'];



                                        
                                        ?>

                         <option <?php

if ($id_c==$cost2_id) {
echo 'selected=""';
}
                                        ?> value="<?=$id_c?>"><?=$c2_n." > ".$row['account_name']?></option>
                         <?php

                                      }
                             


?>

                       </select></td>
                     <td><input type="text" price="price<?=$x?>" value="<?=$row2['rate']?>" step="10" min="0" max="100" price_p="<?=$row2['rate']?>" nn="<?=$row2['cr']?>" class="n<?=$x?> form-control" name="rate_c[]"></td>

                     <td><input type="text" name="price_c[]" value="<?=$row2['cr']?>" class="price<?=$x?> form-control" nn="<?=$row2['cr']?>" n="n<?=$x?>" name=""></td>

                     <td style="padding: .625rem 0.25rem;">
                       <center><button type="button" class="del del<?=$x?>   btn btn-danger" nn="<?=$row2['cr']?>" price_p="<?=$row2['rate']?>" de="0" ce="0" a="d<?=$x?>"><i class="bx bxs-trash-alt"></i></button></center>
                     </td>
                   </tr>

                   <script type="text/javascript">
                     $(".n<?=$x?>").change(function() {
                       var d_t1 = Number($(".ce_t").val());
                       var price = Number($(this).val());
                       if (price > 100) {
                         var price = 100;
                         $(this).val(100)
                       } else if (price < 0) {
                         var price = 0;
                         $(this).val(0)
                       }
                       var total = Math.round(d_t1 / 100 * price);
                       var price1 = $(this).attr("price");
                       $("." + price1).val(Math.round(total))
                       var price_p = Number($(this).attr("price_p"));
                       var nn = Number($(".nnn").val()) - price_p
                       $(".nnn").val(Math.round(nn))
                       $(".nnn").val(nn + Math.round(total / d_t1 * 100))
                       $(this).attr("price_p", Math.round(price));
                       /////////////
                       var nn1 = Number($(this).attr("nn"));
                       var nn = Number($(".price_pp").val()) - nn1
                       $(".price_pp").val(Math.round(nn))
                       $(".price_pp").val(nn + Math.round(total))
                       $(this).attr("nn", Math.round(total));
                       $(".del<?=$x?>").attr("price_p", Math.round(price));
                       $(".del<?=$x?>").attr("nn", Math.round(total));
                     });
                     /////////////////////////////////////////////
                     $(".price<?=$x?>").change(function() {
                       var d_t1 = Number($(".ce_t").val());
                       var nb = Number($(this).val());
                       if (nb > d_t1) {
                         var nb = d_t1;
                         $(this).val(d_t1)
                       } else if (nb < 0) {
                         var nb = 0;
                         $(this).val(0)
                       }
                       var total = nb / d_t1 * 100;
                       var n1 = $(this).attr("n");
                       $("." + n1).val(Math.round(total))
                       var price_p = Number($("." + n1).attr("price_p"));
                       var nn = Number($(".nnn").val()) - price_p;
                       $(".nnn").val(Math.round(nn));
                       $(".nnn").val(Math.round(nn + total));
                       $("." + n1).attr("price_p", Math.round(total));
                       /////////
                       var nn1 = Number($("." + n1).attr("nn"));
                       var nn2 = Number($(".price_pp").val()) - nn1;
                       $(".price_pp").val(Math.round(nn2 + nb));
                       $(".nnn").val(nn + Math.round(total));
                       $("." + n1).attr("nn", Math.round(nb));
                       $(".del<?=$x?>").attr("price_p", Math.round(total));
                       $(".del<?=$x?>").attr("nn", Math.round(nb));
                     });
                     //////////////////////////////////////////////
                     $(".del<?=$x?>").click(function() {
                       var a = $(this).attr("a")
                       var nn = Number($(this).attr("nn"));
                       var price_p = Number($(this).attr("price_p"));
                       var cc = Number($(".nnn").val()) - price_p;
                       $(".nnn").val(cc)
                       var nn = Number($(".price_pp").val()) - nn;
                       $(".price_pp").val(nn)
                       $("." + a).remove()
                       ///////////////////////////
                     });
                   </script>
                   <?php

                                      }
                                      ?>

                 </tbody>
                 <tr class="ss">
                   <td>
                     <div class="col mb-3">
                       <label for="account"><span class="h6"></span></label>
                       <button type="button" style="width: 100%" onclick="add(0,10)" class=" btn btn-success">
                         Add </button>

                     </div>
                   </td>

                   <td><input type="text" disabled="" value="<?php 
 $sql->selectsum("rate",'costs',"trans_id=$get and cr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$rate=$row['SUM(rate)'];
 }
  ?>" class="form-control nnn" name=""></td>
                   <td><input type="text" disabled="" value="<?php 
 $sql->selectsum("cr",'costs',"trans_id=$get and cr!=0");
 while ($row=$sql->res_sum->fetch_assoc()) {
  echo$cr=$row['SUM(cr)'];
 }
  ?>" class="form-control price_pp" name=""></td>

                   <td></td>
                 </tr>
               </table>

               <br>
               <div class="form-group">
                 <div class="row">

                   <div class="col mb-3">

                     <label for="currency"><span class="h6"><?php echo $lang['Currency'];?></span></label>
                     <select id="currency" name="currency" class="currency_id form-select ">

                       <?php

                                       $sql->selectall("currencies");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                       <option value="<?=$row['id']?>" <?php
$cre=$row3['currency_id'];
$cre2=$row['id'];
if ($cre==$cre2) {
  echo 'selected=""';
}

                                    ?>><?=$row['code']?></option>
                       <?php

                                      }
                                      $x++;
                                        ?>

                     </select>
                   </div>

                   <div class="col mb-3">
                     <label for="ref"><span class="h6"><?php echo $lang['Ref'];?></span></label>
                     <input type="text" class="ref form-control" id="ref" value="<?=$row3['ref']?>" name="ref">
                   </div>

                   <div class="col mb-3">
                     <label for="ref"><span class="h6"><?=$lang['PHOTO']?></span></label>
                     <input type="file" class="form-control" name="photo">
                   </div>
                 </div>
               </div>

               <input class="zz" type="hidden" value="<?=$_GET['id']?>" name="id">
               <input class="zz" type="hidden" value="<?=$row3['date2']?>" name="date">
               <input type="hidden" value="<?=$row3['photo']?>" name="photo1">
               <input class="de_t" type="hidden" value="<?=$row3['total']?>" name="total">
               <input type="hidden" value="<?=$row3['t_type']?>" name="a">
               <button type="submit" class="btn btn-primary" style="float: right;"><?=$lang['Save']?></button>
               <br> <br><br>
             </form>

           </div>
         </div>
       </div>
     </div>
     <?php
}
                 ?>

     <script type="text/javascript">
       $(".de0").change(function() {
         var b = $(this).attr("ce");
         var cost = $(this).attr("cost");
         var c = $("." + b).val()
         var a = 'add(' + $(this).val() + ',' + c + ')';
         $("." + cost).attr("onclick", a);
       });
       $(".ce0").change(function() {
         var b = $(this).attr("de");
         var cost = $(this).attr("cost");
         var c = $("." + b).val()
         var a = 'add(' + c + ',' + $(this).val() + ')';
         $("." + cost).attr("onclick", a);
       });
       //////////////////////
       var z = < ? = $x ? > ;

       function add(dr, cr) {
         if (cr == 0) {
           var v = 1;
           if (v == 1) {
             $(this).attr({
               disabled: ''
             });
           }
           var n = z++;
           var s = $(".ex1").html();
           $(".costd").show();
           $(".myTable1").append('<tr class="d' + n + '"><td><select id="account" name="cost2_d[]" class="form-select select">' + s + '</select></td><td><input type="text"  price="price' + n + '" step="10" min="0" max="100" price_p="0" nn="0" class="n' + n + ' form-control" name="rate_d[]"></td><td><input type="text" name="price_d[]" class="price' + n + ' form-control" nn="0" n="n' + n + '" name=""></td><td style="padding: .625rem 0.25rem;"><center><button type="button"  class="del del' + n + '   btn btn-danger" nn="0" price_p="0" de="0" ce="0" a="d' + n + '"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');
           ///////////////////////////////////////
           $(".select").select2();
           $(".n" + n).change(function() {
             var d_t1 = Number($(".de_t").val());
             var price = Number($(this).val());
             if (price > 100) {
               var price = 100;
               $(this).val(100)
             } else if (price < 0) {
               var price = 0;
               $(this).val(0)
             }
             var total = Math.round(d_t1 / 100 * price);
             var price1 = $(this).attr("price");
             $("." + price1).val(Math.round(total))
             var price_p = Number($(this).attr("price_p"));
             var nn = Number($(".nn").val()) - price_p
             $(".nn").val(Math.round(nn))
             $(".nn").val(Math.round(nn + (total / d_t1 * 100)))
             $(this).attr("price_p", price);
             /////////////
             var nn1 = Number($(this).attr("nn"));
             var nn = Number($(".price_p").val()) - nn1
             $(".price_p").val(Math.round(nn))
             $(".price_p").val(nn + Math.round(total))
             $(this).attr("nn", Math.round(total));
             $(".del" + n).attr("price_p", Math.round(price));
             $(".del" + n).attr("nn", Math.round(total));
           });
           /////////////////////////////////////////////
           $(".price" + n).change(function() {
             var d_t1 = Number($(".de_t").val());
             var nb = Number($(this).val());
             if (nb > d_t1) {
               var nb = d_t1;
               $(this).val(d_t1)
             } else if (nb < 0) {
               var nb = 0;
               $(this).val(0)
             }
             var total = Math.round(nb / d_t1 * 100);
             var n1 = $(this).attr("n");
             $("." + n1).val(Math.round(total))
             var price_p = Number($("." + n1).attr("price_p"));
             var nn = Number($(".nn").val()) - price_p;
             $(".nn").val(Math.round(nn));
             $(".nn").val(Math.round(nn + total));
             $("." + n1).attr("price_p", total);
             /////////
             var nn1 = Number($("." + n1).attr("nn"));
             var nn2 = Number($(".price_p").val()) - nn1;
             $(".price_p").val(Math.round(nn2 + nb))
             $(".nn").val(Math.round(nn + total));
             $("." + n1).attr("nn", nb);
             $(".del" + n).attr("price_p", Math.round(total));
             $(".del" + n).attr("nn", Math.round(nb));
           });
           //////////////////////////////////////////////
           $(".del" + n).click(function() {
             var a = $(this).attr("a")
             var nn = Number($(this).attr("nn"));
             var price_p = Number($(this).attr("price_p"));
             var cc = Number($(".nn").val()) - price_p;
             $(".nn").val(Math.round(cc))
             var nn = Number($(".price_p").val()) - nn;
             $(".price_p").val(Math.round(nn))
             $("." + a).remove()
             ///////////////////////////
           });
           /////////////////
         } else {
           var v = 1;
           if (v == 1) {
             $(this).attr({
               disabled: ''
             });
           }
           var n = z++;
           var s = $(".ex1").html();
           $(".costc").show();
           $(".myTable2").append('<tr class="d' + n + '"><td><select id="account" name="cost2_c[]" class="form-select select"  >' + s + '</select></td><td><input type="text"  price="price' + n + '" step="10" min="0" max="100" price_p="0" nn="0" class="n' + n + ' form-control" name="rate_c[]"></td><td><input type="text" name="price_c[]" class="price' + n + ' form-control" nn="0" n="n' + n + '" name=""></td><td style="padding: .625rem 0.25rem;"><center><button type="button"  class="del del' + n + '   btn btn-danger" nn="0" price_p="0" de="0" ce="0" a="d' + n + '"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');
           ///////////////////////////////////////
           $(".select").select2();
           $(".n" + n).change(function() {
             var d_t1 = Number($(".ce_t").val());
             var price = Number($(this).val());
             if (price > 100) {
               var price = 100;
               $(this).val(100)
             } else if (price < 0) {
               var price = 0;
               $(this).val(0)
             }
             var total = Math.round(d_t1 / 100 * price);
             var price1 = $(this).attr("price");
             $("." + price1).val(Math.round(total))
             var price_p = Number($(this).attr("price_p"));
             var nn = Number($(".nnn").val()) - price_p
             $(".nnn").val(Math.round(nn))
             $(".nnn").val(nn + Math.round(total / d_t1 * 100))
             $(this).attr("price_p", Math.round(price));
             /////////////
             var nn1 = Number($(this).attr("nn"));
             var nn = Number($(".price_pp").val()) - nn1
             $(".price_pp").val(Math.round(nn))
             $(".price_pp").val(nn + Math.round(total))
             $(this).attr("nn", Math.round(total));
             $(".del" + n).attr("price_p", Math.round(price));
             $(".del" + n).attr("nn", Math.round(total));
           });
           /////////////////////////////////////////////
           $(".price" + n).change(function() {
             var d_t1 = Number($(".ce_t").val());
             var nb = Number($(this).val());
             if (nb > d_t1) {
               var nb = d_t1;
               $(this).val(d_t1)
             } else if (nb < 0) {
               var nb = 0;
               $(this).val(0)
             }
             var total = nb / d_t1 * 100;
             var n1 = $(this).attr("n");
             $("." + n1).val(Math.round(total))
             var price_p = Number($("." + n1).attr("price_p"));
             var nn = Number($(".nnn").val()) - price_p;
             $(".nnn").val(Math.round(nn));
             $(".nnn").val(Math.round(nn + total));
             $("." + n1).attr("price_p", Math.round(total));
             /////////
             var nn1 = Number($("." + n1).attr("nn"));
             var nn2 = Number($(".price_pp").val()) - nn1;
             $(".price_pp").val(Math.round(nn2 + nb));
             $(".nnn").val(nn + Math.round(total));
             $("." + n1).attr("nn", Math.round(nb));
             $(".del" + n).attr("price_p", Math.round(total));
             $(".del" + n).attr("nn", Math.round(nb));
           });
           //////////////////////////////////////////////
           $(".del" + n).click(function() {
             var a = $(this).attr("a")
             var nn = Number($(this).attr("nn"));
             var price_p = Number($(this).attr("price_p"));
             var cc = Number($(".nnn").val()) - price_p;
             $(".nnn").val(cc)
             var nn = Number($(".price_pp").val()) - nn;
             $(".price_pp").val(nn)
             $("." + a).remove()
             ///////////////////////////
           });
           /////////////////
         }
         $(".select").select2();
         //////////////////////
       }
     </script>