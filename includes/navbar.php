<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<header id="header" class="full-header clearfix">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
              ============================================= -->
            <div id="logo">
                <a href="Homepage" class="standard-logo"><img src="subcategory/farm_logo.jpg"></a>
                <a href="Homepage" class="retina-logo"><img src="subcategory/farm_logo.jpg"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
              ============================================= -->
            <nav id="primary-menu" class="style-2 with-arrows">

                <ul>
                    <li class="current"><a href="Homepage">
                            <div class="text-light">Home</div>
                        </a></li>
                    <!-- Mega Menu
                  ============================================= -->
                    <li class="mega-menu"><a href="#">
                            <div class="text-light">Catagories</div>
                        </a>
                        <div class="mega-menu-content style-2 clearfix">

                            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                <?php
                                $query = "SELECT * FROM category";
                                $data = mysqli_query($con, $query);
                                if (mysqli_num_rows($data) > 0) {
                                    while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                        <ul class="mega-menu-column border-left-0 col-lg-3">
                                            <li class="nav-item">
                                                <p><img src="<?php echo $row['catimg']; ?>" style="width:20px;height:20px;">&nbsp;<a href="Catagory?id=<?php echo $row["id"]; ?>"><?php echo $row['catname']; ?></a>
                                                </p>
                                            </li>
                                        </ul>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <ul class="mega-menu-column border-left-0">
                                    <li class="card p-0 nobg noborder">
                                        <img class="card-img-top" src="images/4.jpg" alt="image cap">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .mega-menu end -->
                    <!--mobile menu cart --->
                    <?php
                    if (!isset($_SESSION['id'])) {
                    ?>

                        <li>
                            <a href="ContactUs">
                                <div class="text-light"><i class="icon-life-ring mr-1 position-relative" style="top: 1px;"></i>Contact Us
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="Login">
                                <div class="text-light"><i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i>Login</div>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <a href="ContactUs">
                                <div class="text-light"><i class="icon-life-ring mr-1 position-relative" style="top: 1px;"></i>Contact Us
                                </div>
                            </a>

                        </li>
                        
                        <li class="nav-item dropdown" style="list-style: none;">
                            <a class="nav-link dropdown-toggle position-relative text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i>
                                Welcome
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="trackorder">Track Orders</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Profile">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="BilligAddress">Address</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="ChangePassword">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>

                            </div>
                        </li>
                    <?php
                    }
                    ?>

                    <!-- SEARCH ============================================= -->

                    <li>

                    <?php
                if (!isset($_SESSION['id'])) {
                ?>
                    <div id="top-cart">
                        <a class="text-light"><i class="icon-line-bag"></i><span>0</span></a>
                    </div>
                <?php
                } else {
                ?>
                    <?php

                    $id = $_SESSION['id'];
                    $query = ("SELECT * FROM cart_table WHERE uid = '$id'");
                    $data = mysqli_query($con, $query);
                    $total = mysqli_num_rows($data);
                    ?>


                    <div id="top-cart">
                        <a href="Cart"><i class="icon-line-bag"></i><span class="text-white" id="cart-item"><?php echo $total; ?></span></a>
                    </div>
                    <!-- <form action="search.php" method="post">
                                <div class="row">
                                    <div class="col-10">
                                        <input type="search" class="form-control rounded" name="search" placeholder="Search"
                                               aria-label="Search" aria-describedby="search-addon"/>
                                    </div>
                                    <div class="col-2">
                                        <button class="input-group-text border-0 p-2" id="search-addon" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> -->

                <?php
                }
                ?>
                        
                    </li>


                </ul>
                <!-- Top Cart ============================================= -->
 
                <div id="top-cart" >
                    <form action="search.php" method="post" style="margin-bottom: 0px;">
                                <div class="row">
                                    <div class="col-10">
                                        <input type="search" class="form-control rounded" name="search" placeholder="Search......"
                                               aria-label="Search" aria-describedby="search-addon"/>
                                    </div>
                                    <div class="col-2">
                                        <button class="input-group-text border-0 p-2" id="search-addon" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    
                    

                <!-- #top-cart end -->
            </nav>
        </div>
    </div>
</header>