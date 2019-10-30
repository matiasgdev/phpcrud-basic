<?php require_once 'includes/header.php'; ?>

<?php 
  $category_actually = getCategory($db, $_GET['cat']);
  if (!isset($category_actually['id'])){
    header('Location: blog.php');
  }
?>

<div class="blog">
  <div class="container">
    <!-- head of blog -->
    <?php require_once 'includes/blog-header.php'; ?>
    <!-- content of post -->

    <main class="main blog__main">
      <header class="blog__main--header">
        <h3>Publicaciones sobre 
          <span class="blog__main--header--title">
            <?= $category_actually['name']; ?>
          </span>
        </h3>
      </header>
      <section class="main__list-posts blog__main--list">
  
        <?php 
          $posts = getPosts($db, null, $category_actually['id']);
          if (!empty($posts) && mysqli_num_rows($posts) >= 1):
            while($post = mysqli_fetch_assoc($posts)):
        ?>
            <a href="post.php?id=<?=$post['id'] ?>">
              <article class="item-post">
                <h1  class="item-post-title">
                  <?= $post['title']; ?>
                </h1>
                <span class="item-post-author">
                  <?= $post['author_email'].' - '.str_replace('-', '/',$post['create_at']); ?>
                </span>
                <p class="item-post-description">
                  <?= substr($post['description'], 0, 234).'...'; ?>
                </p>
                <span class="item-post-category">
                  <?= $post['category']; ?>
                </span>
              </article>
            </a>

        <?php 
            endwhile;
          else:  
        ?> 
          <p class="blog__not--posts">Aún no hay publicaciones sobre esta categoría</p>
        <?php endif; ?>
        </section>
      </main>
    </div>
    <!-- <div class="main__load-more">
      <a href="#">
        Cargar más contenido
      </a>
    </div> -->
  </div>  
  </div>
  
<?php require_once 'includes/footer.php'; ?>