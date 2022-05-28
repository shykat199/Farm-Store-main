<?php
require 'config/dbconfig.php';


if (isset($_GET['email']) && isset($_GET['reset_token'])) {

    $reset_token = $_GET['reset_token'];
    $email = $_GET['email'];
    
    $query = "SELECT * FROM `user` WHERE `email`='$email' AND `resetToken`='$reset_token'";

    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);

    if ($result) {

        if (($result) && $num == 1) {
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
                                    Enter Your New Password
                                </span>
                                <div class="wrap-input100 rs1" style="width: 100%">
                                    <input class="input100" type="password" placeholder="Password" name="password" required data-parsley-type="password" data-parsley-trigger="keyup">
                                </div>

                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn" type="passsub" name="submitmail">
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

<?php
        } else {

            echo " <script>alert('Invalid Or Expire link');
        
        </script>";
        }
    } else {
        echo " <script>alert('Can not run query');
        window.location.href='form.php';
        </script>";
    }
}

?>
<?php

if (isset($_POST['submitmail'])) {

    $email = $_GET['email'];
    $psd = $_POST['password'];
    $psd = mysqli_real_escape_string($con,$psd);

    $update = "UPDATE `user`  SET `password` = '$psd' , `resetToken` = null  WHERE `email`='$email'";

    if (mysqli_query($con, $update) == true) {

        echo " <script>alert('Password Updated Successfully');
        
                </script>";
    } 
    else {
        echo " <script>alert('Password Not Updated Successfully');
        
                </script>";
    }
}

?>