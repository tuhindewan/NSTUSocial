<?php 
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'helpers/format.php';
?>

<?php 

class Update
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function UserUpdate($data,$userid){

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


				$query = "UPDATE tbl_profile SET

								first_name = '$first_name',
								last_name  = '$last_name',
								gender = '$gender',
								bdaytime   = '$bdaytime',
								department = '$department',
								session   = '$session',
								email   = '$email',
								phone   = '$phone',
								address = '$address',
								about  = '$about'

								WHERE userid = '$userid'";

			$insertRow = $this->db->update($query);
			if ($insertRow) {
				$msg = "<span style='color:green;font-size:18px'><strong>Congratulations !</strong> You updated registered.</span>";
				return $msg;
			}else{
				$msg = "<span style='color:red;font-size:18px'>Something Went Wromg!!</span>";
				return $msg;
			}
			}	

	
}


 ?>