<?php require_once 'config.php' ?>
<?php require_once 'db/connection.php'; ?>
<?php require_once 'utils/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Amazing blog of currents 2drop's members! Join the community" />
  <title> Blogsite 💧 </title>
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="assets/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css" />
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="assets/css/bundle.css" />
</head>
<body>


  <!-- HEADER -->
  <header class="header">
    <div class="container">
      <div class="header__logotype">
        <a href="#"> Great <span>Website</span></a>
      </div>
      <div class="header__navigate">
        <nav class="nav">
          <ul>
            <li class="select-nav-item">
              <a href="<?=URL?>index.php">
                Inicio
              </a>
            </li>
            <li>
              <a href="<?=URL?>blog.php">
                Blog
              </a>
            </li>
            <li>
              <a href="">
                Sobre nosotros
              </a>
            </li>
            <li>
              <a href="">
                Contacto
              </a>
            </li>
          </ul>
          <div class="auth">

            <?php if (isset($_SESSION['user'])): ?>
              <a href=""><?=$_SESSION['user']['email'] ?></a>
              <a href="<?=URL?>utils/logout.php"> Logout </a>
            <?php elseif(!isset($_SESSION['user'])): ?>
              <a href="<?=URL?>register.php">Registrarse</a> <br/>
              <a href="<?=URL?>login.php">Login</a>
            <?php endif; ?> 

          </div>
        </nav>
      </div>
    </div>
  </header>