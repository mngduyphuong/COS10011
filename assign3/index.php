<!DOCTYPE html>
<html lang="en">

	<?php include("includes/header.inc"); ?>
<!-- 
	same code for assignment one and two. Changed it to php and used include function for header, footer and menu -->
<body>
<?php include("includes/menu.inc"); ?>

<section class="slider middle" id="section1_home">
	<div class="sliders">
		<input type="radio" name="radioslide" id="r1" checked>
		<input type="radio" name="radioslide" id="r2">
		<input type="radio" name="radioslide" id="r3">
		<input type="radio" name="radioslide" id="r4">
		<div class="slide s1">
			<a href="product.php"><img src="images/product.jpg" alt="Product" title="View our product" id="menu1"></a>
		</div>
		<div class="slide">
			<a href="enquire.php"><img src="images/enquiry.jpg" alt="Enquiry" title="Enquiry now" id="menu2"></a>
		</div>
		<div class="slide">
			<a href="about.php"><img src="images/about.png" alt="About" title="About me" id="menu3"></a>
		</div>
		<div class="slide">
			<a href="enhancements.php"><img src="images/enhen.png" alt="Enhancement" title="Some enhancement of this website" id="menu4"></a>
		</div>

		<div class="navigation">
			<label for="r1" class="bar"></label>
			<label for="r2" class="bar"></label>
			<label for="r3" class="bar"></label>
			<label for="r4" class="bar"></label>
		</div>

	</div>


</section>

<article>
	<section class="homepage_content" id="section2_home">

<section>
	<h1 id="homepage_h1">Welcome to Select - Audio and Visual Hire</h1>
<p id="homepage_1">We are a small company based in Melbourne, Australia. Select was founded in March 2020.<br>
Join our family to find out more about us.</p>
</section>

<section id="homepage_2">
	<h2 class="homepage_h2">What are we offering?</h2>
	<p>New company offering the newest technology and attractive bouns gifts for our new customers. Everyone gets 10% off for their first order.<br>Referencing program: If you invite your friend, you will get 10% discount for your next order and your friend get 20% off.</p>
	<p id="homepage_hurry"><a href="product.php">Hurry up!!!! The deals won't last long (T&C applied)</a></p>
	<img src="images/index1.jpg" alt="offering" width="380">
</section>



<section id="homepage_3">
		<h2 class="homepage_h2">Our promises</h2>
	<p>All of our products are authentic trusted brand with the highest quality so you can create the most memorable moments with your friends and your loved one.<br>
		Free express delivery for order more than $500. If you place order before 2pm, your order will be delivery the next working day.
	</p>
	<ul>
		<li>Authentic product</li>
		<li>Warranty offering</li>
		<li>24/7 customer services</li>
	</ul>
	<img src="images/index2.jpg" alt="promises" width="350">
</section>

<section id="homepage_4">
	<h1>Want to place an order?</h1>
	<p>Enquiry now to order<br>
	Working hour:
	<ul>
		<li> Monday - Friday (8am - 5pm)</li>
		<li> Saturday (10am-4pm)</li>
		<li>Public holiday (close)</li>
	</ul>
	<p>Swinburne University of Technology<br>
	Melbourne, Australia</p>

	
</section>

<section id="homepage_6">
	<p><a href="enquire.php" class="button" id="homepage_butoon">
	
	<span></span>
	<span></span>
	<span></span>
	<span></span>
	Enquiry now
</a>
</p>
</section>




<section id="homepage_5">
	<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100831.08687181736!2d145.09226866939338!3d-37.83755388739547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642326bae5aaf%3A0x75e96bbd4988f769!2sSwinburne%20University%20of%20Technology!5e0!3m2!1sen!2sau!4v1586051966976!5m2!1sen!2sau" ></iframe></p>
</section>







</section>



</article>




<?php include("includes/footer.inc"); ?>
</body>



</html>
