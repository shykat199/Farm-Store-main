<?php
session_start();
if (!isset($_SESSION['id'])) {
   header("location:login.php");
}
include('config/dbconfig.php');
if (isset($_POST['addbillingaddress'])) {
   $id = $_SESSION['id'];

   $hno =  $_POST["hno"];

   $society =  $_POST["society"];

   $area =  $_POST["area"];

   $pincode =  $_POST["pincode"];

   $landmark =  $_POST["landmark"];

   $type =  $_POST["type"];

   $name =  $_POST["name"];

   $query = "INSERT INTO address(uid,hno,society,area,pincode,landmark,type,name) VALUES ('$id','$hno','$society','$area','$pincode','$landmark','$type','$name')";
   $result = mysqli_query($con, $query);
   if ($result == TRUE) {
      $_SESSION['status'] = "Billing address added Successfully!";
      $_SESSION['status_code'] = "success";
      header('location:BilligAddress');
   } else {
      $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
      $_SESSION['status_code'] = "error";
      header('location:BilligAddress');
   }
}
