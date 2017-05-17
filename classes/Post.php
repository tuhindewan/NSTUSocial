<?php 
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'helpers/format.php';
?>

<?php 

class Post
{
	
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function postStatus($data,$file,$userid){


			$post = $_POST['post'];
			$image = $_FILES['image'];
			$file = $_FILES['file'];


 

			$query = "INSERT INTO tbl_posts (posts) VALUES ('$post')";
			$insertRow = $this->db->insert($query);
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