<!-- AUTHORIZATION -->
<?php require_once 'utils/auth.php'; ?>
<?php require_once 'includes/header.php'; ?>


  <section class="create">
    <div class="container">
      <div class="create--container">
        <header class="create__caption">
          <h3>
            Crea tu post
          </h3>
          <p>
            Añade un post para que nuestros usuarios puedan leer tu contenido, nos gustará saber que tienes para enseñarnos!
          </p>
        </header>
        <form action="utils/manage-post.php" class="create__form" method="POST">
        
          <div class="create__form--title">
            <label for="title">Titulo</label>
            <br />
            <input type="text" name="title" autocomplete="off">
          </div>
          <!-- error message title -->
          <?= (isset($_SESSION['error-post'])) ? 
          "<span class='error-post'>". showMessages($_SESSION['error-post'], 'title') ."</span>" 
          : deleteErrors(); ?>

          <!-- category items -->
          <div class="create__form--category">
            <label for="category">Categoria:</label>
            <select  name="category">
              <?php 
                $categories = getCategories($db);
                while ($category = mysqli_fetch_assoc($categories)):
              ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <!--  error message category, if modified -->
          <?= (isset($_SESSION['error-post'])) ? 
          "<span class='error-post'>". showMessages($_SESSION['error-post'], 'category') ."</span> <br/>" 
          : deleteErrors(); ?>
    
          <textarea class="create__form--description" name="description" placeholder="Haz una descripción..."></textarea>
          <!-- error message description -->
          <?= (isset($_SESSION['error-post'])) ? 
          "<br/> <span class='error-post'>". showMessages($_SESSION['error-post'], 'description') ."</span>" 
          : deleteErrors(); ?>
          <br />
          <button>Enviar</button>
      </div>
      </form>
      <?php deleteErrors(); ?>
    </div>
  </section>


<?php require_once 'includes/footer.php'; ?>