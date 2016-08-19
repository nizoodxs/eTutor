<?php 
	require_once("../includes/initialize.php");  
	if (!$session->is_logged_in()){ redirect_to("login.php"); }

?>

<?php

$category = (isset($_GET['category'])) ? $_GET['category'] : redirect_to('index.php');
$title = $category;
$course_array = array();
$course_array = Course::find_by_category($category);

 ?>

<?php include_layout_template('header.php'); ?>


<?php foreach ($course_array as $course): ?>

<?php $course_id = $course->get_attribute('id');
?>

<a href="view_course.php?course_id=<?php echo "$course_id"; ?>">

<?php 
		echo $course->get_attribute('course_name')."<br /><br />"; 
?>

</a>

<?php endforeach; ?>


<?php include_layout_template('footer.php'); ?>

 	
 </body>
 </html>