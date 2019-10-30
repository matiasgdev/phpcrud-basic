<?php 

  require_once '../db/connection.php';

  if (isset($_SESSION['user']) && isset($_GET['id'])) {

    $user_id = $_SESSION['user']['id'];
    $post_id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE author_id=$user_id AND id=$post_id;";
    
    // delete
    mysqli_query($db, $sql);

  } 

  header('Location: ../blog.php');