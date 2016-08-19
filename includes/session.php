<?php 

// do not include database onjects in session

class Session{

	private $logged_in = false;
	private $user_id;
	public $message;

	function __construct(){
		session_start();
		$this->check_message();
		$this->check_login();
	}

	public function get_user_id(){
		return $this->user_id;
	}

	public function login($user){
		// use database to find user based on username/password
		if ($user) {
			# code...
			$_SESSION['user_id'] = $user->get_attribute('id');
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		}
	}

	public function logout(){
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}

	private function check_login(){
		if (isset($_SESSION['user_id'])) {
			# code...
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		}else{
			unset($this->user_id);
			$this->logged_in = false;
		}
	}

	public function message($msg = ""){
		if (!empty($msg)) {
			# code...
			$_SESSION['message'] = $msg;
		}else{
			return $this->message;
		}
	}

	private function check_message(){
		// is there a message stored in session?
		if (isset($_SESSION['message'])) {
			# code...
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		}else{
			$this->message = "";
		}
	}

	public function is_logged_in(){
		return $this->logged_in;
	}

}

$session = new Session();
$message = $session->message();

 ?>