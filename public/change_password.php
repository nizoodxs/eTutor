<?php 
	require_once("../includes/initialize.php");
	if (!$session->is_logged_in()){ redirect_to("login.php"); }
?>



<?php include_layout_template('not_logged_header.php'); ?>


<?php 

	$user_id = $session->get_user_id(); 
	$user = User::find_by_id($user_id);
	$password = $user->get_attribute('password');
	if (isset($_POST['submit'])) {
		$old_password = encrypt($_POST['old_password']);
		$new_password = encrypt($_POST['new_password']);
		$re_password = encrypt($_POST['re_password']);
		if ($password == $old_password && $new_password == $re_password) {
			$user->set_attribute($new_password, 'password');
			$user->update();
			redirect_to("profile.php");
		}else{
			$session->message("Password mismatched. Please check your password and try again.");
		}
	}

?>

<div class="login-page">
    <div class="container">

		<h2>Change password</h2>
		<?php echo output_message($message); ?>

      <form class="login-form" action="change_password.php" method="POST" >        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="password" name="old_password" class="form-control" placeholder="Old password" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="re_password" class="form-control" placeholder="Re-Enter Password" required>
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="submit" >Change password</button>
        </div>
      </form>

    </div>
</div>

<!-- footer included -->
<?php include_layout_template('footer.php'); ?> 