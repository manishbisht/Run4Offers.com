<?php
include('password.php');
class User extends Password{
    private $_db;
    function __construct($db){
    	parent::__construct(); 
    	$this->_db = $db;
    }
	private function get_user_hash($email){	
		try {
			$stmt = $this->_db->prepare('SELECT password, number FROM members WHERE email = :email AND active="Yes" ');
			$stmt->execute(array('email' => $email));
			
			$row = $stmt->fetch();
			$_SESSION['number'] = $row['number'];
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($email,$password){

		$hashed = $this->get_user_hash($email);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
		session_start();
		$_SESSION['email'] = Guest; 
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	
}


?>