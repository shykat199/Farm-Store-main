<?php
include('config/dbconfig.php');
if (isset($_POST['signupSubmit'])) {
   $name = mysqli_real_escape_string($con, $_POST["name"]);

   $email = mysqli_real_escape_string($con, $_POST["email"]);

   $ccode = mysqli_real_escape_string($con, $_POST["ccode"]);

   $mobile = mysqli_real_escape_string($con, $_POST["mobile"]);

   $password = mysqli_real_escape_string($con, $_POST["password"]);

   $query = "SELECT * FROM `user`";
   $data = mysqli_query($con, $query);
   $total = mysqli_num_rows($data);

   $existing_email = "";
   $existing_mobile = "";
   if ($total != 0) {
      while ($result = mysqli_fetch_assoc($data)) {
         $existing_email = $result['email'];
         $existing_mobile = $result['mobile'];
      }
   } else {
      "No Records Found!!!";
   }

   if ($_POST["email"] == $existing_email) {
      $_SESSION['status'] = "This Email Already Registered! Try Another One!";
      $_SESSION['status_code'] = "error";
      header('location:Signup');
   } else if ($_POST["mobile"] == $existing_mobile) {
      $_SESSION['status'] = "This Contact Number Already Taken! Try Another One!";
      $_SESSION['status_code'] = "error";
      header('location:Signup');
   } else {
      $signup_query = "INSERT INTO `user` (`name`,`email`,`ccode`,`mobile`,`password`) VALUES ('$name', '$email', '$ccode', '$mobile', '$password')";
      $result = mysqli_query($con, $signup_query);
      if ($result == true) {
         $_SESSION['status'] = "Registration completed Successfully!";
         $_SESSION['status_code'] = "success";
         header('location:Signup');
      } else {
         $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
         $_SESSION['status_code'] = "error";
         header('location:Signup');
      }
   }
}
