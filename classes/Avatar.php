<?php 

require_once 'lib/database.php';
require_once 'lib/session.php';

?>

<?php 

class Avatar
{
	private $db;

	function __construct()
	{
		$this->db = new Database();

	}
	public function UploadAvatar($file,$id){

	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "avatars/".$unique_image;

    if (empty($file_name)) {
     $msg =  "<span style='color:red;font-size:18px'>Please Select any Image !</span>";
     return $msg;
    }elseif ($file_size >1048567) {
     $msg= "<span style='color:red;font-size:18px'>Image Size should be less then 1MB!
     </span>";
     return $msg;
    } elseif (in_array($file_ext, $permited) === false) {
     $msg= "<span style='color:red;font-size:18px'>You can upload only:-"
     .implode(', ', $permited)."</span>";
     return $msg;
    } else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_avatars (images,userid) 
    VALUES ('$uploaded_image','$id')";
    $inserted_rows = $this->db->insert($query);
    if ($inserted_rows) {
     $msg="<span style='color:green;font-size:18px'>Image Inserted Successfully.</span>";
     return $msg;
    }else {
     $msg = "<span style='color:red;font-size:18px'>Image Not Inserted !</span>";
     return $msg;
    }
    }


     
}


        public function UploadCover($data,$id){

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];


     $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "covers/".$unique_image;

    if (empty($file_name)) {
     $msg =  "<span class='error'>Please Select any Image !</span>";
     return $msg;
    }elseif ($file_size >1048567) {
     $msg= "<span class='error'>Image Size should be less then 1MB!
     </span>";
     return $msg;
    } elseif (in_array($file_ext, $permited) === false) {
     $msg= "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
     return $msg;
    } else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_covers(images,userid) 
    VALUES('$uploaded_image','$id')";
    $inserted_rows = $this->db->insert($query);
    if ($inserted_rows) {
     $msg="<span class='success'>Image Inserted Successfully.</span>";
     return $msg;
    }else {
     $msg = "<span class='error'>Image Not Inserted !</span>";
     return $msg;

}
}
}

public function getAvatar($userid){
    $query = "SELECT * FROM tbl_avatars WHERE userid = '$userid' LIMIT 1";
    $result = $this->db->select($query);
    return $result;
}


}
 ?>
