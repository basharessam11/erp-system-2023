         <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row g-4 mb-4">

             <div class="card">
               <div class="card-header border-bottom">
                 <h5 class="card-title" style="float:left;"><?php echo $lang['Customer_List'];?> </h5>

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
 <center> ﻫﺬا البريد  الالكتروني ﻣﻮﺟﻮﺩﻩ ﺑﺎﻟﻔﻌﻞ </center>
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
                 <div class="col-sm-12 col-md-6">
                   <div class="dataTables_length" id="DataTables_Table_1_length">

                     <label> <?php echo $lang['SEARCH'];?><input type="search" id="myInput" class="search form-control" value="<?=$_GET['search']?>" placeholder="" aria-controls="DataTables_Table_1"></label>

                   </div>
                 </div>
                 <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                   <div id="DataTables_Table_1_filter" class="dataTables_filter">
                     <br>
                     <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal1">
                       <?php echo $lang['Add'];?>
                     </button>
                     <br><br>
                     <button type="button" style="display: none;width: 165px; " class="de btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal2">
                       <?=$lang['DELETE1']?>
                     </button>
                   </div>
                 </div>
               </div>

               <br>
               <div class="kk">
                 <table width="10%" class="datatables-basic  table table-bordered">
                   <thead>
                     <tr>
                       <th style="padding: .625rem 0.25rem;">
                         <center><input class="mat1 form-check-input" onclick="data1()" type="checkbox" name=""></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center>#</center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['NAME'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Email'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?php echo $lang['Phone'];?></center>
                       </th>
                       <th style="padding: .625rem 0.25rem;">
                         <center><?=$lang['EDIT']?></center>
                       </th>
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
  
  $sql->selectall("customer where  name LIKE '$search%'   limit 10 offset  $id");
  }else{
   
  $page=$_GET['page']-1;
  $id=0;
  for ($i=1; $i <=$page ; $i++) { 
   $id=$id+10;
  }
    $sql->selectall("customer ORDER BY name limit 10 offset  $id ");
  }
  
  
          
 
     $x=$id+1;
     while ($row = $sql->res->fetch_assoc()) {
     $customer1=$row["name"];
      ?>
                     <tr>
                       <td style="padding: .625rem 0.25rem;">
                         <center><input value="<?=$row["id"]?>" class="mat form-check-input" onclick="data()" type="checkbox" name=""></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$x++?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["name"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["email"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center><?=$row["phone"]?></center>
                       </td>
                       <td style="padding: .625rem 0.25rem;">
                         <center>

                           <a href="?customer_p=list&id=<?=$row["id"]?>">
                             <button type="button" class="id btn btn-primary">
                               <i class='bx bxs-edit'></i>

                             </button></a>
                           <a href="?view_cust=list&id=<?=$row["id"]?>"> <button type="button" class="id btn btn-success" name="<?=$row["name"]?>" city="<?=$row["city"]?>" fax="<?=$row["fax"]?>" group1="<?=$row["group1"]?>" phone="<?=$row["phone"]?>" email="<?=$row["email"]?>" type_c="<?=$row["type_c"]?>" address="<?=$row["address"]?>" region="<?=$row["region"]?>" currency="<?=$row["currency"]?>" des="<?=$row["des"]?>" zip="<?=$row["zip"]?>" besho="<?=$row["id"]?>">
                               <i class='bx bxs-show'></i>

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
    if (isset($_GET['search'])) {
              $search=$_GET['search'];
              $sql->selectall("customer  where  name LIKE '$search%' ");
              $num=$sql->res->num_rows;
              $n=ceil($num/10+1);
    }else{
      $sql->check('customer',["1"=>1]);
       $n=ceil($sql->check/10+1) ;
    }
       

             if (!isset($_GET['page'])) {
            $page=$_GET['page']=1;
             }else{$page=$_GET['page'];}
             
             $pp=$page-1;
             if($page!=1){
              if (isset($_GET['search'])) {
                 echo '<li class="page-item "><a class="page-link" href="?customers=list&search='.$search.'&page='.$pp.'" tabindex="">Previous</a></li>';
              }else{
                 echo '<li class="page-item "><a class="page-link" href="?customers=list&page='.$pp.'" tabindex="">Previous</a></li>';
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
                  echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&search='.$search.'&page='.$i.'">'.$i.'</a></li>';
              }else{
                echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&page='.$i.'">'.$i.'</a></li>';              }

                 
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
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&search='.$_GET['search'].'&page='.$i.'">'.$i.'</a></li>';
                    }else{
                      echo'<li class="page-item '.$a.'"><a class="page-link" href="?customers=list&page='.$i.'">'.$i.'</a></li>';
                    }
                  
                }
            }
              }
              $page=$_GET['page']+1;
              $hi=$n-1;

              if ($hi>1) {
                 if ($page!=$i) {
                  if (isset($_GET['search'])) {
                    echo '<a class="page-link" href="?customers=list&search='.$_GET['search'].'&page='.$page.'">Next</a>';
                  }else{
                    echo '<a class="page-link" href="?customers=list&page='.$page.'">Next</a>';
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
               $.post('inc/fun/customer/select.php', {
                 search: value
               }, function(data) {
                 $(".kk").html(data)
               });
             });
           });
         </script>

         <!-- groub view -->
         <div class="modal fade" id="basicModal4" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"> <?php echo $lang['View'];?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=" <?php echo $lang['Close'];?>"></button>
               </div>
               <div class="modal-body">
                 <div class="row">

                   <br>
                   <div class="form-group">
                     <div class="row">

                       <div class="col-md-4">
                         <label><?php echo $lang['NAME'];?></label> <br>
                         <input disabled type="text" name="name" class="name form-control" placeholder="<?php echo $lang['NAME'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Custmer_Type'];?></label>

                         <select disabled data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="type_c form-select" tabindex="2" name="type">
                           <option value="1">عميل</option>
                           <option value="2">مورد</option>

                         </select>
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Email'];?></label> <br>
                         <input disabled type="email" class="email form-control" name="email" placeholder="your@email.com">
                       </div>

                     </div>
                   </div>
                   <br>
                   <div class="form-group">
                     <div class="row">

                       <div class="col-md-4">
                         <label><?php echo $lang['Phone'];?></label> <br>
                         <input disabled type="text" name="phone" class="phone form-control" placeholder="<?php echo $lang['Phone'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Fax'];?></label> <br>
                         <input disabled type="text" name="fax" class="fax form-control" placeholder="<?php echo $lang['Fax'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Group'];?></label> <br>
                         <select disabled name="group" data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="group1 form-select" tabindex="2">
                           <?php

                                       $sql->selectall("group1");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                           <option value="<?=$row['id']?>"><?=$row['name']?></option>
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
                         <input disabled type="text" name="address" class="address form-control" placeholder="<?php echo $lang['Address'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['City'];?></label> <br>
                         <input disabled type="text" name="city" class="city form-control" placeholder="<?php echo $lang['City'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Region'];?></label> <br>
                         <input disabled type="text" class="region form-control" name="region" placeholder="<?php echo $lang['Region'];?>">
                       </div>
                     </div>
                   </div>
                   <br>
                   <div class="form-group">
                     <div class="row">

                       <div class="col-md-4">
                         <label><?php echo $lang['Postal'];?></label> <br>
                         <input disabled type="text" name="zip" class="zip form-control" placeholder="<?php echo $lang['Postal'];?>">
                       </div>

                       <div class="col-md-4">
                         <label><?php echo $lang['Currency'];?></label> <br>
                         <select disabled data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="currency form-select" name="currency" tabindex="2">
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
                     <textarea disabled name="des" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="des elastic form-control"></textarea>
                   </div>

                 </div>

               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
               </div>
             </div>
           </div>
         </div>

         <!-- groub update -->
         <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1">edit customer</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/customer/update.php" enctype="multipart/form-data">
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['NAME'];?></label> <br>
                           <input type="text" name="name" class="name form-control" placeholder="<?php echo $lang['NAME'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Custmer_Type'];?></label>

                           <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="type_c form-select" tabindex="2" name="type">
                             <option value="1">عميل</option>
                             <option value="2">مورد</option>

                           </select>
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Email'];?></label> <br>
                           <input type="email" class="email form-control" name="email" placeholder="your@email.com">
                         </div>

                       </div>
                     </div>
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['Phone'];?></label> <br>
                           <input type="text" name="phone" class="phone form-control" placeholder="<?php echo $lang['Phone'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Fax'];?></label> <br>
                           <input type="text" name="fax" class="fax form-control" placeholder="<?php echo $lang['Fax'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Group'];?></label> <br>
                           <select name="group" data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="group1 form-select" tabindex="2">
                             <?php

                                       $sql->selectall("group1");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                             <option value="<?=$row['id']?>"><?=$row['name']?></option>
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
                           <input type="text" name="address" class="address form-control" placeholder="Address">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['City'];?></label> <br>
                           <input type="text" name="city" class="city form-control" placeholder="City">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Region'];?></label> <br>
                           <input type="text" class="region form-control" name="region" placeholder="<?php echo $lang['Region'];?>">
                         </div>
                       </div>
                     </div>
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['Postal'];?></label> <br>
                           <input type="text" name="zip" class="zip form-control" placeholder="echo $lang['Postal'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Currency'];?></label> <br>
                           <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="currency form-select" name="currency" tabindex="2">
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
                       <textarea name="des" rows="5" cols="5" placeholder="If you want to add any info, do it here." class="des elastic form-control"></textarea>
                     </div>

                 </div>

               </div>
               <input class="zz" type="hidden" name="id">

               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-primary"><?=$lang['Save']?></button>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <script>
           $(".id").click(function() {
             var name = $(this).attr('name');
             var type_c = $(this).attr('type_c');
             var fax = $(this).attr('fax');
             var zip = $(this).attr('zip');
             var group1 = $(this).attr('group1');
             var phone = $(this).attr('phone');
             var email = $(this).attr('email');
             var city = $(this).attr('city');
             var address = $(this).attr('address');
             var region = $(this).attr('region');
             var currency = $(this).attr('currency');
             var des = $(this).attr('des');
             var id = $(this).attr('besho');
             $('.zz').val(id);
             $(".name").val(name);
             $(".type_c").val(type_c);
             $(".fax").val(fax);
             $(".zip").val(zip);
             $(".group1").val(group1);
             $(".phone").val(phone);
             $(".email").val(email);
             $(".city").val(city);
             $(".address").val(address);
             $(".region").val(region);
             $(".currency").val(currency);
             $(".des").html(des);
           })
         </script>
         <!-- updat -->

         <!-- group insert -->
         <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog" style="max-width: 70rem" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel1"> <?=$lang['Customer']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/customer/insert.php" enctype="multipart/form-data">
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['NAME'];?></label> <br>
                           <input type="text" name="name" class="form-control" placeholder="<?php echo $lang['NAME'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Custmer_Type'];?></label>

                           <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="form-select" tabindex="2" name="type">
                             <option value="1">عميل</option>
                             <option value="2">مورد</option>

                           </select>
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Email'];?></label> <br>
                           <input type="email" class="form-control" name="email" placeholder="your@email.com">
                         </div>

                       </div>
                     </div>
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['Phone'];?></label> <br>
                           <input type="text" name="phone" class="form-control" placeholder="<?php echo $lang['Phone'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Fax'];?></label> <br>
                           <input type="text" name="fax" class="form-control" placeholder="<?php echo $lang['Fax'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Group'];?></label> <br>
                           <select name="group" data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="form-select" tabindex="2">
                             <?php

                                       $sql->selectall("group1");
                                       while($row=$sql->res->fetch_assoc())
                                        {2
                                       ?>
                             <option value="<?=$row['id']?>"><?=$row['name']?></option>
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
                           <input type="text" name="address" class="form-control" placeholder="<?php echo $lang['Address'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['City'];?></label> <br>
                           <input type="text" name="city" class="form-control" placeholder="<?php echo $lang['City'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Region'];?></label> <br>
                           <input type="text" class="form-control" name="region" placeholder="<?php echo $lang['Region'];?>">
                         </div>
                       </div>
                     </div>
                     <br>
                     <div class="form-group">
                       <div class="row">

                         <div class="col-md-4">
                           <label><?php echo $lang['Postal'];?></label> <br>
                           <input type="text" name="zip" class="form-control" placeholder="<?php echo $lang['Postal'];?>">
                         </div>

                         <div class="col-md-4">
                           <label><?php echo $lang['Currency'];?></label> <br>
                           <select data-placeholder="<?php echo $lang['Custmer_Type'];?>" class="form-select" name="currency" tabindex="2">
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
                       <label><?php echo $lang['Description'];?></label> <br>
                       <textarea name="des" rows="5" cols="5" placeholder=" <?php echo $lang['If_you'];?>" class="elastic form-control"></textarea>
                     </div>

                 </div>

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal"><?=$lang['Close']?></button>
                 <button type="submit" class="btn btn-primary"><?=$lang['Save']?></button>
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
                 <h5 class="modal-title" id="exampleModalLabel1"><?=$lang['DELETE1']?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <form method="post" action="inc/fun/customer/delete.php">
                     <div id="name" class=" col mb-3">

                       <?php echo $lang['Are_you'];?>

                     </div>
                     <input class="val" type="hidden" name="id">
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
           function data() {
             var customer = get_filter('mat');
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
             var customer = get_filter('mat');

             function get_filter(class_name) {
               var filter = [];
               $('.' + class_name + ':checked').each(function() {
                 filter.push($(this).val())
               })
               $(".val").val(filter)
               $(".de").show()
             }
           }
           $(document).ready(function() {
             $(".ar").attr("href", "inc/des/lang.php?lang=ar&page='customers=list'");
             $(".en").attr("href", "inc/des/lang.php?lang=en&page='customers=list'");
           });
         </script>