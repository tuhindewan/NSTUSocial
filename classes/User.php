<?php 
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'helpers/format.php';
?>

<?php 

class User
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function userRegistration($data){

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password =  $_POST['password'];
			$con_password = $_POST['con_password'];
			$gender = $_POST['gender'];
			$bdaytime = $_POST['bdaytime'];

			$first_name = $this->fm->validation($first_name);
			$last_name = $this->fm->validation($last_name);
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);
			$con_password = $this->fm->validation($con_password);

			$first_name = mysqli_real_escape_string($this->db->link,$first_name);
			$last_name = mysqli_real_escape_string($this->db->link,$last_name);
			$email = mysqli_real_escape_string($this->db->link,$email);
			$password = mysqli_real_escape_string($this->db->link,$password);
			$con_password = mysqli_real_escape_string($this->db->link,$con_password);

			if (!preg_match("#^[-A-Za-z' ]*$#",$first_name))
				{
					$msg = "<span style='color:red;font-size:18px'>Your first name may contain only letters from a to z.</span>";
					return $msg;
				}

				if (!preg_match("#^[-A-Za-z' ]*$#",$last_name))
				{
					$msg = "<span style='color:red;font-size:18px'>Your last name may contain only letters from a to z.</span>";
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


			if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($con_password) || empty($gender) || empty($bdaytime)) {
				$msg = "<span style='color:red;font-size:18px'>All fields are required. </span>";
				return $msg;
			}

			$query = "SELECT * FROM tbl_users WHERE email = '$email' LIMIT 1";
			$mailchk = $this->db->select($query);
		if ($mailchk==true) {
			$msg = "<span style='color:red;font-size:18px'>Email Already Exists.</span>";
			return $msg;
		}else{

			$query = "INSERT INTO tbl_users (first_name,last_name,email,password,con_password,gender,bdaytime) VALUES ('$first_name','$last_name','$email','$password','$con_password','$gender','$bdaytime')";
			$insertRow = $this->db->insert($query);
			if ($insertRow) {
				$msg = "<span style='color:green;font-size:18px'><strong>Congratulations !</strong> You successfully registered.</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red;font-size:18px'>Something Went Wromg!!</span>";
				return $msg;
			}
 	}
}

}

?>