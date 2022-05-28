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

<div class="fancy-title title-dotted-border mt-4 mb-1 title-center">
    <h4>Popular Products</h4>
</div>
<div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" 
data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" 
data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
    <!-- Shop Item 1 ============================================= -->

    <?php
    $query = "SELECT * FROM product WHERE popular='1' and status = '1' ORDER BY RAND() LIMIT 10 ";
    $data = mysqli_query($con, $query);
    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
    ?>
            <div class="oc-item">
                <div class="product iproduct clearfix">
                    <div class="product-image">
                        <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Seeds" style="width:200px;height:200px;"></a>
                        <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Seeds" style="width:200px;height:200px;"></a>
                        <div class="sale-flash" style="background-color: #28a745;color:#000000;">
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
                                <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="add-to-cart">
                                    <i class="icon-shopping-cart"></i>
                                    <span> Add to Cart</span>
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
                                    <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><?php echo $row['pname']; ?></a>
                                </center>
                            </h3>

                            <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1" style="background-color: #28a745;">
                                <b>
                                    <!-- <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i> -->
                                    <i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;&nbsp;<?php echo $row["pprice"] . " " . "/="; ?>
                                </b>
                            </a>

                            <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1" style="background-color: #28a745;">
                                <b>
                                    <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i>
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>