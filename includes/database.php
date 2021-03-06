<?php 

require_once(LIB_PATH.DS."config.php");

class MySQLDatabase{

	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;

	// constructor
	function __construct(){
		$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
	}

	// creating a database connection
	public function open_connection(){
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		if (!$this->connection) {
			# code...
			die("Database connection failed : " . mysqli_error($this->connection));
		}else{
			$db_select = mysqli_select_db($this->connection, DB_NAME);
			if (!$db_select) {
					# code...
				die("Database selection failed : " . mysqli_error($this->connection));
				}
		}
	}

	//  for closing the database
	public function close_connection(){
		if (isset($this->connection)) {
				# code...
				mysqli_close($this->connection);
				unset($this->connection);
			}	
	}

	//  executing query with statement passed into as $sql
	public function query($sql){
		$this->last_query = $sql;
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}

	private function confirm_query($result){
		if (!$result) {
			# code...
			$output = "Database query failed : " . mysqli_error($this->connection) . "<br /><br />";
			  // only to execute the below statement while in testing phase. Do not show in public access.
			$output .= "Last executed query : " . $this->last_query . "<br /><br />";
			die($output);
		}
	}

	//  fetches array taken from database and yeuta row linxa
	public function fetch_array($result){
		return mysqli_fetch_array($result);
	}

	// to find number of rows present in a table 
	public function num_rows($result_set){
		return mysqli_num_rows($result_set);
	}

	// get the last id inserted into the table over current db connection
	public function insert_id(){
		return mysqli_insert_id($this->connection);
	}

	// how many rows were affected by the last thing
	public function affected_rows(){
		return mysqli_affected_rows($this->connection);
	}

	//  make form data suitable for sql entry.
	public function escape_value($value) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

}

$database = new MySQLDatabase();
$db =& $database;


 ?>