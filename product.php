<!DOCTYPE html>
<html lang="en">
<?php

include 'header-files.php';
?>

<body>
    <div class="page-wrapper">

        <?php
        include 'header.php';
        ?>
        <?php
        $mainRecords = array();
        $nonMainRecords = array();
        // Get the current URL
        $currentUrl = $_SERVER['REQUEST_URI'];

        $queryParams = parse_url($currentUrl, PHP_URL_QUERY);

        parse_str($queryParams, $params);
        $id = isset($params['id']) ? (string)$params['id'] : null;
        // echo $id;

        $sqlProd = "SELECT  p.*, c.Name as CategoryName, pi.ImageURL,pi.isMain from products p inner join categories c on p.CategoryID =c.CategoryID LEFT JOIN productimages as pi on p.ProductID= pi.ProductID where p.Slug ='$id' Limit 4";
        $resultProd = $conn->query($sqlProd);

// Check if any records are fetched
if ($resultProd->num_rows > 0) {
    // Separate main and non-main records
    while ($row = $resultProd->fetch_assoc()) {
        if ($row["isMain"]) {
            // If it's a main record, add it to the main records array
            $mainRecords[] = $row;
        } else {
            // If it's a non-main record, add it to the non-main records array
            $nonMainRecords[] = $row;
        }
    }
}

        $sqlSingleProduct = "SELECT p.*,c.Name as CategoryName from products p inner join categories c on p.CategoryID =c.CategoryID where p.ProductID ='$id'";
        $resultSingleProd = $conn->query($sqlSingleProduct);

        $sqlProReview = "SELECT p.*,r.review_text,r.reviewer_name,r.review_title,r.review_date from products p inner join reviews r on p.ProductID = r.product_id  where p.ProductID ='$id'";
        $resultsqlProReview = $conn->query($sqlProReview);


        ?>
        <main class="main" style="margin-top:40px">

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <?php
                                             foreach ($mainRecords as $record) {

                                                echo "<a id='product-zoom' href='#' data-image='{$record["ImageURL"]}' data-zoom-image='{$record["ImageURL"]}'>
                                                <img src='{$record["ImageURL"]}' alt='product cross'>
                                            </a>";
                                            }
                                          
                                            ?>
                                            


                                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                     
                                            <?php
                                             foreach ($mainRecords as $record) {

                                                 echo "
                                                                         
                                                 <a class='product-gallery-item active' href='#' data-image={$record["ImageURL"]} data-zoom-image={$record["ImageURL"]}>
                                                     <img src={$record["ImageURL"]} alt='product cross'>
                                                 </a>
                    
                                                         
                                                         
                                                         ";
                                             }

                                             foreach ($nonMainRecords as $record) {
                                                echo "
                                                                         
                                                <a class='product-gallery-item' href='#' data-image={$record["ImageURL"]} data-zoom-image={$record["ImageURL"]}>
                                                    <img src={$record["ImageURL"]} alt='product cross'>
                                                </a>
                   
                                                        
                                                        
                                                        ";
                                             }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <?php
                                // Check if any records are fetched
                                if ($resultSingleProd->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $resultSingleProd->fetch_assoc()) {

                                        echo "
                                        <div class='product-details'>
                                        <h1 class='product-title'>{$row["Name"]}</h1>
                                    
                                       
                                    
                                        <div class='product-price'>
                                        {$row["Price"]}
                                        </div>
                                    
                                        <div class='product-content'>
                                            <p>{$row["Description"]}
                                            </p>
                                        </div>
                                    
                                      
                                    
                                      
                                    
                                      
                                    
                                        <div class='product-details-footer'>
                                            <div class='product-cat'>
                                                <span>Category:</span>
                                                <a href='#'>{$row["CategoryName"]}</a>,
                                              
                                            </div><!-- End .product-cat -->
                                    
                                            <div class='social-icons social-icons-sm'>
                                                <span class='social-label'>Share:</span>
                                                <a href='#' class='social-icon' title='Facebook' target='_blank'><i
                                                        class='icon-facebook-f'></i></a>
                                              
                                            </div>
                                        </div>
                                    </div>
                    
                          
                        ";
                                    }
                                }
                                ?>


                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                    role="tab" aria-controls="product-info-tab" aria-selected="false">Additional
                                    information</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                    href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                    aria-selected="false">Shipping & Returns</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab"
                                    href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                    aria-selected="false">Reviews (<?php echo $resultsqlProReview->num_rows; ?>)</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                        non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                        fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                        felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                        ligula vulputate sem tristique cursus. </p>
                                    <ul>
                                        <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                                        <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                        non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                        fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                        felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                        ligula vulputate sem tristique cursus. </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                                aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                        non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                        fermentum. Aliquam porttitor mauris sit amet orci. </p>




                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the
                                        delivery options we offer, please view our <a href="#">Delivery
                                            information</a><br>
                                        We hope you’ll love every purchase, but if you ever need to return an item you
                                        can do so within a month of receipt. For full details of how to make a return,
                                        please view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                aria-labelledby="product-review-link">
                                <div class="reviews">

                                    <h3>Reviews
                                        <?php echo $resultsqlProReview->num_rows; ?>
                                    </h3>
                                    <?php if ($resultsqlProReview->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $resultsqlProReview->fetch_assoc()) {
                                            echo "<div class='review'>
                                        <div class='row no-gutters'>
                                            <div class='col-auto'>
                                                <h4><a href='#'>{$row["reviewer_name"]}</a></h4>
                                                <div class='ratings-container'>
                                                    <div class='ratings'>
                                                        <div class='ratings-val' style='width: 80%;'></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class='review-date'>6 days ago</span>
                                            </div><!-- End .col -->
                                            <div class='col'>
                                                <h4>{$row["review_title"]}</h4>
                                    
                                                <div class='review-content'>
                                                    <p>{$row["review_text"]}</p>
                                                </div><!-- End .review-content -->
                                    
                                                <div class='review-action'>
                                                    <a href='#'><i class='icon-thumbs-up'></i>Helpful (2)</a>
                                                    <a href='#'><i class='icon-thumbs-down'></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div>";
                                        }
                                    } ?>


                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->


                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php
        include 'footer.php';
        ?>
    </div>
</body>
<?php
include 'footer-files.php';
?>

</html>