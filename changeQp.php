<?php
session_start();
include('config/dbconfig.php');
if (!isset($_SESSION['id'])) {
   header('location:Login');
} else {
   if (isset($_POST['qty'])) {
      $uid = $_SESSION['id'];
      $pid = $_POST['pid'];
      $qty = $_POST['qty'];
      $totalprice = $_POST['tprice'];

      $updatedtotalprice = ($qty * $totalprice);

      $query = "UPDATE cart_table SET qty='$qty',total='$updatedtotalprice' WHERE pid='$pid' AND uid = '$uid'";
      $result = mysqli_query($con, $query);
      if ($result == TRUE) {
         header('location:Cart');
      }
   }
}
