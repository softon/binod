<?php
    if(!isset($_SESSION)){
        session_start();
    }

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','binod');
    define('BLOG_CUT',150);

    $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    function get_user_by_id($db, $id){
        $user = mysqli_query($db,"SELECT * from users WHERE id = '".$id."'");
        if(!isset($user)){
            return false;
        }

        return mysqli_fetch_assoc($user);
    }

    function get_blog_coments($db, $blog_id){
        $count = mysqli_query($db,"SELECT COUNT(*) as ccount from comments WHERE blog_id = '".$blog_id."'");
        if(!isset($count)){
            return 0;
        }

        $r = mysqli_fetch_assoc($count);
        return $r['ccount'];
    }
?>