<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Stylesheets/CDN Area Start ============================================= -->
    <?php
    $page = 'about us';
    require_once('includes/cdn.php');
    ?>
    <!-- Stylesheets/CDN Area End ============================================= -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }
        .aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 39px;
    padding: 0 0 11px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #fdb801 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 21%;
}
        
    </style>


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
        <section class="container">

            <h2 class="aboutus-title pt-5">Meet The Team</h2>
            
            <hr>

            <div class="row">
                <div class="column">
                    <div class="card">
                       <center><img src="images/avater.png" alt="Mike" style="width:50%"></center> 
                        <div class="container">
                            <h2>M Bhanu Prasad</h2>
                            <p class="title"><strong>CEO & Founder</strong></p>
                            <p>Front-End Developer & Designer</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                       <center><img src="images/avater.png" alt="Mike" style="width:50%"></center> 
                        <div class="container">
                            <h2>Shabbir Ahmed</h2>
                            <p class="title">Art Director</p>
                            <p>Back-End Developer</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                       <center><img src="images/avater.png" alt="Mike" style="width:50%"></center> 
                        <div class="container">
                            <h2>Pronoy Kumar Dey</h2>
                            <p class="title">Designer</p>
                            <p>Web Analist & Management</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="column">
                    <!-- <div class="card">
                        <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
                        <div class="container">
                            <h2>Jane Doe</h2>
                            <p class="title">CEO & Founder</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div> -->
                </div>

                <div class="column">
                    <div class="card">
                       <center><img src="images/avater.png" alt="Mike" style="width:50%"></center> 
                        <div class="container">
                            <h2>Shykat Roy</h2>
                            <p class="title">Full Stack Developer</p>
                            <p>Lead Developer</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <!-- <div class="card">
                        <img src="/w3images/team3.jpg" alt="John" style="width:100%">
                        <div class="container">
                            <h2>John Doe</h2>
                            <p class="title">Designer</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>example@example.com</p>
                            <p><button class="button">Contact</button></p>
                        </div>
                    </div> -->
                </div>
                
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
    <!--- sweet alert popup area --->
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <?php
        $id = $_SESSION['id'];
        $username_fetch = "SELECT name FROM user WHERE id = '$id' ";
        $result_username = mysqli_query($con, $username_fetch);
        $particular_user = mysqli_num_rows($result_username);

        $username = "";
        if ($result_username != 0) {
            while ($result_u = mysqli_fetch_assoc($result_username)) {
                $username = $result_u['name'];
            }
        } else {
            "No Records Found!!!";
        }

        ?>
        <script>
            swal.fire({
                title: "<?php echo $_SESSION['status'] . "&nbsp;" . "$username"; ?>",
                //text: "Category added successfully!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok!",
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
    <!--- sweet alert popup area end --->
    <!--- sweet alert popup area --->
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal.fire({
                position: 'top-end',
                icon: "<?php echo $_SESSION['status_code']; ?>",
                title: "<?php echo $_SESSION['status']; ?>",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
    <!--- sweet alert popup area end --->
    <!-- Scripts Section Area End============================================= -->
</body>

</html>