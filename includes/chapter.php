<?php 

/**
* handles all user related attributes and functions
*/

require_once(LIB_PATH.DS.'database.php');

class Chapter{

	private $id;
	private $course_id;
	private $position;
	private $video_url;
	private $text_description;

	function __construct()	{
		# constructor code...
	}

	// retrieve data from database and instantiate to object attribute
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

	public static function count_all_course_id($c_id){
		global $database;
		$sql = "SELECT COUNT(*) FROM chapters WHERE course_id = $c_id";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
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

	public static function find_by_id($i){
		global $database;
		$sql = "SELECT * FROM chapters WHERE id = $i LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_all_by_course_id($c_id, $per_page=1, $offset=0){
		global $database;
		$sql = "SELECT * FROM chapters WHERE course_id = $c_id ORDER BY position ASC LIMIT $per_page OFFSET $offset";
		return self::find_by_sql($sql);
	}

	public function save(){
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create(){
		global $database;
		$l = $database->escape_value($this->course_id);
		$p = $database->escape_value($this->position);
		$vu = $database->escape_value($this->video_url);
		$d = $database->escape_value($this->text_description);
		$sql = "INSERT INTO chapters 
				(course_id, position, video_url, text_description)
				VALUES
				($l, $p, '$vu', '$d')";

				if ($database->query($sql)) {
					# code...
					$this->id = $database->insert_id();
					return true;
				}else{
					return false;
				}
	}

	public function update(){
		global $database;
		$l = $database->escape_value($this->course_id);
		$p = $database->escape_value($this->position);
		$vu = $database->escape_value($this->video_url);
		$d = $database->escape_value($this->text_description);
		$sql = "UPDATE chapters SET 
				course_id = $l, 
				position = $p, 
				video_url = '$vu',
				text_description = '$d' 
				 WHERE id = $this->id";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete(){
		global $database;
		$sql = "DELETE FROM chapters WHERE id = $this->id LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

}

 ?>