<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   $page = 'index';
   require_once('includes/cdn.php');
   ?>
   <style>
      .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         max-width: 400px;
         margin: auto;
         text-align: center;
         font-family: arial;
      }

      .title {
         color: grey;
         font-size: 18px;
      }

      button {
         border: none;
         outline: 0;
         display: inline-block;
         padding: 8px;
         color: black;
         background-color: #FED700;
         text-align: center;
         cursor: pointer;
         width: 100%;
         font-size: 18px;
         border-radius: 15px;
      }

      button:hover,
      a:hover {
         opacity: 0.7;
      }
   </style>
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
                  <?php
                  $id = $_SESSION['id'];
                  $query = "SELECT * FROM user WHERE id='$id'";
                  $data = mysqli_query($con, $query);
                  $serial_no = 1;
                  if (mysqli_num_rows($data) > 0) {
                     while ($row = mysqli_fetch_assoc($data)) {
                  ?>
                        <h2 style="text-align:center">Welcome&nbsp;<?php echo $row['name']; ?></h2>
                        <div class="card">
                           <div class="card-body">
                              <img src="subcategory/avatar.png" alt="No image available" style="height: 50%; width: 50%">
                              <h1><?php echo $row['name']; ?></h1>
                              <?php
                              if ($row['status'] == 0) {
                              ?>
                                 <!-- <span class="badge badge-pill badge-primary">Premium Member</span> -->
                                 <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal">Premium Member</button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="modalLabel">Benifites of our Premium Membership</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>

                                          <div class="modal-body">
                                             <ol class="list-group list-group-numbered">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold text-left">Free Delivery</div>
                                                     <p> Customer will get Free Delivery on Premium Membership. </p>
                                                   </div>
                                                   <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold text-left">Discount</div>
                                                      <p class="text-left">Customer will get 10% Discountat on purchase the time of delivery the product. </p>
                                                   </div>
                                                   <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                   <div class="ms-2 me-auto">
                                                      <div class="fw-bold text-left"><i class="fa-solid fa-truck-bolt px-1"></i>Fast Delivery</div>
                                                      <p>Customer will get their product within 3-4 days.</p>
                                                   </div>
                                                   <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                                                </li>
                                             </ol>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Modal End -->
                              <?php
                              }
                              ?>
                              <p class="title py-2"><?php echo $row['email']; ?></p>
                              <p class="title"><?php echo $row['ccode']; ?>&nbsp;<?php echo $row['mobile']; ?></p>
                           </div>
                           <div class="card-footer">
                              <a type="button" class="btn btn-warning" href="ChangeProfile?id=<?php echo $row["id"]; ?>">Update your profile</a>
                           </div>
                        </div>
                  <?php
                     }
                  }
                  ?>
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