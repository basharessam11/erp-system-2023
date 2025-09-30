<?php

include "../../sql.php";
$de_t = filter_var($_POST['total1'], FILTER_VALIDATE_FLOAT);
$ce_t = filter_var($_POST['total2'], FILTER_VALIDATE_FLOAT);
$a = filter_var($_POST['a'], FILTER_VALIDATE_INT);
$total = filter_var($_POST['total'], FILTER_VALIDATE_FLOAT);

if ($de_t == $ce_t) {


  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $photo1 = filter_var($_POST['photo1'], FILTER_SANITIZE_STRING);


  $currency = filter_var($_POST['currency'], FILTER_VALIDATE_INT);

  $a = filter_var($_POST['a'], FILTER_VALIDATE_INT);
  $ref = filter_var($_POST['ref'], FILTER_SANITIZE_STRING);

   $trans_id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

  $sql->select2("trans", " where id=$trans_id");
  while ($row2 = $sql->res2->fetch_assoc()) {
    $currency_id = $row2['currency_id'];

    if ($currency != $currency_id) {

      $sql->select3("currencies", "where id=$currency  ");
      while ($row3 = $sql->res3->fetch_assoc()) {

        $rate22 = $row3['rate'];
        $stat22 = $row3['stat'];
      }
    } else {
      $rate22 = $row2['currency_rate'];
      $stat22 = $row2['c_stat'];
    }
  }


  $sql->delete1("costs", "where trans_id=$trans_id");


  $temp = $_FILES['photo']['tmp_name'];
  $name_img = $_FILES['photo']['name'];
  $size = $_FILES['photo']['size'];

  $sql->update_img('trans', $trans_id, ["name" => "$name", "currency_id" => "$currency", "c_stat" => $stat22, "currency_rate" => "$rate22", "t_type" => "$a", "ref" => "$ref", "date2" => "$date", "total" => "$total"], $photo1, [$name_img], [$size], [$temp]);




  $from1 = $_POST['from'];
  $des1 = $_POST['des'];
  $debit1 = $_POST['debit'];
  $cridt1 = $_POST['cridt'];


  $sql->select1("transaction", " where trans_id=$trans_id");
  while ($row1 = $sql->res1->fetch_assoc()) {
    $dr = $row1['dr'];
    $cr = $row1['cr'];

    $account_id = $row1['account_id'];
    if ($dr != 0) {

      $sql->select2("account_no", " where id=$account_id");
      while ($row2 = $sql->res2->fetch_assoc()) {
        $balance = $row2['balance'] - $dr;
      }

      $sql->update('account_no', $account_id, ["balance" => "$balance"]);
    } else {
      $sql->select2("account_no", " where id=$account_id");
      while ($row2 = $sql->res2->fetch_assoc()) {
        $balance = $row2['balance'] + $cr;
        $sql->update('account_no', $account_id, ["balance" => "$balance"]);
      }
    }
  }



  $sql->delete1("transaction", "where trans_id=$trans_id");
  for ($i = 0; $i <= count($des1) - 1; $i++) {
    $from = filter_var($from1[$i], FILTER_VALIDATE_FLOAT);
    $debit = filter_var($debit1[$i], FILTER_VALIDATE_FLOAT);
    $cridt = filter_var($cridt1[$i], FILTER_VALIDATE_FLOAT);
    $des = filter_var($des1[$i], FILTER_SANITIZE_STRING);


    if ($debit != 0) {
      $sql->select1("account_no", " where id=$from");
      while ($row1 = $sql->res1->fetch_assoc()) {
        $balance = $row1['balance'] + $debit;


        $sql->update('account_no', $from, ["balance" => "$balance"]);


        if ($stat22 != 1) {


          $debit4 = $debit * $rate22;
        } else {
          $debit4 = 0;
        }




        $sql->insert('transaction', ["dr" => $debit, "drr" => $debit4, "trans_id" => $trans_id, "cr" => $cridt, "account_id" => $from, "des" => $des, "balance" => $balance, "date2" => "$date"]);
      }
    } else {
      $sql->select1("account_no", " where id=$from");
      while ($row1 = $sql->res1->fetch_assoc()) {
        $balance = $row1['balance'] - $cridt;
        $sql->update('account_no', $from, ["balance" => "$balance"]);


        if ($stat22 != 1) {


          $cridt4 = $cridt * $rate22;
        } else {
          $cridt4 = 0;
        }




        $sql->insert('transaction', ["dr" => $debit, "trans_id" => $trans_id, "cr" => $cridt, "crr" => $cridt4, "account_id" => $from, "des" => $des, "balance" => $balance, "date2" => "$date"]);
      }
    }
  }


  if (isset($_POST['cost2_d']) and !empty($_POST['cost2_d'])) {
    $cost2_dd = $_POST['cost2_d'];
    $rate_dd = $_POST['rate_d'];
    $price_dd = $_POST['price_d'];
    $rate_dd = $_POST['rate_d'];


    for ($i = 0; $i <= count($cost2_dd) - 1; $i++) {
      $cost2_d = filter_var($cost2_dd[$i], FILTER_VALIDATE_INT);
      $rate_d = filter_var($rate_dd[$i], FILTER_VALIDATE_INT);
      $price_d = filter_var($price_dd[$i], FILTER_VALIDATE_INT);
      $rate_d = filter_var($rate_dd[$i], FILTER_VALIDATE_INT);



      if ($stat22 != 1) {


        $price_d4 = $price_d * $rate22;
      } else {
        $price_d4 = 0;
      }

      $sql->insert('costs', ["cost2_id" => $cost2_d, "dr" => $price_d, "drr" => $price_d4, "cr" => 0, "crr" => 0, "rate" => $rate_d, "trans_id" => $trans_id, "date2" => "$date"]);
    }
  }
  if (isset($_POST['cost2_c']) and !empty($_POST['cost2_c'])) {

    $cost2_cc = $_POST['cost2_c'];
    $rate_cc = $_POST['rate_c'];
    $price_cc = $_POST['price_c'];
    $rate_cc = $_POST['rate_c'];

    for ($i = 0; $i <= count($cost2_cc) - 1; $i++) {
      $cost2_c = filter_var($cost2_cc[$i], FILTER_VALIDATE_INT);
      $rate_c = filter_var($rate_cc[$i], FILTER_VALIDATE_INT);
      $price_c = filter_var($price_cc[$i], FILTER_VALIDATE_INT);
      $rate_c = filter_var($rate_cc[$i], FILTER_VALIDATE_INT);



      if ($stat22 != 1) {


        $price_c4 = $price_c * $rate22;
      } else {
        $price_c4 = 0;
      }

      $sql->insert('costs', ["cost2_id" => $cost2_c, "drr" => 0, "dr" => 0, "cr" => $price_c, "crr" => $price_c4, "rate" => $rate_c, "trans_id" => $trans_id, "date2" => "$date"]);
    }
  }





  if ($a == 1) {
    header("location:../../../index.php?gl=list&add=su");
  } elseif ($a == 2) {
    header("location:../../../index.php?exp=list&add=su");
  } elseif ($a == 3) {
    header("location:../../../index.php?incaming=list&add=su");
  }
} else {
  if ($a == 1) {
    header("location:../../../index.php?gl=list&total=error");
  } elseif ($a == 2) {
    header("location:../../../index.php?exp=list&total=error");
  } elseif ($a == 3) {
    header("location:../../../index.php?incaming=list&total=error");
  }
}
