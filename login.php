<?php
require 'config/dbconfig.php';
$query = "SELECT * FROM `setting`";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);

$title = "";
$logo = "";
$favicon = "";
if ($total != 0) {
   while ($result = mysqli_fetch_assoc($data)) {
      $title = $result['title'];
      $favicon = $result['favicon'];
      $logo = $result['logo'];
   }
} else {
   "No Records Found!!!";
}
$error_msg = '';
if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $email = mysqli_real_escape_string($con, $email);
   $password = mysqli_real_escape_string($con, $password);

   $query = "select id,email,password 
   FROM user where email = '$email' and password= '$password'";
   $data = mysqli_query($con, $query);
   $total = mysqli_num_rows($data);

   $id = "";
   $email="";
   if ($total != 0) {
      while ($result = mysqli_fetch_assoc($data)) {
         $id = $result['id'];
         $email=$result['email'];
      }
   } else {
      "No Records Found!!!";
   }

   $sql = "select id,email,password from user where email = '$email' and password= '$password' ";

   $login_match_query = mysqli_query($con, $sql);

   $row = mysqli_num_rows($login_match_query);

   if ($row == 1) {
      $_SESSION['id'] = $id;
      $_SESSION['status'] = "Welcome!";
      $_SESSION['status_code'] = "success";
      $_SESSION['email'] = $email;
      
      header('location:Homepage');
   } 
   else if ($_POST['email'] != $_POST['password']) {
      $error_msg = '<i class="fa fa-frown-o p-2" aria-hidden="true">&nbsp;‌Wrong credentials! Try again!</i> ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title><?php echo $title; ?></title>

   <link rel="shortcut icon" href="<?php echo $favicon; ?>">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <!--=====================================================================================
   <!--===============================================================================================-->
</head>

<body>

   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100 p-b-160 p-t-50">
            <center>
               <span class="text-white">
                  <b><?php echo $error_msg; ?></b>
               </span>
            </center>
            <form class="login100-form validate-form" method="POST" id="login_form">
               <span class="login100-form-title p-b-43">
                  Login
               </span>
               <div class="wrap-input100 rs1">
                  <input class="input100" type="email" placeholder="Email" name="email" 
                  required data-parsley-type="email" data-parsley-trigger="keyup">
               </div>


               <div class="wrap-input100 rs2">
                  <input class="input100" type="password" placeholder="Password" name="password" required>
               </div>

               <div class="container-login100-form-btn">
                  <button class="login100-form-btn" type="submit" name="login">
                     Sign in
                  </button>
               </div>

               <div class="text-center w-full p-t-23">
                  <a href="#" class="txt1">
                      Don't you have an account? <a href="Signup" class="text-white">Sign-up here!</a>
                      &nbsp; <a href="forgetPass.php" class="text-white">Forget Password?</a>
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="http://parsleyjs.org/dist/parsley.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/animsition/js/animsition.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/daterangepicker/moment.min.js"></script>
   <script src="vendor/daterangepicker/daterangepicker.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/countdowntime/countdowntime.js"></script>
   <!--===============================================================================================-->
   <script src="js/main.js"></script>
   <script>
      $(document).ready(function() {
         $('#login_form').parsley();
      });
   </script>
</body>

</html>