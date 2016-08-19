<?php 

require_once("../includes/initialize.php");
if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>

<?php 

$course_id = $_GET['course_id'];
$user_id = $session->get_user_id();
// $sql = "INSERT INTO user_course (user_id, course_id, editibility) VALUES ($user_id, $course_id, 0)";
// $database->query($sql);

// $session->message('Course added successfully');

		$courseadded = UserCourse::check($user_id, $course_id);
		if ($courseadded) {
			$session->message('course already added');
			$message = $session->message();
		}else{
			$sql = "INSERT INTO user_course (user_id, course_id, editibility) VALUES ($user_id, $course_id, 0)";
			$database->query($sql);
			$session->message('Course added successfully');
			$message = $session->message();
		}
redirect_to('profile.php');

 ?>

