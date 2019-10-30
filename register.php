<?php include_once 'includes/header.php'; ?>
<?php include_once 'utils/helpers.php'; ?>

<?php   
  // if user is logged, redirect
  if (isset($_SESSION['user'])){
    header("Location: index.php");
  }
?>

<div class="form-register">
  <div class="container">
      <div class="form-container">
        <form action="utils/register.php" method="POST">
        <h1> Registrate en 2Drop </h1>
          <input type="text" name="name" placeholder="Nombre" >
          <?php 
          echo isset($_SESSION['errors']) ? 
          showMessages($_SESSION['errors'], 'name') :
          deleteErrors();
          ?>
          <input type="text" name="lastname" placeholder="Apellido." >
          <?php 
          echo isset($_SESSION['errors']) ? 
          showMessages($_SESSION['errors'], 'lastname') :
          deleteErrors();
          ?>
          <input type="email" name="email" placeholder="Email" >
          <?php 
          echo isset($_SESSION['errors']) ? 
          showMessages($_SESSION['errors'], 'email') :
          deleteErrors();
          ?>
          <input type="password" name="password" placeholder="Password" >
          <?php 
          echo isset($_SESSION['errors']) ? 
          showMessages($_SESSION['errors'], 'password') :
          deleteErrors();
          ?>
          <input type="submit" name="submit" value="Registrarse">
        </form> 
      </div>
      <!-- delete errors -->
      <?php deleteErrors(); ?>
  </div>
  </div>

<?php include_once 'includes/footer.php'; ?>