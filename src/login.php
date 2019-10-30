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
        <form action="utils/manage-login.php" method="POST">
        <h1> Logeate en 2Drop </h1>
          <input type="email" name="email" placeholder="Email" autocomplete="off"  autofocus="on">
          <input type="password" name="password" placeholder="Password" >
          <input type="submit" name="submit" value="Registrarse">
          <?php if (isset($_SESSION['error-login'])): ?>
            <p class="login-error">
              <?=$_SESSION['error-login']?>
            </p>
          <?php endif; ?> 
        </form>
      </div>
      <!-- delete errors -->
      <?php deleteErrors(); ?>
  </div>
</div>

<?php include_once 'includes/footer.php'; ?>