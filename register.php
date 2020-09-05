<?php
    require_once('config.php');
    if(isset($_SESSION['USER_ID'])){
       header("Location: index.php"); 
    }

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $status = $db->query("INSERT INTO users (`name`,`email`,`password`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')");
        
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
    <?php 
        if(isset($_POST)  && isset($status) && $status === true){
    ?>
    <form class="form-signin" >
    <div>Account created successfully. Login to continue.</div>
    <a  class="btn btn-lg btn-primary btn-block"  href="login.php">Sign in to your Account</a>
    </form>
    <?php
        }else{
    ?>
    <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <img class="mb-4" src="../assets/images/binod.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <?php 
        if(isset($_POST)  && !isset($status)){
        ?>
        <div style="color: red;">Error creating account. Please try again.</div>
        <?php
            }
        ?>
        <label for="inputName" class="sr-only">Full Name</label>
        <input type="text" name="name" id="inputName" class="form-control my-1" placeholder="Full Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control my-1 rounded" placeholder="Email address" required >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control my-1 rounded" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <a  href="login.php">Sign in to your Account</button>
        <p class="mt-5 mb-3 text-muted">Developed by <a href="https://shiburaj.com">Shiburaj</a></p>
    </form>
    <?php
        }
    ?>
</body>
</html>
