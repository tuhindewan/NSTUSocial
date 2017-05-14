<?php 
require_once 'lib/database.php';
$db = new Database();
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
    <style>
      
    .navbar-nav{
      margin-right: 60px;
    }

    img{
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                            <?php 


                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                  $email = $_POST['email'];
                                  $email = $fm->validation($email);
                              $email = mysqli_real_escape_string($db->link,$email);
                              if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
                                { 
                                  $msg = "<span style='color:red;font-size:18px'>Invalid Email Address. Please enter a valid address.</span>";
                                  return $msg;
                                }else{
                                $query = "SELECT * FROM tbl_users WHERE email = '$email' LIMIT 1";
                                $mailchk = $db->select($query);
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
                                  $update_row  = $db->update($updatequery);

                                  

                                  $to = '$email';
                                  
                                  $from = 'nstu@gmail.com';
                                  $headers = "From: $from\n";
                                  $headers .= "MIME-Version: 1.0" . "\r\n";
                                          $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                                          $subject = "Your Password";
                                          $message = "Hello,".$username." Your new password is".$password."Please save it";

                                          $sendmail = mail($to, $subject, $message, $headers);

                                          if ($sendmail) {
                                            echo "<span style='color:green;font-size:18px;'>New Password send to your email.Please Check.!</span>";
    
                                          }else{
                                            echo "<span style='color:red;font-size:18px;'>Invalid Email Address!</span>";
                                   
                                          }



                              }else{
                                echo "<span style='color:red;font-size:18px;'>Email not exist!</span>";
                               
                              }
                            }


                             ?>
                              
                              <form class="form" action="" method="post">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      
                                      <input name="email" id="emailInput" placeholder="email address" class="form-control" type="email" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" name="submit" value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>