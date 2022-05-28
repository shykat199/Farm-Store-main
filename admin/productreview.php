<?php include('../include/dbconfig.php') ?>
<?php include('include/session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Product Review - Farm Store</title>
    <?php include('include/csslist.php') ?>
</head>
<body class="sb-nav-fixed">
<?php include('include/topbar.php') ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include('include/sidebar.php') ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Product Review</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Product Review List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>User Email</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Time/Date</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sel = $con->query("SELECT user.name,user.email,product_review.id,product_review.rating,
                                    product_review.review,product_review.added_on,product_review.status 
                                    FROM user,product_review 
                                    WHERE product_review.user_id = user.id ORDER  BY product_review.added_on desc");
                                    $i = 0;
                                    while ($row = $sel->fetch_assoc()) {

                                        $i = $i + 1;
                                        ?>
                                        <tr>

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>

                                            <td><?php echo $row['rating']; ?></td>
                                            <td><?php echo ucfirst($row['review']); ?></td>
                                            <td><?php echo $row['added_on']; ?></td>

                                            <td><?php if ($row['status'] == 0) { ?>
                                                    <a href="?status=1&id=<?php echo $row['id']; ?>"><button class="btn btn-primary"> Publish</button></a>
                                                <?php } else { ?>
                                                    <a href="?status=0&id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Unpublish</button></a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php
                        if (isset($_GET['status'])) {
                            $status = $_GET['status'];
                            $id = $_GET['id'];

                            $con->query("update product_review set status='" . $status . "' where id=" . $id . "");
                            echo '<script type="text/javascript">';
                            echo "setTimeout(function () { swal({title: 'Review Status', text: 'Product Review Status Update Successfully', type: 'success', confirmButtonClass: 'btn-success', confirmButtonText: 'OK', },function() {window.location = 'productreview.php';});";
                            echo '}, 1000);</script>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </main>
        <?php include('include/footer.php') ?>
    </div>
</div>
<?php include('include/jslist.php') ?>

</body>
</html>
