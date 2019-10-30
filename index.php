<?php require_once 'includes/header.php'; ?>
<?php require_once 'utils/register.php'; ?>

  <?php if (isset($_SESSION['succesfully'])): ?>
    <?= "<div id='register' class='container succesfully'>".$_SESSION['succesfully']."</div>" ?>
    <?= deleteErrors(); ?>
    <?php elseif (isset($_SESSION['errors']['insert'])): ?>
      <?= "<div id='error-register' class='container error-insert'>".$_SESSION['errors']['insert']."</div>" ?>
  <?php endif; ?>

  <!-- HERO -->
  <section class="hero">
    <div class="hero__background"></div>
    <div class="container">
      <div class="hero__content">
        <p>
            ¿Qué puedes encontrar aca? <br/>
            <span> Diseño, desarrollo & games </span>
          </p>
      </div>
    </div>
  </section>

  <!-- MAIN -->
  <div class="container">
    <main class="main">
      <div class="main__posts">
        <div class="main__see-recents">
          <h2> Los artículos más recientes </h2>
        </div>
        <section class="main__list-posts">

          <?php 
            $posts = getPosts($db, true);
            if (!empty($posts)):
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

              <?php endwhile; ?>
          <?php endif; ?>
        </section>
      </div>
      <!-- NEWSLETTER -->
      <div class="main__news-posts">
        <div class="main__news-head">
          <h2> Novedades </h2>
        </div>
          <section  class="main__list-news-posts">
            <article class="main__item-news">
              <h3>Titulo de la noticia</h3>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, natus accusantium, adipisci est...
              </p>
              <a href="">Ver más</a>
            </article>
            <article class="main__item-news">
              <h3>Titulo de la noticia</h3>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam, natus accusantium, adipisci est...
              </p>
              <a href="">Ver más</a>
            </article>
          </section>
      </div>
    </main>
  </div>

  <!-- FOOTER -->
  <?php require_once 'includes/footer.php';  ?>