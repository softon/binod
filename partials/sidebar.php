<aside class="col-md-4 blog-sidebar">
    <div class="p-4">
    <h4 class="font-italic">Main Menu</h4>
    <?php if(isset($_SESSION['USER_ID'])): ?>
        <ol class="list-unstyled">
            <li style="color:forestgreen;">Welcome, <b><?php echo $_SESSION['name']; ?></b></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ol>
    <?php else: ?>
        <ol class="list-unstyled">
            <li style="color:gray;">Welcome, <b>Guest</b></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ol>
    <?php endif; ?>
    </div>
    <div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">
        This is a vulnerable app for testing and learning web app security.
    </p>
    </div>

    

    
</aside><!-- /.blog-sidebar -->