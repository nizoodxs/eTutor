<?php 

require_once("../includes/initialize.php");
if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>

<?php 

$user_id = $session->get_user_id();
$editibility = isset($_GET['editibility']) ? $_GET['editibility'] : 0;
if ($editibility == 0) {
	$usercourses = UserCourse::taken_courses($user_id);
}else{
	$usercourses = UserCourse::given_courses($user_id);
}
?>

<?php

$course_array = array();
foreach ($usercourses as $usercourse) {
	$course_id = $usercourse->get_attribute('course_id');
	$course = Course::find_by_id($course_id);
	array_push($course_array, $course);
}
 ?>




<?php include_layout_template('header.php'); ?>






<?php foreach($course_array as $c) :?>
<?php $c_id = $c->get_attribute('id'); ?>
<a href="view_course.php?course_id=<?php echo "$c_id"; ?>">

<?php 
		echo $c->get_attribute('course_name')."<br /><br />"; 
?>

</a>

<?php endforeach; ?>





<?php include_layout_template('footer.php'); ?>
