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
<div class="fancy-title title-dotted-border topmargin-sm mb-4 title-center">
   <h4>All Products</h4>
</div>

<div class="row grid-6">
   <?php
   $sql = "SELECT * FROM product ORDER BY `date` LIMIT 10";
   $result = mysqli_query($con, $sql);
   $video_id = '';
   while ($row = mysqli_fetch_array($result)) {
   ?>
      <div class="col-lg-2 col-md-3 col-6 px-2">
         <div class="product iproduct clearfix">
            <div class="product-image">
               <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Image 1" style="width:200px;height:200px;"></a>
               <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><img src="<?php echo $row['pimg']; ?>" alt="Image 1" style="width:200px;height:200px;"></a>
               <div class="sale-flash" style="background-color: #28a745;color:black;">
                  <?php
                  if ($row['discount'] > 0) {
                  ?>
                     <span class="lead"><span class="badge badge-success" style="color:#fff;"><?php echo $row['discount'] . ' % Off' ?></span></span>
                  <?php
                  } else {
                  ?>
                     <span><span class="badge"><i class="fas fa-inventory"></i>Sale!</span></span>
                  <?php
                  }
                  ?>
               </div>
               <div class="product-overlay" align="center">
                  <?php
                  if ($row['stock'] > 0) {
                  ?>
                     <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="add-to-cart">
                        <i class="icon-shopping-cart"></i>
                        <span> Add to Cart</span>
                     </a>
                  <?php
                  } else {
                  ?>
                     <!--  <del><a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="add-to-cart">
                        <i class="icon-shopping-cart"></i>
                        <span>Out of stock</span></del> -->
                     <!-- <button><span style="color: #28a745;"><b><del> Out of stock </del></b></span></button> -->
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
                     <center><a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><?php echo $row['pname']; ?></a></center>
                  </h3>
                  <a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1 change" style="background-color: #28a745;">
                     <b>
                        <!-- <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i> -->
                        <i class="fa fa-money" aria-hidden="true"></i></i>&nbsp;&nbsp;<?php echo $row["pprice"] . " " . "/="; ?>
                     </b>
                  </a>
                  <a href="viewProduct.php?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>" class="btn btn-block text-light mt-1" style="background-color: #28a745;"><b>
                        <i class="icon-shopping-cart"></i>&nbsp;Add to cart&nbsp;<i class="icon-shopping-cart"></i>
                     </b>
                  </a>
               </div>
            </div>
         </div>
      </div>
   <?php
   }
   ?>
</div>