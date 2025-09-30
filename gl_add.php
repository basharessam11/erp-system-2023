<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-4 mb-4">

    <div class="card">

      <div class="card-header border-bottom">
        <h5 class="card-title" style="float:left;"><?= $lang['Expenses_List'];?></h5>

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

        <form method="post" action="inc/fun/expenses/insert.php" enctype="multipart/form-data">

          <div class="form-group">
            <div class="col mb-3">
              <label for="description"><span class="h6 "><?= $lang['DESCRIPTION'];?></span></label>

              <textarea class="form-control" id="description" name="name"></textarea>

            </div>

          </div>

          <table width="10%" class="datatables-basic  table table-bordered">
            <thead>
              <tr>

                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['From'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['DESCRIPTION'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['DEPIT'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['CRIDT'];?></center>
                </th>
                <th style="padding: .625rem 3.25rem;">
                  <center><?= $lang['ACTION'];?></center>
                </th>

              </tr>

            </thead>
            <tbody class="myTable">

            </tbody>
            <tr class="ss">
              <td>
                <div class="col mb-3">
                  <label for="account"><span class="h6"></span></label>
                  <button type="button" style="width: 100%" class="add btn btn-success">
                    <?= $lang['Add'];?> </button>

                </div>
              </td>
              <td><?= $lang['Total'];?> </td>
              <td><input type="text" disabled="" value="0" class="form-control de_t"></td>
              <input type="hidden" value="0" class="form-control de_t" name="total1">
              <input type="hidden" value="0" class="form-control ce_t" name="total2">
              <td><input type="text" disabled="" value="0" class="form-control ce_t"></td>
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
              add(0);
            })
            ////////////////////////////add account /////////////////////////
            function add(n) {
              // console.log(n++)
              n++
              var a = "add(" + n + ")";
              $(".add").attr("onclick", a)
              var s = $(".ex").html()
              $(".myTable").append(`
        <tr class="a` + n + `">
        <td><select id="account` + n + `" name="from[]" class="select form-select"  >` + s + `</select></td>

        <td><input type="text" class=" form-control" placeholder="<?= $lang['DESCRIPTION'];?>" name="des[]"></td>

        <td><input onkeyup="debit(` + n + `)" type="number" min="0"  placeholder="<?= $lang['DEPIT'];?>" debit="0" name="debit[]" class="debit` + n + ` form-control"></td>

        <td><input onkeyup="cridt(` + n + `)" type="number" min="0" placeholder="<?= $lang['CRIDT'];?>" cridt="" name="cridt[]" class="cridt` + n + ` form-control"></td>

        <td style="padding: .625rem 0.25rem;">
        <center>

        <button type="button"  style="float:left;" onclick="del(` + n + `)" class="btn btn-danger"  ><i class="bx bxs-trash-alt"></i></button>

        <button type="button" style="float:right;" cost="0" class="cost` + n + `  btn btn-success" onclick="add1(` + n + `,1,0)"  ><i class="bx bxs-add-to-queue"></i></button>

        </center>
        </td>
        </tr>`);
              $("#account" + n).select2()
            }
            ////////////////////////////end add account /////////////////////////
            ////////////////////////////del account /////////////////////////
            function del(n) {
              var val_c = Number($(".cridt" + n).val());
              var val_t1 = Number($(".ce_t").val());
              $(".ce_t").val(val_t1 - val_c);
              var val_c = Number($(".debit" + n).val());
              var val_t1 = Number($(".de_t").val());
              $(".de_t").val(val_t1 - val_c);
              $('.costs' + n).remove()
              $('.a' + n).remove()
            }
            ////////////////////////////end del account /////////////////////////
            ////////////////////////////debit account /////////////////////////
            function debit(n) {
              var val_c = Number($(".cridt" + n).val());
              var val_t1 = Number($(".ce_t").val());
              $(".ce_t").val(val_t1 - val_c);
              $(".cridt" + n).val('')
              $(".cridt" + n).val('').attr("cridt", '');
              var val = Number($(".debit" + n).val());
              var ex = $(".debit" + n).attr("debit");
              var val_t = Number($(".de_t").val());
              $(".de_t").val((val_t - ex) + val);
              $(".debit" + n).attr("debit", val)
            }
            ////////////////////////////end debit account /////////////////////////
            ////////////////////////////cridt account /////////////////////////
            function cridt(n) {
              var val_c = Number($(".debit" + n).val());
              var val_t1 = Number($(".de_t").val());
              $(".de_t").val(val_t1 - val_c);
              $(".debit" + n).val('').attr("debit", '');
              var val = Number($(".cridt" + n).val());
              var ex = $(".cridt" + n).attr("cridt");
              var val_t = Number($(".ce_t").val());
              $(".ce_t").val((val_t - ex) + val);
              $(".cridt" + n).attr("cridt", val)
            }
            ////////////////////////////end cridt account /////////////////////////
            ////////////////////////////add cost /////////////////////////
            function add1(n) {
              var x = $(".cost" + n).attr("cost");
              // console.log(x)
              x++;
              $(".cost" + n).attr("cost", x)
              var s = $(".ex1").html();
              $(".costd").show();
              $(".myTable1").append(`<tr class="d` + x + ` costs` + n + ` "  >

    <td>
    <select id="cost2_d` + x + `" name="cost2_d[]" style="width:100%" class=" select form-select">` + s + `</select>
    </td>

    <td><input type="number" step="10" min="0" max="100" placeholder="<?= $lang['percentage'];?>" onkeyup="rate(` + n + `,` + x + `)"  class="rate_d` + x + ` form-control" name="rate_d[]"></td>

    <td><input type="number" onkeyup="price(` + n + `,` + x + `)" placeholder="<?= $lang['Amount'];?>" name="price_d[]" class="price_d` + x + ` form-control"  ></td>

    <td style="padding: .625rem 0.25rem;"><center>

    <button type="button" onclick="del1(` + x + `)" class="   btn btn-danger"   a="d` + x + `"><i class="bx bxs-trash-alt"></i></button>

    </center></td></tr>`);
              $("#account" + x).select2()
            }
            ////////////////////////////end add cost /////////////////////////
            ////////////////////////////rate  /////////////////////////
            function rate(n, x) {
              var rate = $(".rate_d" + x).val();
              if (rate > 100) {
                var rate = 100;
                $(".rate_d" + x).val(100)
              } else if (rate < 0) {
                var rate = 0;
                $(".rate_d" + x).val(0)
              }
              // if ($(".debit"+n).val()>0) {
              //   var val = $(".debit"+n).val();
              // }else{
              //   var val = $(".cridt"+n).val();
              // }
              var val = $('.de_t').val();
              var d = (val * rate);
              // console.log(d);
              var total = Number(d / 100);
              $(".price_d" + x).val(total);
            }
            ////////////////////////////end rate  /////////////////////////
            ////////////////////////////price  /////////////////////////
            function price(n, x) {
              var price = Number($(".price_d" + x).val());
              var val = Number($('.de_t').val());
              if (price > val) {
                var price = val;
                $(".price_d" + x).val(val)
              } else if (price < 0) {
                var price = 0;
                $(".price_d" + x).val(0)
              }
              // if ($(".debit"+n).val()>0) {
              //   var val = $(".debit"+n).val();
              // }else{
              //   var val = $(".cridt"+n).val();
              // }
              var d = (price / val);
              // console.log(d);
              var total = Number(d * 100);
              $(".rate_d" + x).val(total);
            }
            ////////////////////////////end price  /////////////////////////
            ////////////////////////////del cost /////////////////////////
            function del1(n) {
              $('.d' + n).remove()
            }
            ////////////////////////////end del cost /////////////////////////
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

          <table width="10%" style="display: none;" class="costd datatables-basic  table table-bordered">
            <thead>
              <tr>
                <th colspan="4">
                  <center><?= $lang['DEPIT'];?></center>
                </th>

              </tr>
              <tr>

                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['cost_centers'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['percentage'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['Amount'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?=$lang['Delete']?></center>
                </th>

              </tr>

            </thead>
            <tbody class="myTable1">

            </tbody>

          </table>

          <br>
          <table width="10%" style="display: none;" class="costc datatables-basic  table table-bordered">
            <thead>
              <tr>
                <th colspan="4">
                  <center><?= $lang['cost_centers'];?></center>
                </th>

              </tr>
              <tr>

                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['cost_centers'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['percentage'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['Amount'];?></center>
                </th>
                <th style="padding: .625rem 0.25rem;">
                  <center><?= $lang['DELETE'];?></center>
                </th>

              </tr>

            </thead>
            <tbody class="myTable2">

            </tbody>
            <tr class="ss">
              <td>
                <div class="col mb-3">
                  <label for="account"><span class="h6"></span></label>
                  <button type="button" style="width: 100%" onclick="add(0,10)" class=" btn btn-success">
                    <?= $lang['Add'];?> </button>

                </div>
              </td>
              <td><input type="text" disabled="" value="0" class="form-control nnn" name=""></td>
              <td><input type="text" disabled="" value="0" class="form-control price_pp" name=""></td>

              <td></td>
            </tr>
          </table>

          <div class="form-group">
            <div class="row">

              <div class="col mb-3">

                <label for="currency"><span class="h6"><?= $lang['Currency'];?></span></label>
                <select id="currency" name="currency" class="form-select ">

                  <?php

                                       $sql->selectall("currencies");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                  <option value="<?=$row['id']?>"><?=$row['code']?></option>
                  <?php

                                      }
                                        ?>

                </select>
              </div>

              <div class="col mb-3">
                <label for="ref"><span class="h6"><?= $lang['Ref'];?></span></label>
                <input type="text" class="form-control" id="ref" name="ref">
              </div>
              <div class="col mb-3">
                <label for="ref"><span class="h6"><?=$lang['PHOTO']?></span></label>
                <input type="file" class="form-control" name="photo">
              </div>

            </div>
          </div>

      </div>

      <input type="hidden" value="<?=$_GET['a']??1?>" name="a">
      <input class="de_t" type="hidden" value="0" name="total">
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary"><?=$lang['Save']?></button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- aaaaaaaaaaaaaaaaaaaa -->
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
  $(document).ready(function() {
    $(".select").select2()
  });
</script>