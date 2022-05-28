<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   $page = 'index';
   require_once('includes/cdn.php');
   $id = $_GET['id'];
   $sql = "SELECT * FROM user WHERE id = '$id'";
   $result =  mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result);
   if (isset($_POST['update'])) {
      $name = $_POST["name"];

      $email = $_POST["email"];

      $mobile = $_POST["mobile"];

      $update_sql = "UPDATE user SET name='$name',email='$email',mobile='$mobile' WHERE id='$id' ";

      $update_result = mysqli_query($con, $update_sql);
      if ($update_result == TRUE) {
         $_SESSION['status'] = "Updated Successfully!";
         $_SESSION['status_code'] = "success";
         header('location:Profile');
      } else {
         $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
         $_SESSION['status_code'] = "error";
         header('location:Profile');
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
                        <h5>Update Profile Info.</h5>
                     </div>
                     <div class="card-block">
                        <!----page body content write here--->
                        <div class="card shadow p-4">
                           <form method="post" id="form">
                              <?php
                              $id = $_GET['id'];
                              $sql = "SELECT * FROM user WHERE id = '$id'";
                              $result =  mysqli_query($con, $sql);
                              $rows = mysqli_fetch_array($result);
                              ?>
                              <div class="form-group">
                                 <label class="font-weight-bold">User Name*</label>
                                 <input type="text" name="name" class="form-control" value="<?php echo $rows['name'] ?>" autocomplete="off" required>
                              </div>

                              <div class="form-group">
                                 <label class="font-weight-bold">E-Mail*</label>
                                 <input type="text" name="email" class="form-control" value="<?php if (isset($rows["email"])) {
                                                                                                echo $rows["email"];
                                                                                             } ?>" autocomplete="off" required>
                              </div>

                              <div class="form-group">
                                 <label class="font-weight-bold">Contact Number*</label>
                                 <input type="text" name="mobile" class="form-control" value="<?php if (isset($rows["mobile"])) {
                                                                                                   echo $rows["mobile"];
                                                                                                } ?>" autocomplete="off" required data-parsley-pattern="^\+?(88)?0?1[3456789][0-9]{8}\b">
                              </div>
                              <button type="submit" name="update" id="submit" class="btn btn-warning">Save changes</button>
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