<?php
include('config/dbconfig.php');
if (!isset($_SESSION['id'])) {
   header("location:login.php");
} else {
   if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
      $uid = $_SESSION['id'];
      $productsid = $_POST['productsid'];
      $allproductname = $_POST['allproductname'];
      $allproductqntty = $_POST['allproductqntty'];
      $allproducytype = $_POST['allproducytype'];
      $allproductprice = $_POST['allproductprice'];
      $finalTotal = $_POST['finalTotal'];
      $p_method = $_POST['p_method'];
      $tax = $_POST['tax'];
      $timeslot = $_POST['timeslot'];

      function random_strings($length_of_string)
      {
         // sha1 the timstamps and returns substring 
         // of specified length 
         return substr(sha1(time()), 0, $length_of_string);
      }

      $orderrandomno = random_strings(10);

      $query = "SELECT address.id,address.uid,cart_table.uid FROM address,cart_table WHERE address.uid = cart_table.uid AND address.uid = '$uid'";
      $data = mysqli_query($con, $query);
      $total = mysqli_num_rows($data);
      $adress_id = "";
      if ($total != 0) {
         while ($result = mysqli_fetch_assoc($data)) {
            $adress_id = $result['id'];
         }
      } else {
         "No Records Found!!!";
      }

      $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
      $current_date = $dt->format('Y-m-d');


      $query = "SELECT status,email FROM user WHERE id = '$uid'";
      $data = mysqli_query($con, $query);
      $total = mysqli_num_rows($data);
      if ($total != 0) {
         while ($result = mysqli_fetch_assoc($data)) {
            $user_status = $result['status'];
            $uemail = $result['email'];
         }
      } else {
         "No Records Found!!!";
      }

      if ($user_status == '0') {
         $delivery_date = date('Y-m-d', strtotime($current_date . ' + 3 days'));
      } else {
         $delivery_date = date('Y-m-d', strtotime($current_date . ' + 5 days'));
      }

      $query = "INSERT INTO `orders` (`oid`, `uid`, `pname`, `pid`, `ptype`, `pprice`, `ddate`,`timesloat`,`order_date`,`status`,`qty`,`total`,`p_method`,`tax`,`address_id`) 
VALUES ('$orderrandomno', '$uid ', '$allproductname', '$productsid', '$allproducytype', '$allproductprice', '$delivery_date','$timeslot', '$current_date', 'pending', '$allproductqntty','$finalTotal','$p_method','$tax','$adress_id')";
      $result = mysqli_query($con, $query);
      if ($result == TRUE) {
         $delete_from_cart = "DELETE FROM cart_table WHERE uid = '$uid'";
         $result1 = mysqli_query($con, $delete_from_cart);
         if ($result1 == TRUE) {

            include('./smtp/PHPMailerAutoload.php');

            $mail = new PHPMailer(true);

            try {

               $mail->isSMTP();
               $mail->Host = "smtp.gmail.com";
               $mail->Post = 587;
               $mail->SMTPSecure = "tls";
               $mail->SMTPAuth = true;
               $mail->Username = "xyz@gmail.com"; //static
               $mail->Password = "******"; //static

               $mail->setFrom('abc@gmail.com', 'Admin');

               $mail->addAddress($uemail);
               //$mail->isHTML(true);
               $mail->isHTML(true);   //Set email format to HTML
               $mail->Subject = 'Your Order Details';
               $mail->Body    = '<div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%">
               <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
                   <tbody>
                       <tr>
                           <td width="5px" style="padding: 0;"></td>
                           <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                               <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                                   <tbody>
                                       <tr>
                                           <td style="padding: 0;">
                                               <a
                                                   href="#"
                                                   style="color: #348eda;"
                                                   target="_blank"
                                               >
                                                   <img
                                                       src="https://dcassetcdn.com/design_img/3711618/726116/22421736/60gjxw8vvg9hjney9ah2af9yqs_image.jpg"
                                                       alt="Farmstore.com"
                                                       style="height:100px ; width:100px;"
                                                       height="50"
                                                       width="157"
                                                   />
                                               </a>
                                           </td>
                                           <td style="color: #999; font-size: 12px; padding: 0; text-align: right;" align="right">
                                               Farm Store<br />
                                               Invoice # '.$orderrandomno.'<br />
                                               '.$delivery_date.'
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </td>
                           <td width="5px" style="padding: 0;"></td>
                       </tr>
           
                       <tr>
                           <td width="5px" style="padding: 0;"></td>
                           <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                               <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                                   <tbody>
                                       <tr>
                                           <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;">'.$finalTotal.'/=</strong> Unpaid</td>
                                           <td align="right" width="50%" style="padding: 20px;">Thanks for using <span class="il">Farm Store</span></td>
                                       </tr>
                                   </tbody>
                               </table>
                           </td>
                           <td style="padding: 0;"></td>
                           <td width="5px" style="padding: 0;"></td>
                       </tr>
                       <tr>
                           <td width="5px" style="padding: 0;"></td>
                           <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                               <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                                   <tbody>
                                       <tr>
                                           <td valign="top"  style="padding: 20px;">
                                               <h3
                                                   style="
                                                       border-bottom: 1px solid #000;
                                                       color: #000;
                                                       font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;
                                                       font-size: 18px;
                                                       font-weight: bold;
                                                       line-height: 1.2;
                                                       margin: 0;
                                                       margin-bottom: 15px;
                                                       padding-bottom: 5px;
                                                   "
                                               >
                                                   Summary
                                               </h3>
                                               <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                                   <tbody>
                                                       <tr>
                                                           <td style="padding: 5px 0;">New Plan</td>
                                                           <td align="right" style="padding: 5px 0;"> 10% discount for Premium Member</td>
                                                       </tr>
                                                       <tr>
                                                           <td style="padding: 5px 0;">Tax</td>
                                                           <td align="right" style="padding: 5px 0;"> '.$tax.'</td>
                                                       </tr>
                                                       
                                                      
                                                       <tr>
                                                           <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Amount to paid</td>
                                                           <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">'.$finalTotal.' /=</td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </td>
                           <td width="5px" style="padding: 0;"></td>
                       </tr>
           
                       <tr style="color: #666; font-size: 12px;">
                           <td width="5px" style="padding: 10px 0;"></td>
                           <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                               <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                                   <tbody>
                                       <tr>
                                           <td width="40%" valign="top" style="padding: 10px 0;">
                                               <h4 style="margin: 0;">Questions?</h4>
                                               <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                                   Please visit our
                                                   <a
                                                       href="#"
                                                       style="color: #666;"
                                                       target="_blank"
                                                   >
                                                       Support Center
                                                   </a>
                                                   with any questions.
                                               </p>
                                           </td>
                                           <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                           <td width="40%" valign="top" style="padding: 10px 0;">
                                               <h4 style="margin: 0;"><span class="il">Farm Store</span></h4>
                                               <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                                   <a href="#">Bangladesh</a>
                                               </p>
                                           </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </td>
                           <td width="5px" style="padding: 10px 0;"></td>
                       </tr>
                   </tbody>
               </table>
           </div>
           ';
               
               $mail->SMTPOptions = array('ssl' => array(

                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => false
               ));

               $mail->send();
               return true;
            } catch (Exception $e) {
               return false;
            }

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { swal.fire({title: 'Order Placed!', text: 'Order Placed Successfully', type: 'success', confirmButtonClass: 'btn-success', confirmButtonText: 'OK', },function() {window.location = 'Checkout';});";
            echo '}, 1000);</script>';

         } else {

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { swal.fire({title: 'Sorry!', text: 'Something Went Wrong! Try Agin Later!', type: 'error', confirmButtonClass: 'btn-success', confirmButtonText: 'OK', },function() {window.location = 'Checkout';});";
            echo '}, 1000);</script>';

         }
      }
   }
}
