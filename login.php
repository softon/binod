<?php
    require_once('config.php');
    if(isset($_SESSION['USER_ID'])){
       header("Location: index.php"); 
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        $sql = "SELECT * FROM users WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['password']."'";
        $result = mysqli_query($db,$sql);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          $row = mysqli_fetch_assoc($result);
          $_SESSION['USER_ID'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          header("Location: index.php"); 
        }else{
          $error = true;
        }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Binod · I am Vulnerable</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <img class="mb-4" src="../assets/images/binod.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <?php 
  if(isset($error)){
  ?>
  <div style="color: red;">Your details doesnt match our records. Please try again.</div>
  <?php
      }
  ?>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <a  href="register.php">Register for Account</button>
  <p class="mt-5 mb-3 text-muted">Developed by <a href="https://shiburaj.com">Shiburaj</a></p>
</form>
</body>
</html>