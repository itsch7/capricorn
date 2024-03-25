<!DOCTYPE html>
<html lang="en">
<?php

include 'header-files.php';
?>

<style>
 
    .header-intro-clearance .header-bottom .menu.sf-arrows > li > .sf-with-ul-pg::after{
        display: block;
    }
  
   
   

</style>

<body>
    <div class="page-wrapper">
    <?php
include 'header.php';
?>

<?php


// SQL query to fetch data from a table
$sql = "SELECT p.ProductID,p.Slug, p.Name as ProductName,p.Price  , c.Name as CategoryName, pi.ImageURL
FROM products p
JOIN categories c ON p.CategoryID = c.CategoryID
LEFT JOIN productimages pi ON p.ProductID = pi.ProductID where pi.isMain =true";
$result = $conn->query($sql);

$sqlCat = "SELECT * from categories";
$resultCat = $conn->query($sqlCat);
$sqlFeatured = "Select fp.*, fc.Name FROM featured_products fp INNER JOIN featured_category fc on fp.feature_category_id =fc.feature_category_id";
$resultFeatured= $conn->query($sqlFeatured);
?>



        <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <?php
                    // Check if any records are fetched
                    if ($resultFeatured->num_rows > 0) {
                        // Output data of each row
                        while($row = $resultFeatured->fetch_assoc()) {
                        
                            echo "<div class='intro-slide' style='background-image: url({$row["imageUrl"]});'>
                            <div class='container intro-content'>
                                <div class='row justify-content-end'>
                                   
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div>";
                        }} ?>
                 
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="container">
                <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->
                
                <div class="cat-blocks-container">
                    <div class="row">
                    <?php
                    // Check if any records are fetched
                    if ($resultCat->num_rows > 0) {
                        // Output data of each row
                        while($row = $resultCat->fetch_assoc()) {

                            echo "<div class='col-6 col-sm-4 col-lg-2'>
                            <a class='cat-block'>
                                <figure>
                                    <span>
                                        <img src={$row["ImageUrl"]} alt='Category image'>
                                    </span>
                                </figure>
                        
                                <h3 class='cat-block-title'>{$row["Name"]}</h3>
                            </a>
                        </div>"; // Wrap array element access with curly braces {}
                        }
                    } 
                    ?>
                     
                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->

      

            <div class="mb-3"></div><!-- End .mb-5 -->

            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">New Arrivals</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                            </li>
                      
                       
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>

                            <?php
// Check if any records are fetched
                         if ($result->num_rows > 0) {
    // Output data of each row
                        while($row = $result->fetch_assoc()) {

                                    echo "<div class='product product-2'>
                                    <figure class='product-media'>
                                        <span class='product-label label-circle label-top'>Top</span>
                                        <span class='product-label label-circle label-sale'>Sale</span>
                                        <a href='product.php?id=" . $row["Slug"] . "'>
                                            <img src={$row["ImageURL"]} alt='Product image' class='product-image'>
                                        </a>
                                    </figure><!-- End .product-media -->
                                
                                    <div class='product-body'>
                                        <div class='product-cat'>
                                            <a href='#'>{$row["CategoryName"]}</a>
                                        </div>
                                        <h3 class='product-title'><a href='product.php?id=" . $row["Slug"] . "'>{$row["ProductName"]}</h3>
                                        <div class='product-price'>
                                            <span class='new-price'>$ {$row["Price"]}</span>

                                        </div>
                                   
                                
                                    </div>
                                </div>";

                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                            
                       
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                  
                
                    
              
                 
                </div><!-- End .tab-content -->
            </div><!-- End .container -->


          



            <div class="mb-4"></div><!-- End .mb-4 -->


            <div class="icon-boxes-container bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>Orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>when you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->

        <?php
         include 'footer.php';
?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
   
  
</body>

<?php
include 'footer-files.php';
?>
</html>