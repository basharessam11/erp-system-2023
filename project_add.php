<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-4 mb-4">

    <div class="card">

      <div class="card-header border-bottom">
        <h5 class="card-title" style="float:left;"><?=$lang['Create_New_Projects']?></h5>

      </div>
      <!-- DataTable with Buttons -->
      <br>

      <div class="row">
        <form method="post" action="inc/fun/project/insert.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="row">

              <div class="col-md-4">
                <label><?php echo $lang['NAME'];?></label> <br>
                <input type="text" name="name" required="" class="form-control" placeholder="<?php echo $lang['NAME'];?>">
              </div>

              <div class="col-md-4">
                <label><?=$lang['Start_Date']?></label> <br>
                <input type="date" class="form-control" required="" name="start_date">
              </div>

              <div class="col-md-4"> <label><?=$lang['end_Date']?></label> <br>
                <input type="date" class="form-control" required="" name="end_date">
              </div>

              <div class="col-md-4"><br>
                <label><?=$lang['category']?></label>

                <select data-placeholder="<?=$lang['category']?>" class="form-select" tabindex="2" name="pro_cat">
                  <?php

                                       $sql->selectall("pro_cat");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                  <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php

                                      }
                                        ?>
                </select>
              </div>

              <div class="col-md-4"><br>
                <label><?=$lang['Project_Manager']?></label>

                <select data-placeholder="<?php echo $lang['Cateogry'];?>" class="user form-select" tabindex="2" name="user">
                  <?php

                                       $sql->selectall("user order by name");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                  <option value="<?=$row['id']?>"><?=$row['name']?></option>
                  <?php

                                      }
                                        ?>
                </select>
                <br>
              </div>

              <div class="col-md-12"><br>
                <label><?=$lang['Description']?></label> <br>
                <textarea name="des" class="form-control"></textarea>
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