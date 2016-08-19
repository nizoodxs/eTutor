<?php

require_once("../../includes/initialize.php");

if ($session->is_logged_in()) { redirect_to("index.php"); }


if (isset($_POST['submit'])) {
	# code...
	$user_name = trim($_POST['user_name']);
	$password = trim($_POST['password']);

	// check database to see if user exist.
	$found_user = User::authenticate($user_name, $password);

	if ($found_user) {
		# code...
		$session->login($found_user);
		redirect_to("index.php");
	}else{
		$message = "Username and password combination didn't match.<br />";
	}
}else{
	// form not submited
	$user_name = "";
	$password = "";
}

?>

<?php include_layout_template('admin_header.php') ?>




		<h2>Staff Login</h2>
		<?php echo output_message($message); ?>

		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" name="user_name" maxlength="30" value="<?php echo htmlentities($user_name); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table>
		</form>




<?php include_layout_template('admin_footer.php') ?>

<!-- 
create a user object and login using session->login($user)
check login
 -->