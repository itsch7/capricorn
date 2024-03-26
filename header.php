<?php
include ('dbcon.php');
?>
<header class="header header-intro-clearance header-4">
    <?php
    $catArray = array();

    // SQL query to fetch data from a table
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $sqlComp = "SELECT * FROM companyinfo";
    $resultComp = $conn->query($sqlComp);
    while ($row = $result->fetch_assoc()) {
        $catArray[] = $row;
    }



    // Check if any records are fetched
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
    
    //         echo "ID: " . $row["CategoryID"]. " - Name: " . $row["Name"]. "<br>";
    
    //     }
// } else {
//     echo "0 results";
// }
    

    ?>

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.php" class="logo" style="font-size:36px">
                    <!-- <img src="assets/images/demos/demo-4/logo.png" alt="Molla Logo" width="105" height="25">
                            -->
                            𝕮𝖆𝖕𝖗𝖎𝖈𝖔𝖗𝖓 𝕰𝖘𝖙𝖔𝖗𝖊
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="product.php" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="search.php">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" onclick="window.location.href = 'search.php'"><i
                                    class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..."
                                required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <div class="header-right">
                <div class="dropdown compare-dropdown phone">
                    <?php





                    if ($resultComp->num_rows > 0) {
                        while ($row = $resultComp->fetch_assoc()) {

                            echo "<p><a class='icon-header-phone' href='tel:#'><i class='icon-phone'  style='margin-right:7px'></i>Call: {$row["phone"]}</a>
        </p>";

                        }
                    }


                    ?>




                </div><!-- End .compare-dropdown -->


            </div><!-- End .header-right -->


        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Browse Categories">
                        Browse Categories <i class="icon-angle-down"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                            <?php
                        // Check if any records are fetched
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            foreach ($catArray as $cat) {
                                echo "<li><a> {$cat["Name"]} </a></li>"; // Wrap array element access with curly braces {}
                            }
                        } else {
                            echo "<li>No categories found.</li>";
                        }
                        ?>
                                <!-- <li class="item-lead"><a href="#">Daily offers</a></li>
                                       <li class="item-lead"><a href="#">Gift Ideas</a></li>
                                       <li><a href="#">Beds</a></li>
                                       <li><a href="#">Lighting</a></li>
                                       <li><a href="#">Sofas & Sleeper sofas</a></li>
                                       <li><a href="#">Storage</a></li>
                                       <li><a href="#">Armchairs & Chaises</a></li>
                                       <li><a href="#">Decoration </a></li>
                                       <li><a href="#">Kitchen Cabinets</a></li>
                                       <li><a href="#">Coffee & Tables</a></li>
                                       <li><a href="#">Outdoor Furniture </a></li> -->
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="index.php" class="sf-with-ul">Home</a>
                        </li>

                        <li>
                            <a href="about.php" class="sf-with-ul">About</a>

                        </li>
                        <li><a href="faq.php">FAQs</a></li>
                        <li>
                            <a href="contact.php" class="sf-with-ul">Contact Us</a>

                        </li>
                        <!-- <li>
                            <a href="#" class="sf-with-ul sf-with-ul-pg">Pages</a>

                            <ul>
                            </ul>
                        </li> -->


                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->


        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="search.php" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..."
                required>
            <button class="btn btn-primary" onclick="window.location.href = 'search.php'" ><i
                    class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab"
                    aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab"
                    aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="index.php">Home</a>

                        </li>




                        <li>
                            <a href="about.php">About</a>


                        </li>
                        <li><a href="faq.php">FAQs</a></li>
                        
                        <li>
                            <a href="contact.php">Contact Us</a>


                        </li>

                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <?php
                        // Check if any records are fetched
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            foreach ($catArray as $cat) {
                                echo "<li><a > {$cat["Name"]} </a></li>"; // Wrap array element access with curly braces {}
                            }
                        } else {
                            echo "<li>No categories found.</li>";
                        }
                        ?>
                        <!-- <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                            <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                            <li><a href="#">Beds</a></li>
                            <li><a href="#">Lighting</a></li>
                            <li><a href="#">Sofas & Sleeper sofas</a></li>
                            <li><a href="#">Storage</a></li>
                            <li><a href="#">Armchairs & Chaises</a></li>
                            <li><a href="#">Decoration </a></li>
                            <li><a href="#">Kitchen Cabinets</a></li>
                            <li><a href="#">Coffee & Tables</a></li>
                            <li><a href="#">Outdoor Furniture </a></li> -->
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->

     
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->