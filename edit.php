<?php 
require_once 'lib/session.php';
Session::checkSession();
Session::init();
require_once 'lib/database.php';
$db = new Database();
$userid = Session::get('userid');
?> 
<?php 

require_once 'classes/Update.php';
$upd = new Update();

 ?>
 <?php 

require_once 'helpers/format.php';
$fm = new Format();

 ?>

 <?php 

require_once 'classes/UpdatePicture.php';
$updp = new UpdatePic();

 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSTUSocial</title>
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/edit_profile.css" rel="stylesheet">
    <link href="css/cover.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
    <link href="css/messages2.css" rel="stylesheet">
    <script src="js/custom-solid.js" ></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <style>
      body{
        background-color: #eeeeee;
      }
    .navbar-nav{
      margin-right: 60px;
    }

    .navbar-nav img{
      height: 26px;
      width: 24px;
      margin-top: 16px;
    }

    .navbar-inverse ul li a{
      font-size: 18px;
    }
    /* CSS used here will be applied after bootstrap.css */

.dropdown {
    display:inline-block;
    padding:10px;
  }


.glyphicon-bell {
   
    font-size:25px;
    color: white;
  }

.notifications {
   min-width:420px; 
  }
  
  .notifications-wrapper {
     overflow:auto;
      max-height:250px;
    }
    
 .menu-title {
     color:#ff7788;
     font-size:1.5rem;
      display:inline-block;
      }
 
.glyphicon-circle-arrow-right {
      margin-left:10px;     
   }
  
   
 .notification-heading, .notification-footer  {
  padding:2px 10px;
       }
      
        
.dropdown-menu.divider {
  margin:5px 0;          
  }

.item-title {
  
 font-size:1.3rem;
 color:#000;
    
}

.notifications a.content {
 text-decoration:none;
 background:#ccc;

 }
    
.notification-item {
 padding:10px;
 margin:5px;
 background:#ccc;
 border-radius:4px;
 }


    </style>
  </head>
  <body>
<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="feeds.php" style="margin-left: 60px;margin-top: 18px;">NSTUSocial</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="color: white;">
        <li><img src="img/nstu.png" class="img-rounded" style="margin-top: 25px;" alt=""></li>
        <li><a href="timeline.php" style="color: white;margin-top: 15px;"><?php echo Session::get('firstname'); ?></a></li>
        <li><a href="feeds.php" style="color: white;margin-top: 15px;">Home</a></li>
        <li class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    <i class="glyphicon glyphicon-bell"></i>
  </a>
  
  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
    
    <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
    </div>
    <li class="divider"></li>
   <div class="notifications-wrapper">
     <a class="content" href="#">
      
       <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
       
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>
    </a>

   </div>
    <li class="divider"></li>
    <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
  </ul>
</li>

<?php 

if (isset($_GET['action']) && $_GET['action']=='logout') {
   session_destroy();
}


 ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;margin-top: 7px;"><span style="font-size: 20px" class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Account</a></li>
            <li><a href="edit.php">Update Profile</a></li>
            <li><a href="#">Messages</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?action=logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  
  <div class="row">
    
      <div class="col-md-8">




                  <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Update Your Profile Information</a></li>
                          </ul>
                          <hr>
                          
                            <?php 
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['update'])) {
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

                $first_name = $fm->validation($first_name);
                $last_name = $fm->validation($last_name);
                $department = $fm->validation($department);
                $session = $fm->validation($session);
                $gender = $fm->validation($gender);
                $bdaytime = $fm->validation($bdaytime);
                $email = $fm->validation($email);
                $phone = $fm->validation($phone);
                $address = $fm->validation($address);
                $about = $fm->validation($about);

                $first_name = mysqli_real_escape_string($db->link,$first_name);
                $last_name = mysqli_real_escape_string($db->link,$last_name);
                $department = mysqli_real_escape_string($db->link,$department);
                $session = mysqli_real_escape_string($db->link,$session);
                $gender = mysqli_real_escape_string($db->link,$gender);
                $bdaytime = mysqli_real_escape_string($db->link,$bdaytime);
                $email = mysqli_real_escape_string($db->link,$email);
                $phone = mysqli_real_escape_string($db->link,$phone);
                $address = mysqli_real_escape_string($db->link,$address);
                $about = mysqli_real_escape_string($db->link,$about);

                


                  if (!preg_match("#^[-A-Za-z' ]*$#",$first_name))
                    {
                      echo "<span style='color:red;font-size:18px'>Your first name may contain only letters from a to z.</span>";
                    }

                    elseif (!preg_match("#^[-A-Za-z' ]*$#",$last_name))
                    {
                      echo "<span style='color:red;font-size:18px'>Your last name may contain only letters from a to z.</span>";
                    }

                    elseif (!preg_match("#^[-A-Za-z' ]*$#",$department))
                    {
                      echo "<span style='color:red;font-size:18px'>Your department name may contain only letters from a to z.</span>";
                    }

                   elseif (!preg_match('/^[0-9-\s]+$/D',$session))
                    {
                      echo "<span style='color:red;font-size:18px'>Your Session may contain only letters from a to z and (-)hyphen.</span>";
                    }

                    elseif(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
                    { 
                     echo "<span style='color:red;font-size:18px'>Invalid Email Address. Please enter a valid address.</span>";
                    }
                    elseif (empty($first_name) || empty($last_name) || empty($gender) || empty($bdaytime) || empty($department) || empty($session) || empty($email) || empty($phone) || empty($address) || empty($about)) {
                    echo "<span style='color:red;font-size:18px'>All fields are required. </span>";
                  }else{

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
                          $insertRow = $db->update($query);
                          if ($insertRow) {
                  echo "<span style='color:green;font-size:18px'><strong>Congratulations !</strong> You updated registered.</span>";
                }else{
                  echo "<span style='color:red;font-size:18px'>Something Went Wromg!!</span>";
                }
                        }

                
                
            }

  ?>



                          <hr>
<?php 
require_once 'classes/Addinfo.php';
$info = new Information();
$getdata = $info->getUserInfoById($userid);
if ($getdata) {
  while ($value=$getdata->fetch_assoc()) {
?>




                     <form action="" method="post"> 

                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $value['first_name']; ?>"  >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $value['last_name']; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $value['gender']; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Birthday</label>
                        <input type="text" class="form-control" name="bdaytime" value="<?php echo $value['bdaytime']; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Department</label>
                        <input type="text" class="form-control" name="department" value="<?php echo $value['department']; ?>" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Session</label>
                        <input type="text" class="form-control" name="session" value="<?php echo $value['session']; ?>" >
                      </div>
                    <div class="contact_info">
                      <h3><i class="fa fa-square"></i> Contact Information</h3>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" value="<?php echo $value['email']; ?>" name="email" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone/Mobile</label>
                      <input type="text" class="form-control" value="<?php echo $value['phone']; ?>" name="phone" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" value="<?php echo $value['address']; ?>" name="address">
                    </div>

                   
                    

                    <div class="about">
                      <h3><i class="fa fa-square"></i> About Me</h3>
                    </div>
                    <div class="form-group">
                      <textarea  class="form-control" name="about" value="<?php echo $value['about']; ?>" cols="30" rows="10"><?php echo $value['about'];?></textarea>
                      
                      <script type="text/javascript">
                        if ( typeof CKEDITOR == 'undefined' )
                        {
                          document.write(
                            '<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
                            'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
                            'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
                            'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
                            'value (line 32).' ) ;
                        }
                        else
                        {
                          var editor = CKEDITOR.replace( 'about' );
                          //editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
                        }

                      </script>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary text-center"><i class="fa fa-floppy-o"></i> Update</button>
                    </form>

<?php }} ?>
      </div>

       <div class="col-md-4">
                         <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> Update Your Profile Picture</a></li>
                          </ul>
                         <hr>
                          <?php 


                            $query = "SELECT * FROM tbl_avatars WHERE userid = '$userid'";
                            $result= $db->select($query);
                            if ($result) {
                              while ($value=$result->fetch_assoc()) {

                           ?>
                         <div class="avatar">
                            <img height="111px" width="111px" src="<?php echo $value['images']; ?>" alt="people">
                        </div>
                        <?php }} ?>
                         <hr>
                         <?php 


                          if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['avatar'])) {
                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                              $file_name = $_FILES['image']['name'];
                              $file_size = $_FILES['image']['size'];
                              $file_temp = $_FILES['image']['tmp_name'];


                               $div = explode('.', $file_name);
                              $file_ext = strtolower(end($div));
                              $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                              $uploaded_image = "avatars/".$unique_image;

                              if (empty($file_name)) {
                               echo  "<span  style='color:red;font-size:18px'>Please Select any Image !</span>";
                              }elseif ($file_size >2097152) {
                               echo "<span style='color:red;font-size:18px'>Image Size should be less then 2MB!
                               </span>";
                              } elseif (in_array($file_ext, $permited) === false) {
                              echo  "<span style='color:red;font-size:18px'>You can upload only:-"
                               .implode(', ', $permited)."</span>";
                              } else{
                              move_uploaded_file($file_temp, $uploaded_image);
                              $query = "UPDATE tbl_avatars SET images='$uploaded_image' WHERE userid='$userid'";
                              $inserted_rows = $db->update($query);
                              if ($inserted_rows) {
                               echo "<span style='color:green;font-size:18px'>Image updated Successfully.</span>";

                              }else {
                               echo "<span style='color:red;font-size:18px'>Image Not updated !</span>";

                             }   
                             }
                             }  

                           ?>
                         <form action="" method="post" enctype="multipart/form-data">
                            Select an image for your Avatar:
                            <input style="margin-top: 10px;" type="file" name="image" id="image">
                            <input  style="margin-top: 10px;" type="submit" value="Change Avatar" name="avatar">
                        </form>
      </div>

      <div style="margin-top: 60px;" class="col-md-4">
                         <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> Add Your Cover Photo</a></li>
                          </ul>
                         <hr>
                          <?php 


                            $query = "SELECT * FROM tbl_covers WHERE userid = '$userid'";
                            $result= $db->select($query);
                            if ($result) {
                              while ($value=$result->fetch_assoc()) {

                           ?>
                            <div class="avatar">
                            <img height="111px" width="250px" src="<?php echo $value['images']; ?>" alt="people">
                        </div><?php }} ?>
                         <hr>
                          
                            <?php 


                          if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['cover'])) {
                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                              $file_name = $_FILES['image']['name'];
                              $file_size = $_FILES['image']['size'];
                              $file_temp = $_FILES['image']['tmp_name'];


                               $div = explode('.', $file_name);
                              $file_ext = strtolower(end($div));
                              $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                              $uploaded_image = "covers/".$unique_image;

                              if (empty($file_name)) {
                               echo  "<span  style='color:red;font-size:18px'>Please Select any Image !</span>";
                              }elseif ($file_size >1048567) {
                               echo "<span style='color:red;font-size:18px'>Image Size should be less then 1MB!
                               </span>";
                              } elseif (in_array($file_ext, $permited) === false) {
                              echo  "<span style='color:red;font-size:18px'>You can upload only:-"
                               .implode(', ', $permited)."</span>";
                              } else{
                              move_uploaded_file($file_temp, $uploaded_image);
                              $query = "UPDATE tbl_covers SET images='$uploaded_image' WHERE userid='$userid'";
                              $inserted_rows = $db->update($query);
                              if ($inserted_rows) {
                               echo "<span style='color:green;font-size:18px'>Image updated Successfully.</span>";

                              }else {
                               echo "<span style='color:red;font-size:18px'>Image Not updated !</span>";

                             }   
                             }
                             }  

                           ?>
                         <form action="" method="post" enctype="multipart/form-data">
                            Select an image for your Cover:
                            <input style="margin-top: 10px;" type="file" name="image" id="image">
                            <input  style="margin-top: 10px;" type="submit" value="Upload Cover" name="cover">
                        </form>
      </div>

  </div>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>