<?php
include('config/dbconfig.php');

$count = $_POST['Pricepost'];

$ppid = $_POST['ppid'];

$query = "SELECT pprice FROM product WHERE id = '$ppid'";

$result = mysqli_query($con, $query);
$cnt = 0;
while ($rows = mysqli_fetch_array($result)) {
   $values = explode('$;', $rows['pprice']);
   foreach ($values as $value) {
      if ($count == $cnt) {
?>
         <option value="<?php echo $cnt; ?>"><?php echo $value; ?></option>
<?php
      }
      $cnt = $cnt + 1;
   }
}
