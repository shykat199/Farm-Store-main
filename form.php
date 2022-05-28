<?php

include('config/dbconfig.php');
if (isset($_POST['rev_post'])) {

    $uid = $_SESSION['id'];
    $user_email = $_GET['id'];

    $user_email = $_POST['user_email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    print_r($_POST);
   

    $query = "INSERT INTO product_review(`product_id`,`user_id`,`user_email`,`rating`,`review`,`status`) 
    VALUES ('$prid','$uid','$user_email','$rating','$review',0)";
    $result = mysqli_query($con, $query);
    if ($result == TRUE) {
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire({
          icon: 'success',
          title: 'Thanks!',
          text: 'Review Added Successfully!',
          footer: '<b>Happy Shopping!</b>'
       });";
        echo '}, 1000);</script>';
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

?>