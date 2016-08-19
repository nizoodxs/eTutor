<?php 

require_once(LIB_PATH.DS.'database.php');

/**
* use late static bindings later
*/
class DatabaseObject{

	// protected static $table_name = "";
	
	// // function __construct(argument)
	// // {
	// // 	# code...
	// // }

	// // retrieve data from database and instantiate to object attribute
	// public static function instantiate($record){
	// 	// cheack if record is an array and if the record actually exists

	// 	$class_name = get_called_class();//for late static bindings
		
	// 	$object = new $class_name;
	// 	foreach ($record as $attribute => $value) {
	// 		# code...
	// 		if ($object->has_attribute($attribute)) {
	// 			# code...
	// 			$object->set_attribute($value, $attribute);
	// 		}
	// 	}
	// 	return $object;
	// }

	// // to create multiple constructor
	// // public static function constructor_Call(){
	// // 	$instance = new $class_name();
	// // 	return $instance;
	// // }

	// protected function has_attribute($attribute){
	// 	// get_object_vars : to return an associative array with all attributes
	// 	//  includes private and public attributes
	// 	$class_name = get_called_class();
	// 	$object_vars = get_object_vars($this);
	// 	return array_key_exists($attribute, $object_vars);
	// }

	// public function set_attribute($var, $att){
	// 	$class_name = get_called_class();
	// 	$object_vars = get_object_vars($this);

	// 	foreach ($object_vars as $attribute => $value) {
	// 		# code...
	// 		if ($att == $attribute) {
	// 		# code...
	// 			$this->$attribute = $var;
	// 		}
	// 	}
	// }

	// public function get_attribute($att){
	// 	$class_name = get_called_class();
	// 	$object_vars = get_object_vars($this);

	// 	foreach ($object_vars as $attribute => $value) {
	// 		# code...
	// 		if ($att == $attribute) {
	// 		# code...
	// 			return $this->$attribute;
	// 		}

	// 	}
	// }

	// public static function find_all(){
	// 	global $database;
	// 	$sql = "SELECT * FROM " . static::$table_name;
	// 	return static::find_by_sql($sql);
	// }

	// public static function find_by_id($i){
	// 	global $database;
	// 	$sql = " SELECT * FROM ". static::$table_name ."WHERE id = '$i' LIMIT 1" ;
	// 	$result_array = static::find_by_sql($sql);
	// 	return !empty($result_array) ? array_shift($result_array) : false; // to return first element of $result_array
	// }

	// public static function find_by_sql($sql=''){
	// 	global $database;
	// 	$result_set = $database->query($sql);
	// 	$object_array = array();
	// 	while ($row = $database->fetch_array($result_set)) {
	// 		# code...
	// 		$object_array[] = static::instantiate($row);
	// 	}
	// 	return $object_array;
	// }

}

 ?>