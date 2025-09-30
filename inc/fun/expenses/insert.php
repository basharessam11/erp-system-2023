<?php

include"../../sql.php";
$de_t=filter_var($_POST['total1'], FILTER_VALIDATE_FLOAT);
$total=filter_var($_POST['total'], FILTER_VALIDATE_FLOAT);
$ce_t=filter_var($_POST['total2'], FILTER_VALIDATE_FLOAT);
$a=filter_var($_POST['a'], FILTER_VALIDATE_INT);




if ($de_t == $ce_t) {

$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

$date=date("Y-m-d");

$currency=filter_var($_POST['currency'], FILTER_VALIDATE_INT);


$sql->select2("currencies","where id=$currency  ");
        while($row2=$sql->res2->fetch_assoc())
                {

$rate=$row2['rate'];
$stat=$row2['stat'];

                }
$ref=filter_var($_POST['ref'], FILTER_SANITIZE_STRING);





 $temp = $_FILES['photo']['tmp_name'];
 $name_img = $_FILES['photo']['name'];
 $size = $_FILES['photo']['size'];



if (!empty($name_img)) {
	$sql->insert_img('trans',["name"=>"$name","currency_id"=>"$currency","c_stat"=>$stat,"currency_rate"=>"$rate","t_type"=>"$a","ref"=>"$ref","date2"=>"$date","total"=>"$total"],[$name_img],[$size],[$temp]);
}else{
	$sql->insert('trans',["name"=>"$name","currency_id"=>"$currency","c_stat"=>$stat,"currency_rate"=>"$rate","t_type"=>"$a","ref"=>"$ref","date2"=>"$date","total"=>"$total"]);
}




$trans_id =  $sql->conn->insert_id;


$from1=$_POST['from'];
$des1=$_POST['des'];
$debit1=$_POST['debit'];
$cridt1=$_POST['cridt'];





for ($i=0; $i <= count($des1)-1 ; $i++) { 
$from=filter_var($from1[$i], FILTER_VALIDATE_FLOAT);
$debit=filter_var($debit1[$i], FILTER_VALIDATE_FLOAT);
$cridt=filter_var($cridt1[$i], FILTER_VALIDATE_FLOAT);
$des=filter_var($des1[$i], FILTER_SANITIZE_STRING);





if ($debit!=0) {
	$sql->select1("account_no"," where id=$from");
        while($row1=$sql->res1->fetch_assoc())
                {
            $balance=$row1['balance']+$debit;


         $sql->update('account_no',$from,["balance"=>"$balance"]);


if ($stat!=1) {
	

	$debit4=$debit*$rate;

}else{
	$debit4=0;
}
          

      

$sql->insert('transaction',["dr"=>$debit,"drr"=>$debit4,"trans_id"=>$trans_id,"cr"=>$cridt,"account_id"=>$from,"des"=>$des,"balance"=>$balance,"date2"=>"$date"]);
                   }
                   
}else{
	$sql->select1("account_no"," where id=$from");
        while($row1=$sql->res1->fetch_assoc())
                {
            $balance=$row1['balance']-$cridt;
         $sql->update('account_no',$from,["balance"=>"$balance"]);


if ($stat!=1) {
	

	$cridt4=$cridt*$rate;

}else{
	$cridt4=0;
}
          

        

 $sql->insert('transaction',["dr"=>$debit,"trans_id"=>$trans_id,"cr"=>$cridt,"crr"=>$cridt4,"account_id"=>$from,"des"=>$des,"balance"=>$balance,"date2"=>"$date"]);
                   }
                  
}
 


}


if (isset($_POST['cost2_d']) and !empty($_POST['cost2_d'])) {
$cost2_dd=$_POST['cost2_d'];
$rate_dd=$_POST['rate_d'];
$price_dd=$_POST['price_d'];
$rate_dd=$_POST['rate_d'];


for ($i=0; $i <= count($cost2_dd)-1 ; $i++) { 
$cost2_d=filter_var($cost2_dd[$i], FILTER_VALIDATE_INT);
$rate_d=filter_var($rate_dd[$i], FILTER_VALIDATE_INT);
$price_d=filter_var($price_dd[$i], FILTER_VALIDATE_INT);
$rate_d=filter_var($rate_dd[$i], FILTER_VALIDATE_INT);



if ($stat!=1) {
	

	$price_d4=$price_d*$rate;

}else{
	$price_d4=0;
}

$sql->insert('costs',["cost2_id"=>$cost2_d,"dr"=>$price_d,"drr"=>$price_d4,"cr"=>0,"crr"=>0,"rate"=>$rate_d,"trans_id"=>$trans_id,"date2"=>"$date"]);


}

}
 if(isset($_POST['cost2_c']) and !empty($_POST['cost2_c'])){

$cost2_cc=$_POST['cost2_c'];
$rate_cc=$_POST['rate_c'];
$price_cc=$_POST['price_c'];
$rate_cc=$_POST['rate_c'];

for ($i=0; $i <= count($cost2_cc)-1 ; $i++) { 
$cost2_c=filter_var($cost2_cc[$i], FILTER_VALIDATE_INT);
$rate_c=filter_var($rate_cc[$i], FILTER_VALIDATE_INT);
$price_c=filter_var($price_cc[$i], FILTER_VALIDATE_INT);
$rate_c=filter_var($rate_cc[$i], FILTER_VALIDATE_INT);

if ($stat!=1) {
	

	$price_c4=$price_c*$rate;

}else{
	$price_c4=0;
}

$sql->insert('costs',["cost2_id"=>$cost2_c,"drr"=>0,"dr"=>0,"cr"=>$price_c,"crr"=>$price_c4,"rate"=>$rate_c,"trans_id"=>$trans_id,"date2"=>"$date"]);


}


}





if ($a==1) {
	 header("location:../../../index.php?gl=list&add=su");
	}elseif($a==2){
		 header("location:../../../index.php?exp=list&add=su");
	}elseif($a==3){
		 header("location:../../../index.php?incaming=list&add=su");
	}elseif($a==4){
		 header("location:../../../index.php?manger1=list&add=su");
	}
}else{
	if ($a==1) {
	 header("location:../../../index.php?gl=list&total=error");
	}elseif($a==2){
		 header("location:../../../index.php?exp=list&total=error");
	}elseif($a==3){
		 header("location:../../../index.php?incaming=list&total=error");
	}elseif($a==3){
		 header("location:../../../index.php?manger1=list&total=error");
	}
}