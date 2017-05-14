<?php 
require_once 'classes/User.php';
$usr = new User();
?>

<?php 

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['register'])) {
   $userReg = $usr->userRegistration($_POST);
}

?>

<?php 
require_once 'classes/UserLogin.php';
$log = new UserLogin();
?>

<?php 

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['signin'])) {
   $userLog = $log->userLogin($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NSTUSocial</title>
    <link rel="stylesheet"  href="css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="margin-left: 60px;">NSTUSocial</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-right" action="" method="post">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="signin" class="btn btn-custom-one" style="font-size: 15px;"> <span class="glyphicon glyphicon-user">Signin</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="forget.php" style="color: white;">Forget Password?</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-6 text-center">
      <div class="nsocial">
        <h2>NSTUSocial</h2>
      </div>
      
      <div>
        <h4>Memories Never Die</h4>
      </div>
      <div class="nstuimg">
        <img class="img-rounded" src="img/nstu.png" width="448" height="328">
      </div>
      <div class="nsocial2">
        <h3>A Social Site for NSTUans</h3>
      </div>
    </div>

    <div class="col-md-6">
    <?php 

      if (isset($userLog)) {
        echo $userLog;
      }

     ?>
      <div class="headings">
        <h1>Create a new account</h1>
        <p>It's free and always will be.</p>
      </div>
      <?php 
      if (isset($userReg)) {
        echo $userReg;
      }

       ?>
      <form action="" method="post">
        <div class="form-group">
        <input type="text" class="form-control" name="first_name" required="" placeholder="Enter First Name">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="last_name" required="" placeholder="Enter Last Name">
        </div>
        <div class="form-group">
        <input type="email" class="form-control" name="email" required="" placeholder="Enter Email Address">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" required="" placeholder="Enter Password">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="con_password" id="confirm_password" required="" placeholder="Confirm Password">
        </div>
        <div class="form-group">
        <h4>Gender:</h4>
          <label class="radio-inline"><input type="radio" name="gender" required="" value="male">Male</label>
          <label class="radio-inline"><input type="radio" name="gender" required="" value="female">Female</label>
        </div>
        <div class="form-group">
          <h4>Birthday:</h4>
          <input class="form-control" type="date" required="" name="bdaytime">
        </div>
        <div class="form-group">
         <button type="submit" class="btn btn-block btn-lg btn-custom-one" name="register">Create Account</button>
         </div>
      </form>
      By clicking <strong>"Create Account"</strong> , you 
      agree to the <strong><a href="term.php" style="text-decoration: none">Terms of Service.</a></strong>
    </div>
  </div>
</div>
    <script> 

        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>