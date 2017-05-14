<?php 
require_once 'lib/session.php';
Session::checkLogin();
require_once 'lib/database.php';
require_once 'helpers/format.php';

?>


 <?php 


class UserLogin
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function userLogin($data){
		$password = $_POST['password'];
		$email = $_POST['email'];

		$email = $this->fm->validation($email);
		$password = $this->fm->validation($password);

		$email = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
		if (empty($email) || empty($password)) {
				$msg = "<span style='color:red;font-size:18px'>All fields are required. </span>";
				return $msg;
			}

		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
				{ 
					$msg = "<span style='color:red;font-size:18px'>Invalid Email Address. Please enter a valid address.</span>";
					return $msg;
				}
		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
			   $msg =  "<span style='color:red;font-size:18px'>the password does not meet the requirements!(at least one number,one letter,one of the following: !@#$% and there have to be 8-12 characters)</span>";
			   return $msg;
			}

			else{
				$query = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
				$result = $this->db->select($query);
				if ($result!=false) {
				$value = $result->fetch_assoc();
				Session::set('userlogin',true);
				Session::set('userid',$value['userId']);
				Session::set('firstname',$value['first_name']);
				header("Location:feeds.php");
					}else{
						$msg = "<span style='color:red;font-size:18px'>Email or Password not matched.</span>";
						return $msg;
					}
				}

	}
}


  ?>