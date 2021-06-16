<?php

require "auth.php"; 

if(isset($_GET['billcode'])){

  $status_id = $_GET['status_id'];
  $billcode = $_GET ['billcode'];
  $order_id = $_GET ['order_id'];
  $msg = $_GET ['msg'];
  $transaction_id = $_GET ['transaction_id'];


  if($status_id == 1){

    $query = $db->query("UPDATE appointment SET deposit=2 WHERE receipt_number='$billcode'");

    echo "<script>alert('Payment success!');window.location='app-list.php'</script>";
  }else{
    echo "<script>alert('Payment failed!');window.location='app-list.php'</script>";
  }


}