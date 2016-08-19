
<!--     <div id="footer">	Developed by highly enthuisiastic team of four individuals. <br><br>
	 						copyright <?php echo date("Y M", time()); ?> MP Co. Ltd.</div> -->
  </body>
</html>

<?php if(isset($database)) { $database->close_connection(); } ?>