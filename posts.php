<?php 
require_once 'lib/session.php';
Session::checkSession();
Session::init();
$userid = Session::get('userid');
?> 
<?php 
require_once 'classes/Avatar.php';
$avtr = new Avatar();
?>
<?php 
require_once 'classes/Addinfo.php';
$info = new Information();
?>
<?php 

require_once 'classes/Post.php';
$pt = new Post();

 ?>
<?php 

require_once 'lib/database.php';
$db = new Database();

 ?>
 <?php 

require_once 'helpers/format.php';
$fm = new Format();

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSTUSocial</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet"  href="css/font-awesome.css">
    <link rel="stylesheet"  href="css/ionicons.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/timeline.css">
    <link href="css/cover.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/buttons.css" rel="stylesheet">
    <link href="css/edit_profile.css" rel="stylesheet">
    <style>
      
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
<nav class="navbar navbar-inverse navbar-fixed-top">
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
      <?php 
                    $getpic = $avtr->getAvatar($userid);
                    if ($getpic) {
                      while ($value=$getpic->fetch_assoc()) {
                     ?>
        <li><img src="<?php echo $value['images']; ?>" class="img-rounded" style="margin-top: 25px;" alt=""></li><?php }} ?>
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
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
        <p class="item-info">Marketing 101, Video Assignment</p>
      </div>

    </a>
     <a class="content" href="#">
      <div class="notification-item">
        <h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
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
            <li><a href="about.php">MySelf</a></li>
            <li><a href="addinformation.php">Add Information</a></li>
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




<div class="row" style="margin-top: 60px;">

  <div class="col-md-8 col-md-offset-2" style="margin-top: 60px">
      <h3><a class="btn btn-primary btn-lg" href="#" role="button">Feel  Free to Share Your Day</a></h3>

   
 <?php   

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])) {
               

                $post = $_POST['post'];

                $post = $fm->validation($post);
                $post = mysqli_real_escape_string($db->link,$post);


                $query = "Select * FROM tbl_profile WHERE userid = '$userid'";
                $result = $db->select($query);
                if ($result) {
                  while ($value=$result->fetch_assoc()) {
                    $firstname  = $value['first_name'];
                    $lastname = $value['last_name'];
                  }
                }

                $query = "Select * FROM tbl_avatars WHERE userid = '$userid'";
                $result = $db->select($query);
                if ($result) {
                  while ($value=$result->fetch_assoc()) {
                    $avatar  = $value['images'];
                  }
                }


                  $permited   = array('jpg', 'jpeg', 'png', 'gif','pdf','docx');
                  $image_name = $_FILES['image']['name'];
                  $image_size = $_FILES['image']['size'];
                  $image_temp = $_FILES['image']['tmp_name'];


                  $div = explode('.', $image_name);
                  $image_ext = strtolower(end($div));
                  $unique_image = substr(md5(time()), 0, 10).'.'.$image_ext;
                  $uploaded_image = "posts/".$unique_image;


 
                      move_uploaded_file($image_temp, $uploaded_image);
                      $query = "INSERT INTO tbl_posts (posts,images,first_name,last_name,avatar,user_id) VALUES ('$post','$uploaded_image','$firstname','$lastname','$avatar','$userid')";
                      $insertRow = $db->insert($query);
                      if ($insertRow) {
                       echo  "<span style='color:green;font-size:18px'><strong>Congratulations !</strong> You updated registered.</span>";
        
                      }else{
                        echo  "<span style='color:red;font-size:18px'>Something Went Wromg!!</span>";
                   
                      }
}

 ?> 
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Give Your Thoughts Here</label>
    <textarea class="form-control" name="post" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Have Any File or Photo To Share!</label>
    <input type="file" name="image" id="exampleInputFile">
  </div>
  <button type="submit" name="submit" class="btn btn-success">Post</button>
</form>
  </div>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>