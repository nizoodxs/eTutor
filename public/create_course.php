<?php 
	require_once("../includes/initialize.php");
	if (!$session->is_logged_in()){ redirect_to("login.php"); }
?>

<?php 
	$video_number = (isset($_GET['create'])) ? $_GET['video_number'] : redirect_to("profile.php");

	$user_id = $session->get_user_id();
	$user = User::find_by_id($user_id);

	$position = array();
	$url = array();
	$trimmed_url = array();
	$description = array();
	
	$categories = array('programming', 'development', 'hardware' ); //for drop down categories
	$chapters = array();
	$chapter = new Chapter();

	if (isset($_POST['submit'])) {
		$course_name = $_POST['course_name'];
		$description = $_POST['description'];
		$category = $_POST['category'];

		$course = new Course();
		$course->set_attribute($course_name, 'course_name');
		$course->set_attribute($category, 'category');
		$course->set_attribute($description, 'description');
		$course->create();  
		$course_id = $course->get_attribute('id');

		for ($i=0; $i <$video_number ; $i++) { 
		
		$position[] = $_POST['position'.$i];
		$trimmed_url[] = video_trim($_POST['video_url'.$i]);
		$text_description[] = $_POST['text_description'.$i];

		$chapter->set_attribute($course_id, 'course_id');
		$chapter->set_attribute($position[$i], 'position');
		$chapter->set_attribute($trimmed_url[$i], 'video_url');
		$chapter->set_attribute($text_description[$i], 'text_description');
		array_push($chapters, $chapter);	

		// echo $chapter->get_attribute('course_id')."<br />";
		// echo $chapter->get_attribute('position')."<br />";
		// echo $chapter->get_attribute('video_url')."<br />";
		// echo $chapter->get_attribute('text_description')."<br />";

		$chapter->create();
		}

		// echo "<hr />";

		// foreach ($chapters as $chap) {
		// echo $chap->get_attribute('course_id')."<br />";
		// echo $chap->get_attribute('position')."<br />";
		// echo $chap->get_attribute('video_url')."<br />";
		// echo $chap->get_attribute('text_description')."<br />";
		// echo "<hr />";
		// }
	
		$usercourse = new UserCourse();
		$usercourse->set_attribute($user_id, 'user_id');
		$usercourse->set_attribute($course_id, 'course_id');
		$usercourse->set_attribute(1, 'editibility');
		$usercourse->create();
		

		$session->message("Course successfully created");
		// echo $session->message();
		redirect_to("profile.php?message=successfully_created");
	


	}else{

	$position = 0;
	$course_name = "";
	$description = "";
	}

 ?>

<!-- header -->
<?php include_layout_template('header.php'); ?>
		    	<hr /><?php
		    				echo "Below is for chapters creation.<br/>Fill form one by one and press 'Submit' button to submit whole course.
		    				<br /> Note : copy url from youtube only eg:https://www.youtube.com/watch?v=3h04x-1uM80"; 
		    			 ?>
		    	<hr />




		<form action="#" method="POST">
		  <table>
		    <tr>
		      <td>Coursename:</td>
		      <td>
		        <input type="text" name="course_name" maxlength="30" value="<?php echo htmlentities($course_name); ?>" required/>
		      </td>
		    </tr>
		    <tr>
		      <td>Category:</td>
		      <td>
		        <select name = "category" required>
					<option value="">...</option>
					<?php
						foreach ($categories as $cat) {
						 	echo "<option value=\"$cat\">$cat</option>";
						 } 
					 ?>
				</select>
		      </td>
		    </tr>
		    <tr>
		      <td>Course Description:</td>
		      <td>
		        <input type="text" name="description" value="<?php echo htmlentities($description); ?>" required/>
		      </td>
		    </tr>
		    <tr>
</table>
<hr />

<div id="chapter_form">

	<?php for ($i=0; $i<$video_number  ; $i++) : ?>
<table>
		      <td>Position:</td>
		      <td>
		        <input type="number" name="position<?php echo $i; ?>" value="<?php echo $i+1; ?>" required/>
		      </td>
		    </tr>
		    <tr>
		      <td>Video url:</td>
		      <td>
		        <input type="text" name="video_url<?php echo $i; ?>" required/>
		      </td>
		    </tr>
		    <tr>
		      <td>Chapter Description:</td>
		      <td>
		        <input type="text" name="text_description<?php echo $i; ?>" required/>
		      </td>
		    </tr>
</table>
<br />
	<?php endfor; ?>
</div>
<hr />
<table>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Submit this chapter" />
		      </td>
		    </tr>

		  </table>
		</form>
		<a href="profile.php" >Cancel course creation</a>





<!-- footer -->
<?php include_layout_template('footer.php'); ?>