<?php 

require_once("../includes/initialize.php");
if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>

<?php 

	$user_id = $session->get_user_id();
	$user = User::find_by_id($user_id);
	$xp = $user->get_attribute('xp');

?>

 <?php include_layout_template('header.php'); ?>
 <hr />
 <br />

<?php 
	$msg = $session->message();

	echo "<h1>".output_message($message)."</h1>";
	echo "<hr />";
?>

<table>
	    <tr>
	      <td>Username:</td>
	      <td>
	        <?php echo $user->get_attribute('user_name'); ?>
	      </td>
	    </tr>
	    <tr>
	      <td>Name:</td>
	      <td>
	        <?php echo $user->get_attribute('first_name') . " " . $user->get_attribute('last_name'); ?>
	      </td>
	    </tr>
	    <tr>
	      <td>Email:</td>
	      <td>
	        <?php echo $user->get_attribute('email'); ?>
	      </td>
	    </tr>
	    <tr>
	      <td>Account type:</td>
	      <td>
	        <?php if ($xp == 1) {	echo "Teacher account";  }else{ echo "Student account"; } ?>
	      </td>
	    </tr>
</table>

<br /><br />
<hr />

<a href="edit_profile.php">Edit Profile</a><br /><br />

<?php if ($xp == 1) : ?>

	<form action="create_course.php" method="GET" accept-charset="utf-8">
		 <table>
		    <tr>
		      <td>
		    <div class="input-group">
              <span class="input-group-addon">
				<input class="form-control" placeholder="Number of videos you want to include" type="number" name="video_number" required/>
            	<button class="btn btn-primary" name="create">Create new course</button>
              </span>
            </div>
		      </td>
		    </tr>
		  </table>
	</form>

<?php endif; ?>

<a href="all_course.php?editibility=0">Course taken</a><br />
<?php if ($xp == 1) : ?>
	<a href="all_course.php?editibility=1">Course Created</a><br />
<?php endif; ?>
<a href="change_password.php">Change Password</a><br />




