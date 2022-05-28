<?php
//include("_dbconnect.php");

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

//++++++++  2nd  execute this ++++++++++
function sendMail($userEmail, $reset_token)
{

    include('./smtp/PHPMailerAutoload.php');

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Post = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = "shykatroy.11815813@gmail.com"; //static
        $mail->Password = "shykat199"; //static

        $mail->setFrom('shykatroy.11815813@gmail.com', 'Admin');

        $mail->addAddress($userEmail);
        //$mail->isHTML(true);
        $mail->isHTML(true);   //Set email format to HTML
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = "We got a request from user to <b>reset password</b> <br>
        Click the below link-<br>
        <a href='http://localhost/Farm-Store-main/updateforgetPass.php?email=$userEmail&reset_token=$reset_token'>
        Click! To reset Password
        </a>";
        //$mail->Subject = "New Contact Us";
        //$mail->Body = $html;
        $mail->SMTPOptions = array('ssl' => array(

            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

//++++++++  1st execute this ++++++++++

if (isset($_POST['submitmail'])) {

    $userEmail = $_POST['email'];
    $userEmail = mysqli_real_escape_string($con, $userEmail);


    /* $seclector= bin2hex(random_bytes(8));

    $token=random_bytes(32);

    $url=""; */

    $query = "SELECT * FROM `user` WHERE `email`='$userEmail'";
    $result = mysqli_query($con, $query);

    if ($result) {

        //echo"run";

        if (mysqli_num_rows($result) == 1) {

            /** email found */
            $reset_token = bin2hex(random_bytes(8));
            

            $query = "UPDATE `user` SET `resetToken` = '$reset_token' WHERE `user`.`email` = '$userEmail'";

            if (mysqli_query($con, $query) && sendMail($userEmail, $reset_token)) {

                echo " <script>alert('password reset link send to mail');
               
                    </script>";
            } else {

                echo " <script>alert('Server down try later');
            
            
            </script>";
            }
        } 
        else {

            echo " <script>alert('Invalid email. Email not found');
            
            
            
            </script>";
            //header("Location:form.php");
        }
    } else {

        echo " <script>alert('Can not run query');
        
        </script>";
        //header("Location:form.php");
    }
} else {
    //header("Location:form.php");
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
               <!-- <span class="text-white">
                  <b><?php echo $error_msg; ?></b>
               </span> -->
            </center>
            <form class="login100-form validate-form" method="POST" id="login_form">
               <span class="login100-form-title p-b-43">
               Reset Your Password
               </span>
               <div class="wrap-input100 rs1" style="width: 100%">
                  <input class="input100" type="email" placeholder="Email" name="email" 
                  required data-parsley-type="email" data-parsley-trigger="keyup">
               </div>

               <div class="container-login100-form-btn">
                  <button class="login100-form-btn" type="submit" name="submitmail">
                     Submit
                  </button>
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