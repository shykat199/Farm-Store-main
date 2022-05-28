 <!--- sweet alert popup area --->
 <?php
   if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
   ?>
    <script>
       swal.fire({
          title: "<?php echo $_SESSION['status']; ?>",
          //text: "Category added successfully!",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          button: "Ok!",
       });
    </script>
 <?php
      unset($_SESSION['status']);
   }
   ?>
 <!--- sweet alert popup area end --->