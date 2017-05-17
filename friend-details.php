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
require_once 'lib/database.php';
$db = new Database();
?>
<?php 

if (isset($_GET['profile_id'])) {
  $profile_id = $_GET['profile_id'];
}
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
    <link href="assets/css/profile3.css" rel="stylesheet">
    <style>
      
    .navbar-nav{
      margin-right: 60px;
    }

  .navbar-nav  img{
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

input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
* {
  box-sizing: border-box;
}



#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a.header {
  background-color: #e2e2e2;
  cursor: default;
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
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




    <!-- Begin page content -->
    <div class="container page-content" style="margin-top: 110px;">
      <div class="row">
      <div class="col-md-9 col-md-offset-1">
      <div class="user-profile">
<?php 

$query = "SELECT * FROM tbl_covers WHERE profile_id = '$profile_id'";
$result = $db->select($query);
if ($result) {
  while ($value=$result->fetch_assoc()) {

?>
        <div  class="profile-header-background">
          <img width="850px" height="316px;" src="<?php echo $value['images']; ?>"  alt="Profile Header Background">
        </div>
<?php }} ?>
        <div class="row">
          <div class="col-md-4">
            <div class="profile-info-left">
<?php 

$query = "SELECT * FROM tbl_avatars WHERE profile_id = '$profile_id'";
$result = $db->select($query);
if ($result) {
  while ($value=$result->fetch_assoc()) {

?>
              <div class="text-center">
                  <img style="margin-top: 20px; width: 112px;height: 100px"  src="<?php echo $value['images']; ?>" alt="Avatar" class="avatar img-circle">
<?php 

$query = "SELECT * FROM tbl_profile WHERE id = '$profile_id'";
$result = $db->select($query);
if ($result) {
  while ($value=$result->fetch_assoc()) {

?>
                  <h2><?php echo $value['first_name']; ?>  <?php echo $value['last_name']; ?></h2><?php }} ?>

              </div>
 <?php }} ?>             
              <div class="action-buttons">
                <div class="row">
                  <div class="col-xs-6">
                      <a href="#" class="btn btn-azure btn-block"><i class="fa fa-user-plus"></i> Follow</a>
                  </div>
                  <div class="col-xs-6">
                      <a href="#" class="btn btn-azure btn-block"><i class="fa fa-envelope"></i> Message</a>
                  </div>
                </div>
              </div>
<?php 

$query = "SELECT * FROM tbl_profile WHERE id = '$profile_id'";
$result = $db->select($query);
if ($result) {
  while ($value=$result->fetch_assoc()) {

?>
              <div class="section">
                  <h3>About Me</h3>
                  <p><?php echo $value['about']; ?></p>
              </div>

              <div class="section">
                <h3>Others Information</h3>
                <p><span class="badge">Email:</span> <?php echo $value['email']; ?></p>
                <p><span class="badge">Date of Birth:</span> <?php echo $value['bdaytime']; ?></p>
                <p><span class="badge">Address:</span> <?php echo $value['address']; ?></p>
              </div>
              <?php }} ?>
            </div>
          </div>
          <div class="col-md-8">
              <div class="profile-info-right">
                  <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom" style="margin-top: 20px;">
                      <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                      <li><a href="#followers" data-toggle="tab">Followers</a></li>
                      <li><a href="#following" data-toggle="tab">Following</a></li>
                  </ul>
                  <div class="tab-content">
                      <!-- activities -->
                      <div class="tab-pane fade in active" id="timeline">
                          <div style="margin-top: 10px" class="box profile-info n-border-top">
                            <form>
                                <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
                            </form>
                            <div class="box-footer box-form">
                                <button type="button" class="btn btn-azure pull-right">Post</button>
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                                    <li><a href="#"><i class="fa fa-camera"></i></a></li>
                                    <li><a href="#"><i class=" fa fa-film"></i></a></li>
                                    <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                                </ul>
                            </div>
                          </div><!-- end post state form -->
                          <div class="media activity-item">
                              <a href="#" class="pull-left">
                                  <img src="img/guy-1.jpg" alt="Avatar" class="media-object avatar">
                              </a>
                              <div class="media-body">
                                  <p class="activity-title"><a href="#">Antonius</a> started following <a href="#">Jack Bay</a> <small class="text-muted">- 2m ago</small></p>
                                  <small class="text-muted">Today 08:30 am - 02.05.2014</small>
                              </div>
                              <div class="btn-group pull-right activity-actions">
                                  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-th"></i>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                      <li><a href="#">I don't want to see this</a></li>
                                      <li><a href="#">Unfollow Antonius</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Get Notification</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="media activity-item">
                              <a href="#" class="pull-left">
                                  <img src="img/guy-2.jpg" alt="Avatar" class="media-object avatar">
                              </a>
                              <div class="media-body">
                                  <p class="activity-title"><a href="#">Jane Doe</a> likes <a href="#">Jack Bay</a> <small class="text-muted">- 36m ago</small></p>
                                  <small class="text-muted">Today 07:23 am - 02.05.2014</small>
                              </div>
                              <div class="btn-group pull-right activity-actions">
                                  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-th"></i>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                      <li><a href="#">I don't want to see this</a></li>
                                      <li><a href="#">Unfollow Jane Doe</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Get Notification</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="media activity-item">
                              <a href="#" class="pull-left">
                                  <img src="img/guy-3.jpg" alt="Avatar" class="media-object avatar">
                              </a>
                              <div class="media-body">
                                  <p class="activity-title"><a href="#">Michael</a> posted something for <a href="#">Jack Bay</a> <small class="text-muted">- 1h ago</small></p>
                                  <small class="text-muted">Today 07:23 am - 02.05.2014</small>
                                  <div class="activity-attachment">
                                      <div class="well well-sm">
                                          Professionally evolve corporate services without ethical leadership. Proactively re-engineer client-focused infrastructures before alternative potentialities. Competently predominate just in time e-tailers for leveraged solutions. Intrinsicly initiate end-to-end collaboration and idea-sharing after 24/365 ROI. Rapidiously.
                                      </div>
                                  </div>
                              </div>
                              <div class="btn-group pull-right activity-actions">
                                  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-th"></i>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                      <li><a href="#">I don't want to see this</a></li>
                                      <li><a href="#">Unfollow Michael</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Get Notification</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="media activity-item">
                              <a href="#" class="pull-left">
                                  <img src="img/guy-5.jpg" alt="Avatar" class="media-object avatar">
                              </a>
                              <div class="media-body">
                                  <p class="activity-title"><a href="#">Jack Bay</a> has uploaded two photos <small class="text-muted">- Yesterday</small></p>
                                  <small class="text-muted">Yesterday 06:42 pm - 01.05.2014</small>
                                  <div class="activity-attachment">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <a href="#" class="thumbnail">
                                                  <img src="img/Friends/guy-1.jpg" alt="Uploaded photo">
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="btn-group pull-right activity-actions">
                                  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-th"></i>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                      <li><a href="#">I don't want to see this</a></li>
                                      <li><a href="#">Unfollow Jack Bay</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Get Notification</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="media activity-item">
                              <a href="#" class="pull-left">
                                  <img src="img/guy-6.jpg" alt="Avatar" class="media-object avatar">
                              </a>
                              <div class="media-body">
                                  <p class="activity-title"><a href="#">Jack Bay</a> has changed his profile picture <small class="text-muted">- 2 days ago</small></p>
                                  <small class="text-muted">2 days ago 05:42 pm - 30.04.2014</small>
                                  <div class="activity-attachment">
                                      <a href="#" class="thumbnail">
                                          <img src="img/Friends/guy-1.jpg" alt="Uploaded photo">
                                      </a>
                                  </div>
                              </div>
                              <div class="btn-group pull-right activity-actions">
                                  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-th"></i>
                                      <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                      <li><a href="#">I don't want to see this</a></li>
                                      <li><a href="#">Unfollow Jack Bay</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Get Notification</a></li>
                                  </ul>
                              </div>
                          </div>
                          <button type="button" class="btn btn-default center-block"><i class="fa fa-refresh"></i> Load more activities</button>
                      </div>
                      <!-- end activities -->
                      <!-- followers -->
                      <div class="tab-pane fade" id="followers">
                          <div class="media user-follower">
                              <img src="img/guy-1.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                  <button type="button" class="btn btn-sm btn-toggle-following pull-right">
                                  <i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/guy-2.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/woman-3.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/woman-4.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                  <button type="button" class="btn btn-sm btn-toggle-following pull-right">
                                  <i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/Friends/guy-5.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/guy-6.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                  <button type="button" class="btn btn-sm btn-toggle-following pull-right">
                                  <i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/guy-6.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/woman-7.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/woman-1.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                  <button type="button" class="btn btn-sm btn-toggle-following pull-right">
                                  <i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                              </div>
                          </div>
                          <div class="media user-follower">
                              <img src="img/guy-2.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                  <button type="button" class="btn btn-sm btn-default pull-right">
                                  <i class="fa fa-plus"></i> Follow</button>
                              </div>
                          </div>
                      </div>
                      <!-- end followers -->
                      <!-- following -->
                      <div class="tab-pane fade" id="following">
                          <div class="media user-following">
                              <img src="img/woman-1.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                          <div class="media user-following">
                              <img src="img/woman-2.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                          <div class="media user-following">
                              <img src="img/guy-3.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                          <div class="media user-following">
                              <img src="img/guy-4.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                          <div class="media user-following">
                              <img src="img/guy-5.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                          <div class="media user-following">
                              <img src="img/woman-6.jpg" alt="User Avatar" class="media-object pull-left">
                              <div class="media-body">
                                  <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                  <button type="button" class="btn btn-sm btn-danger pull-right">
                                  <i class="fa fa-close-round"></i> Unfollow</button>
                              </div>
                          </div>
                      </div>
                      <!-- end following -->
                  </div>
              </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>



     <!-- Online users sidebar content-->
    <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat btn btn-success">Hide</a></p> 
        <p class="text-center chat-title">Online users</p>  
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jeferh Smith</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dapibus acatar</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Antony andrew lobghi</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Maria fernanda coronel</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Markton contz</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Martha creaw</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Yira Cartmen</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jhoanath matew</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Ryanah Haywofd</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Linda palma</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Andrea ramos</span>
        </a>
        <a href="messages1.html" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/child-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dora ty bluekl</span>
        </a>        
      </div>
    </div><!-- Online users sidebar content-->





  

    <script>
      function myFunction() {
          var input, filter, ul, li, a, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          ul = document.getElementById("myUL");
          li = ul.getElementsByTagName("li");
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("a")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";

              }
          }
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

