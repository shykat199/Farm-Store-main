<?php

include('config/dbconfig.php');
if (!isset($_SESSION['id'])) {
   echo '<script type="text/javascript">';
   echo "setTimeout(function () { Swal.fire({
      icon: 'error',
      title: 'Sorry!',
      text: 'It seems You are not Logged in Yet! Please, Log In!',
      footer: '<a href=Signup>Dont you have an account? Register Here!
      '
   });";
   echo '}, 1000);</script>';
} else {
   if (isset($_POST['pid'])) {
      $uid = $_SESSION['id'];
      $prid = $_POST['pid'];
      $pname = $_POST['pname'];
      $pimg = $_POST['pimg'];
      $ptype = $_POST['ptype'];
      $pprice = $_POST['pprice'];
      $discount = $_POST['discount'];
      $qty = $_POST['qty'];


      //$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
      //$do_date = $dt->format('Y-m-d');

      $query = "SELECT pid FROM cart_table WHERE pid = '$prid' AND uid='$uid'";
      $data = mysqli_query($con, $query);
      $total = mysqli_num_rows($data);
      $uniqpid = "";
      if ($total != 0) {
         while ($result = mysqli_fetch_assoc($data)) {
            $uniqpid = $result['pid'];
         }
      } else {
         "No Records Found!!!";
      }

      if (!$uniqpid) {

         $query = "INSERT INTO cart_table(uid,pid,pname,pimg,ptype,price,discount,qty) VALUES 
         ('$uid','$prid','$pname','$pimg','$ptype','$pprice','$discount','$qty')";
         $result = mysqli_query($con, $query);
         if ($result == TRUE) {
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
               icon: 'success',
               title: 'Thanks!',
               text: 'Product Added Successfully!',
               footer: '<b>Happy Shopping!</b>'
            });";
            echo '}, 1000);</script>';
         } else {
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
               icon: 'error',
               title: 'Sorry!',
               text: 'Something Went Wrong! Try Again Later!',
               footer: '<b>Happy Shopping!</b>'
            });";
            echo '}, 1000);</script>';
         }
      } else {
         echo '<script type="text/javascript">';
         echo "setTimeout(function () { Swal.fire({
            icon: 'warning',
            title: 'Ooops!',
            text: 'This Product has been already added into Cart!',
            footer: '<b>Happy Shopping!</b>'
         });";
         echo '}, 1000);</script>';
      }
   }
   if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
      $uid = $_SESSION['id'];
      $query = ("SELECT * FROM cart_table WHERE uid='$uid'");
      $data = mysqli_query($con, $query);
      $total = mysqli_num_rows($data);
      echo $total;
   }
}
if (isset($_GET['remove'])) {
   $uid = $_SESSION['id'];
   $pid = $_GET['remove'];
   $query = "DELETE FROM cart_table WHERE pid='$pid' AND uid='$uid'";
   $result = mysqli_query($con, $query);
   $_SESSION['status'] = "Product removed Successfully!";
   $_SESSION['status_code'] = "success";
   header('location:Cart');
}
if (isset($_GET['clear'])) {
   $uid = $_SESSION['id'];
   $query = "DELETE FROM cart_table WHERE uid='$uid'";
   $result = mysqli_query($con, $query);
   $_SESSION['status'] = "All Products are removed from Cart!";
   $_SESSION['status_code'] = "success";
   header('location:Cart');
}

if (!isset($_SESSION['id'])) {
   echo '<script type="text/javascript">';
   echo "setTimeout(function () { Swal.fire({
      icon: 'error',
      title: 'Sorry!',
      text: 'It seems You are not Logged in Yet! Please, Log In!',
      footer: '<a href=Signup>Dont you have an account? Register Here!</a>'
   });";
   echo '}, 1000);</script>';
}  

/* 
Notice: Undefined variable: prid in C:\xampp\htdocs\Farm-Store-main\action.php on line 86

Notice: Undefined variable: prid in C:\xampp\htdocs\Farm-Store-main\action.php on line 100

Notice: Undefined variable: user_email in C:\xampp\htdocs\Farm-Store-main\action.php on line 100

Notice: Undefined variable: rating in C:\xampp\htdocs\Farm-Store-main\action.php on line 100

Notice: Undefined variable: review in C:\xampp\htdocs\Farm-Store-main\action.php on line 100
 */
