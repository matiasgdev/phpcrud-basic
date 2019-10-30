<?php 

  if (isset($_POST)){

    require_once '../db/connection.php';
    
    $title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
    $category = isset($_POST['category']) ? (int) mysqli_real_escape_string($db, $_POST['category']) : false;
    $user = $_SESSION['user']['id'];

    $errors = array();

    if (!empty($title)){
      if (strlen($title) < 10) {
        $title_validate = true;
        $errors['title'] = 'El título debe contener al menos 10 caracteres.';
      }
    } else {
      $title_validate = false;
      $errors['title'] = "Ingrese un título, por favor.";
    }

    if (!empty($description)){
      if (strlen($description) < 30) {
        $description_validate = true;
        $errors['description'] = 'La descripción debe contener al menos 30 caracteres.';
      }
    } else {
      $description_validate = false;
      $errors['description'] = "Ingrese una descripción, por favor.";
    }

    if (!empty($category) && is_numeric($category)) {
      $category_validate = true;
    } else {
      $category_validate = false;
      $errors['category'] = "Ingrese una categoria correcta";
    }



    if (count($errors) == 0) {

      if (isset($_GET['id'])) {
        // put
        $postId = mysqli_real_escape_string($db, $_GET['id']);
        $sql = "UPDATE posts SET title='$title', description='$description', category_id='$category', update_at=CURDATE() WHERE id = $postId AND author_id = $user;";
      } else {
        // post
        $sql = "INSERT INTO posts VALUES(null, '$user', '$category', '$title', '$description', CURDATE(), null);";
      }
      var_dump($sql);
      $save = mysqli_query($db, $sql);
      var_dump($save);

      if ($save){
        header('Location: ../blog.php');
      }
    } else {
      if (isset($_GET['id'])){
        $_SESSION['error-post'] = $errors;
        header("Location: ../edit.php?id=".$_GET['id']);
      } else {
        header('Location: ../create-post.php');
      }
    }

  }

?>