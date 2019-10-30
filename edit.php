<!-- Authorization -->
<?php require_once 'utils/auth.php'; ?>

<?php require_once 'includes/header.php'; ?>
<?php 

  if (isset($_GET['id'])){
    $post = getPost($db, $_GET['id']);
    if ($post['author_id'] == $_SESSION['user']['id']){
    }else {
      header("Location: blog.php");
    }
  }else {
    header("Location: blog.php");
  }

?>

  <section class="create">
    <div class="container">
      <div class="create--container">
        <header class="create__caption">
          <h3>
            Editar 
          </h3>
          <p>
          <?= $post['title']; ?>
          </p>
        </header>
        <form action="utils/manage-post.php?id=<?= $post['id']; ?>" class="create__form" method="POST">
        
          <div class="create__form--title">
            <label for="title">Titulo</label>
            <br />
            <input type="text" name="title" autocomplete="off" value="<?=$post['title']?>">
          </div>
            <?= (isset($_SESSION['error-post'])) ? 
            "<span class='error-post'>". showMessages($_SESSION['error-post'], 'title') ."</span>" 
            : deleteErrors(); ?>
        
          <div class="create__form--category">
            <label for="category">Categoria:</label>
            <select  name="category">
              <?php 
                $categories = getCategories($db);
                while ($category = mysqli_fetch_assoc($categories)):
              ?>
                <option
                  value="<?= $category['id'] ?>"
                  <?= ($category['id'] == $post['category_id']) ?   'selected="selected"' : ''; ?>
                >
                  <?= $category['name'] ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
            <?= (isset($_SESSION['error-post'])) ? 
            "<span class='error-post'>". showMessages($_SESSION['error-post'], 'category') ."</span> <br/>" 
            : deleteErrors(); ?>
    
          <textarea class="create__form--description" name="description" placeholder="Haz una descripción...">
            <?= trim($post['description']); ?>
          </textarea>
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