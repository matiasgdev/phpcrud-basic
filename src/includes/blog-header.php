<?php require_once 'config.php' ?>
<header class="blog__header">
  <h2>Bienvenidos</i></h2>
  <p>Encontraras contenido de todo tipo en nuestro blog oficial</p>
  <!-- create button if logged -->
	<?php if (isset($_SESSION['user'])): ?>
    <a class="blog--create" href="create-post.php"> Crear post </a>
	<?php endif; ?>

</header>
<div class="blog__filter">
  <span class="blog__filter--type">Filtrar por: </span>
  <div class="blog__filter--list">
			<span>categoría</span>
			<div class="blog__filter--list--toggle">
				<?php 
					$categories = getCategories($db);
					while($category = mysqli_fetch_assoc($categories)):
				?>
					<div class="blog__filter--list--option">
						<a href="<?=URL?>category.php?cat=<?= $category['id']; ?>"> 
								<?=$category['name']?> 
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<div class="blog__filter--search">
		<form action="search.php" method="POST">
			<input type="text" name="search" 
			<?= isset($_POST['search']) ? "value=".$_POST['search'] : ''; ?>
			<?= isset($_POST['search']) ? '' : "placeholder=Buscar..." ?>
			>
			<button> Go </button>
		</form>
	</div>
</div>