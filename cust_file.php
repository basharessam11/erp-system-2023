      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">

          <div class="card">
            <div class="card-header border-bottom">
              <h5 class="card-title" style="float:left;"><?=$lang['MENU_PROFILES']?> </h5>

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
            <!-- <div class="row">
<div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
    <div id="DataTables_Table_1_filter" class="dataTables_filter">
<br>

    </div>
  </div>
  <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
    <div id="DataTables_Table_1_filter" class="dataTables_filter">
<br>

    <button type="button" style="width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2" >
          <?=$lang['DELETE']?>
          </button>
    </div>
  </div>
</div>
 -->

            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="inc/fun/customer/insert_file.php?id=<?=$_GET["id"]?>" method="POST" enctype="multipart/form-data">
              <!-- Redirect browsers with JavaScript disabled to the origin page -->
              <noscript><input btype="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/" /></noscript>
              <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
              <div class="row fileupload-buttonbar">
                <div class="col-lg-7">
                  <!-- The fileinput-button span is used to style the file input field as button -->
                  <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="file[]" multiple />
                    <input type="hidden" value="<?=$_GET['id']?>" name="id">
                  </span>
                  <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                  </button>
                  <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                  </button>

                  <span class="fileupload-process"></span>
                </div>
                <!-- The global progress state -->
                <div class="col-lg-5 fileupload-progress fade">
                  <!-- The global progress bar -->
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                  </div>
                  <!-- The extended global progress state -->
                  <div class="progress-extended">&nbsp;</div>
                </div>
              </div>
              <!-- The table listing the files available for upload/download -->
              <table role="presentation" class="table table-striped">
                <tbody class="files"></tbody>
              </table>
            </form>

            <!-- The blueimp Gallery widget -->
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" aria-label="image gallery" aria-modal="true" role="dialog" data-filter=":even">
              <div class="slides" aria-live="polite"></div>
              <h3 class="title"></h3>
              <a class="prev" aria-controls="blueimp-gallery" aria-label="previous slide" aria-keyshortcuts="ArrowLeft"></a>
              <a class="next" aria-controls="blueimp-gallery" aria-label="next slide" aria-keyshortcuts="ArrowRight"></a>
              <a class="close" aria-controls="blueimp-gallery" aria-label="close" aria-keyshortcuts="Escape"></a>
              <a class="play-pause" aria-controls="blueimp-gallery" aria-label="play slideshow" aria-keyshortcuts="Space" aria-pressed="false" role="button"></a>
              <ol class="indicator"></ol>
            </div>

            <br>
            <div class="kk">
              <table width="10%" class="datatables-basic  table table-bordered">
                <thead>
                  <tr>

                    <th style="padding: .625rem 0.25rem;">
                      <center>#</center>
                    </th>
                    <th style="padding: .625rem 0.25rem;">
                      <center>file</center>
                    </th>

                    <th style="padding: .625rem 0.25rem;">
                      <center>delete</center>
                    </th>
                  </tr>

                </thead>
                <tbody id="myTable">
                  <?php


  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  $emp_id=$_GET['id'];
    $sql->selectall("file where emp_id=$emp_id ORDER BY id limit 10 offset  $id ");
  
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     
      ?>
                  <tr>

                    <td style="padding: .625rem 0.25rem;">
                      <center><?=$x++?></center>
                    </td>
                    <td style="padding: .625rem 0.25rem;">
                      <center><?php

$type=strtolower(pathinfo($row["file"],PATHINFO_EXTENSION));
if ($type=='jpg'or $type=='JPG'or $type=='PNG'or $type=='png'or $type=='JPEG'or $type=='jpeg') {
 ?>
                        <a target="_blank" href="inc/fun/customer/file/<?=$row["file"]?>"><img style="width: 10% ; height: auto" src="inc/fun/customer/file/<?=$row["file"]?>"></a>
                        <?php
}else{
  ?>
                        <a target="_blank" href="inc/fun/customer/file/<?=$row["file"]?>"><i style="font-size:5.15rem" class='bx bxs-file-pdf'></i></a>
                        <iframe src="inc/fun/customer/file/<?=$row["file"]?>" frameBorder="0" scrolling="auto" height="100%" width="100%"></iframe>

                        <?php
}

      ?>
                      </center>
                    </td>

                    <td style="padding: .625rem 0.25rem;">
                      <center>
                        <a href="inc/fun/customer/delete_file.php?id=<?=$row['id']?>">
                          <button type="button" class="id btn btn-danger">
                            <i class='bx bxs-trash-alt'></i>

                          </button></a>
                      </center>
                    </td>

                  </tr>
                  <?php
     }


      ?>

                </tbody>
              </table>

              <div class="dataTables_paginate paging_simple_numbers">
                <br>
                <ul class="pagination">
                  <?php

      $sql->check('file',["1"=>1]);
       $n=ceil($sql->check/10+1) ;
    
      

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&page='.$pp.'" tabindex="">Previous</a></li>';
              }
                 
                }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Previous</a>
                         </li>' ;
              }


              $get=$_GET['page']-5;
              if ($get<0) {
               $get=1;
              }

                           for ($i=$get; $i <$_GET['page'] ; $i++) { 


                    if ($n!=0) {

                    if ($_GET['page']==$i) {
                     $a="active";
                    }else{
                      $a="";
                    } 
                     if (isset($_GET['search'])) {
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';              }

                 
                }
                          } 


              for ($i=$_GET['page']; $i <$n ; $i++ ) { 




                  if ($i<=$_GET['page']+5) {

                    if ($n!=0) {

                    if ($_GET['page']==$i) {
                     $a="active";
                    }else{
                      $a="";
                    }
                    if (isset($_GET['search'])) {
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?cust_file=list&id='.$_GET['id'].'&page='.$page.'">Next</a>';
                  }
                
              }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
              }

            ?>
                </ul>
              </div>
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
            $.post('inc/fun/file/select.php', {
              search: value
            }, function(data) {
              $(".kk").html(data)
            });
          });
        });
      </script>

      <!-- groub update -->
      <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 70rem" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['Group']?> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <form method="post" action="inc/fun/file/update.php" enctype="multipart/form-data">

                  <div class="col mb-3">
                    <label for="nameBasic" class="form-label"><?=$lang['NAME']?> </label>
                    <input type="text" id="nameBasic" class="name form-control" name="name" required="" placeholder="<?=$lang['NAME']?> ">

                  </div>

              </div>

            </div>

            <input class="zz" type="hidden" name="id">

            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- updat -->
      <script>
        $(".id").click(function() {
          var name = $(this).attr('name');
          var id = $(this).attr('besho');
          $('.zz').val(id);
          $(".name").val(name);
        })
      </script>

      <!-- group insert -->
      <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 70rem" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['New_Group']?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"> <?=$lang['Close']?></button>
              <button type="submit" class="btn btn-primary"> <?=$lang['Save']?></button>

            </div>
          </div>
        </div>
      </div>

      <!-- group delete -->
      <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['Delete']?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <form method="post" action="inc/fun/file/delete.php">
                  <div id="name" class=" col mb-3">

                    Are you sure to delete these items?

                  </div>
                  <input class="val" type="hidden" name="id">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
              <button type="submit" class="btn btn-danger"><?=$lang['Delete']?></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
        function data() {
          var file = get_filter('mat');
          var check = get_filter('mat')

          function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
              filter.push($(this).val())
            })
            $(".val").val(filter)
            $(".de").show()
          }
        }

        function data1() {
          if ($('.mat').attr('checked')) {
            $(".mat").removeAttr('checked')
          } else {
            $(".mat").attr('checked', '');
          }
          var file = get_filter('mat');

          function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
              filter.push($(this).val())
            })
            $(".val").val(filter)
            $(".de").show()
          }
        }
      </script>

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
      </script>