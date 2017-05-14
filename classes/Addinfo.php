<?php 
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'helpers/format.php';
?>

<?php 

class Information
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function AddUserInformation($data,$userid){

		    $first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$department = $_POST['department'];
			$session = $_POST['session'];
			$gender = $_POST['gender'];
			$bdaytime = $_POST['bdaytime'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$about = $_POST['about'];


			$first_name = $this->fm->validation($first_name);
			$last_name = $this->fm->validation($last_name);
			$department = $this->fm->validation($department);
			$session = $this->fm->validation($session);
			$gender = $this->fm->validation($gender);
			$bdaytime = $this->fm->validation($bdaytime);
			$email = $this->fm->validation($email);
			$phone = $this->fm->validation($phone);
			$address = $this->fm->validation($address);
            $about = $this->fm->validation($about);


			$first_name = mysqli_real_escape_string($this->db->link,$first_name);
			$last_name = mysqli_real_escape_string($this->db->link,$last_name);
			$department = mysqli_real_escape_string($this->db->link,$department);
			$session = mysqli_real_escape_string($this->db->link,$session);
			$gender = mysqli_real_escape_string($this->db->link,$gender);
			$bdaytime = mysqli_real_escape_string($this->db->link,$bdaytime);
			$email = mysqli_real_escape_string($this->db->link,$email);
			$phone = mysqli_real_escape_string($this->db->link,$phone);
			$address = mysqli_real_escape_string($this->db->link,$address);
                $about = mysqli_real_escape_string($this->db->link,$about);

			if (empty($first_name) || empty($last_name) || empty($gender) || empty($bdaytime) || empty($department) || empty($session) || empty($email) || empty($phone) || empty($address) || empty($about)) {
				$msg = "<span style='color:red;font-size:18px'>All fields are required. </span>";
				return $msg;
			}


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

				if (!preg_match("#^[-A-Za-z' ]*$#",$department))
				{
					$msg = "<span style='color:red;font-size:18px'>Your department name may contain only letters from a to z.</span>";
					return $msg;
				}

				if (!preg_match('/^[0-9-\s]+$/D',$session))
				{
					$msg = "<span style='color:red;font-size:18px'>Your Session may contain only letters from a to z and (-)hyphen.</span>";
					return $msg;
				}

				if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
				{ 
					$msg = "<span style='color:red;font-size:18px'>Invalid Email Address. Please enter a valid address.</span>";
					return $msg;
				}

				
				




				$query = "INSERT INTO tbl_profile (first_name,last_name,gender,bdaytime,department,session,email,phone,address,about,userid) VALUES ('$first_name','$last_name','$gender','$bdaytime','$department','$session','$email','$phone','$address','$about','$userid')";
			$insertRow = $this->db->insert($query);
			if ($insertRow) {
				$msg = "<span style='color:green;font-size:18px'><strong>Congratulations !</strong> You updated registered.</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red;font-size:18px'>Something Went Wromg!!</span>";
				return $msg;
			}	
}


			public function getUserInfoById($userid){
				$query = "SELECT * FROM tbl_profile WHERE userid = '$userid'";
				$result = $this->db->select($query);
				return $result;
			}


}

 ?>