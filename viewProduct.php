<?php
error_reporting(0);
include('config/dbconfig.php');
if (isset($_POST['rev_post'])) {


    $uid = $_SESSION['id'];
    $pidd = $_POST['pidd'];

    $user_email = $_POST['user_email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // print_r($_POST);

    $query = "INSERT INTO product_review(`product_id`,`user_id`,`user_email`,`rating`,`review`,`status`) VALUES ('$pidd','$uid','$user_email','$rating','$review',0)";
    $result = mysqli_query($con, $query);
    if ($result == TRUE) {

        //echo 'Excute';

        header('location: Product?id=' . $pidd . '&cid=' . $_POST['cidd'] . '&alert=1');
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
}

if ($_GET['alert'] == 1) {
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire({
               icon: 'success',
               title: 'Thanks!',
               text: 'Product Added Successfully!',
               footer: '<b>Happy Shopping!</b>'
            });";
    echo '}, 1000);</script>';
}

?>
<!DOCTYPE html>
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
<html dir="ltr" lang="en-US">

<head>
    <!-- Stylesheets/CDN Area Start ============================================= -->
    <?php
    $page = 'index';
    require_once('includes/cdn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    ?>
    <!-- Stylesheets/CDN Area End ============================================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        <!-- Content ============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <!---user password update area start--->
                    <div id="message"></div>
                    <div>
                        <div class="card shadow">
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `product`,`category` WHERE product.cid = category.id AND product.id = '$id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
                            <div class="card-body">
                                <div class="card-header">
                                    <h2 class="text-center"><?php echo $row['pname']; ?></h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-image">
                                            <a><img src="<?php echo $row['pimg']; ?>" alt="Image 1" style="width:200px;height:200px;"></a>
                                            <a><img src="<?php echo $row['pimg']; ?>" alt="Image 1" style="width:200px;height:200px;"></a>
                                            <?php $sb = explode(',', $row['prel']);
                                            foreach ($sb as $bb) {
                                                if ($bb == '') {
                                                } else {
                                            ?>
                                                    <img src="<?php echo $bb; ?>" style="width:200px;height:200px;" class="mt-3" />
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <form action="" class="form-submit">
                                            <div class="product-price pt-2">
                                                <h4><b>
                                                        <ins><?php echo $row['catname']; ?></ins>
                                                    </b></h4>
                                            </div>
                                            <hr>
                                            <div class="product-price">
                                                <?php
                                                $uid = $_SESSION['id'];
                                                $dsql = "SELECT user.status FROM user WHERE id = '$uid'";
                                                $dresult = mysqli_query($con, $dsql);
                                                $drow = mysqli_fetch_array($dresult);

                                                if ($_SESSION['id'] == null) {
                                                    ?>
                                                        <h5><b>
                                                            <ins>Discount : 0 (%)</ins>
                                                        </b></h5>

                                                    <?php
                                                    }else{
                                                        if ($drow['status'] == 0) {
                                                            ?>
                                                                <h5><b>
                                                                        <ins class="text-warning">Discount : <?php echo '10 ' . '(%)'; ?></ins>
                                                                    </b></h5>

                                                            <?php
                                                            }
                                                            if ($drow['status'] == 1) {
                                                                ?>
                                                                    <h5><b>
                                                                            <ins>Discount : <?php echo $row['discount'] . ' (%)'; ?></ins>
                                                                        </b></h5>

                                                                <?php
                                                                }

                                                    }

                                                ?>

                                            </div>
                                            <hr>
                                            <div class="form-group pt-2">
                                                <?php
                                                $query = "SELECT pgms FROM product WHERE id='$id'";
                                                $data = mysqli_query($con, $query);
                                                $count = 0;
                                                if (mysqli_num_rows($data) > 0) {
                                                    while ($rows = mysqli_fetch_assoc($data)) {
                                                ?>
                                                        <div class="fomr-group">
                                                            <label for="cars">Quantity(GM/KG/PIECE/BOX)</label>
                                                            <select name="pgms" class="form-control" id="ptype" onchange="priceChange(this.value);">
                                                                <?php
                                                                $values = explode('$;', $rows['pgms']);
                                                                foreach ($values as $value) {
                                                                ?>
                                                                    <option class="ptype" value="<?php echo $count; ?>"><?php echo $value; ?></option>
                                                                <?php
                                                                    $count = $count + 1;
                                                                }
                                                                ?>
                                                            </select>
                                                            <input type="hidden" id="ppid" value="<?php echo $id; ?>">
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="fomr-group">
                                                <label for="cars"><b>Price(BDT/=)</b></label>
                                                <select name="pprice" class="form-control" disabled id="fetchPriceonchange">
                                                    <?php
                                                    $cnt = 0;
                                                    $query = "SELECT pprice FROM product WHERE id='$id'";
                                                    $data = mysqli_query($con, $query);
                                                    if (mysqli_num_rows($data) > 0) {
                                                        while ($rows = mysqli_fetch_assoc($data)) {
                                                    ?>
                                                            <?php
                                                            $values = explode('$;', $rows['pprice']);
                                                            foreach ($values as $value) {
                                                            ?>
                                                                <option class="pprice" value="<?php echo $cnt; ?>"><?php echo $value; ?></option>
                                                            <?php
                                                                $cnt = $cnt + 1;
                                                            }
                                                            ?>

                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="cars"><b>Quantity(At least 1*)</b></label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                                            <span class="glyphicon glyphicon-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity" class="form-control qty" value="1" minlength="1" maxlength="10">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                            <span class="glyphicon glyphicon-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="product-price">
                                                <h6><b>
                                                        <ins><?php echo $row['psdesc']; ?></ins>
                                                    </b></h6>
                                            </div>
                                            <hr>
                                            <div class="product-price font-primary">
                                                <input type="hidden" id="pid" value="<?php echo $_GET["id"]; ?>">
                                                <input type="hidden" class="pname" value="<?php echo $row['pname']; ?>">
                                                <input type="hidden" class="pimg" value="<?php echo $row['pimg']; ?>">
                                                <input type="hidden" class="discount" value="<?php
                                                                                                $premium = $con->query("select `status` from `user` where id=$id")->fetch_assoc();
                                                                                                if ($premium['status'] == 0) {
                                                                                                    echo $row['discount'] + 10;
                                                                                                } else {
                                                                                                    echo $row['discount'];
                                                                                                }
                                                                                                ?>">
                                                <?php if ($row['stock'] == '0') {
                                                ?>
                                                    <button disabled class="btn text-light mt-1 addItemBtn" style="background-color: #28a745;"><b></i>&nbsp;<del style="color:red"><span style="color:white">Out Of Stock</span> </del>&nbsp;</b></button>

                                                <?php
                                                } else {
                                                ?>

                                                    <button class="btn text-light mt-1 addItemBtn" style="background-color: #28a745;"><b><i class="icon-shopping-cart">
                                                            </i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i></b>
                                                    </button>

                                                <?php }
                                                ?>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- Review start-->

                    </div>

                    <div>
                        <div class="card shadow">

                            <div class="card-body">
                                <div class="card-header">
                                    <h2 class="text-center">Product Review</h2>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-image">

                                            <h2>Comments....</h2>
                                            <hr>

                                            <?php
                                            $pidd = $_GET['id'];
                                            /* $csql = "SELECT * FROM `product`,`category`,`product_review` WHERE product.cid = category.id AND product.id = '$id'"; */

                                            $sel = $con->query("SELECT * FROM product_review as p, user as u WHERE u.id=p.user_id and p.product_id='$pidd' and p.status=1;");

                                            while ($crow = $sel->fetch_assoc()) {
                                            ?>
                                                <article>

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <strong><?php echo $crow['name'] ?> </strong> (<?php echo $crow['email'] ?>)
                                                            </div>
                                                            <div class="col-3 bg-warning text-dark text-center">
                                                                <strong> Rating:-<?php echo $crow['rating'] . '/ 5' ?></strong>
                                                            </div>
                                                        </div>

                                                        <div class="text-dark">
                                                        <?php $addDate = date_create($crow['added_on']);
                                                            echo date_format($addDate,"d/m/Y");
                                                            ?>
                                                        </div>
                                                        <div>
                                                            <?php echo $crow['review'] ?>
                                                        </div>

                                                    </div>
                                                    <hr>

                                                </article>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                    <?php
                                    if ($_SESSION['id'] != null) {

                                    ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                            <form action="Product" class="form-submit" id="formReview" method="post">

                                                <div class="form-group mt-1">
                                                    <label for="exampleFormControlInput1">Email address</label>
                                                    <input name="user_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Example select</label>
                                                    <select class="form-control" name="rating" id="exampleFormControlSelect1">
                                                        <option value="">--Select Rating--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Example textarea</label>
                                                    <textarea name="review" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>

                                                <div class="product-price font-primary">
                                                    <input type="hidden" name="pidd" value="<?php echo $_GET['id']; ?>" />
                                                    <input type="hidden" name="cidd" value="<?php echo $_GET['cid']; ?>" />
                                                    <!-- <input type="hidden" class="user_email" value="<?php echo $row['user_email']; ?>">
                                                    <input type="hidden" class="rating" value="<?php echo $row['rating']; ?>">
                                                    <input type="hidden" class="review" value="<?php echo $row['review']; ?>"> -->

                                                </div>

                                                <button id="rev_post" name="rev_post" class="btn text-light mt-1 addPostBtn" style="background-color: #28a745;"><b>Post</b>
                                                </button>
                                            </form>
                                        </div>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                            <div class="card mt-2">
                                                <h5 class="card-header">Oops!</h5>
                                                <div class="card-body">
                                                    <h5 class="card-title">It seems like your are not Logged In</h5>
                                                    <p class="card-text">Log in first to post your comment.</p>
                                                    <a href="./login.php" class="btn btn-primary">Login</a>
                                                </div>
                                            </div>
                                        </div>



                                    <?php
                                    }

                                    ?>

                                </div>
                            </div>

                        </div>

                        <!-- Review end-->

                    </div>

                    <!--Review end-->

                </div>
                <!---user password update area end--->
            </div>

            <!-- Related Product Section Start============================================= -->
            <div class="container">

                <div class="fancy-title title-dotted-border mt-4 mb-1 title-center">
                    <h3>Related Products</h3>
                </div>
                <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
                    <?php
                    $cid = $_GET['cid'];
                    $query = "SELECT * FROM product WHERE cid = '$cid' and status = '1'";
                    $data = mysqli_query($con, $query);
                    if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                            <div class="oc-item">
                                <div class="product iproduct clearfix">
                                    <div class="product-image">
                                        <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Round Neck T-shirts" style="width:200px;height:200px;"></a>
                                        <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Round Neck T-shirts" style="width:200px;height:200px;"></a>
                                        <div class="sale-flash" style="background-color: #FED700;color:black;">
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
                                                <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="add-to-cart">
                                                    <i class="icon-shopping-cart"><span> Add to Cart</span></i>
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <a class="semi-transparent-button" href="#"><del style="color:red">
                                                        <span style="color:black">Out of stock</span> </del></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title mb-1">
                                            <h3>
                                                <center>
                                                    <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><?php echo $row['pname']; ?></a>
                                                </center>
                                            </h3>
                                            <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1 change" style="background-color: #28a745;">
                                                <b>
                                                    <i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;&nbsp;<?php echo $row["pprice"] . " " . "/="; ?>
                                                </b>
                                            </a>
                                            <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-dark mt-1" style="background-color: #28a745;"><b><i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i></b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Related Product Section End============================================= -->

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
    <!---Auto fetch price info--->
    <script type="text/javascript">
        function priceChange(Pricevalue) {
            ppid = $('#ppid').val();
            $.ajax({

                url: 'priceinfofetch.php',
                type: 'POST',
                data: {
                    Pricepost: Pricevalue,
                    ppid: ppid,
                },
                success: function(result) {
                    $('#fetchPriceonchange').html(result);
                }

            });
        }
    </script>
    <!---Auto fetch price info--->
    <!--additional scripts area start--->
    <!--- add item to cart area start---->
    <script type="text/javascript">
        $(document).ready(function() {




            $(".addItemBtn").click(function(e) {
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find("#pid").val();
                var pname = $form.find(".pname").val();
                var pimg = $form.find(".pimg").val();
                var ptype = $form.find("#ptype").val();
                var pprice = $form.find("#fetchPriceonchange").val();
                var discount = $form.find(".discount").val();
                var qty = $form.find(".qty").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {
                        pid: pid,
                        pname: pname,
                        pimg: pimg,
                        ptype: ptype,
                        pprice: pprice,
                        discount: discount,
                        qty: qty
                    },
                    success: function(response) {
                        $("#message").html(response);
                        load_cart_item_number();
                    }
                });
            });

            //cart icon value update
            load_cart_item_number();

            function load_cart_item_number() {
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {
                        cartItem: "cart_item"
                    },
                    success: function(response) {
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>
    <!--- add item to cart area end---->
    <!-- plus minus button control for quantity--->
    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>


    <!-- plus minus button control for quantity--->
    <!--additional scripts area start--->
    <!-- Scripts Section Area End============================================= -->
</body>

</html>