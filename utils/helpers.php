<?php 

  function showMessages($listMessages, $message){
    $alert = '';
    if(isset($listMessages[$message]) && !empty($message)){
      $alert = $listMessages[$message];
      return $alert;
    }else {
      return $alert;
    }
  }

  function deleteErrors(){

    $result = false;

    unset($_SESSION['errors']);
    unset($_SESSION['error-login']);
    unset($_SESSION['error-post']);
    unset($_SESSION['succesfully']);
    return $result;
    
  }

  function getCategories($db) {
    $sql = "SELECT * FROM categories ORDER BY id ASC;";
    $categories = mysqli_query($db, $sql);

    $result = array();

    if ($categories && mysqli_num_rows($categories) >= 1) {
      $result = $categories;  
      return $result;
    } 
  }

  function getCategory($db, $id) {
    $sql = "SELECT * FROM categories WHERE id = $id ORDER BY id ASC;";
    $category = mysqli_query($db, $sql);

    $result = array();

    if ($category && mysqli_num_rows($category) >= 1) {
      $result = mysqli_fetch_assoc($category);  
      return $result;
    } 
  }

  function getPosts($db, $limit = null, $category = null, $search = null) {
    $sql = "SELECT p.*, c.name AS 'category', u.email AS 'author_email'  FROM posts p INNER JOIN users u ON p.author_id = u.id INNER JOIN categories c ON p.category_id = c.id";

    if (!empty($category)) { 
      $sql .= " WHERE p.category_id = $category";
    }
    if (!empty($search)) {
      $sql .= " WHERE p.title LIKE '%$search%'";
    }

    $sql .= " ORDER BY p.id DESC";

    if ($limit) {
      $sql .= ' LIMIT 4;';
    }
    
    $posts = mysqli_query($db, $sql);

    $result = array();

    if($posts && mysqli_num_rows($posts) >= 1){
      $result = $posts;
      return $result; 
    }
  }

  function getPost ($db, $id) {
    $sql = "SELECT p.*, c.name AS 'category', u.email AS 'author_email', u.id AS 'author_id' FROM posts p INNER JOIN users u ON p.author_id = u.id INNER JOIN categories c ON p.category_id = c.id WHERE p.id = $id;";

    $post = mysqli_query($db, $sql);

    $result = array();

    if(isset($post) && mysqli_num_rows($post) >= 1) {
      $result = mysqli_fetch_assoc($post);
      return $result;
    }
  }

?>