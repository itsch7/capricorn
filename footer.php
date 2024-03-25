<?php



$sqlComp = "SELECT * FROM companyinfo";
$resultComp = $conn->query($sqlComp);




?>
<?php
// Get the current URL
$currentUrl = $_SERVER['REQUEST_URI'];

// Check if the URL contains "contact.php"
if (strpos($currentUrl, 'faq.php') !== false) {
    // Don't show the specific section
    $hideSection = true;
} else {
    // Show the specific section
    $hideSection = false;
}
?>

<!-- Your HTML content -->


<footer class="footer">
<?php if (!$hideSection): ?>
	<div class='cta bg-image bg-dark pt-4 pb-5 mb-0'
>
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-sm-10 col-md-8 col-lg-6'>
            <div class='cta-heading text-center'>
                <h3 class='cta-title text-white'>Get The Latest Deals</h3><!-- End .cta-title -->
                
            </div><!-- End .text-center -->

            <form method="post" action="send_email.php">
                <div class='input-group input-group-round'>
                    <input name="email" type='email' class='form-control form-control-white'
                        placeholder='Enter your Email Address' aria-label='Email Adress' required>
                    <div class='input-group-append'>
                        <button class='btn btn-primary' type='submit'><span>Subscribe</span><i
                                class='icon-long-arrow-right'></i></button>
                    </div><!-- .End .input-group-append -->
                </div><!-- .End .input-group -->
            </form>
        </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
    </div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .cta -->";
        <!-- Content of the section you want to show -->
    <?php endif; ?>

	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<div class="widget widget-about">
						<div class="widget-footer">
							<a href="#">
								<p class='logo logo-foo' style="font-size:28px;margin-bottom:0;line-height: 36px; color:#3398fd">𝖈𝖆𝖕𝖗𝖎𝖈𝖔𝖗𝖓 𝕾𝖙𝖔r𝖊</p>
	
							</a>
							<span style="color:#ccc;">We deliver the best</span>

						</div>
					

				
					</div><!-- End .widget about-widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

				<div class="col-sm-6 col-lg-4">
					<div class="widget">
						<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

						<ul class="widget-list">
							<li><a href="about.php">About us</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="contact.php">Contact us</a></li>
						</ul><!-- End .widget-list -->
					</div><!-- End .widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

				<div class="col-sm-6 col-lg-4">
					<div class="widget">
					<div class="widget-call">
							<i class="icon-phone"></i>
							Got Question? Call us 24/7
							<?php
							if ($resultComp->num_rows > 0) {
								while ($row = $resultComp->fetch_assoc()) {

									echo "<a href='tel:#'> {$row["phone"]}</a>";

								}
							}


							?>

						</div><!
					</div><!-- End .widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

			
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .footer-middle -->

	<div class="footer-bottom">
		<div class="container">
			<p class="footer-copyright">Copyright © 2024 Capricorn Store. All Rights Reserved.</p>
			<!-- End .footer-copyright -->

		</div><!-- End .container -->
	</div><!-- End .footer-bottom -->
</footer><!-- End .footer -->



<?php
// Close connection
$conn->close();
?>