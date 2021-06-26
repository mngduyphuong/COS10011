<!DOCTYPE html>
<html lang="en">

<?php include("includes/header.inc"); ?>

<!-- the same code from assignement 1 and assignment 2. I change to php file and use include function to display basic common items -->



<body>

<?php include("includes/menu.inc"); ?>

<article>
<section class="content">


<section>	<aside id="product_aside">
		<h2>Renting price</h2>
		<p>Have a quick check on our range and renting price.</p>

		<ol>
			<li><a href="product.php#audio">Audio equipment</a></li>
			<li><a href="product.php#visual">Visual equipment</a></li>
			<li><a href="product.php#combo">Combo equipment</a></li>
		</ol>
<p>Audio:</p>
			<ul>
			<li>Option 1: $100/day</li>
			<li>Option 2: $300/day</li>
		</ul>


		<p>Visual:</p>
			<ul>
			<li>Option 1: $100/day</li>
			<li>Option 2: $300/day</li>
		</ul>
		
		<p>Combo:</p>
			
		<ul>
			<li>Option 1: $180/day</li>
			<li>Option 2: $500/day</li>
		</ul>
		
	</aside></section>


<section id="product_content">
	<h1>Our product range</h1>
	<h2>1. Audio equipment hire</h2>
	<p>Our diverse product range of audio equipment allow us to design a system which suits from a small house party, large beach party or even a Wedding ceremony.<br>You can use our small system for live presentation, your band perfomance or a large system which can covering kilometers of crowd lines.<br>
	</p>
	<h3>1.1 Option 1: small system</h3>
	<p>Include: 1 party speaker, 1 speaker stand.</p>
	<h3>1.2 Option 2: large system</h3>
	<p>Include: 2 party speaker, 2 speaker stand, 2 backup battery set, 1 Media device connection.</p>

	<section class="product_inside" id="audio">
		<img src="images/audio.jpg" title="File size:73.6kb">
		<p>Brand:
			<select>
				<option>Pick a brand</option>
				<option>Sony</option>
				<option>JBL</option>
				<option>XCD</option>
			</select>
		</p>
		<p>Option:
			<select>
				<option>Pick your option</option>
				<option>Option 1</option>
				<option>Option 2</option>
			</select>
		</p>
		<p>Add on:
			<select>
				<option>$10 each</option>
				<option>Microphone</option>
				<option>Headphone</option>
				<option>Connect cable</option>
			</select>
		</p>
		
		<p>Source: <a href="https://www.jbhifi.com.au/?q=party%20speaker&hPP=36&idx=shopify_products&p=0">JB Hi-fi</a></p>
	</section>
<br><br>
<h2>2. Visual Equipment hire</h2>
<p>Select equipment hire provides you a wide range of options. Our system contains lightning system and also visual system such as Screen, Projector, Controller<br>
Contact us via enquiry page to provides your requirement and get our staffs help you to chose the best system with flexible options and the cheapest price </p>
<h3>2.1 Option 1:</h3>
<p>Include: 1 projector, 1 small screen, LED lighting</p>
<h3>2.2 Option 2:</h3>
<p>Include: 2 projector, 2 small screen, 1 LED TV, Moving lightning, Controller</p>
<br><br>

<section class="product_inside" id="visual">
	<img src="images/visual.jpg" title="File size: 11.6kb">
	<p>Option:
		<select>
			<option>Pick your option</option>
			<option>Option 1</option>
			<option>Option 2</option>
		</select>
	</p>

	<p>Add on:
		<select>
			<option>$50 each</option>
			<option>Controller</option>
			<option>Moving light</option>
			<option>Cameras</option>
		</select>
	</p>
	
</section>


<h2>3. Combo equipment hire</h2>
<p>Rent everything as a combo to get huge discount from our store. We gurantee our price is the cheapest on market compare to another competitor.<br>
Contact us if you find a place with better price to get 10% off (T&C applied). 
</p>
<section class="product_inside">
	<img src="images/combo.jpg" title="File size:74.1kb" id="combo" >
	<p>Option:
		<select>
			<option>Pick your option</option>
			<option>Option 1</option>
			<option>Option 2</option>
		</select>
	</p>

	<p>Visual add on:
		<select>
			<option>$50 each</option>
			<option>Controller</option>
			<option>Moving light</option>
			<option>Cameras</option>
		</select>	</p>

	<p>Audio add on:
			<select>
				<option>$10 each</option>
				<option>Microphone</option>
				<option>Headphone</option>
				<option>Connect cable</option>
			</select>		
	</p>
	
</section>




</section>

<section id="product_table">
	<h2>Price check:</h2>
<table>
	<tr>
		<th>Equipment</th>
		<th>Audio</th>
		<th>Visual</th>
		<th>Combo</th>
	</tr>

	<tr>
		<th>Combo 1</th>
		<td>$100</td>
		<td>$100</td>
		<td>$180</td>
	</tr>
	<tr>
		<th>Combo 2</th>
		<td>$300</td>
		<td>$300</td>
		<td>$500</td>
	</tr>
	
</table>
</section>

</section>	
</article>


<?php include("includes/footer.inc"); ?>
</body>






</html>