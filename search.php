<!DOCTYPE html>
<html lang="en">
<?php

include 'header-files.php';
?>
<body>
        <style>
        

        </style>
<div class="page-wrapper">
<?php
        include 'header.php';
        ?>
        <?php 
        $sql = "SELECT p.ProductID,p.Slug, p.Name as ProductName,p.Price  , c.Name as CategoryName, pi.ImageURL
        FROM products p
        JOIN categories c ON p.CategoryID = c.CategoryID
        LEFT JOIN productimages pi ON p.ProductID = pi.ProductID where pi.isMain =true";
        $result = $conn->query($sql)
        ?>
        <main class="main" style="margin-top:40px">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Products</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

                <div class="container" style="padding:40px 0px">
                <div class="cat-blocks-container">

                <div class="row" style="gap:40px; justify-content:center">

                <?php
                
                if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                                echo "<div class='col-6 col-sm-4 col-lg-2'>
                                <a href='product.php?id=" . $row["Slug"] . "'class='cat-block' style='align-items:start; row-gap:10px'>
                                    <figure>
                                        <span>
                                            <img src={$row["ImageURL"]} alt='Category image'>
                                        </span>
                                    </figure>
                                    <h3 style='margin-bottom:0; color:#ccc' class='product-price'> {$row["CategoryName"]} </h3>
                                    <h3 class='product-title' style='font-size:2rem'>{$row["ProductName"]} </h3>
                                    <h3 class='product-price'> $ {$row["Price"]} </h3>
                            
                                </a>
                            </div>";
                        }
                }
                ?>

          
        </div>

        </main>
        <?php
        include 'footer.php';
        ?>
</div>
    
</body>
<?php
include 'footer-files.php';
?>
</html>