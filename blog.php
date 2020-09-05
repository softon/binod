<?php
    require_once('config.php');
    if(!isset($_GET['id'])){
      header('Location: index.php');
    }
    $id = $_GET['id'];
    if(!empty($_POST['contents'])){
        $sql = "INSERT INTO comments (blog_id,contents,created_at) VALUES ('".$_GET['id']."','".$_POST['contents']."',NOW())";
        $result = mysqli_query($db,$sql);
        if ($result===true) {
          $_SESSION['success_message'] = "Comment added successfully."; 
        }else{
          $_SESSION['error_message'] = "Error adding comment."; 
        }
    }
    $result = mysqli_query($db,"SELECT * from blog WHERE id = '".$id."'");
    $blog = mysqli_fetch_array($result);
    $user = get_user_by_id($db,$blog['user_id']);
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
        Blog #<?php echo $blog['id']; ?>
      </h3>
      <p><a class="btn btn-rounded btn-outline-secondary " href="index.php">Back</a></p>
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $blog['title']; ?></h2>
        <p class="blog-post-meta"><?php echo $blog['created_at']; ?> by <a href="#"><?php echo $user['name']; ?></a></p>

        <p><?php 
            echo $blog['contents']; 
            ?></p>
        
        <hr>
        <p>
          <h4>Comments</h4>
          <?php 
              $comments = mysqli_query($db,"SELECT * from comments where blog_id = '".$blog['id']."'");
              while($row = mysqli_fetch_assoc($comments)){
          ?>
            <blockquote class="blockquote mb-0" style="border: 1px solid #eee; padding: 15px;border-radius: 15px;margin-top: 10px;">
              <p><?php echo $row['contents']  ?></p>
              <footer class="blockquote-footer text-right"><?php echo $row['created_at']  ?></footer>
            </blockquote>
          <?php
              }
          ?>
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

          <form action="blog.php?id=<?php echo $blog['id']; ?>" style="margin-top: 10px;" method="POST">
              <textarea name="contents" class="form-control" style="border: 1px solid #eee; border-radius: 15px; background-color: #eee" id="" placeholder="Type your coment..." ></textarea>
              <button class="btn btn-primary btn-block" style="border-radius: 15px;margin-top: 5px;" type="submit" >Submit</button>
          </form>
        </p>
        
      </div><!-- /.blog-post -->


    </div><!-- /.blog-main -->

    <?php include_once('partials/sidebar.php'); ?>

  </div><!-- /.row -->

</main><!-- /.container -->

<?php 
  include_once('partials/footer.php'); 
  unset($_SESSION['error_message']);
  unset($_SESSION['success_message']);
?>
</body>
</html>
