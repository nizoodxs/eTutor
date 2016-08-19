<?php 

/**
* handles all user related attributes and functions
*/

require_once(LIB_PATH.DS.'database.php');

class User{

	private $id;
	private $user_name;
	private $password;
	private $first_name;
	private $last_name;
	private $email;
	private $xp;
	
	function __construct()	{
		# constructor code...
	}

	public static function authenticate($user_name = "", $password = ""){
		global $database;
		$user_name = $database->escape_value($user_name);
		$password = $database->escape_value($password);
		$sql = "SELECT * FROM users 
				WHERE user_name = '$user_name' 
				AND password = '$password' 
				LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
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

	public static function count_all(){
		global $database;
		$sql = "SELECT COUNT(*) FROM users ";
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
		$sql = "SELECT * FROM users WHERE id = $i LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_user_name($u_name){
		global $database;
		$sql = "SELECT * FROM users WHERE user_name = '$u_name' LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_all(){
		global $database;
		$sql = "SELECT * FROM users ";
		return self::find_by_sql($sql);
	}

	public function save(){
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create(){
		global $database;
		$u = $database->escape_value($this->user_name);
		$p = $database->escape_value($this->password);
		$f = $database->escape_value($this->first_name);
		$l = $database->escape_value($this->last_name);
		$e = $database->escape_value($this->email);
		$x = $database->escape_value($this->xp);
		$sql = "INSERT INTO users 
				(user_name, password, first_name, last_name, email, xp)
				VALUES
				('$u', '$p', '$f', '$l', '$e', $x)";

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
		$u = $database->escape_value($this->user_name);
		$p = $database->escape_value($this->password);
		$f = $database->escape_value($this->first_name);
		$l = $database->escape_value($this->last_name);
		$e = $database->escape_value($this->email);
		$x = $database->escape_value($this->xp);
		$sql = "UPDATE users SET 
				user_name = '$u', 
				password = '$p', 
				first_name = '$f', 
				last_name = '$l', 
				email = '$e', 
				xp = $x 
				 WHERE id = $this->id";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete(){
		global $database;
		$sql = "DELETE FROM users WHERE id = $this->id LIMIT 1";
		$database->query($sql);
		if(($database->affected_rows() == 1) && (UserCourse::user_exists($this->id) >=1)) {
			$sub_sql = "DELETE FROM user_course WHERE user_id = $this->id ";
			$database->query($sub_sql);
		}
		return ($database->affected_rows() >= 1) ? true : false;
	}

}

 ?>