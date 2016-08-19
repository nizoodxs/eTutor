<?php 

require_once("../../includes/initialize.php");

if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>

<?php include_layout_template('admin_header.php') ?>




		<h2>MENU</h2>
		<div class = "container">
		<hr />
		This is the main page.
		<hr />

		<ul>
		<li><a href="logout.php">Logout</a></li>
		</ul>

			
		</div>




<?php include_layout_template('admin_footer.php') ?>