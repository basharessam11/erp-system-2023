<?php
include"../../sql.php";
  $id=filter_var($_POST['id'], FILTER_SANITIZE_STRING);



if (empty($id)) {
header("location:../../../index.php?exp=list&delete2=no");
}else{
$a=explode(",", $id);
$b= implode(" or id = ", $a);	



$sql->select1("transaction"," where trans_id=$b");
        while($row1=$sql->res1->fetch_assoc())
                {
            $dr=$row1['dr'];
            $cr=$row1['cr'];

            $account_id=$row1['account_id'];
if ($dr !=0) {

	$sql->select2("account_no"," where id=$account_id");
        while($row2=$sql->res2->fetch_assoc())
                {
            $balance=$row2['balance']-$dr;
      

$sql->update('account_no',$account_id,["balance"=>"$balance"]);
                   }

}else{
	$sql->select2("account_no"," where id=$account_id");
        while($row2=$sql->res2->fetch_assoc())
                {
            $balance=$row2['balance']+$cr;
      	$sql->update('account_no',$account_id,["balance"=>"$balance"]);

                   }


}

            
         

                   }

for ($i=0; $i <= count($a)-1 ; $i++) { 


	$bb=$a[$i];

$sql->delete1("transaction","where trans_id=$bb");

}
$sql->delete("trans",$b);
$a=filter_var($_POST['a'], FILTER_VALIDATE_INT);
if ($a==1) {
	 header("location:../../../index.php?gl=list&delete1=su");
	}elseif($a==2){
		 header("location:../../../index.php?exp=list&delete1=su");
	}elseif($a==3){
		 header("location:../../../index.php?incaming=list&delete1=su");
	}


}
