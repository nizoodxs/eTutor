<?php 
	require_once("../includes/initialize.php");
	if (!$session->is_logged_in()){ redirect_to("login.php"); }
?>


<?php 
	// initialize all variables
	$message = "";
	$course_id = !empty($_GET['course_id']) ? $_GET['course_id'] : redirect_to("index.php");
	$user_id = $session->get_user_id();
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

	$per_page = 1;
	$total_count = Chapter::count_all_course_id($course_id);

	// instantiating the pagination class
	$pagination = new Pagination($page, $per_page, $total_count);
	$offset = $pagination->offset();

	// original code 
	// $sql = "SELECT * FROM chapters WHERE course_id = $course_id ORDER BY position ASC LIMIT $per_page OFFSET $offset";
	// putting all displayble chapters into chapters array

	$course = Course::find_by_id($course_id);
	$course_name = $course->get_attribute('course_name');
	$chapters = array();
	$chapters = Chapter::find_all_by_course_id($course_id, $per_page, $offset);

	// $chapters = Chapter::find_by_sql($sql);
	// if (isset($_GET['add'])) {
	// 	$courseadded = UserCourse::check($user_id, $course_id);
	// 	if (isset($courseadded)) {
	// 		$session->message('course already added');
	// 		$message = $session->message();
	// 	}else{
	// 		$sql = "INSERT INTO user_course (user_id, course_id, editibility) VALUES ($user_id, $course_id, 0)";
	// 		$database->query($sql);
	// 		$session->message('Course added successfully');
	// 		$message = $session->message();
	// 	}
	// }
 ?>


<?php include_layout_template('header.php'); ?>
 <hr />
 <br />

<div class="row">
	<div class="col-sm-3">
    <!--sidebar start-->
      	<aside>
          	<div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            	<h3>Lessons</h3>
            	<ul class="sidebar-menu">                
                	<?php
                // displaying lessons direct link
					for ($i=1; $i <= $pagination->total_pages() ; $i++) :
					?>
				<!-- to find if page is current page -->
					<?php if($i==$page){ $status = "active"; }else{ $status="sub-menu"; } ?>
                	<li class="<?php echo "$status"; ?>">
                    	<a href="view_course.php?<?php echo "course_id=$course_id&page=$i"; ?>" class="">
                        	<i class="icon_document_alt"></i>
                        	<span>
                       			<?php 
                       				echo "lesson $i";
                       			?>
                   			</span>
                    	</a>
                	</li>       
                	<?php endfor; ?>
            	</ul>
            <!-- sidebar menu end-->
          	</div>
      	</aside>
    <!--sidebar end-->
    </div>  
    <div class="col-sm-9">
	<!-- add to mycourse button starts -->
		<div class="row">
			<div class="col-sm-10"></div>	
			<a href="add.php?course_id=<?php echo $course_id; ?>" > 
				<button class="btn btn-success btn-sm" name="add" type="submit">++ Add to my course </button>
			</a>
		</div>
	<!-- add to my course button ends -->

		<?php 
			echo "<h1>".output_message($message)."</h1>";
 		?>

	<!-- course title starts -->
		<div class="row">
			<h1 class="col-sm-9"> <?php echo "$course_name"; ?> </h1>
		</div>
	<!-- course title ends -->

		<hr />

		<?php foreach ($chapters as $chapter) : ?>
			<?php
				$url =  $chapter->get_attribute('video_url');
				$desc =  $chapter->get_attribute('text_description');
			?>

			<div class="row">
    			<div class="col-sm-8">
      				<h2><?php echo "$desc"; ?></h2>
      				<div class="embed-responsive embed-responsive-16by9">
      				<!-- video url here -->
						<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>
      				</div>
    			</div>
			</div>
		<?php endforeach; ?>
		<br />
		
		<div id="pagination">
			<?php if ($pagination->total_pages()>1) : ?>

				<?php
					if ($pagination->has_previous_page()) {
						echo "<a class=\"btn btn-default btn-sm\" href=\"view_course.php?course_id=$course_id&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a>";
						echo "	";
					}
				?>

				<?php
					if ($pagination->has_next_page()) {
						echo "<a class=\"btn btn-default btn-sm\" href=\"view_course.php?course_id=$course_id&page=";
						echo $pagination->next_page();
						echo "\">Next &raquo;</a>";
					}
				?>

			<?php endif; ?>
		</div>
		<hr />
	</div>
</div>

<!-- footer -->
<?php include_layout_template('footer.php'); ?>