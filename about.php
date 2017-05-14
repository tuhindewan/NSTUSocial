<?php 
require_once 'lib/session.php';
Session::checkSession();
$userid = Session::get('userid');
Session::init();
?> 

<?php 
require_once 'classes/Addinfo.php';
$getdata = new Information();
?>
<?php 
require_once 'lib/database.php';
$db = new Database();
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
    <link href="css/cover.css" rel="stylesheet">
  <link href="css/forms.css" rel="stylesheet">
  <link href="css/buttons.css" rel="stylesheet">
    <style>
      
    .navbar-nav{
      margin-right: 60px;
    }
    body{
        background-color: #eeeeee;
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

<div class="container">
<div class="col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-md-12">
          <div class="cover profile">
          <?php 

                $query = "SELECT * FROM tbl_covers WHERE userid = '$userid'";
                $result = $db->select($query);
                if ($result) {
                  while ($value=$result->fetch_assoc()) {

                 ?>
              <div class="image">
                <img width="920px" height="320px" src="<?php echo $value['images']; ?>" class="show-in-modal" alt="people">
              </div><?php }} ?>

            <div class="cover-info">
            <?php 

                $query = "SELECT * FROM tbl_avatars WHERE userid = '$userid'";
                $result = $db->select($query);
                if ($result) {
                  while ($value=$result->fetch_assoc()) {

                 ?>
              <div class="avatar">
                <img src="<?php echo $value['images']; ?>" alt="people">
              </div><?php }} ?>
                <?php 

                $query = "SELECT * FROM tbl_profile WHERE userid = '$userid'";
                $result = $db->select($query);
                if ($result) {
                  while ($value=$result->fetch_assoc()) {

                 ?>
              <div class="name"><a href="#"><?php echo $value['first_name']; ?>  <?php echo $value['last_name']; ?></a></div><?php }} ?>

              <ul class="cover-nav">
                <li class="active"><a href="timeline.php"><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
                <li><a href="about.php"><i class="fa fa-fw fa-user"></i> About</a></li>
                <li><a href="friends.php"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                <li><a href="photos.php"><i class="fa fa-fw fa-image"></i> Photos</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      </div>

<?php 


$getuser = $getdata->getUserInfoById($userid);
if ($getuser) {
  while ($result=$getuser->fetch_assoc()) {

 ?>      
      <div style="background-color: white;" class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
            <div class="widget-body">
            <div class="row">
              <div class="col-md-4 col-md-5 col-xs-12">
                <div class="row content-info">
                  <div class="col-xs-3">
                    Email:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['email']; ?>
                  </div>
                  <div class="col-xs-3">
                    Phone:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['phone']; ?>
                  </div>
                  <div class="col-xs-3">
                    Address:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['address']; ?>
                  </div>
                  <div class="col-xs-3">
                    Birthday:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['bdaytime']; ?>
                  </div>
                  <div class="col-xs-3">
                    Department:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['department']; ?>
                  </div>
                  <div class="col-xs-3">
                   Session:
                  </div>
                  <div class="col-xs-9">
                    <?php echo $result['session']; ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7 col-xs-12">
                <p class="contact-description"><?php echo $result['about']; ?></p>
              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
        </div>

        <?php } } ?>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>