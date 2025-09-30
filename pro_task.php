         <div class="container-xxl flex-grow-1 container-p-y">
<div class="row g-4 mb-4">



<div class="card">
  <div class="card-header border-bottom">
<h5 class="card-title" style="float:left;"><?=$lang['Tasks']?></h5>


         
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
              if (isset($_GET['add1'])=='no') {
          echo '<br><br><div id="success-alert1" class="alert alert-danger" role="alert">
 <center>الرجاء ملئ جميع الحقول واعادة المحاولة</center>
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
  <div class="col-sm-12 col-md-6">
    <div class="dataTables_length" id="DataTables_Table_1_length">
      
<label> <?=$lang['SEARCH']?>:<input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>
     


    </div>
  </div>
  <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
    <div id="DataTables_Table_1_filter" class="dataTables_filter">
<br>
       <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1" >
        <?=$lang['Add']?>
          </button>
          <br><br>
    <button type="button" style="display: none;width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2" >
          <?=$lang['DELETE1']?>
          </button>
    </div>
  </div>
</div>





<br>
<div class="kk">
    <table width="10%"  class="datatables-basic  table table-bordered">
      <thead>
        <tr>
          <th style="padding: .625rem 0.25rem;"><center><input   class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center></th>
          <th style="padding: .625rem 0.25rem;"><center>#</center></th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['staget']?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['NAME']?></center> </th>
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['Start_Date']?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['end_Date']?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['manger']?></center> </th>
          <th style="padding: .625rem 0.25rem;"><center><?=$lang['Status']?></center> </th>
       
         <th style="padding: .625rem 0.25rem;"><center><?=$lang['EDIT']?></center> </th>
        </tr>

      </thead>
   <tbody id="myTable">
    <?php

if (isset($_GET['search'])) {
   $search=$_GET['search'];

   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  $stage_id=$_GET['id'];
  $sql->selectall("pro_task where stage_id=$stage_id and name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
  $stage_id=$_GET['id'];
    $sql->selectall("pro_task where stage_id=$stage_id ORDER BY id limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {

      ?>
      <tr >
      <td style="padding: .625rem 0.25rem;"><center><input  value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" ></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?=$x++?></center></td>
      <td style="padding: .625rem 0.25rem;"><center ><?php
      $stage_id=$row["stage_id"];
     $sql->select1("pro_stag"," where id=$stage_id");
while ($row1 = $sql->res1->fetch_assoc()) {
echo $row1['name'];
}



      ?></center></td>
<td style="padding: .625rem 0.25rem;"><center ><?=$row["name"]?></center></td>

      
<td style="padding: .625rem 0.25rem;"><center ><?=$row["start_date"]?></center></td>

      <td style="padding: .625rem 0.25rem;"><center ><?=$row["end_date"]?></center></td>
<td style="padding: .625rem 0.25rem;"><center ><?php
      $user=$row['user_id'];
      $sql->select1("user","where id = $user");
                                       while($row1=$sql->res1->fetch_assoc())
                                        {

echo$row1['name'];

}
                                          ?></center></td>

<td style="padding: .625rem 0.25rem;"><center ><?php
      $status=$row['stat'];
if ($status==1) {
  echo'<div class="alert alert-primary">المراجعة</div>';
}else if ($status==2) {
  echo'<div class="alert alert-primary">قيد التنفيذ</div>';
}else if ($status==3) {
  echo'<div class="alert alert-success">اكتمل</div>';
}
                                          ?>
                                              
                                          </center></td>
                  <td style="padding: .625rem 0.25rem;"><center>
          
         <button type="button" class="id btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"  name="<?=$row["name"]?>" des="<?=$row["des"]?>" start_date_t="<?=$row["start_date"]?>" end_date_t="<?=$row["end_date"]?>" user_id_t="<?=$row["user_id"]?>" status_t="<?=$row["stat"]?>"  besho="<?=$row["id"]?>">
        <i class='bx bxs-edit'></i>

              </button>
            </center></td>

                  
      
     
      
      </tr>
      <?php
     }


      ?>

     </tbody>
    </table>

<div class="dataTables_paginate paging_simple_numbers" >
<br>
<ul class="pagination">
<?php
    if (isset($_GET['search'])) {
              $search=$_GET['search'];
              $sql->selectall("pro_task  where stage_id=$stage_id and name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('pro_task',["stage_id"=>"$stage_id"]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?pro_task=list&id='.$_GET['id'].'&page='.$page.'">Next</a>';
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
  


$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();

    $.post('inc/fun/pro_task/select.php' , {

  
      search : value,
      stage_id :<?=$_GET['id']?>
     

    } , function(data){

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
                  <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['edit_task']?> </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/pro_task/update.php" enctype="multipart/form-data">

<div class="col-md-12"><br>
   <label for="account"><span class="h6">Tasks :</span></label>
                                <table width="10%" class="datatables-basic  table table-bordered">
      <thead>
        <tr>

          <th style="padding: .625rem 0.25rem;"><center>name</center></th>

          <th style="padding: .625rem 0.25rem;"><center>discription</center></th>
     
          <th style="padding: .625rem 0.25rem;"><center>start date</center></th>
          <th style="padding: .625rem 0.25rem;"><center>end date</center></th>
          <th style="padding: .625rem 0.25rem;"><center>user</center></th>
          <th style="padding: .625rem 0.25rem;"><center>status</center></th>
        
          
         
        </tr>

      </thead>
   <tbody class="myTable">

<tr class="a0">
  <td><input class="name form-control" type="text" name="name[]"></td>
  <td><textarea class="des form-control" type="text" name="des[]"></textarea></td>
                                        <td><input class="start_date_t form-control" type="date"  name="start_date_t[]" ></td>
                                        <td><input class="end_date_t form-control" type="date" name="end_date_t[]"></td>
                                        <td><select id="account" name="user_t[]" class="user_id_t user form-select" ><?php

                                       $sql->selectall("user order by name");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                        <?php

                                      }
                                        ?> </select></td>
                                        <td><select id="account" name="status_t[]" class="status_t form-select" >

                                        <option value="1">المراجعة</option> 
                                        <option value="2">قيد التنفيذ</option> 
                                        <option value="3">اكتمل</option> 
                                      </select></td>
                                     
                                      </tr>

                                     <div style="display: none" class="stag">
                                     <?php

                                       $sql->selectall("pro_stag");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                        <?php

                                      }
                                        ?> 
                                    </div>

                                   



    





     </tbody>
     <tbody>
    </tbody></table>
   
    </div>




            


                 </div>
                 
                </div>
<input  type="hidden" value="<?=$_GET['id']?>" name="stage_id">
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
  $(".id").click(function(){
      var name=$(this).attr('name'); 
      var des=$(this).attr('des'); 
      var start_date_t=$(this).attr('start_date_t'); 
      var end_date_t=$(this).attr('end_date_t'); 
      var status_t=$(this).attr('status_t'); 
      var user_id_t=$(this).attr('user_id_t'); 

 
      var id=$(this).attr('besho');

      $('.zz').val(id);
      $(".name").val(name);
      $(".des").val(des);
      $(".start_date_t").val(start_date_t);
      $(".end_date_t").val(end_date_t);
      $(".status_t").val(status_t);
      $(".user_id_t").val(user_id_t);
    
   
      
  })
</script>




      <!-- group insert -->
          <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 70rem" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['add_task']?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/pro_task/insert.php" enctype="multipart/form-data">
                             <div class="col-md-12"><br>
   <label for="account"><span class="h6">Tasks :</span></label>
                                <table width="10%" class="datatables-basic  table table-bordered">
      <thead>
        <tr>

          <th style="padding: .625rem 0.25rem;"><center>name</center></th>

          <th style="padding: .625rem 0.25rem;"><center>discription</center></th>
     
          <th style="padding: .625rem 0.25rem;"><center>start date</center></th>
          <th style="padding: .625rem 0.25rem;"><center>end date</center></th>
          <th style="padding: .625rem 0.25rem;"><center>user</center></th>
          <th style="padding: .625rem 0.25rem;"><center>status</center></th>
          <th style="padding: .625rem 0.25rem;"><center>delete</center></th>
          
         
        </tr>

      </thead>
   <tbody class="myTable">

<tr class="a0">
  <td><input class="form-control" type="text" name="name[]"></td>
  <td><textarea class="form-control" type="text" name="des[]"></textarea></td>
                                        <td><input class="form-control" type="date"  name="start_date_t[]" value="<?=date("Y-m-d")?>"></td>
                                        <td><input class="form-control" type="date" name="end_date_t[]"></td>
                                        <td><select id="account" name="user_t[]" class="user form-select" ><?php

                                       $sql->selectall("user order by name");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                        <?php

                                      }
                                        ?> </select></td>
                                        <td><select id="account" name="status_t[]" class="form-select" >

                                        <option value="1">المراجعة</option> 
                                        <option value="2">قيد التنفيذ</option> 
                                        <option value="3">اكتمل</option> 
                                      </select></td>
                                        <td style="padding: .625rem 0.25rem;"><center><button type="button" style="float:left;" onclick="del(0)" class="del  btn btn-danger" de="0" ce="0" a="a0"><i class="bx bxs-trash-alt"></i></button></center></td>
                                      </tr>

                                     <div style="display: none" class="stag">
                                     <?php

                                       $sql->selectall("pro_stag");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                                        <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                        <?php

                                      }
                                        ?> 
                                    </div>

                                   

  </script> <script type="text/javascript">
   var x=1;
function add(){

  var n=x++;
var user=$(".user").html();
var stag=$(".stag").html();

$(".myTable").append('<tr class="a'+n+'"><td><input class="form-control" type="text" name="name[]"></td><td><textarea class="form-control" type="text" name="des[]"></textarea></td><td><input class="form-control" type="date" value="<?=date("Y-m-d")?>"  name="start_date_t[]"></td><td><input class="form-control" type="date" name="end_date_t[]"></td><td><select id="account" name="user_t[]" class="form-select" >'+user+'</select></td><td><select id="account" name="status_t[]" class="form-select" ><option value="1">المراجعة</option><option value="2">قيد التنفيذ</option><option value="3">اكتمل</option></select></td><td style="padding: .625rem 0.25rem;"><center><button type="button" style="float:left;" onclick="del('+n+')" class="del  btn btn-danger" de="0" ce="0" a="a'+n+'"><i class="bx bxs-trash-alt"></i></button></center></td></tr>');


                   
                  

 
}

function del(n){

$(".a"+n).remove()

}

</script>

    





     </tbody>
     <tbody><tr class="ss">
  <td colspan="7"> <div class="col mb-3">
                                <label for="account"><span class="h6"></span></label>
                                <button type="button" style="width: 100%" onclick="add()" class="add btn btn-success">
        Add </button>
                               
                               </div></td>
  
</tr>
    </tbody></table>
   
    </div>
                              

                     

            


                 </div>
                 
                </div>
                <div class="modal-footer">
                  <input  type="hidden" value="<?=$_GET['id']?>" name="stage_id">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"> <?=$lang['Close']?></button>
                  <button type="submit" class="btn btn-primary"> <?=$lang['Save']?></button>
</form>
                </div>
              </div>
            </div>
          </div>


 <!-- group delete -->
          <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['DELETE1']?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
<form method="post" action="inc/fun/pro_task/delete.php">
                    <div id="name" class=" col mb-3">
                        
                        Are you sure to delete these items?
                      
                    </div>
                    <input class="val" type="hidden" name="id">
                    <input  type="hidden" value="<?=$_GET['id']?>" name="stage_id">
                  </div>
                 
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                  <button type="submit" class="btn btn-danger"><?=$lang['DELETE1']?></button>
</form>
                </div>
              </div>
            </div>
          </div>
                                       <script>
      
  function data(){
  var pro_task= get_filter('mat');
  var check=get_filter('mat')


  function get_filter(class_name){
    var filter=[];

    $('.'+class_name+':checked').each(function(){
      filter.push($(this).val())

    })


    $(".val").val(filter)

  $(".de").show()


  }
}
  

function data1(){

if ($('.mat').attr('checked')) {
  $(".mat").removeAttr('checked')

} else {

  $(".mat").attr('checked', '');
}



  var pro_task= get_filter('mat');



  function get_filter(class_name){
    var filter=[];

    $('.'+class_name+':checked').each(function(){
      filter.push($(this).val())
    })
    $(".val").val(filter)

  $(".de").show()


  }

  
}



                  
                 </script>
