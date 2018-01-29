<?php
  session_start();
  if(isset($_SESSION['username']))
  {

      if ($_SESSION['grouptype']=='receptionist'){
      header('location:../controller/reception.php');
      }
     // elseif($_SESSION['grouptype']=='nurse'){header('location:../resource/nurse.php');}
  }

?>
<!-- <!DOCTYPE html>
<html>
 <head>
      <title>login</title>
  </head>
  <body>
  <form action="../controller/logincontroller.php" method="post">
      username:<br>
      <input type="text" name="username" >
      <br>
      password:<br>
      <input type="password" name="password" >
      <br>
      <input type="submit" value="login">
  </form>
  </body>

</html> -->
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blood Bank</title>
  <link rel="stylesheet" href="../resource/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resource/css/home.component.css">
</head>
<body>
  <div class="blur-body"></div>
  <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
      <div class="blure col-xs-4">
        <div class="login-header">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <h1>Login</h1>
        </div>
        <form action="../controller/logincontroller.php" method="post">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" required name="username" class="form-control input-lg" placeholder="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </span>
                <input type="password" required name="password" class="form-control input-lg" placeholder="Password" aria-describedby="basic-addon1">
            </div>
            <br>
            <button class="btn" type="submit" value="login"> Login </button>
       </form>
      </div>

      <div class="title col-md-7 col-md-offset-5">
        <img src="../resource/images/blood_logo.png" alt="logo" >
        <h2>Central blood bank management system</h2>
      </div>



    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="../resource/images/1.jpeg" alt="...">
      </div>
      <div class="item">
        <img src="../resource/images/5.jpg"   alt="...">
      </div>
      <div class="item">
        <img src="../resource/images/3.jpg"  alt="...">
      </div>
      <div class="item">
        <img src="../resource/images/4.jpg"   alt="...">
      </div>
    </div>
  </div>

<script src="../resource/js/jquery.min.js"></script>
<script src="../resource/js/bootstrap.min.js"></script>

</body>
</html>




<!--  -->



<?php if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
}
