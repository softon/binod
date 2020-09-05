<?php
    require_once('config.php');
    
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
        Search Blog
      </h3>
      <div>
      <form  action="search.php" method="post">
            <div style="position: relative;">
                <input type="text" name="search-text" class="form-control" style="height: 50px;line-height: 50px; border-radius: 25px; position: absolute;padding-right : 100px;" placeholder="Enter the text to search..." value="<?php echo isset($_POST['search-text'])?$_POST['search-text']:""; ?>">
                <button type="submit" class="btn btn-primary" style="border-radius: 25px;position:absolute; top: 6px; right:6px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg></button>
            </div>
      </form>
      </div>
      
      <?php
        if(!empty($_POST['search-text'])):
        $blogs = mysqli_query($db,"SELECT * from blog WHERE `title` LIKE '%".$_POST['search-text']."%' LIMIT 10");
        while($row = mysqli_fetch_assoc($blogs)){
          $user = get_user_by_id($db,$row['user_id']);
      ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
        <p class="blog-post-meta"><?php echo $row['created_at']; ?> by <a href="#"><?php echo $user['name']; ?></a></p>

        <p><?php 
            echo substr($row['contents'],0,BLOG_CUT); 
            if(strlen($row['contents'])>BLOG_CUT){
              echo "...";
            }
            ?></p>
        <p>
          <a class="btn btn-sm btn-primary" href="blog.php?id=<?php echo $row['id']; ?>">More</a>
          <a class="btn btn-sm btn-outline-primary" href="">Comments <span class="badge badge-primary"><?php echo get_blog_coments($db, $row['id']); ?></span></a>

        </p>
        <hr>
        
      </div><!-- /.blog-post -->
      <?php
        }
        endif;
      ?>


    </div><!-- /.blog-main -->

    <?php include_once('partials/sidebar.php'); ?>

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once('partials/footer.php'); ?>
</body>
</html>
