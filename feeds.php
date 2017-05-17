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


<div class="container page-content" style="margin-top: 110px;">
  <div class="row">
    <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                <div class="user-heading round">
                    <?php 
                    $getpic = $avtr->getAvatar($userid);
                    if ($getpic) {
                      while ($value=$getpic->fetch_assoc()) {
                     ?>
                  <a href="#">
                      <img src="<?php echo $value['images']; ?>" alt="">
                  </a>
                  <?php }} ?>
                  <?php 

                    $getpic = $info->getUserInfoById($userid);
                    if ($getpic) {
                      while ($value=$getpic->fetch_assoc()) {
                     ?>
                  <h1><?php echo $value['first_name']; ?>  <?php echo $value['last_name']; ?></h1>
                  <p>@<?php echo $value['department']; ?></p>
                  <?php }} ?>
                </div>

                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="feeds.php"> <i class="fa fa-user"></i> News feed</a></li>
                  <li>
                  <li><a  href="posts.php"> <i class="fa fa-coffee" aria-hidden="true"></i> Make Your Day</a></li>
                  <li>
                    <a href="messages.php"> 
                      <i class="fa fa-envelope"></i> Messages 
                      <span class="label label-info pull-right r-activity">9</span>
                    </a>
                  </li>
                  <li><a href="timeline.php"> <i class="fa fa-calendar"></i> Timeline</a></li>
                  <li><a href="update.php"> <i class="fa fa-pencil-square-o"></i> Update Profile</a></li>
                  <li><a href="find-friends.php"> <i class="fa fa-list-alt"></i> Find Friends</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- end left links -->

       <!-- center posts -->
        <div class="col-md-6">
          <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                <!-- post state form -->
                  <!--   posts -->
<?php 

$query = "SELECT * FROM tbl_posts ORDER BY id DESC";
$result = $db->select($query);
if ($result) {
  while ($value=$result->fetch_assoc()) {
    
  $post_id = $value['id'];
  $first_name =   $value['first_name'];
  $last_name = $value['last_name'];
  $avatar = $value['avatar'];

?>  
                  <div class="box box-widget">

                    <div class="box-header with-border">
                      <div class="user-block">
                    
                        <img class="img-circle" width="40px" height="36px" src="<?php echo $avatar; ?>" alt="User Image">
                        <span class="username"><a href="#"><?php echo $first_name; ?>  <?php echo $last_name; ?></a></span>
                        <span class="description">Shared publicly -  <?php echo  date("M j, Y h:ia",strtotime($value['date_time'])) ; ?></span>

                      </div>
                    </div>
 
                    <div class="box-body" style="display: block;">
                      <p><?php echo $value['posts']; ?></p>
                      <img class="img-responsive show-in-modal" width="538px" height="238px" src="<?php echo $value['images']; ?>" >
                      
 
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                      <span class="pull-right text-muted">127 likes - 3 comments</span>
                    </div>

                    <div class="box-footer box-comments" style="display: block;">
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="img/guy-2.jpg" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                          Maria Gonzales
                          <span class="text-muted pull-right">8:03 PM Today</span>
                          </span>
                          It is a long established fact that a reader will be distracted
                          by the readable content of a page when looking at its layout.
                        </div>
                      </div>
                    </div>

                    <div class="box-footer" style="display: block;">
          
                      <form class="form-inline" role="form" action="#" method="post">

                        <img class="img-responsive img-circle img-sm" width="29px" height="26px" src="" alt="Alt Text"> 
                        <div  class="img-push form-group">
                          <input  style="width: 411px" type="text" class="form-control input-sm" name="push" placeholder="Your Comments">
                        </div>
                        <div class="form-group">
                          <button type="submit" name="comment" class="btn btn-primary">Add</button>
                      </div>
                      </form>

                    </div>

                  </div><!--  end posts--><?php }} ?>



                </div>
              </div>
            </div><!-- end left posts-->
          </div>
        </div><!-- end  center posts -->
    
          <!-- right posts -->
        <div class="col-md-3">
        <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat btn btn-success">Hide</a></p> 
        <p class="text-center chat-title">Online users</p>  
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/guy-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Jeferh Smith</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/woman-1.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Dapibus acatar</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/guy-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Antony andrew lobghi</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/woman-2.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Maria fernanda coronel</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/guy-4.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Markton contz</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/woman-3.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Martha creaw</span>
        </a>
        <a href="messages.php" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/woman-8.jpg" class="img-chat img-thumbnail">
          <span class="chat-user-name">Yira Cartmen</span>
        </a>       
      </div>
    </div><!-- Online users sidebar content-->
        </div><!-- end right posts -->


  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>