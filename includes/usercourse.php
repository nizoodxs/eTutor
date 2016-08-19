<?php 

/**
* 
*/

require_once(LIB_PATH.DS.'database.php');

class UserCourse{

	private $id;
	private $user_id;
	private $course_id;
	private $editibility;
	
	function __construct()
	{
		# code...
	}

	public static function instantiate($record){
		// check if record is an array and if record actually exists
		$object = new self;
		foreach ($record as $attribute => $value) {
			# code...
			if($object->has_attribute($attribute)){
				$object->set_attribute($value, $attribute);
			}
		}
		return $object;
	}


	protected function has_attribute($attribute){
		$object_vars = get_object_vars($this);
		return array_key_exists($attribute, $object_vars);
	}

	public function set_attribute($var, $att){
		$object_vars = get_object_vars($this);
		foreach ($object_vars as $attribute => $value) {
			# code...
			if ($att == $attribute) {
				# code...
				$this->$attribute = $var;
			}
		}
	}

	public function get_attribute($att){
		$object_vars = get_object_vars($this);
		foreach ($object_vars as $attribute => $value) {
			# code...
			if ($att == $attribute) {
				# code...
				return $this->$attribute;
			}
		}
	}

	public static function find_by_sql($sql = ''){
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			# code...
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function user_exists($user_id){
		global $database;
		$sql = "SELECT COUNT(*) FROM user_course WHERE user_id = $user_id";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	public static function course_exists($course_id){
		global $database;
		$sql = "SELECT COUNT(*) FROM user_course WHERE course_id = $course_id";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	public static function taken_courses($user_id){
		global $database;
		$sql = "SELECT * FROM user_course WHERE user_id = $user_id AND editibility = 0";
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			# code...
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function given_courses($user_id){
		global $database;
		$sql = "SELECT * FROM user_course WHERE user_id = $user_id AND editibility = 1";
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			# code...
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public function create(){
		global $database;
		$u = $database->escape_value($this->user_id);
		$c = $database->escape_value($this->course_id);
		$e = $database->escape_value($this->editibility);
		$sql = "INSERT INTO user_course 
				(user_id, course_id, editibility)
				VALUES
				($u, $c, $e)";

		if ($database->query($sql)) {
				# code...
				$this->id = $database->insert_id();
				return true;
			}else{
				return false;
			}
	}

	public static function check($user_id = "", $course_id = ""){
		global $database;
		$user_id = $database->escape_value($user_id);
		$course_id = $database->escape_value($course_id);
		$sql = "SELECT * FROM user_course 
				WHERE user_id = '$user_id' 
				AND course_id = '$course_id' 
				LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}


}

 ?>