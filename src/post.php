<?php require_once 'db/connection.php' ?>
<?php require_once 'utils/helpers.php' ?>
<?php require_once 'includes/header.php'; ?>

<?php 
  if (isset($_GET['id'])){
    $post_actually = getPost($db, $_GET['id']);
  }else {
    header("Location: blog.php");
  }
  if (!isset($post_actually)) {
    header("Location: blog.php");
  }
?>


<div class="container">

  <!-- post  -->
  <div class="post">
    <article class="post__item">
        <!-- FB like and share -->
      <div>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v4.0"></script>
        <div class="comment-fb">
        <div class="fb-like" data-href="http://localhost/master-php/5-projecto-blog/post.php?id=<?php $post_actually['id'] ?>" data-width="200px" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>  
        </div>
      </div>
      <h1 class="post__item--title"><?= $post_actually['title'] ?> </h1>
      <div class="post__item__body">
        <span class="post__item--author"> <?= $post_actually['author_email'] ?> </span>
        <span class="post__item--date"> <?= $post_actually['create_at'] ?> </span>
        <p class="post__item--description"><?= $post_actually['description'] ?> </p>
        <a class="post__item--category" href="category?cat=<?= $post_actually['category_id'] ?>">
          <?=$post_actually['category'] ?> 
        </a>
      </div>
      <!-- Conditional buttons of edit and delete -->
      <?php  
        if (isset($_SESSION['user']) && 
            $_SESSION['user']['id'] == $post_actually['author_id']
        ):
      ?>
      <div class="post__buttons">
        <a href="includes/delete.php?id=<?=$post_actually['id'] ?>" > Delete </a>
        <a href="edit.php?id=<?= $post_actually['id'] ?>"> Edit </a>
      </div>
    
      <?php endif; ?>
    </article>
  </div>
  <!-- Fb comments -->
  <div class="fb-comments" data-href="http://localhost/master-php/5-projecto-blog/post.php?id<?= $post_actually['id']; ?>" data-width="100%" data-numposts="7"></div>
</div>

<?php require_once 'includes/footer.php'; ?>



