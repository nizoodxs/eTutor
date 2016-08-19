<?php

require_once("../includes/initialize.php");
if ($session->is_logged_in()){ redirect_to("index.php"); }



if (isset($_POST['student']) || isset($_POST['teacher'])) {
	# code...
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$email = trim($_POST['email']);
	$user_name = trim($_POST['user_name']);
	$password = trim($_POST['password']);
	$repassword = trim($_POST['repassword']);
	$xp = 0;

	// assign 1 to teacher and 0 to student
	if (isset($_POST['teacher'])) { $xp = 1; }

	// check database to see if user exist.
	$found_user = User::find_by_user_name($user_name);

	if ($found_user) {
		$message = "Username already exists. Please select another one";
	}elseif ($password == $repassword) {

		$user = new User();
		$e_password = encrypt($password);
		$user->set_attribute($first_name, 'first_name');
		$user->set_attribute($last_name, 'last_name');
		$user->set_attribute($email, 'email');
		$user->set_attribute($user_name, 'user_name');
		$user->set_attribute($e_password, 'password');
		$user->set_attribute($xp, 'xp');
		$user->create();
		redirect_to('index.php');
	}else{
		$message="Password mismatched please check and retype your password";
	}

}else{
	$first_name = "";
	$last_name = "";
	$email = "";
	$user_name = "";
}

?>
 <?php include_layout_template('not_logged_header.php') ?>

 <div class="login-page">

     <div class="container">
     			<h2>Sign up</h2>
     			<a class="btn btn-info" href="login.php">Already a user</a>
		<?php echo output_message($message); ?>

      <form method="POST" id="Registration" class="login-form" action="signup.php">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_cogs"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="first_name" type="text" class="form-control" placeholder="First Name" value="<?php echo htmlentities($first_name); ?>" autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?php echo htmlentities($last_name); ?>" autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_mail"></i></span>
              <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo htmlentities($email); ?>" autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="user_name" type="text" class="form-control" placeholder="Username" value="<?php echo htmlentities($user_name); ?>" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key"></i></span>
                <input name="repassword" type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <button class="btn btn-info btn-lg btn-block" name="student">Student</button>
            <button class="btn btn-info btn-lg btn-block" name="teacher">Teacher</button>
            <!-- <a class="btn btn-info btn-lg btn-block" href="AdminReg.html">Adminstrator</a> -->
            <!-- <a class="btn btn-info btn-lg btn-block" href="GradReg.html">Graduate Teaching Assistant</a> -->
        </div>
      </form>

    </div>
 </div>