<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Stylesheets/CDN Area Start ============================================= -->
    <?php
    $page = 'index';
    require_once('includes/cdn.php');
    ?>
    <!-- Stylesheets/CDN Area End ============================================= -->
    <style>
    .semi-transparent-button {
        display: block;
        box-sizing: border-box;
        margin: 0 auto;
        padding: 1px;
        width: 100%;
        max-width: 300px;
        background: #fff;
        /* fallback color for old browsers */
        background: rgba(255, 255, 255, 0.5);

        color: #fff;
        text-align: center;
        text-decoration: none;
        letter-spacing: 1px;
        transition: all 0.3s ease-out;
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
        <section id="content">
            <div class="content-wrap">
                <div class="fancy-title title-dotted-border topmargin-sm mb-4 title-center">
                    <h2>Best Products</h2>
                </div>
                <hr>
                <div class="container-fluid clearfix">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="text-center">Products</h3>
                            <hr>
                            <div class="row grid-6">
                                <?php
                                error_reporting(0);
                                $page = '';
                                $id = $_GET['id'];
                                $page = $_GET['page'];
                                if ($page == "" || $page == "1") {
                                    $page1 = 0;
                                } else {
                                    $page1 = ($page * 12) - 12;
                                }
                                $sql = "SELECT * FROM product WHERE pname LIKE '%{$_POST['search']}%' and status = '1' LIMIT $page1,12";
                                $result = mysqli_query($con, $sql);
                                $video_id = '';
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="col-lg-2 col-md-3 col-6 px-2">
                                        <div class="product iproduct clearfix">
                                            <div class="product-image">
                                                <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Image 1" style="width:200px;height:200px;"></a>
                                                <div class="sale-flash" style="background-color: #28a745;color:black;">
                                                    <?php
                                                    if ($row['discount'] > 0) {
                                                    ?>
                                                        <span class="lead"><span class="badge badge-success" style="color:#fff;"><?php echo $row['discount'] . ' % Off' ?></span></span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span><span class="badge">Sale!</span></span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="product-overlay" align="center">
                                                    <?php
                                                    if ($row['stock'] > 0) {
                                                    ?>
                                                        <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="add-to-cart text-light">
                                                            <i class="icon-shopping-cart"></i>
                                                            <span> Add to Cart</span>
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="semi-transparent-button text-light" href="#"><del style="color:red">
                                                        <span style="color:black">Out of stock</span> </del></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title mb-1">
                                                    <h3>
                                                        <center><a href="viewProduct.php?id=<?php echo $row["id"]; ?>"><?php echo $row['pname']; ?></a></center>
                                                    </h3>

                                                    <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1" style="background-color: #28a745;">
                                                        <b>
                                                            <!-- <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i> -->
                                                            <i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;&nbsp;<?php echo $row["pprice"] . " " . "/="; ?>
                                                        </b>
                                                    </a>

                                                    <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1" style="background-color: #28a745;"><b>
                                                        <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i></b>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <?php
                            //this is for counting number of page
                            $id = $_GET['id'];
                            $query1 = "SELECT * FROM category,product WHERE category.id= product.cid AND category.id = '$id' and product.status = '1'";
                            $result1 = mysqli_query($con, $query1);
                            $count = mysqli_num_rows($result1);
                            $row = mysqli_fetch_array($result1);
                            $a = $count / 12;

                            $a =  ceil($a);

                            echo "<br>";

                            for ($b = 1; $b <= $a; $b++) {
                            ?>
                                <a href="Catagory?page=<?php echo $b; ?>&id=<?php echo $id; ?>" class="btn btn-warning text-light pb-1"><?php echo $b ?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
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