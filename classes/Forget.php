<?php 
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'helpers/format.php';
?>

<?php 

class Forget
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function ForgetPassword($email){
		$email = $this->fm->validation($email);
		$email = mysqli_real_escape_string($this->db->link,$email);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$msg = "<span style='color:red;font-size:18px;'>Invalid Email Address!</span>";
			return $msg;
		}else{
			$query = "SELECT * FROM tbl_users WHERE email = '$email' LIMIT 1";
			$mailchk = $this->db->select($query);
		}
		if ($mailchk!=false) {
			while ($value = $mailchk->fetch_assoc()) {
				$userid = $value['userId'];
				$username = $value['first_name'];
			}

				$text = substr($email, 0,3);
				$rand = rand(10000,99999);
				$newpass = "$text$rand";
				$password = $newpass;

				$updatequery = "UPDATE tbl_users SET password='$password', con_password='$password' WHERE userid = '$userid'";
				$update_row  = $this->db->update($updatequery);

				

				$to = '$mail';
				$from = 'nstu@gmail.com';
				$headers = "From: $from\n";
				$headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                $subject = "Your Password";
                $message = "Hello,".$username." Your new password is".$password."Please save it";

                $sendmail = mail($to, $subject, $message, $headers);

                if ($sendmail) {
                	$msg = "<span style='color:green;font-size:18px;'>New Password send to your email.Please Check.!</span>";
                	return $msg;
                }else{
                	$msg = "<span style='color:red;font-size:18px;'>Invalid Email Address!</span>";
					return $msg;
                }



		}else{
			$msg = "<span style='color:red;font-size:18px;'>Email not exist!</span>";
			return $msg;
		}
	}
}



 ?>