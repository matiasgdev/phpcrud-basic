<?php require_once 'includes/header.php'; ?>

<?php
  // redirect if not exist or not content on post
  if (!isset($_POST['search']) || strlen($_POST['search']) == 0){
    header('Location: blog.php');
  }
  $posts = getPosts($db, null, null, $_POST['search']);
  
?>

<div class="blog">
  <div class="container">
    <!-- head of blog -->
    <?php require_once 'includes/blog-header.php'; ?>
    <!-- content of post -->
    <main class="main blog__main">
      <header class="blog__main--header">
        <h3>Publicaciones 
          <span class="blog__main--header--title">
            <?=$_POST['search'] ?>
          </span>
        </h3>
      </header>
      <section class="main__list-posts blog__main--list">
  
        <?php 
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
          <p class="blog__not--posts">No hay post referidos a <?=$_POST['search'] ?> </p>
        <?php endif; ?>
        </section>
      </main>
    </div>
  </div>  
</div>
<?php require_once 'includes/footer.php'; ?>