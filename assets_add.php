<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-4 mb-4">

    <div class="card">

      <div class="card-header border-bottom">
        <h5 class="card-title" style="float:left;"><?php echo $lang['Assets'];?></h5>

      </div>
      <!-- DataTable with Buttons -->
      <br>

      <div class="row">
        <form method="post" action="inc/fun/assets/insert.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="row">

              <div class="col-md-12">
                <label><?php echo $lang['NAME'];?></label> <br>
                <input type="text" name="name" required="" class="form-control" placeholder="<?php echo $lang['NAME'];?>">
                <br>
              </div>

              <div class="col-md-4">
                <label><?php echo $lang['Date_purchased'];?> </label> <br>
                <input type="date" class="form-control" value="<?=date("Y-m-d")?>" required="" name="sale_date">
              </div>
              <div class="col-md-4">
                <label><?php echo $lang['Service_start_date'];?> </label> <br>
                <input type="date" class="form-control" required="" name="start_date">
              </div>

              <div class="col-md-4">
                <label> <?php echo $lang['place'];?></label>

                <select data-placeholder="branch" required="" class="form-select" tabindex="2" name="branch">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>

                  <?php

                                       $sql->selectall("branch");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                  <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php

                                      }
                                        ?>
                </select>
              </div>

              <div class="col-md-4">
                <br>
                <label><?php echo $lang['main_account'];?> </label>

                <select class="form-select " required="" name="account_c3">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>

                  <?php
                                   $sql->selectall("account_c3 where c2=110");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                </select>

              </div>
              <div class="col-md-4">
                <br>
                <label><?php echo $lang['EMPLOYEE_NAME'];?></label>

                <select class="form-select " required="" name="user_id">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>

                  <?php
                                   $sql->selectall("user");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                   }

                                   ?>

                </select>

              </div>

              <div class="col-md-4"><br>
                <label><?php echo $lang['production_age'];?></label>
                <input type="text" name="exp" required="" class="form-control" placeholder="<?php echo $lang['production_age'];?>">
              </div>

              <div class="col-md-12"><br>
                <label><?php echo $lang['Description'];?></label> <br>
                <textarea name="des" class="form-control"></textarea><br>
              </div>

              <hr>

              <div class="col-md-4"><br>
                <label><?php echo $lang['Amount'];?></label>
                <input type="text" name="price" required="" class="form-control" placeholder="<?php echo $lang['Amount'];?>">
              </div>
              <div class="col-md-4">
                <br>
                <label><?php echo $lang['Currency'];?></label>

                <select class="form-select " required="" name="currency">

                  <?php
                                   $sql->selectall("currencies");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['code'].'</option>';
                                   }

                                   ?>

                </select>

              </div>

              <div class="col-md-4">
                <br>
                <label><?php echo $lang['Account_Name'];?></label>

                <select class="form-select " required="" name="account_no">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>

                  <?php
                                   $sql->selectall("account_no");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['account_name'].'</option>';
                                   }

                                   ?>

                </select>

              </div>

              <div class="col-md-6">
                <br>
                <label><?php echo $lang['Tax'];?></label>

                <select class="form-select " name="tax1">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>

                  <?php
                                   $sql->selectall("account_no where account_c3=42");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['account_name'].'</option>';
                                   }

                                   ?>

                </select>

              </div>

              <div class="col-md-6">
                <br>
                <label><?php echo $lang['Tax'];?></label>

                <select class="form-select " name="tax2">
                  <option value="0"> <?php echo $lang['Please_select'];?> </option>
                  <?php
                                   $sql->selectall("account_no where account_c3=42");
                                   while ($row=$sql->res->fetch_assoc()) {
                                     echo'<option value="'.$row['id'].'">'.$row['account_name'].'</option>';
                                   }

                                   ?>

                </select>

              </div>
            </div>
          </div>

          <br>
          <button type="submit" class="btn btn-primary" style="float: right;">Save</button>

      </div>
      </form>

      <br>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("select").select2()
  })
</script>