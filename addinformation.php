<?php 
require_once 'lib/session.php';
Session::checkSession();
Session::init();
require_once 'lib/database.php';
$db = new Database();
$userid = Session::get('userid');
?> 
 <?php 
require_once 'classes/Addinfo.php';
$info = new Information();

 ?>

 <?php 
require_once 'classes/Avatar.php';
$avtr = new Avatar();

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

<?php   


if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['save'])) {
               $addinfo = $info->AddUserInformation($_POST,$userid);
            }



 ?>





                  <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> Add Your Profile Information</a></li>
                          </ul>
                          <hr><?php 

if (isset($addinfo)) {
  echo $addinfo;
}

 ?><hr>
                     <form action="" method="post"> 

                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="first_name"  placeholder="First Name">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                      </div>

                      <div class="form-group">
                      <h4>Gender:</h4>
                        <label class="radio-inline"><input type="radio" name="gender"  value="male">Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                      </div>

                      <div class="form-group">
                        <h4>Birthday:</h4>
                        <input class="form-control" type="date"  name="bdaytime">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Department</label>
                        <input type="text" class="form-control" name="department"  placeholder="Department">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Session</label>
                        <input type="text" class="form-control" name="session" placeholder="2011-12">
                      </div>
                    <div class="contact_info">
                      <h3><i class="fa fa-square"></i> Contact Information</h3>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone/Mobile</label>
                      <input type="text" class="form-control" name="phone" placeholder="Enter Valid Number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" name="address" placeholder="Please Enter Valid Address">
                    </div>

                   
                    

                    <div class="about">
                      <h3><i class="fa fa-square"></i> About Me</h3>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="about" id="" cols="30" rows="10"></textarea>
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
                    <button type="submit" name="save" class="btn btn-primary text-center"><i class="fa fa-floppy-o"></i> Save</button>
                    </form>
      </div>

      <div class="col-md-4">
                         <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> Add Your Profile Picture</a></li>
                          </ul>
                         <hr>
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
                              }elseif ($file_size >1048567) {
                               echo "<span style='color:red;font-size:18px'>Image Size should be less then 1MB!
                               </span>";
                              } elseif (in_array($file_ext, $permited) === false) {
                              echo  "<span style='color:red;font-size:18px'>You can upload only:-"
                               .implode(', ', $permited)."</span>";
                              } else{
                              move_uploaded_file($file_temp, $uploaded_image);
                              $query = "INSERT INTO tbl_avatars(images,userid) 
                              VALUES('$uploaded_image','$userid')";
                              $inserted_rows = $db->insert($query);
                              if ($inserted_rows) {
                               echo "<span style='color:green;font-size:18px'>Image Inserted Successfully.</span>";

                              }else {
                               echo "<span style='color:red;font-size:18px'>Image Not Inserted !</span>";

                             }   
                             }
                             }  

                           ?>
                         <form action="" method="post" enctype="multipart/form-data">
                            Select an image for your Avatar:
                            <input style="margin-top: 10px;" type="file" name="image" id="image">
                            <input  style="margin-top: 10px;" type="submit" value="Upload Avatar" name="avatar">
                        </form>
      </div>

      <div style="margin-top: 60px;" class="col-md-4">
                         <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
                            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-info" aria-hidden="true"></i> Add Your Cover Photo</a></li>
                          </ul>
                         <hr>

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
                              $query = "INSERT INTO tbl_covers(images,userid) 
                              VALUES('$uploaded_image','$userid')";
                              $inserted_rows = $db->insert($query);
                              if ($inserted_rows) {
                               echo "<span style='color:green;font-size:18px'>Image Inserted Successfully.</span>";

                              }else {
                               echo "<span style='color:red;font-size:18px'>Image Not Inserted !</span>";

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