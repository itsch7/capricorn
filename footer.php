<?php



$sqlComp = "SELECT * FROM companyinfo";
$resultComp = $conn->query($sqlComp);




?>

<footer class="footer">
	<div class="cta bg-image bg-dark pt-4 pb-5 mb-0"
		style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-10 col-md-8 col-lg-6">
					<div class="cta-heading text-center">
						<h3 class="cta-title text-white">Get The Latest Deals</h3><!-- End .cta-title -->
						<p class="cta-desc text-white">and receive <span class="font-weight-normal">$20 coupon</span>
							for first shopping</p><!-- End .cta-desc -->
					</div><!-- End .text-center -->

					<form action="#">
						<div class="input-group input-group-round">
							<input type="email" class="form-control form-control-white"
								placeholder="Enter your Email Address" aria-label="Email Adress" required>
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><span>Subscribe</span><i
										class="icon-long-arrow-right"></i></button>
							</div><!-- .End .input-group-append -->
						</div><!-- .End .input-group -->
					</form>
				</div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .cta -->
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3">
					<div class="widget widget-about">
						<a href="#">
							<p class='logo logo-foo' style="font-size:24px">𝖈𝖆𝖕𝖗𝖎𝖈𝖔𝖗𝖓 𝕾𝖙𝖔r𝖊</p>

						</a>
						<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros
							eu erat. </p>

						<div class="widget-call">
							<i class="icon-phone"></i>
							Got Question? Call us 24/7
							<?php





							if ($resultComp->num_rows > 0) {
								while ($row = $resultComp->fetch_assoc()) {

									echo "<a href='tel:#'>+0123 456 789</a>";

								}
							}


							?>

						</div><!-- End .widget-call -->
					</div><!-- End .widget about-widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

				<div class="col-sm-6 col-lg-3">
					<div class="widget">
						<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

						<ul class="widget-list">
							<li><a href="about.html">About us</a></li>
							<li><a href="category.html">Shop</a></li>
							<li><a href="product.html">Products</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul><!-- End .widget-list -->
					</div><!-- End .widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

				<div class="col-sm-6 col-lg-3">
					<div class="widget">
						<h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

						<ul class="widget-list">
							<li><a href="#">Terms and conditions</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul><!-- End .widget-list -->
					</div><!-- End .widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->

				<div class="col-sm-6 col-lg-3">
					<div class="widget">
						<h4 class="widget-title">My Account</h4><!-- End .widget-title -->

						<ul class="widget-list">
							<li><a href="#">Sign In</a></li>

						</ul><!-- End .widget-list -->
					</div><!-- End .widget -->
				</div><!-- End .col-sm-6 col-lg-3 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .footer-middle -->

	<div class="footer-bottom">
		<div class="container">
			<p class="footer-copyright">Copyright © 2019 Capricorn Store. All Rights Reserved.</p>
			<!-- End .footer-copyright -->

		</div><!-- End .container -->
	</div><!-- End .footer-bottom -->
</footer><!-- End .footer -->



<?php
// Close connection
$conn->close();
?>