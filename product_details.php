<?php
include("header.php");
               
?>                                          

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Single Product</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['do'])) {
		$procode = $_POST['do'];
	}
	?>
	<div class="super_container">



		<div class="container single_product_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->
					<?php
					if(isset($_REQUEST['id'])){
					$res = $admin_obj->getProductById($_REQUEST['id']);
					if (mysqli_num_rows($res) > 0) {
					$row = mysqli_fetch_assoc($res);
				
					?>

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a>
							</li>
							<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single
									Product</a></li>
						</ul>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
										<li><img src="admin/<?php echo $row['pic']; ?>" alt=""></li>
										<li class="active"><img src="admin/<?php echo $row['pic']; ?>" alt=""
												data-image="images/single_2.jpg"></li>
										<li><img src="<?php echo $row['pic']; ?>" alt=""
												data-image="images/single_3.jpg"></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-9 image_col order-lg-2 order-1">
								<div class="single_product_image">
									<div class="single_product_image_background"
										style="background-image:url(admin/<?php echo $row['pic']; ?>)"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">

							<h2>
								<?php echo $row['title']; ?>
							</h2>
							<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis.
								Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
						</div>
						<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
							<span class="ti-truck"></span><span>free delivery</span>
						</div>
						<div class="original_price">Rs	<?php echo $row['original_price']; ?></div>

						<div class="product_price">Rs	
							<?php 
							$original_price= $row['original_price'];
							$discount= $row['discount'];
							$discount_price=$original_price-$original_price*$discount/100;
							echo $discount_price;
							?>
						</div>

						<ul class="star_rating">
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
						</ul>
						<div class="product_color">
							<span>Select Color:</span>
							<ul>
								<li style="background: #e54e5d"></li>
								<li style="background: #252525"></li>
								<li style="background: #60b3f3"></li>
							</ul>
						</div>
						<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
							<span>Quantity:</span>
							<div class="quantity_selector">
								<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
								<span id="quantity_value">1</span>
								<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
							</div>
							<!-- <div class="red_button ml-4" style="width: 200px;"> <a href="cart.php">add to cart</a></div> -->
							<div >
								
								<form id="addtocart<?php echo $row['code'];?>">
								<input type="hidden" name="userid" value="<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id']; } ?>">	
								<input type="hidden" name="pid" value="<?php echo $row['code'];?>">
								<input type="hidden" name="qty" value=1>
								<input type="hidden" name='addcart' value="addcart"> 

								<button type='submit' style='border:none; width: 200px;'class="red_button ml-4 ">Add to Cart</button>

								

								</form>
								<script src="js/jquery-3.2.1.min.js"></script>
								<script>
									$(function(){
										$("#addtocart<?php echo $row['code'];?>").submit(function(e){
											// e.preventDefault();
											alert('Added')
											$.ajax({
												url: "code.php",
												type: "POST",
												data: new FormData(this),
												contentType: false,
												processData: false,
												success: function(res){
													
												}
											})
										})
										
									})
								</script>
							
						</div>
							<div class="product_favorite d-flex flex-column align-items-center justify-content-center">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Tabs -->

		<div class="tabs_section_container">

			<div class="container">
				<div class="row">
					<div class="col">
						<div class="tabs_container">
							<ul
								class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
								<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
								<li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
								<li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">

						<!-- Tab Description -->

						<div id="tab_1" class="tab_container active">
							<div class="row">
								<div class="col-lg-5 desc_col">
									<div class="tab_title">
										<h4>Description</h4>
									</div>
									<div class="tab_text_block">
										<h2>Pocket cotton sweatshirt</h2>
										<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud
											felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
									</div>
									<div class="tab_image">
										<img src="images/desc_1.jpg" alt="">
									</div>
									<div class="tab_text_block">
										<h2>Pocket cotton sweatshirt</h2>
										<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud
											felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
									</div>
								</div>
								<div class="col-lg-5 offset-lg-2 desc_col">
									<div class="tab_image">
										<img src="images/desc_2.jpg" alt="">
									</div>
									<div class="tab_text_block">
										<h2>Pocket cotton sweatshirt</h2>
										<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud
											felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
									</div>
									<div class="tab_image desc_last">
										<img src="images/desc_3.jpg" alt="">
									</div>
								</div>
							</div>
						</div>

						<!-- Tab Additional Info -->

						<div id="tab_2" class="tab_container">
							<div class="row">
								<div class="col additional_info_col">
									<div class="tab_title additional_info_title">
										<h4>Additional Information</h4>
									</div>
									<p>COLOR:<span>Gold, Red</span></p>
									<p>SIZE:<span>L,M,XL</span></p>
								</div>
							</div>
						</div>

						<!-- Tab Reviews -->

						<div id="tab_3" class="tab_container">
							<div class="row">

								<!-- User Reviews -->

								<div class="col-lg-6 reviews_col">
									<div class="tab_title reviews_title">
										<h4>Reviews (2)</h4>
									</div>

									<!-- User Review -->

									<div class="user_review_container d-flex flex-column flex-sm-row">
										<div class="user">
											<div class="user_pic"></div>
											<div class="user_rating">
												<ul class="star_rating">
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
												</ul>
											</div>
										</div>
										<div class="review">
											<div class="review_date">27 Aug 2016</div>
											<div class="user_name">Brandon William</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>

									<!-- User Review -->

									<div class="user_review_container d-flex flex-column flex-sm-row">
										<div class="user">
											<div class="user_pic"></div>
											<div class="user_rating">
												<ul class="star_rating">
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
												</ul>
											</div>
										</div>
										<div class="review">
											<div class="review_date">27 Aug 2016</div>
											<div class="user_name">Brandon William</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua.</p>
										</div>
									</div>
								</div>

								<!-- Add Review -->

								<div class="col-lg-6 add_review_col">

									<div class="add_review">
										<form id="review_form" action="post">
											<div>
												<h1>Add Review</h1>
												<input id="review_name" class="form_input input_name" type="text"
													name="name" placeholder="Name*" required="required"
													data-error="Name is required.">
												<input id="review_email" class="form_input input_email" type="email"
													name="email" placeholder="Email*" required="required"
													data-error="Valid email is required.">
											</div>
											<div>
												<h1>Your Rating:</h1>
												<ul class="user_star_rating">
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
												</ul>
												<textarea id="review_message" class="input_review" name="message"
													placeholder="Your Review" rows="4" required
													data-error="Please, leave us a review."></textarea>
											</div>
											<div class="text-left text-sm-right">
												<button id="review_submit" type="submit"
													class="red_button review_submit_btn trans_300"
													value="Submit">submit</button>
											</div>
										</form>
									</div>

								</div>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>free shipping</h6>
								<p>Suffered Alteration in Some Form</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>cach on delivery</h6>
								<p>The Internet Tend To Repeat</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>45 days return</h6>
								<p>Making it Look Like Readable</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>opening all week</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
					}
				}
				
?>
		<!-- Newsletter -->

		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter and get 20% off your first purchase</p>
						</div>
					</div>
					<div class="col-lg-6">
						<form action="post">
							<div
								class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
								<input id="newsletter_email" type="email" placeholder="Your email" required="required"
									data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300"
									value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<li><a href="#">Blog</a></li>
								<li><a href="#">FAQs</a></li>
								<li><a href="contact.html">Contact us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div
							class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">©2018 All Rights Reserverd. This template is made with <i
									class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp;
								distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/single_custom.js"></script>
</body>

</html>