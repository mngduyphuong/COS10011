<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.inc"); ?>

<body>
	<?php include("includes/menu.inc"); ?>
	<section class="content">
	<?php 
	function sanitise_input($data){
		$data = trim($data);				//remove spaces
		$data = stripslashes($data);		//remove backslashes in front of quotes
		$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
		return $data;}
	?>

<?php
//enhancement 1 of this assignemnt, check if the user logged in or not. of not they are re direct to login page
session_start();
if (!isset($_SESSION['login_username'])) {
	header("location:manager_login.php");			//redirect
}

?>
	<form action="manager_logout.php" method="post">						<!-- logout function -->
		<fieldset class="enquire_form" id="logout">							<!-- if user chose to logout, redirect them to logout page -->
			<h2>Log out from account</h2>
			<p>Enhancement in assignment 3</p>
			<input class="button" type="submit" value="Logout" >
		</fieldset>
	</form>


	<!-- 	search function based on user require -->
	<form action="manager.php" method="post">
		<fieldset class="enquire_form">
			<h2>Search Order</h2>
			<!-- search by user firstname and lastname -->
			<p><label>First Name: <input type="text" name="firstname" ></label>   
		<label>Last Name: <input type="text" name="lastname" ></label></p>     



	<!-- 	search by particular product -->
		<p><label>Particular product: 
			<input type="checkbox" name="audio" value="True"  >
			 <label >Audio equipment</label>
			 <input type="checkbox" name="visual" value="True"  >
			 <label >Visual equipment</label>
			 <input type="checkbox" name="combo" value="True"  >
			 <label >Combo equipment</label>
			 
		</label></p> 

		<!-- sorting the data by cost -->
		<p>Sort by cost:
             <input type="radio" name="cost" value="True">
			 <label >Yes</label>
			                    
			 <input type="radio" name="cost" value="False" checked="" />
			 <label >No</label>		                    
         </p>    

        <!--  find all the pending order in the database -->
         <p>Pending orders:
             <input type="radio" name="pending" value="True">
			 <label >Yes</label>
			                    
			 <input type="radio" name="pending" value="False" checked="" />
			 <label >No</label>		                    
         </p>    
		<input class="button" type="submit" value="Search" >
		</fieldset>
	</form>






	<!-- Enable manager to update order -->
	<form method="post" action="manager.php">
		<fieldset class="enquire_form">
			<h2>Update order's status</h2>
			<p>
                <label for="order_ID">Order ID:</label>
                <input type="text" name="order_ID" id="order_ID" required>		<!-- find the order by id -->
            </p>
            <p>
            	<label for="order_status">Order status:</label>				<!-- 	chose new order status -->
                <select name="order_status" id="order_status" required>
                    <option value="">Select Status...</option>
                    <option value="PENDING">PENDING</option>
                    <option value="FULFILLED">FULFILLED</option>
                    <option value="PAID">PAID</option>
                    <option value="ARCHIVED">ARCHIVED</option>
                </select>
            </p>
            <input class="button" type="submit" value="Update order" name="update_button">
		</fieldset>
		
	</form>

<fieldset class="enquire_form">
	
		<?php
		//if update form was submitted
		if (isset($_POST["update_button"])){

			require_once('settings.php');		//get connection information to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if ($conn){
        		$order_id = sanitise_input($_POST["order_ID"]);
        		$order_status = sanitise_input($_POST["order_status"]);

        		 $query = "SELECT order_id FROM orders WHERE order_id='$order_id'";		//find the order based on input id

        		$result = mysqli_query($conn, $query);		//execute
        		if ($result){
					$check = mysqli_fetch_assoc ($result);			//check function if this is a valid id
					if ($check["order_id"] == ""){
						echo "Can't find this order";
					}
					else{
						$update = "UPDATE orders SET order_status='$order_status' WHERE order_id='$order_id'";		//update function

		        		$result_update = mysqli_query($conn, $update);		//execute
		        		if ($result_update){
							echo "Order has been updated.";
						}
						else{
							echo "Failed to execute query: ", $update, ".";
						}
					}
				}
				else{
					echo "Failed to execute query: ", $query, ".";
				}
				mysqli_close($conn);
        	}

        	else{
				echo "Unable to connect to the database.";
        	}
		}
	?>
</fieldset>
	



		<!-- delete order function-->
	<form method="post" action="manager.php">
		<fieldset class="enquire_form">
			<h2>Delete order</h2>
			<p>
                <label for="order_ID">Order ID:</label>
                <input type="text" name="order_ID2" id="order_ID2" required>
            </p>

            <input class="button" type="submit" value="Delete order" name="delete_button">
		</fieldset>
	</form>


<fieldset class="enquire_form">
	
		<?php
		//if delete form was submitted to the sever
		if (isset($_POST["delete_button"])){

			require_once('settings.php');		//get connection information to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if ($conn){
        		$order_id2 = sanitise_input($_POST["order_ID2"]);

        		$query = "SELECT order_status FROM orders WHERE order_id='$order_id2'";			//find the order based on input data

        		$result = mysqli_query($conn, $query);		//execute
        		if ($result){
					$check = mysqli_fetch_assoc ($result);				//check if this is a valid id
					if ($check["order_status"] != "PENDING"){			//check if this is a PENDING order or not
						echo "Can't delete this order";					//if its not pending, we cant delete it
					}
					else{
						$delete = "DELETE FROM orders WHERE order_id='$order_id2'";		//if its passed all the validation, deleted the order from database
						$result_delete = mysqli_query($conn, $delete);
						if ($result_delete){
							echo "The order is deleted.";
						}
						else{
							echo "Failed to execute query: ", $result_delete, ".";
						}
					}
				}
				else{
					echo "Failed to execute query: ", $query, ".";
				}
				mysqli_close($conn);
        	}
        	else{
				echo "Unable to connect to the database.";
        	}
		}
	?>
</fieldset>














	<fieldset class="enquire_form">
		<?php
	require_once "settings.php";	// Load MySQL log in credentials



//function to sort and reverse if user click on column header
	if (isset($_GET['order_type'])) {
			$order_type = $_GET['order_type'];
		}	
	else
		$order_type = 'order_id';

	if (isset($_GET['sort'])) {
			$sort = $_GET['sort'];
		}	
	else
		$sort = 'ASC';


	//check if user chose to search order by information, if not display all orders 
	if (!isset($_POST["firstname"])&&!isset($_POST["lastname"])&&!isset($_POST["audio"])&&!isset($_POST["visual"])&&!isset($_POST["combo"]) && !isset($_POST["cost"])=="False" && !isset($_POST["pending"])=="False")
		// $query = "SELECT * FROM orders;";	
		$query = "SELECT * FROM orders ORDER BY $order_type $sort;";	//enhancement if user click on column header
	else {
		//get the data from search function
		$lastname=sanitise_input($_POST["lastname"]);
		$firstname=sanitise_input($_POST["firstname"]);
		$cost=sanitise_input($_POST["cost"]);
		$pending=sanitise_input($_POST["pending"]);

		
		
		

		$input = "";
		$input_sort="";

		//check the data and combine them to an array and pass it to SELECT function
			if ($firstname != "")		
				$input .= "info_firstname LIKE '%$firstname%'";
			if ($lastname != ""){
				if ($input != "")
					$input .= "and info_lastname LIKE '%$lastname%'";
				else
					$input .= "info_lastname LIKE '%$lastname%'";
			}
			
			if (isset($_POST["audio"])) {
			$audio=sanitise_input($_POST["audio"]);
			if ($audio == "True"){
				if ($input != "")
					$input .= "and order_product = 'audio'";
				else
					$input .= "order_product = 'audio'";
			}
		}
		if (isset($_POST["visual"])) {
			$visual=sanitise_input($_POST["visual"]);
			if ($visual == "True"){
				if ($input != "")
					$input .= "and order_product = 'visual'";
				else
					$input .= "order_product = 'visual'";
			}
		}
		if (isset($_POST["combo"])) {
			$combo=sanitise_input($_POST["combo"]);
			if ($combo == "True"){
				if ($input != "")
					$input .= "and order_product = 'combo'";
				else
					$input .= "order_product = 'combo'";
			}
		}if (isset($_POST["audio"])) {
			$audio=sanitise_input($_POST["audio"]);
			if ($audio == "True"){
				if ($input != "")
					$input .= "and order_product = 'audio'";
				else
					$input .= "order_product = 'audio'";
			}
		}
		if (isset($_POST["visual"])) {
			$visual=sanitise_input($_POST["visual"]);
			if ($visual == "True"){
				if ($input != "")
					$input .= "and order_product = 'visual'";
				else
					$input .= "order_product = 'visual'";
			}
		}
		if (isset($_POST["combo"])) {
			$combo=sanitise_input($_POST["combo"]);
			if ($combo == "True"){
				if ($input != "")
					$input .= "and order_product = 'combo'";
				else
					$input .= "order_product = 'combo'";
			}
		}
			
			if ($pending == "True"){
				if ($input != "")
					$input .= "and order_status = 'PENDING'";
				else
					$input .= "order_status = 'PENDING'";
			}
			

		if ($cost == "True"){
			if ($input == "") {
				$query="SELECT * FROM orders ORDER BY order_cost";
			}
			else
				$query="SELECT * FROM orders WHERE $input ORDER BY order_cost";
			}
		else
		$query="SELECT * FROM orders WHERE $input";
			//$query="SELECT * FROM orders WHERE order_status = 'PENDING' ORDER BY order_cost";
	}
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // connected
 
		$result = mysqli_query ($conn, $query);		
		if ($result) {	//   query was successfully executed
			
			$record = mysqli_fetch_assoc ($result);
			if ($record) {		//   record exist

				//reverse or sorting function
				if ($sort == 'DESC') {
					$sort = 'ASC';
				}
				else{
					$sort = 'DESC';
				}
				//display the table from database
				echo "<table class='managerTable'>";
				echo "<tr>
				<th><a href='?order_type=order_id&&sort=$sort'>ID</th>
				<th><a href='?order_type=info_firstname&&sort=$sort'>First Name</th>
				<th><a href='?order_type=info_lastname&&sort=$sort'>Last Name</th>
				<th><a href='?order_type=order_product&&sort=$sort'>Product type</th>
				<th><a href='?order_type=order_option1&&sort=$sort'>Option 1</th>
				<th><a href='?order_type=order_option2&&sort=$sort'>Option 2</th>
				<th><a href='?order_type=order_audio&&sort=$sort'>Audio add-on</th>
				<th><a href='?order_type=order_visual&&sort=$sort'>Visual add-on</th>
				<th><a href='?order_type=order_rent&&sort=$sort'>Renting time</th>
				<th><a href='?order_type=order_cost&&sort=$sort'>Order Cost</th>
				<th><a href='?order_type=order_time&&sort=$sort'>Order Time</th>
				<th><a href='?order_type=order_status&&sort=$sort'>Order Status</th>
				</tr>";
				while ($record) {
					echo "<tr><td>{$record['order_id']}</td>";
					echo "<td>{$record['info_firstname']}</td>";
					echo "<td>{$record['info_lastname']}</td>";
					echo "<td>{$record['order_product']}</td>";
					echo "<td>{$record['order_option1']}</td>";
					echo "<td>{$record['order_option2']}</td>";
					echo "<td>{$record['order_audio']}</td>";
					echo "<td>{$record['order_visual']}</td>";
					echo "<td>{$record['order_rent']}</td>";
					echo "<td>{$record['order_cost']}</td>";
					echo "<td>{$record['order_time']}</td>";
					echo "<td>{$record['order_status']}</td></tr>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				mysqli_free_result ($result);	// Free resources
			} else {
				echo "<p>No record retrieved.</p>";
			}
		} else {
			echo "<p>Orders table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);	// Close the database connection
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}


	?>
	</fieldset>
		


	</section>

<?php include("includes/footer.inc"); ?>
</body>
</html>