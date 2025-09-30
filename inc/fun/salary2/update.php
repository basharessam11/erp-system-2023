
<?php

include"../../sql.php";
$id=filter_var($_POST['id'], FILTER_VALIDATE_INT);

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



$sql->select1("salary2"," where id=$id");
        while($row1=$sql->res1->fetch_assoc())
                {
            $amount1=$row1['amount'];
            $des1=$row1['des'];
            $account_no1=$row1['account_no'];
           
            $date1=$row1['date'];
 $trans_id=$row1['trans_id'];



 $sql->select2("account_no"," where id=$account_no1");
        while($row2=$sql->res2->fetch_assoc())
                {
          $balance=$row2['balance']+$amount1;
         
                   }
$sql->update('account_no',$account_no1,["balance"=>$balance]);
                   }




	$sql->update('trans',$trans_id,["name"=>"$des","date2"=>"$date"]);

 
 
 
 $sql->select1("account_no"," where id=78");
        while($row1=$sql->res1->fetch_assoc())
                {
            



            $balance2=$row1['balance'];
        
                   }

$balance1=$balance2-$amount1;
            $sql->update('account_no',78,["balance"=>$balance1]);

$balance=$balance1+$amount;

 $sql->update('account_no',78,["balance"=>$balance]);

	$sql->update('salary2',$id,["emp_id"=>"$emp_id","date"=>"$date","price"=>"$price_a","num"=>"$num","date_start"=>"$date_start","account_no"=>"$account_no","des"=>"$des"]);



$sql->delete1("transaction","where trans_id=$trans_id");

$sql->insert('transaction',["dr"=>$amount,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>78,"des"=>$des,"balance"=>$balance,"date2"=>"$date"]);

 $sql->select1("account_no"," where id=$account_no");
        while($row1=$sql->res1->fetch_assoc())
                {
          $balance=$row1['balance']-$amount;
         $balancev1=$row1['balance'];
                   }
$sql->update('account_no',$account_no,["balance"=>$balance]);

	$sql->insert('transaction',["dr"=>0,"trans_id"=>$trans_id,"cr"=>$amount,"account_id"=>$account_no,"des"=>$des,"balance"=>$balancev1,"date2"=>"$date"]);


                   
header("location:../../../index.php?salary2=list&add=su");



