<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>

<!-- logout page to ensure security -->
<body>
<?php include("includes/menu.inc"); ?>
<section class="content" id="payment_content">
<h1>You have logged out</h1>
<?php 
session_start();
if (isset($_SESSION['login_username'])) {		//if user already login, destroy the stored session with all log in data.
	session_destroy();
}
 ?>



</section>
<?php include("includes/footer.inc"); ?>
</body>
</html>