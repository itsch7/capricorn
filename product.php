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
        $sql = "SELECT p.ProductID,p.Slug, p.Name as ProductName,p.Price  , c.Name as CategoryName, pi.ImageURL
        FROM products p
        JOIN categories c ON p.CategoryID = c.CategoryID
        LEFT JOIN productimages pi ON p.ProductID = pi.ProductID where pi.isMain =true";
        $result = $conn->query($sql);

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
                                                <img id='zoom-image' src='{$record["ImageURL"]}' alt='product cross'>
                                            </a>";
                                            }
                                          
                                            ?>
                                            


                                                    <a id="btn-product-gallery" class="btn-product-gallery">
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
                                                                         
                                                <a class='product-gallery-item ' href='#' data-image={$record["ImageURL"]} data-zoom-image={$record["ImageURL"]}>
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
                                $description = '';
                                // Check if any records are fetched
                                if ($resultSingleProd->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $resultSingleProd->fetch_assoc()) {
                                        $description = $row["Description"];

                                        echo "
                                        <div class='product-details'>
                                        <h1 class='product-title'>{$row["Name"]}</h1>
                                    
                                       
                                    
                                        <div class='product-price'>
                                        $ {$row["Price"]}
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
                                                <a href='' id='fb-icon' class='social-icon' title='Facebook' target='_blank'><i
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

                    <!-- <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist"> -->
                         
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
                        <!-- </ul> -->
                    
                    <!-- </div> -->
                    <!-- End .product-details-tab -->


                </div><!-- End .container -->
            </div><!-- End .page-content -->
            <div class="mb-3"></div><!-- End .mb-5 -->

<div class="container new-arrivals">
    <div class="heading heading-flex mb-3" style="justify-content:center">
        <div class="heading-left">
            <h2 class="title">You May Also Like</h2><!-- End .title -->
        </div><!-- End .heading-left -->

    
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
<div class="mb-3"></div><!-- End .mb-5 -->

        </main><!-- End .main -->
        <?php
        include 'footer.php';
        ?>
    </div>
<?php
include 'footer-files.php';
?>
<script> $(document).ready(function (){
    $('#fb-icon').on('click', function (e){
    // let baseUrl ='https://staging.capricornestore.com/product.php?id=6-Energy-Pro';
    let shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`;
    window.open(shareUrl, '_blank', 'width=600,height=400');
    console.log(shareUrl)
});

   $('.product-gallery-item').on('click', function (e) {
  
       let mainImage = document.getElementById('product-zoom');
       let mainSrc =document.getElementById('zoom-image');
       let newSrc = e.target.getAttribute('data-image') || e.target.src; 
       let newImageUrl = document.getElementById('product-zoom').getAttribute('data-image');
        mainImage.setAttribute('data-image',newSrc || e.target.src)
        mainSrc.src =newSrc


            $('#product-zoom-gallery').find('a').removeClass('active');
            $(this).addClass('active');

            e.preventDefault();
        });
        $('.btn-product-gallery').on('click', function (e) {
    e.preventDefault(); 
    console.log("hi");

    $.magnificPopup.open({
        items: {
            src: $('#product-zoom').attr('data-image') 
        },
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    })
    

})
</script>
</body>

</html>