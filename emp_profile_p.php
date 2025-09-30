<?php
$user = $_GET['id'];
if (isset($user) and !empty($user)) {
  $sql->selectall("emp_profile  where id=$user ");
} else {

  header("location:?cust=list");
  exit();
}

while ($row = $sql->res->fetch_assoc()) {
?>

  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="row g-4 mb-4">

      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <a href="inc/fun/salary/print.php?id=<?= $row['id'] ?>" style="width: 100% ; height: 100%">
                <button class="form-control btn btn-primary">Print Salary</button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <a href="?emp_salary=list&id=<?= $row["id"] ?>" style="width: 100% ; height: 100%">
                <button class="form-control btn btn-primary">Emp Salary </button>
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <a href="?rate=list&id=<?= $row["id"] ?>" style="width: 100% ; height: 100%">
                <button class="form-control btn btn-primary">Rate</button>
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <a href="?all_rate=list&id=<?= $row["id"] ?>" style="width: 100% ; height: 100%">
                <button class="form-control btn btn-primary">All Rate</button>
              </a>
            </div>
          </div>
        </div>
      </div>



      <div class="card">
        <div class="card-header border-bottom">
          <h5 class="card-title" style="float:left;">Customer</h5>


          <?php
          if (isset($_GET['img_exe']) == 'no') {
            echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>(jpg,png,jpeg) ﻣﻦ ﻓﻀﻠﻚ ﻗﻢ ﺑﻮﺿﻊ ﺻﻮﺭﺓ ﺑﺘﻨﺴﻴﻖ  </center>
</div>';
          }
          if (isset($_GET['img']) == 'no') {
            echo '<br><br><div id="success-alert4" class="alert alert-danger" role="alert">
 <center>ﻻ ﻳﻤﻜﻦ اﺿﺎﻓﺔ اﻛﺜﺮ ﻣﻦ 4 ﺻﻮﺭ </center>
</div>';
          }


          if (isset($_GET['delete2']) == 'no') {
            echo '<br><br><div id="success-alert2" class="alert alert-danger" role="alert">
        <center>  اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﺒﻴﺎﻧﺎﺕ اﻟﻤﺮاﺩ ﺣﺬﻓﻬﺎ </center>
          </div>';
          }
          if (isset($_GET['name']) == 'no') {
            echo '<br><br><div id="success-alert" class="alert alert-danger" role="alert">
 <center> الرقم المدني او رقم الهاتف موجود بالفعل </center>
</div>';
          }
          if (isset($_GET['add']) == 'su') {
            echo '<br><br><div id="success-alert1" class="alert alert-success" role="alert">
 <center>  ﺗﻢ اﻻﺿﺎﻓﺔ ﺑﻨﺠﺎﺡ</center>
</div>';
          }
          if (isset($_GET['delete']) == 'no') {
            echo '<br><br><div id="success-alert2" class="alert alert-danger" role="alert">
       <center>    ﻻ ﻳﻤﻜﻦ ﺣﺬﻑ ﻫﺬﻩ ﺑﺴﺒﺐ اﻧﻬﺎ ﻣﺪﺧﻠﻪ ﻓﻲ اﺣﺪ اﻟﺠﺪاﻭﻝ</center>
          </div>';
          }

          if (isset($_GET['delete1']) == 'su') {
            echo '<br><br><div id="success-alert3" class="alert alert-success" role="alert">
<center> ﺗﻢ اﻟﺤﺬﻑ ﺑﻨﺠﺎﺡ</center></div>';
          }
          if (isset($_GET['nam']) == 'su') {
            echo '<br><br><div id="success-alert1" class="alert alert-success" role="alert">
<center> ﺗﻢ ﺗﻐﻴﻴﺮ اﺳﻢ اﻟﻤﻮﻗﻊ ﺑﻨﺠﺎﺡ</center>
</div>';
          }
          ?>

        </div>
        <!-- DataTable with Buttons -->
        <br>


        <div class="row">


        </div>





        <br>
        <div class="kk">


          <?php
          $page = '?page=' . $_GET['page'] ?? 1;

          ?>
          <div class="row">
            <form method="post" action="inc/fun/emp_profile/update.php" enctype="multipart/form-data">
              <div class="col-md-6 col-sm-12 form-group" style="float:left;width: 48%">
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['Full_Name']; ?></label>
                  <input type="text" value="<?= $row["name"] ?>" id="nameBasic" class="name form-control" name="name" required="" placeholder="<?php echo $lang['Full_Name']; ?>">

                </div>


                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['PASSPORT_NO']; ?></label>
                  <input type="text" id="nameBasic" class="emp_passport form-control" name="emp_passport" required="" value="<?= $row["emp_passport"] ?>" placeholder="<?php echo $lang['PASSPORT_NO']; ?>">

                </div>


                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['DATE_OF_BIRTH']; ?></label>
                  <input type="date" id="nameBasic" value="<?= $row["birth_date"] ?>" class="birth_date date form-control" name="birth_date" required="">

                </div>


                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['MOBILE_NUMBER']; ?></label>
                  <input type="text" id="nameBasic" class="phone form-control" name="phone" required="" value="<?= $row["phone"] ?>" placeholder="<?php echo $lang['MOBILE_NUMBER']; ?>">

                </div>

                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["MARTIAL_STATUS"] ?></label>
                  <select class="emp_marital_status form-select" name="emp_marital_status">
                    <option <?php if ($row["emp_marital_status"] == 1) {
                              echo 'selected';
                            } ?> value="1">اعزب</option>
                    <option <?php if ($row["emp_marital_status"] == 2) {
                              echo 'selected';
                            } ?> value="2">متزوج</option>
                  </select>

                </div>


                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["Country"] ?></label>
                  <input type="text" id="nameBasic" class="country form-control" name="country" required="" value="<?= $row["country"] ?>" placeholder="<?php echo $lang["Country"] ?>">

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["Region"] ?></label>
                  <input type="text" value="<?= $row["region"] ?>" id="nameBasic" class="region form-control" name="region" placeholder="<?php echo $lang["Region"] ?>">

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['STATUS']; ?></label>
                  <select class="stat select form-select js-example-basic-single" name="stat">

                    <option <?php if ($row["stat"] == 1) {
                              echo 'selected';
                            } ?> value="1">نشط</option>
                    <option <?php if ($row["stat"] == 0) {
                              echo 'selected';
                            } ?> value="0">غير نشط</option>

                  </select>

                </div>
              </div>
              <div class="col-md-6 col-sm-12 form-group" style="float:right;width: 48%">
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["Address"] ?></label>
                  <input type="text" value="<?= $row["address"] ?>" id="nameBasic" class="address form-control" name="address" placeholder="<?php echo $lang["Address"] ?>">

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["City"] ?></label>
                  <input type="text" value="<?= $row["city"] ?>" id="nameBasic" class="city form-control" name="city" placeholder="<?php echo $lang["City"] ?>">

                </div>

                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang["Email"] ?></label>
                  <input type="email" id="nameBasic" value="<?= $row["email"] ?>" class="email form-control" name="email" placeholder="<?php echo $lang["Email"] ?>">

                </div>

                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['Password']; ?></label>
                  <input type="text" id="nameBasic" class="form-control" name="pass" placeholder="<?php echo $lang['Password']; ?>">

                </div>

                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['DEPARTMENT1']; ?></label>
                  <select class="depart select form-select js-example-basic-single" name="depart">
                    <?php

                    $sql->select1("department", "where 1=1");

                    while ($row1 = $sql->res1->fetch_assoc()) {



                    ?>
                      <option <?php if ($row["depart"] == $row1['id']) {
                                echo 'selected';
                              } ?> value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                    <?php

                    }
                    ?>

                  </select>

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['JOB_TITLE']; ?></label>
                  <input type="text" id="nameBasic" value="<?= $row["job_title"] ?>" class="job_title form-control" name="job_title" placeholder="<?php echo $lang['JOB_TITLE']; ?>">

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label">bank </label>
                  <input type="text" value="<?= $row["bank"] ?>" id="nameBasic" class="bank form-control" name="bank" placeholder="bank">

                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label"><?php echo $lang['PHOTO']; ?></label>
                  <input type="file" id="nameBasic" multiple="" class=" form-control" name="photo[]">

                </div>

              </div>


          </div>

        </div>
        <div class="modal-footer">
          <input class="photo" type="hidden" value="<?= $row["photo"] ?>" name="img_last">
          <input class="password" value="<?= $row["password"] ?>" type="hidden" name="password">
          <input class="zz" type="hidden" value="<?= $_GET['id'] ?>" name="id">
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>



      </div>
    </div>





    <!--/ DataTable with Buttons -->
    <br>
    <br>

  </div>




<?php

}
?>