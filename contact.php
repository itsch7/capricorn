<!DOCTYPE html>
<html lang="en">


<?php

include 'header-files.php';
?>

<body>
<?php
        include 'header.php';
        ?>
		<?php 
		 $sqlComp = "SELECT * FROM companyinfo";
		 $resultComp = $conn->query($sqlComp);
		?>
    
    <div class="page-wrapper">

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg');margin-bottom:40px">
        			<h1 class="page-title ">Contact us<span >keep in touch with us</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                	     <?php 
						 if($resultComp->num_rows > 0){
						 while ($rowComp = $resultComp->fetch_assoc()) {
                           echo "<div class='col-lg-6 mb-2 mb-lg-0'>
						   <h2 class='title mb-1'>Contact Information</h2><!-- End .title mb-2 -->
						   <p class='mb-3'>
						   Contact us for inquiries and assistance. We're here to help with any questions or concerns you may have regarding our services and products.</p>
						   <div class='row'>
							   <div class='col-sm-7'>
								   <div class='contact-info'>
									   <h3>The Office</h3>
					   
									   <ul class='contact-list'>
										
										   <li>
											   <i class='icon-phone'></i>
											   <a href='tel:#'>{$rowComp["phone"]}</a>
										   </li>
										   <li>
											   <i class='icon-envelope'></i>
											   <a href='mailto:#'>{$rowComp["email"]}</a>
										   </li>
									   </ul><!-- End .contact-list -->
								   </div><!-- End .contact-info -->
							   </div><!-- End .col-sm-7 -->
					   
							   <div class='col-sm-5'>
								   <div class='contact-info'>
									   <h3>The Office</h3>
					   
									   <ul class='contact-list'>
										   <li>
											   <i class='icon-clock-o'></i>
											   <span class='text-dark'>Monday-Saturday</span> <br>11am-7pm 
										   </li>
										   <li>
											   <i class='icon-calendar'></i>
											   <span class='text-dark'>Sunday</span> <br>11am-6pm 
										   </li>
									   </ul><!-- End .contact-list -->
								   </div><!-- End .contact-info -->
							   </div><!-- End .col-sm-5 -->
						   </div><!-- End .row -->
					   </div><!-- End .col-lg-6 -->";
						 }
						}
						  ?>
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with the sales team</p>

                			<form  method="post" action="send_email.php" class="contact-form mb-3">
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input name="name" type="text" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input name="email" type="email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input name="phone" type="tel" class="form-control" id="cphone" placeholder="Phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                						<input name="subject" type="text" class="form-control" id="csubject" placeholder="Subject">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea name="message" class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">

                
                </div><!-- End .container -->
            	<!-- <div id="map">
					
				</div> -->
				<!-- End #map -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php
        include 'footer.php';
        ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

  

    
</body>
<?php
include 'footer-files.php';
?>


</html>