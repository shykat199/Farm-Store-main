<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Stylesheets/CDN Area Start ============================================= -->
    <?php
    $page = 'index';
    require_once('includes/cdn.php');
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
    <?php
    $query = "SELECT * FROM `setting`";
    $data = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($data);
    $tx = $row['tax'];
    $d_charge = $row['delivery_charge'];
    ?>

    <?php
    if (isset($_SESSION['id'])) {
        $query = "SELECT * FROM `user` where id={$_SESSION['id']}";
        $data = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($data);
        $status = $row['status'];
        if ($status == 0) {
            $d_charge = 0;
        }
    }
    ?>

    <!-- Content ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <!-- Track Order table area Start============================================= -->
            <h3 class="text-center">My Orders</h3>
            <hr>
            <div class="table-responsive p-2">
                <table id="datatablesSimple" class="table table-striped table-bordered text-center">
                    <thead class="">
                    <tr>
                        <th>Serial no.</th>
                        <th>Order Date</th>
                        <th>Order Tracking ID.</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Grand Total</th>
                        <th>Payment Method</th>
                        <th>Delivery Date</th>
                        <th>Timeslot</th>
                        <th>Order Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $id = $_SESSION['id'];
                    $query = "SELECT * FROM orders WHERE uid='$id' order by `order_date` desc";
                    $data = mysqli_query($con, $query);
                    $serial_no = 1;
                    if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                            ?>
                            <tr>
                                <td><?php echo $serial_no; ?></td>
                                <td><?php echo $row["order_date"]; ?></td>
                                <td><?php echo $row["oid"]; ?></td>
                                <td>
                                    <?php $my_str = '' . $row['pid'] . '';
                                    echo str_replace("$;", " <br><hr>", $my_str); ?>
                                </td>
                                <td>
                                    <?php $my_str = '' . $row['pname'] . '';
                                    echo str_replace("$;", " <br><hr>", $my_str); ?>
                                </td>
                                <td>
                                    <?php $my_str = '' . $row['ptype'] . '';
                                    echo str_replace("$;", " <br><hr>", $my_str); ?>
                                </td>
                                <td>
                                    <?php $my_str = '' . $row['qty'] . '';
                                    echo str_replace("$;", " <br><hr>", $my_str); ?>
                                </td>
                                <td>
                                    <?php $my_str = '' . $row['pprice'] . '';
                                    echo str_replace("$;", " <br><hr>", $my_str); ?>
                                </td>
                                <td><?php echo $row["total"]; ?></td>
                                <td>
                                    <?php
                                    $dis = 0;
                                    if ($status == 0)
                                        $dis = $row["total"] * .10;
                                    echo $dis;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $tax = ($row["total"] * $tx) / 100;
                                    echo $tax;
                                    ?>
                                </td>
                                <td><?php echo $row["total"] - $dis + $tax; ?></td>
                                <td><?php echo $row["p_method"]; ?></td>
                                <td><?php echo $row["ddate"]; ?></td>
                                <td><?php echo $row["timesloat"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["status"] == 'pending') {
                                        ?>
                                        <span class="badge badge-warning">Pending</span>
                                        <?php
                                    } else if ($row["status"] == 'processing') {
                                        ?>
                                        <span class="badge badge-warning">processing</span>
                                        <?php
                                    } else if ($row["status"] == 'cancelled') {
                                        ?>
                                        <span class="badge badge-danger">cancelled</span>
                                        <?php
                                    }
                                    
                                    else {
                                        ?>
                                        <span class="badge badge-success">complete</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $serial_no++;
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>



            <!-- Track Order table area End============================================= -->

            






            <!-- Track Order table area End============================================= -->


            <div class="clear"></div>

            <div class="container clearfix">

                <!-- Randomize Products Section Start============================================= -->
                <?php
                require_once('includes/randomizeProducts.php');
                ?>
                <!-- Randomize Products Section End============================================= -->

            </div>

            <!-- Sign Up / Banner area Start============================================= -->
            <?php
            require_once('includes/signUpbanner.php');
            ?>
            <!-- Sign Up / Banner area End============================================= -->

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
