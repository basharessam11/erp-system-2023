<div class=" container-xxl flex-grow-1 container-p-y">

  <div class="row g-4 mb-4">

    <div class="col-sm-3 col-xl-3">
      <div class="card">
        <div class="card-body">
          <a href="?customer_p=list&id=<?=$_GET['id']?>">
            <div class="d-flex align-items-start justify-content-between">
              <button class="bt1 form-control btn btn-primary">Edit</button>

            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-xl-3">
      <div class="card">
        <div class="card-body">
          <a href="?cust_file=list&id=<?=$_GET['id']?>">
            <div class="d-flex align-items-start justify-content-between">

              <button class="bt2 form-control btn btn-primary">Attachments </button>

            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">

            <button class="bt3 form-control btn btn-primary">Rate</button>

          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">

            <button class="bt4 form-control btn btn-primary">All Rate</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$user=$_GET['id'];
if (isset($user ) and !empty($user)) {
   $sql->selectall("customer where id=$user ");

}else{

header("location:?cust=list");
exit();
}
  
while ($row = $sql->res->fetch_assoc()) {
    ?>
<div class="show1 container-xxl flex-grow-1 container-p-y">

  <div class="row g-4 mb-4">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title" style="float:left;">Customer</h5>

      </div>
      <!-- DataTable with Buttons -->
      <br>

      <div class="row">

      </div>

      <br>
      <div class="kk">

        <?php
$page='?page='.$_GET['page']??1;

                    ?>
        <div class="row">
          <form method="post" action="inc/fun/customer/update.php" enctype="multipart/form-data">
            <br>
            <div class="form-group">
              <div class="row">

                <div class="col-md-4">
                  <label><?php echo $lang['NAME'];?></label> <br>
                  <input type="text" name="name" value="<?=$row['name']?>" class="name form-control" placeholder="<?php echo $lang['NAME'];?>">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Custmer_Type'];?></label>

                  <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="type_c form-select" tabindex="2" name="type">
                    <option <?php if ($row["type_c"]==1) {
                          echo 'selected';
                        } ?> value="1">عميل</option>
                    <option <?php if ($row["type_c"]==2) {
                          echo 'selected';
                        } ?> value="2">مورد</option>

                  </select>
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Email'];?></label> <br>
                  <input type="email" value="<?=$row['email']?>" class="email form-control" name="email" placeholder="your@email.com">
                </div>

              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="row">

                <div class="col-md-4">
                  <label><?php echo $lang['Phone'];?></label> <br>
                  <input type="text" value="<?=$row['phone']?>" name="phone" class="phone form-control" placeholder="<?php echo $lang['Phone'];?>">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Fax'];?></label> <br>
                  <input type="text" name="fax" value="<?=$row['fax']?>" class="fax form-control" placeholder="<?php echo $lang['Fax'];?>">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Group'];?></label> <br>
                  <select name="group" data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="group1 form-select" tabindex="2">
                    <?php

                                       $sql->select1("group1","");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {2
                                       ?>
                    <option <?php if ($row["group1"]==$row1['id']) {
                          echo 'selected';
                        } ?> value="<?=$row1['id']?>"><?=$row1['name']?></option>
                    <?php

                                      }
                                        ?>

                  </select>
                </div>
              </div>

            </div>
            <br>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label><?php echo $lang['Address'];?></label> <br>
                  <input type="text" value="<?=$row['address']?>" name="address" class="address form-control" placeholder="Address">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['City'];?></label> <br>
                  <input type="text" name="city" value="<?=$row['city']?>" class="city form-control" placeholder="City">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Region'];?></label> <br>
                  <input type="text" value="<?=$row['region']?>" class="region form-control" name="region" placeholder="<?php echo $lang['Region'];?>">
                </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="row">

                <div class="col-md-4">
                  <label><?php echo $lang['Postal'];?></label> <br>
                  <input type="text" name="zip" value="<?=$row['zip']?>" class="zip form-control" placeholder="<?=$lang['Postal'];?>">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Currency'];?></label> <br>
                  <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="currency form-select" name="currency" tabindex="2">
                    <?php

                                       $sql->select1("currencies","");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {2
                                       ?>
                    <option <?php if ($row["currency"]==$row1['id']) {
                          echo 'selected';
                        } ?> value="<?=$row1['id']?>"><?=$row1['code']?></option>
                    <?php

                                      }
                                        ?>

                  </select>
                </div>
              </div>
            </div>

            <br>
            <div class="form-group">
              <!--               <div class="row">

                <div class="col-md-4">
                  <label><?php echo $lang['Owner'];?>Username:</label> <br>
                                  <input type="text" name="Username" class="form-control" placeholder="Username">
                </div>
                        
                                    <div class="col-md-4">
                  <label><?php echo $lang['Password'];?></label> <br>
                                  <input type="Password" class="form-control" placeholder="********">
                </div>

                <div class="col-md-4">
                  <label><?php echo $lang['Confirm_Password'];?></label> <br>
                                  <input type="Password" class="form-control" placeholder="*******">
                </div>
                                  </div> -->
            </div>

            <!--             <div class="form-group">
              <div class="row">
              

                <div class="col-md-4">
                  <label><?php echo $lang['lang'];?></label> <br>
                              
                </div>
              </div>
            </div> -->
            <br>

            <div class="form-group">
              <label><?php echo $lang['Description'];?>:</label> <br>
              <textarea name="des" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="des elastic form-control"><?=$row['des']?></textarea>
            </div>

        </div>

      </div>
      <div class="modal-footer">

        <input class="zz" type="hidden" value="<?=$_GET['id']?>" name="id">
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>

    </div>
  </div>

  <!--/ DataTable with Buttons -->
  <br>
  <br>

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

<script type="text/javascript">
  /*
   * jQuery File Upload Demo
   * https://github.com/blueimp/jQuery-File-Upload
   *
   * Copyright 2010, Sebastian Tschan
   * https://blueimp.net
   *
   * Licensed under the MIT license:
   * https://opensource.org/licenses/MIT
   */
  /* global $ */
  $(function() {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
      // Uncomment the following to send cross-domain cookies:
      //xhrFields: {withCredentials: true},
      url: 'inc/fun/customer/upload.php?id=<?=$_GET["id"]?>'
    });
    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
      'option',
      'redirect',
      window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
    );
    if (window.location.hostname === 'blueimp.github.io') {
      // Demo settings:
      $('#fileupload').fileupload('option', {
        url: '//jquery-file-upload.appspot.com/',
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/.test(
          window.navigator.userAgent
        ),
        maxFileSize: 999000,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
      });
      // Upload server status check for browsers with CORS support:
      if ($.support.cors) {
        $.ajax({
          url: '//jquery-file-upload.appspot.com/',
          type: 'HEAD'
        }).fail(function() {
          $('<div class="alert alert-danger"></div>')
            .text('Upload server currently unavailable - ' + new Date())
            .appendTo('#fileupload');
        });
      }
    } else {
      // Load existing files:
      $('#fileupload').addClass('fileupload-processing');
      $.ajax({
          // Uncomment the following to send cross-domain cookies:
          //xhrFields: {withCredentials: true},
          url: $('#fileupload').fileupload('option', 'url'),
          context: $('#fileupload')[0]
        })
        .always(function() {
          $(this).removeClass('fileupload-processing');
        })
        .done(function(result) {
          $(this)
            .fileupload('option', 'done')
            // eslint-disable-next-line new-cap
            .call(this, $.Event('done'), {
              result: result
            });
        });
    }
  });
  $(".bt1").click(function() {
    $(".show1").show();
    $(".show2").hide();
    $(".row1").html('');
  });
  $(".bt2").click(function() {
    $(".show2").show();
    $(".show1").hide();
    $(".row1").append('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" >');
  });
  var n = < ? = $_GET['n'] ?? 0 ? > ;
  if (n == 1) {
    $(".show2").show();
    $(".show1").hide();
    $(".row1").append('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" >');
  }
</script>