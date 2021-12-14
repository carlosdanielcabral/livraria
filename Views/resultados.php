
<section class="livros">

<?php
session_start();
require "Models/Conexao.php";
require "Models/Editora.php";
require "Models/Autor.php";
require "Models/LivroAutor.php";

$resultados = $_SESSION['resultados'];
foreach ($resultados as $resultado) {
['id' => $id,'idEditora' => $idEditora, 'edicao' => $edicao, 'titulo' => $titulo, 'fotoCapa' => $img, 'isbn' => $isbn] = $resultado;

$editora = new Editora();
$autor = new Autor();
$livroAutor = new LivroAutor();
$livroAutor->idLivro = $id;
$autor->id = ($livroAutor->buscarIdAutor())['idAutor'];
$nomeAutor = ($autor->buscarAutorPorId())['nome'];
$editora->id = $idEditora;
$nomeEditora = ($editora->buscarEditoraPorId())['nome'];

$img = "capas-livros/".$img;
?>

<section class="livro">
	<h2 class="titulo"><?=$titulo?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> />
	</section>

	<p> Autor: <?= $nomeAutor ?>, Editora: <?= $nomeEditora ?> Edicao: <?=$edicao?>, ISBN: <?=$isbn?> </p>
</section>

<?php } ?>
</section>