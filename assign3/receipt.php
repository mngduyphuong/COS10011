<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>			<!-- header.inc to display header -->

<body>
	<?php include("includes/menu.inc"); ?>				<!-- menu.inc to display the menu on everypage -->
	<section class="content" id="receipt">
<?php 
	echo "<h2>Receipt</h2>";
 	
	if (!isset($_GET["db_msg"])) {// not from process_order.php, redirection
		header("location:enquire.php");
		exit();
	}
	else { // from process_order.php, display receipt
		echo $_GET["db_msg"];
	}	 ?>

	</section>


	<?php include("includes/footer.inc");?>				<!-- footer.inc to dipslay footer on everypage -->

</body>
</html>