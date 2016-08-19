<?php

require_once("../includes/initialize.php");
if ($session->is_logged_in()){ redirect_to("index.php"); }



if (isset($_POST['submit'])) {
	# code...
	$user_name = trim($_POST['user_name']);
	$password = trim($_POST['password']);
	$e_password = encrypt($password);

	// check database to see if user exist.
	$found_user = User::authenticate($user_name, $e_password);

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

<?php include_layout_template('not_logged_header.php') ?>


<div class="login-page">
	<div class="container">

		<h2>Login</h2>
		<?php echo output_message($message); ?>

		<form class="login-form" action="login.php" method="POST">
<!-- 		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" name="user_name" maxlength="30" value="<?php echo htmlentities($user_name); ?>" required/>
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" required/>
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table> -->
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="user_name"  placeholder="Username" value="<?php echo htmlentities($user_name); ?>" required autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
<!--             <label class="Forgot Password" style="text-align:center">
                <span class="Forgotten" style="color:#000000"> <a href="ForgotPassword.html">Forgot Password?</a></span>
            </label> -->
            <button class="btn btn-primary btn-lg btn-block" name="submit">Login</button>
            <a class="btn btn-info btn-lg btn-block" href="signup.php">Register</a>
        </div>
		</form>
</div>
</div>

<!-- <?php include_layout_template('footer.php') ?> -->

<!-- 
create a user object and login using session->login($user)
check login
 -->