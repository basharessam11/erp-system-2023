
<?php

include"../../sql.php";
$emp_id=filter_var($_POST['emp_id'], FILTER_VALIDATE_INT);


$date=filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$amount=filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

$price_a=filter_var($_POST['price_a'], FILTER_VALIDATE_FLOAT);

$num=filter_var($_POST['num'], FILTER_VALIDATE_INT);

$date_start=filter_var($_POST['date_start'], FILTER_SANITIZE_STRING);
$account_no=filter_var($_POST['account_no'], FILTER_VALIDATE_FLOAT);

$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);



 $sql->select1("emp_profile"," where id=$emp_id");
        while($row1=$sql->res1->fetch_assoc())
                {
            $name=$row1['name'];
      
                   }




	$sql->insert('trans',["name"=>"$des","currency_id"=>1,"t_type"=>"1","date2"=>"$date"]);

 $sql->select1("trans"," order by id desc  limit 1");
        while($row1=$sql->res1->fetch_assoc())
                {
            $trans_id=$row1['id'];
         
                   }
 $sql->select1("account_no"," where id=78");
        while($row1=$sql->res1->fetch_assoc())
                {
            $balance=$row1['balance']+$amount;
         $balancev=$row1['balance'];
                   }
$sql->update('account_no',78,["balance"=>$balance]);

$sql->insert('transaction',["dr"=>$amount,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>78,"des"=>$des,"balance"=>$balancev,"date2"=>"$date"]);



 $sql->select1("account_no"," where id=$account_no");
        while($row1=$sql->res1->fetch_assoc())
                {
          $balance=$row1['balance']-$amount;
         $balancev1=$row1['balance'];
                   }
$sql->update('account_no',$account_no,["balance"=>$balance]);

	$sql->insert('transaction',["dr"=>0,"trans_id"=>$trans_id,"cr"=>$amount,"account_id"=>$account_no,"des"=>$des,"balance"=>$balancev1,"date2"=>"$date"]);



  $sql->insert('salary2',["emp_id"=>"$emp_id","date"=>"$date","trans_id"=>"$trans_id","amount"=>"$amount","price"=>"$price_a","num"=>"$num","p_price"=>"$amount","date_start"=>"$date_start","account_no"=>"$account_no","des"=>"$des","name"=>"$name"]);


                   
header("location:../../../index.php?salary2=list&add=su");



