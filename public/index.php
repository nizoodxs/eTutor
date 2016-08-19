<?php 
require_once("../includes/initialize.php");  
if (!$session->is_logged_in()) { redirect_to("login.php"); }

if (isset($_POST['submit'])) {
	$category = $_POST['category'];
	redirect_to("search_category.php?category=$category");
}

$categories = array('programming', 'development', 'hardware' );

?>



<?php include_layout_template('header.php'); ?>

<?php 	if ($session->is_logged_in()): ?>

<h2>SELECT A CATEGORY</h2><br />

<form action="index.php" method="POST" accept-charset="utf-8">
<table>
		        <select name = "category" required>
					<option value="">...</option>
					<?php
						foreach ($categories as $category) {
						 	echo "<option >$category</option>";
						 } 
					 ?>
				</select><br><br>
	<tr>
		<td colspan="2">
		    <input type="submit" name="submit" value="SEARCH" />
		</td>
    </tr>
</table>
</form>
<br /><br />
<a href="logout.php">Logout</a>
<a href="profile.php">Profile</a>

<?php endif; ?>

<?php  ?>



<!-- footer included -->
<?php include_layout_template('footer.php'); ?> 