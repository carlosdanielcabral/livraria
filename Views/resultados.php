
<section class="livros">

<?php
session_start();
$tipoResultado = $_GET['tipo'];

require "Models/Conexao.php";
require "Models/Editora.php";
require "Models/Autor.php";
require "Models/LivroAutor.php";

function formatarDados($string) {
	return ucwords(str_ireplace("*", " ", $string));
}

$resultados = $_SESSION['resultados'];

foreach ($resultados as $resultado) {
	if ($tipoResultado === 'livro'){
		['id' => $id,'idEditora' => $idEditora, 'edicao' => $edicao, 'titulo' => $titulo, 'fotoCapa' => $img, 'isbn' => $isbn] = $resultado;

		$editora = new Editora();
		$autor = new Autor();
		$livroAutor = new LivroAutor();
		$livroAutor->idLivro = $id;
		$autor->id = ($livroAutor->buscarIdAutor())['idAutor'];
		$nomeAutor = formatarDados(($autor->buscarAutorPorId())['nome']);
		$editora->id = $idEditora;
		$nomeEditora = ($editora->buscarEditoraPorId())['nome'];

		$titulo = formatarDados($titulo);

		$img = "capas-livros/".$img;
?>

<section class="livro">
	<h2 class="titulo"><?=$titulo?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> />
	</section>

	<p> Autor: <?= $nomeAutor ?>, Editora: <?= $nomeEditora ?> Edicao: <?=$edicao?>, ISBN: <?=$isbn?> </p>
</section>

<?php 
		} else if ($tipoResultado === 'editora') {
			['endereco' => $endereco, 'cidade']
?>

<section class="editora">
	<h2 class="nome"><?= $nome ?></h2>
	<ul>
		<h3>Informações</h3>
		<li>
			
		</li>
	</ul>
</section>

</section>