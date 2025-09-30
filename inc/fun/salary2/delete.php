<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);


if (empty($id)) {
header("location:../../../index.php?salary=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a); 

$sql->select1("salary2"," where id=$b");
        while($row1=$sql->res1->fetch_assoc())
                {
            $amount1=$row1['amount'];
            $account_no=$row1['account_no'];
            $des1=$row1['des'];
           
            $date1=$row1['date'];

           $trans_id=$row1['trans_id'];

          $sql->delete1("transaction","where trans_id=$trans_id");
           $sql->delete("trans",$trans_id);

            $sql->select3("account_no"," where id=78");
        while($row3=$sql->res3->fetch_assoc())
                {
            



            $balance2=$row3['balance'];
        
                   }
         $balance1=$balance2-$amount1;
            $sql->update('account_no',78,["balance"=>"$balance1"]);

            $sql->select3("account_no"," where id=$account_no");
        while($row3=$sql->res3->fetch_assoc())
                {
            



            $balance2=$row3['balance'];
        
                   }
$balance1=$balance2+$amount1;
            $sql->update('account_no',$account_no,["balance"=>"$balance1"]);

                   }


               


$sql->delete("salary2",$b);
header("location:../../../index.php?salary2=list&delete1=su");

}
