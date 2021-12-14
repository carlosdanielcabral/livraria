
<section class="livros">

<?php
session_start();
$resultados = $_SESSION['resultados'];
foreach ($resultados as $resultado) {
['edicao' => $edicao, 'titulo' => $titulo, 'fotoCapa' => $img, 'isbn' => $isbn] = $resultado;
$img = "capas-livros/".$img;
?>

<section class="livro">
	<h2 class="titulo"><?=$titulo?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> />
	</section>

	<p> Edicao: <?=$edicao?>, ISBN: <?=$isbn?> </p>
</section>

<?php } ?>
</section>