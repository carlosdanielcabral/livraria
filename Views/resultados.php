<?php
session_start();
$resultados = $_SESSION['resultados'];

foreach ($resultados as $resultado) {
$img = "capas-livros/".$resultado['fotoCapa'];
?>

<section class="livro">
	<h2 class="titulo"><?=$resultado['titulo']?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> />
	</section>
</section>

<?php } ?>