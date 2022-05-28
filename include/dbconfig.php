<?php
if (!isset($_SESSION['username'])) {
  session_start();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  //Username, Password and Database
  $con = new mysqli("localhost", "root", "", "ecommerce");
  $con->set_charset("utf8mb4");
} catch (Exception $e) {
  error_log($e->getMessage());
  //Should be a message a typical user could understand
}

/* function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
{
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    $background = imagecolorallocate($imageLayer, 0, 0, 0);
    // removing the black from the placeholder
    imagecolortransparent($imageLayer, $background);

    // turning off alpha blending (to ensure alpha channel information
    // is preserved, rather than removed (blending with the rest of the
    // image in the form of black))
    imagealphablending($imageLayer, false);

    // turning on alpha channel information saving (to ensure the full range
    // of transparency is preserved)
    imagesavealpha($imageLayer, true);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
} */
