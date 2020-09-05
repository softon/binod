<?php
    require_once('config.php');
    
    if(isset($_REQUEST['password']) && isset($_REQUEST['cpassword'])){
        if($_REQUEST['password']==$_REQUEST['cpassword']){
            $sql = "UPDATE users SET password = '".$_REQUEST['password']."' WHERE `id` = '".$_SESSION['USER_ID']."'";
            $result = mysqli_query($db,$sql);
            if($result===true){
                $_SESSION['success_message'] = "Account password changed successfully.";
            }else{
                $_SESSION['error_message'] = "Account password cannot be changed.";
            }
        }else{
            $_SESSION['error_message'] = "Confirm password is incorrect.";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Just a vulnerable site">
    <meta name="author" content="Shiburaj">
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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./assets/css/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <?php include_once('partials/header.php'); ?>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Change Password
      </h3>
      <div class="blog-post" style="min-height: 500px;">
        <form action="change_password.php" method="get">
            <?php if(isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success"  style="margin-top: 10px;border-radius: 15px;"  role="alert">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" style="margin-top: 10px;border-radius: 15px;" role="alert">
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php endif; ?>
            <div>
                <label for="user-password" class="form-label">New Password</label>
                <input type="text" name="password" class="form-control" placeholder="Enter New Password" id="user-password">
            </div>
            <div class="pt-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="text" name="cpassword" class="form-control" placeholder="Re-enter Password" id="confirm-password">
            </div>
            <div class="pt-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>

        </form>
        
      </div><!-- /.blog-post -->


    </div><!-- /.blog-main -->

    <?php include_once('partials/sidebar.php'); ?>

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once('partials/footer.php'); ?>
</body>
</html>
