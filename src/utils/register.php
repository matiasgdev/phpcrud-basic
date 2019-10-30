<?php 
  
  function validate($n, $l, $e, $p) {
    
    $data = [];
    $n = isset($n) ? array_push($data, $n) : false;
    $l = isset($l) ? array_push($data, $l) : false;
    $e = isset($e) ? array_push($data, $e) : false;
    $p = isset($p) ? array_push($data, $p) : false;

    return $data;

  }

  function strictValidate($data, $database) {
    $db = $database;
    $errors = array();
    $n = mysqli_real_escape_string($db, $data[0]);
    $l = mysqli_real_escape_string($db, $data[1]);
    $e = mysqli_real_escape_string($db, trim($data[2]));
    $p = mysqli_real_escape_string($db, $data[3]);

    /* validating name */
    if (!empty($n) && !is_numeric($n) && !preg_match("/[0-9]/", $n)){
      $name_validate = true;
    }else {
      $name_validate = false;
      $errors['name'] = 'El nombre no es válido';
    }
    /* validating lastname */
    if (!empty($l) && !is_numeric($l) && !preg_match("/[0-9]/", $l)){
      $lastname_validate = true;
    }else {
      $lastname_validate = false;
      $errors['lastname'] = 'Los apellidos no son válidos';
    }
    /* validating email */
    if (!empty($e) && filter_var($e, FILTER_VALIDATE_EMAIL)){
      $email_validate = true;
    }else {
      $email_validate = false;
      $errors['email'] = 'El email no es válido';
    }
    /* validating password */
    if (!empty($p)){
      $password_validate = true;
    }else {
      $password_validate = false;
      $errors['password'] = 'La password está vacia';
    }

    $save_user = false;

    if (count($errors) == 0){

      $save_user = true;

      // cifrate password
      $securePassword = password_hash($p, PASSWORD_BCRYPT, ['const' => 4]);
            
      //insert users in db

      $sql = "INSERT INTO users VALUES(null, '$n', '$l', '$e', '$securePassword', CURDATE());";
      $save_user = mysqli_query($db, $sql);


      if ($save_user) {
        $_SESSION['succesfully'] = 'Se ha registrado correctamente';
      } else {
        $_SESSION['errors']['insert'] = 'Error al guardar el usuario';
      }
      // redirect succesfully
      header('Location: ../index.php');

    } else {
      // if errors reload
      $_SESSION['errors'] = $errors;
      header('Location: ../register.php');
    }
  }
  

  if( isset($_POST['submit'])){
    require_once('../db/connection.php');
    /* session_start(); */

    $name = $_POST['name'] ;
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dataValidated = validate($name, $lastname, $email, $password);
    strictValidate($dataValidated, $db);
      
  }

?>