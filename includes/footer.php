<footer id="footer" class="nobg noborder">

   <div class="container clearfix">

      <!-- Footer Widgets
				============================================= -->
      <div class="footer-widgets-wrap pb-3 border-bottom clearfix">

         <div class="row">

            <div class="col-lg-2 col-md-3 col-6">
               <div class="widget clearfix">

                  <h4 class="ls0 mb-3 nott">Important Links</h4>

                  <ul class="list-unstyled iconlist ml-0">
                     <li><a href="mailTo:farmstore@gmail.com"> Help Center </a></li>
                     <li><a href="aboutus.php">About Us</a></li>
                     <li><a href="ContactUs">Contact Support</a></li>
                     <li><a href="OurTeam.php">Our Team</a></li>
                  </ul>

               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
               <div class="widget clearfix">

                  <h4 class="ls0 mb-3 nott">Catagories</h4>

                  <ul class="list-unstyled iconlist ml-0">
                     <?php
                     $query = "SELECT * FROM category ORDER BY rand() LIMIT 5";
                     $data = mysqli_query($con, $query);
                     if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                     ?>
                           <li><a href="Catagory?id=<?php echo $row["id"]; ?>"><?php echo $row['catname']; ?></a></li>
                     <?php
                        }
                     }
                     ?>
                  </ul>

               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
               <div class="widget clearfix">

                  <h4 class="ls0 mb-3 nott">Sub Catagories</h4>

                  <ul class="list-unstyled iconlist ml-0">
                     <?php
                     $query = "SELECT id as sid,name,cat_id as cid FROM subcategory ORDER BY rand() LIMIT 5";
                     $data = mysqli_query($con, $query);
                     if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                     ?>
                           <li><a href="SubCatagory?sid=<?php echo $row["sid"]; ?>&cid=<?php echo $row["cid"]; ?>"><?php echo $row['name']; ?></a></li>
                     <?php
                        }
                     }
                     ?>
                  </ul>

               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
               <div class="widget clearfix">

                  <h4 class="ls0 mb-3 nott">Products</h4>

                  <ul class="list-unstyled iconlist ml-0">
                     <?php
                     $query = "SELECT * FROM product WHERE popular='1' and status = '1' ORDER BY rand() LIMIT 5";
                     $data = mysqli_query($con, $query);
                     if (mysqli_num_rows($data) > 0) {
                        while ($row = mysqli_fetch_assoc($data)) {
                     ?>
                           <li><a href="Product?id=<?php echo $row["id"]; ?>&cid=<?php echo $row["cid"]; ?>"><?php echo $row['pname']; ?></a></li>
                     <?php
                        }
                     }
                     ?>
                  </ul>

               </div>
            </div>
            <div class="col-lg-4 col-md-8">
               <div class="widget clearfix">

                  <h4 class="ls0 mb-3 nott">Subscribe Now</h4>
                  <div class="widget subscribe-widget mt-2 clearfix">
                     <p class="mb-4"><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing
                        Offers &amp; Inside Scoops:</p>
                     <div class="widget-subscribe-form-result"></div>
                     
                     <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="mt-1 nobottommargin d-flex">
                        <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control sm-form-control required email" placeholder="Enter your Email Address">

                        <button class="button nott t400 ml-1 my-0 text-dark" type="submit" style="background-color: #2bff01;">Subscribe Now</button>
                     </form>
                  </div>

               </div>
            </div>

         </div>

      </div><!-- .footer-widgets-wrap end -->

   </div>

   <!-- Copyrights ============================================= -->
   <div id="copyrights" class="nobg">

      <div class="container clearfix">

         <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
               Copyrights &copy; 2022 All Rights Reserved by Farm Store.<br>
               Designed By &copy; Farm Store.
            </div>

            <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
               <div class="copyrights-menu copyright-links clearfix">
                  <div class="copyright-links"><a href="privacypolicy.php">Terms of Use</a> / <a href="privacypolicy.php">Privacy Policy</a></div>
               </div>
            </div>
         </div>

      </div>

   </div>
   <!-- #copyrights end -->

</footer>