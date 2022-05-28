<?php
include('config/dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Colorlib Templates">
   <meta name="author" content="Colorlib">
   <meta name="keywords" content="Colorlib Templates">

   <!-- Title Page-->
   <title>Farm Store</title>

   <link rel="shortcut icon" href="">

   <!-- Icons font CSS-->
   <link href="signpFiles/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="signpFiles/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <!-- Font special for pages-->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- signpFiles/Vendor CSS-->
   <link href="assets/css/select2.min.css" rel="stylesheet" />
   <link href="signpFiles/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

   <!-- Main CSS-->
   <link href="signpFiles/css/main.css" rel="stylesheet" media="all">
       <style>
      .box {
         width: 100%;
         max-width: 600px;
         background-color: #f9f9f9;
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 16px;
         margin: 0 auto;
      }

      input.parsley-success,
      select.parsley-success,
      textarea.parsley-success {
         color: #468847;
         background-color: #DFF0D8;
         border: 1px solid #D6E9C6;
      }

      input.parsley-error,
      select.parsley-error,
      textarea.parsley-error {
         color: #B94A48;
         background-color: #F2DEDE;
         border: 1px solid #EED3D7;
      }

      .parsley-errors-list {
         margin: 2px 0 3px;
         padding: 0;
         list-style-type: none;
         font-size: 0.9em;
         line-height: 0.9em;
         opacity: 0;

         transition: all .3s ease-in;
         -o-transition: all .3s ease-in;
         -moz-transition: all .3s ease-in;
         -webkit-transition: all .3s ease-in;
      }

      .parsley-errors-list.filled {
         opacity: 1;
      }

      .parsley-type,
      .parsley-required,
      .parsley-equalto {
         color: #ff0000;
      }
   </style>
</head>

<body>
   <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
      <div class="wrapper wrapper--w680">
         <div class="card card-4">
            
            <div class="card-body">
               <h2 class="title text-center">Registration Form</h2>
               <form method="POST" id="registration_form" action="dbinsertfunction.php">
                  <div class="row row-space">
                     <div class="col-2">
                        <div class="input-group">
                           <label for="fname">Full-Name<b style="color:#ff0000;">*</b></label>
                           <input type="text" class="input--style-4" name="name" id="fname" placeholder="enter your name" 
                           required data-parsley-trigger="keyup" />
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="input-group">
                           <label for="email">E-mail<b style="color:#ff0000;">*</b></label>
                           <input type="email" class="input--style-4" name="email" id="email" placeholder="enter valid email" 
                           required data-parsley-type="email" data-parsley-trigger="keyup" />
                        </div>
                     </div>
                  </div>
                  <div class="row row-space">
                     <div class="col-2">
                        <div class="input-group">
                           <label class="label">Country Code</label>
                           <div class="rs-select2">
                              <select name="ccode" required class="js-example-basic-single">
                                 <option disabled="disabled" selected="selected">Choose country code</option>
                                    <option value="+88">+88</option>

                              </select>
                              <div class="select-dropdown"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="input-group">
                           <label for="text">Contact Number<b style="color:#ff0000;">*</b></label>
                           <input type="text" name="mobile" class="input--style-4" id="mobile" placeholder="enter valid contact number" 
                           required data-parsley-pattern="^\+?(88)?0?1[3456789][0-9]{8}\b" 
                           data-parsley-minlength-message="Name must be 10 digit*" data-parsley-required="true" autocomplete="off" />
                        </div>
                     </div>
                  </div>
                  <div class="row row-space">
                     <div class="col-2">
                        <div class="input-group">
                           <label for="email">Password<b style="color:#ff0000;">*</b></label>
                           <input type="password" class="input--style-4" name="password" id="password" placeholder="Password" 
                           required data-parsley-trigger="keyup" />
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="input-group">
                           <label for="email">Confirm Password<b style="color:#ff0000;">*</b></label>
                           <input type="password" class="input--style-4" name="confirm_password" id="confirm_password" placeholder="Confirm Password" 
                           data-parsley-equalto="#password" data-parsley-trigger="keyup" required />
                        </div>
                     </div>
                  </div>
                  <div class="p-t-15">
                     <button type="submit" class="btn btn--radius-2 btn--blue" name="signupSubmit">Submit</button>
                  </div>
               </form>
               <br>
               <div>
                  <center>
                     <h4>Already have an account? Go to <a href="Login">Log in</a></h4>
                  </center>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Jquery JS-->
   <script src="signpFiles/vendor/jquery/jquery.min.js"></script>
   <!-- signpFiles/Vendor JS-->
   <script src="assets/js/select2.min.js"></script>
   <script src="signpFiles/vendor/datepicker/moment.min.js"></script>
   <script src="signpFiles/vendor/datepicker/daterangepicker.js"></script>

   <!-- Main JS-->
   <script src="signpFiles/js/global.js"></script>
   <script src="http://parsleyjs.org/dist/parsley.js"></script>
   <script src="datatable.js"></script>
   <script>
      $(document).ready(function() {
         $('#registration_form').parsley();
      });
   </script>
   <script>
      $(document).ready(function() {
         $(".js-example-basic-single").select2();
      });
   </script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php require_once('sweetalert.php'); ?>
   </body>

</html>