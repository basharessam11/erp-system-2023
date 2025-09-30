<?php

include"../../sql.php";



// error_reporting(0);
$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$start_date=filter_var($_POST['start_date'], FILTER_SANITIZE_STRING);
$sale_date=filter_var($_POST['sale_date'], FILTER_SANITIZE_STRING);
$account_c3=filter_var($_POST['account_c3'], FILTER_VALIDATE_INT);
$exp=filter_var($_POST['exp'], FILTER_VALIDATE_INT);
$user_id=filter_var($_POST['user_id'], FILTER_VALIDATE_INT);
$branch=filter_var($_POST['branch'], FILTER_VALIDATE_INT);
$des=filter_var($_POST['des'], FILTER_SANITIZE_STRING);
$price=filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
$account_no=filter_var($_POST['account_no'], FILTER_VALIDATE_INT);
$tax1=filter_var($_POST['tax1'], FILTER_VALIDATE_INT);
$tax2=filter_var($_POST['tax2'], FILTER_VALIDATE_INT);
$currency=filter_var($_POST['currency'], FILTER_VALIDATE_INT);



$sql->check("assets",["name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?assets=list&name=no");
}else{

	$sql->check("account_no",["account_name"=>"$name"]);
if ($sql->check>0) {
	header("location:../../../index.php?assets=list&name=no");
}else{

		$sql->select1("account_c3","where id=$account_c3");

     while ($row1 = $sql->res1->fetch_assoc()) {
$account_c2=$row1['c2'];


     }

	$sql->insert('account_no',["account_name"=>"$name","account_c2"=>"$account_c2","account_c3"=>"$account_c3","balance"=>"$price","currency"=>"$currency","dr"=>1]);


		$sql->select1("account_no","where account_name='$name' and account_c2=$account_c2 and account_c3=$account_c3");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$to=$row1['id'];


    	 }


    	 		
	$sql->insert('assets',["name"=>"$name","account_no"=>"$to","sale_date"=>"$sale_date","start_date"=>"$start_date","account_c3"=>"$account_c3","exp"=>"$exp","user_id"=>"$user_id","des"=>"$des","price"=>"$price","branch"=>"$branch" ,"currency"=>"$currency", "tax1"=>"$tax1","tax2"=>"$tax2"]);

$sql->insert('trans',["name"=>"$name","currency_id"=>"$currency","t_type"=>1,"ref"=>00000,"date2"=>"$sale_date"]);

	$sql->select1("trans","where name='$name'");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$trans_id=$row1['id'];

    	 }

if ($tax1==0 and $tax2==0) { 


	$sql->insert('transaction',["dr"=>$price,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$to,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);



$sql->insert('transaction',["dr"=>0,"trans_id"=>$trans_id,"cr"=>$price,"account_id"=>$account_no,"des"=>$des,"balance"=>$p,"date2"=>"$start_date"]);



}elseif ($tax1!=0 and $tax2==0 or $tax1==0 and $tax2!=0) {

$sql->select1("account_no","where id=$account_no");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$id_n=$row1['id'];
$tot=$price* 0.14;
            $balance=$row1['balance']-$tot;
$p=$row1['balance'];

         $sql->update('account_no',$id_n,["balance"=>"$balance"]);
    	 }



$sql->insert('transaction',["dr"=>$price,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$to,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);
$b=$price* 0.14;

$sql->insert('transaction',["dr"=>$b,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$tax1,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);

    	 		$sql->select1("account_no","where id=$tax1");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$id_n=$row1['id'];

            $balance=$row1['balance']+$b;


         $sql->update('account_no',$id_n,["balance"=>"$balance"]);
    	 }




$sql->insert('transaction',["dr"=>0,"trans_id"=>$trans_id,"cr"=>$price+$b,"account_id"=>$account_no,"des"=>$des,"balance"=>$p,"date2"=>"$start_date"]);


}elseif ($tax1!=0 and $tax2!=0) {
	$sql->select1("account_no","where id=$account_no");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$id_n=$row1['id'];
$tot=$price+($price*0.14)*2;
           $balance=$row1['balance']-$tot;
$p=$row1['balance'];

         $sql->update('account_no',$id_n,["balance"=>"$balance"]);
    	 }

$sql->insert('transaction',["dr"=>$price,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$to,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);

$b=$price* 0.14;

$sql->insert('transaction',["dr"=>$b,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$tax1,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);
$sql->insert('transaction',["dr"=>$b,"trans_id"=>$trans_id,"cr"=>0,"account_id"=>$tax1,"des"=>$des,"balance"=>0,"date2"=>"$start_date"]);

    	 		$sql->select1("account_no","where id=$tax1");

     	while ($row1 = $sql->res1->fetch_assoc()) {
		$id_n=$row1['id'];

            $balance=$row1['balance']+($b*2);


         $sql->update('account_no',$id_n,["balance"=>"$balance"]);
    	 }




$sql->insert('transaction',["dr"=>0,"trans_id"=>$trans_id,"cr"=>$price+($b*2),"account_id"=>$account_no,"des"=>$des,"balance"=>$p,"date2"=>"$start_date"]);


}






header("location:../../../index.php?assets=list&add=su");
}
}
