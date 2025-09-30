      <?php
$id=$_GET['id'];
 $sql->selectall("pro_task where id= $id ");
 $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {

      ?>

      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">

          <div class="card">
            <div class="card-header border-bottom">
              <div class="row">
                <form method="post" action="inc/fun/pro_task/note.php" enctype="multipart/form-data">

                  <div class="col-md-12"><br>
                    <label for="account"><span class="h6">Tasks :</span></label>
                    <table width="10%" class="datatables-basic  table table-bordered">
                      <thead>
                        <tr>

                          <th style="padding: .625rem 0.25rem;">
                            <center>name</center>
                          </th>

                          <th style="padding: .625rem 0.25rem;">
                            <center>discription</center>
                          </th>

                          <th style="padding: .625rem 0.25rem;">
                            <center>start date</center>
                          </th>
                          <th style="padding: .625rem 0.25rem;">
                            <center>end date</center>
                          </th>
                          <th style="padding: .625rem 0.25rem;">
                            <center>user</center>
                          </th>
                          <th style="padding: .625rem 0.25rem;">
                            <center>status</center>
                          </th>

                        </tr>

                      </thead>
                      <tbody class="myTable">

                        <tr class="a0">
                          <td><input disabled class="name form-control" type="text" value="<?=$row["name"]?>"></td>
                          <td><textarea class="des form-control" disabled type="text"><?=$row["des"]?></textarea></td>
                          <td><input disabled class="start_date_t form-control" type="date" name="start_date_t[]" value="<?=$row["start_date"]?>"></td>
                          <td><input disabled class="end_date_t form-control" type="date" name="end_date_t[]" value="<?=$row["end_date"]?>"></td>
                          <td><select disabled id="account" class="user_id_t user form-select"><?php
$user=$row["user_id"];
                                       $sql->select1("user","where id=$user");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {2
                                       ?>
                              <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                              <?php

                                      }
                                        ?>
                            </select></td>
                          <td><select id="account" name="status_t" class="status_t form-select">

                              <option <?php

if ($row['stat']==1) {
echo 'selected';
}?> value="1">المراجعة</option>
                              <option <?php

if ($row['stat']==2) {
echo 'selected';
}?> value="2">قيد التنفيذ</option>
                              <option <?php

if ($row['stat']==3) {
echo 'selected';
}?> value="3">اكتمل</option>
                            </select></td>

                        </tr>

                        <div style="display: none" class="stag">
                          <?php

                                       $sql->select1("pro_stag","");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {2
                                       ?>
                          <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                          <?php

                                      }
                                        ?>
                        </div>

                        <br>

                      </tbody>
                      <tbody>
                      </tbody>
                    </table>

                  </div>

                  <div class="col-md-12"><br>
                    <label for="account"><span class="h6">NOTES :</span></label>
                    <table width="10%" class="datatables-basic  table table-bordered">
                      <thead>
                        <tr>

                          <th style="padding: .625rem 0.25rem;">
                            <center>discription</center>
                          </th>

                          <th style="padding: .625rem 0.25rem;">
                            <center>delete</center>
                          </th>

                        </tr>

                      </thead>
                      <tbody class="myTable12">
                        <?php
$x=0;

                                       $sql->select1("task_note","where task_id=$id");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {
                                        
                                       ?>

                        <tr class="b<?=$x?>">

                          <td><textarea class="form-control" type="text" name="des[]"><?=$row1['des']?></textarea></td>

                          <td style="padding: .625rem 0.25rem;"><button type="button" style="float:left;" onclick="del1(<?=$x?>)" class="del  btn btn-danger"><i class="bx bxs-trash-alt"></i></button></td>

                        </tr>
                        <?php
  $x++;
                                      }
                                        ?>
                        </script>
                        <script type="text/javascript">
                          var x = < ? = $x ? > ;

                          function add1() {
                            var n = x++;
                            var user = $(".user").html();
                            var stag = $(".stag").html();
                            $(".myTable12").append('<tr class="b' + n + '"><td><textarea class="form-control" type="text" name="des[]"></textarea></td><td style="padding: .625rem 0.25rem;"><center><button type="button" style="float:left;" onclick="del1(' + n + ')" class="del  btn btn-danger" de="0" ce="0" a="a' + n + '"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');
                          }

                          function del1(n) {
                            $(".b" + n).remove()
                          }
                        </script>

                      </tbody>
                      <tbody>
                        <tr class="ss">
                          <td colspan="7">
                            <div class="col mb-3">
                              <label for="account"><span class="h6"></span></label>
                              <button type="button" style="width: 100%" onclick="add1()" class="add btn btn-success">
                                Add </button>

                            </div>
                          </td>

                        </tr>
                      </tbody>
                    </table>

                  </div>

              </div>

            </div>

            <input class="zz" type="hidden" value="<?=$_GET['id']?>" name="id">
            <input class="user_id_t" type="hidden" value="<?=$row['user_id']?>" name="user_id">

            <div class="modal-footer">

              <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <?php
            }
          ?>