<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Stylesheets/CDN Area Start ============================================= -->
    <?php
    $page = 'index';
    require_once('includes/cdn.php');
    include('./smtp/PHPMailerAutoload.php');
    if (isset($_POST['submit'])) {

        $name = $_POST["name"];

        $email = $_POST["email"];

        $mobile = $_POST["mobile"];

        $message = $_POST["message"];

        $update_sql = "INSERT INTO `contact`(`name`, `email`, `contact_no`, `message`) VALUES ('$name','$email','$mobile','$message')";

        $update_result = mysqli_query($con, $update_sql);
        if ($update_result == TRUE) {
            $_SESSION['status'] = "Message Send Successfully!";
            $_SESSION['status_code'] = "success";

            //mail sender=============

            //  mail Template =======
            $html = "<table>
	        <tr>
	        <td>Name</td>
	        <td>$name</td>
	        </tr>
	        <tr>
	        <td>Email</td>
	        <td>$email</td>
	        </tr><tr>
	        <td>Mobile</td>
	        <td>$mobile</td>
	        </tr>
	        <tr>
	        <td>Comment</td>
	        <td>$message</td>
	        </tr>
	        </table>";

            //  End mail Template =======
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Post = 587;
            $mail->SMTPSecure = "tls";
            $mail->SMTPAuth = true;
            $mail->Username = "xyz@gmail.com"; //static
            $mail->Password = "******"; //static
            $mail->addAddress("abc@gmail.com", 'Person One');
            $mail->addAddress($email, 'Person Two');
            $mail->isHTML(true);
            $mail->Subject = "New Contact Us";
            $mail->Body = $html;
            $mail->SMTPOptions = array('ssl' => array(

                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));

            if ($mail->send()) {
                echo "mail send";
            } else {
                echo "error";
            }

            // End mail sender=============



            header('location:Homepage');
        } else {
            $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
            $_SESSION['status_code'] = "error";
            header('location:Homepage');
        }
    }
    ?>
    <!-- Stylesheets/CDN Area End ============================================= -->
</head>

<body class="stretched">
    <!-- Document Wrapper ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- On LOad Modal Area Start-->
        <?php
        require_once('includes/onloadmodal.php');
        ?>
        <!-- On LOad Modal Area End-->

        <!-- Top Bar Area Start ============================================= -->
        <?php
        require_once('includes/topbar.php');
        ?>
        <!-- Top Bar Area End ============================================= -->

        <!-- Navbar Area Start ============================================= -->
        <?php
        require_once('includes/navbar.php');
        ?>
        <!-- Navbar Area end -->

        <!--Banner Slider area start ============================================= -->
        <?php
        require_once('includes/mainslider.php');
        ?>
        <!-- Banner Slider area End -->

        <!-- Content ============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <!---user profile area start--->
                    <div class="container p-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5>Contact Us.</h5>
                            </div>
                            <div class="card-block">
                                <!----page body content write here--->
                                <div class="card shadow p-4">
                                    <form method="post" id="form">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Name*</label>
                                            <input type="text" name="name" class="form-control" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">E-Mail*</label>
                                            <input type="text" name="email" class="form-control" autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Contact Number*</label>
                                            <input type="text" name="mobile" class="form-control" autocomplete="off" required data-parsley-pattern="^\+?(88)?0?1[3456789][0-9]{8}\b">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Your Problem*</label>
                                            <textarea name="message" class="form-control" autocomplete="off" required></textarea>
                                        </div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-warning">Send
                                            Message</button>
                                    </form>
                                </div>
                                <!----page body content write here--->
                            </div>
                        </div>
                    </div>
                    <!---user profile area end--->
                </div>


                <div class="clear"></div>


                <!-- Last Section Area Start============================================= -->
                <?php
                require_once('includes/lastsection.php');
                ?>
                <!-- Last Section Area End============================================= -->

            </div>

        </section>
        <!-- #content end -->

        <!-- Footer Section Start============================================= -->
        <?php
        require_once('includes/footer.php');
        ?>
        <!-- Footer Section Start============================================= -->
    </div>
    <!-- #wrapper end -->

    <!-- Go To Top ============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>
    <!-- Scripts Section Area Start============================================= -->
    <?php
    require_once('includes/scripts.php');
    ?>
    <!-- Scripts Section Area End============================================= -->
</body>

</html>