<?php 

  // init session and connection db
  require_once '../db/connection.php';
  // get data on form
  if (isset($_POST['submit'])){
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // query to check the credentials of user
 
    $sql = "SELECT * FROM users WHERE email = '$email';";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) === 1){
      $user = mysqli_fetch_assoc($login);
      
      $verify = password_verify($password, $user['password']);

      if ($verify) {
        $userSecure = array(
          'id' => $user['id'],
          'name' => $user['name'],
          'lastname' => $user['lastname'],
          'email' => $user['email'],
          'register_date' => $user['register_date']
        );
        // set a session to save user's data 
        $_SESSION['user'] = $userSecure;

        if (isset($_SESSION['error-login'])){
          unset($_SESSION['error-login']);
        }

        header('Location: ../index.php');

      } else {
        // set a session if something wrong
        $_SESSION['error-login'] = "Login incorrecto. Verifica los datos";
        header('Location: ../login.php');
      }

    } else {
      $_SESSION['error-login'] = "Login incorrecto. Verifica los datos";
      header('Location: ../login.php');
    }

  }

?>