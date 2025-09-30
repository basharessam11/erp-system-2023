<?php

include"inc/sql.php";

 $sql->select1("account_no"," where id=12");
        while($row1=$sql->res1->fetch_assoc())
                {
            $balance=$row1['balance']-100;
         $sql->update('account_no',12,["balance"=>"$balance"]);

                   }


?>