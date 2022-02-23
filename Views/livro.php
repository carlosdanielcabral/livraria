<?php

require "Models/Conexao.php";
require "Models/Livro.php";
require "Models/Editora.php";
require "Models/Autor.php";
require "Models/LivroAutor.php";

function formatarDados($string) {
	return ucwords(str_ireplace("*", " ", $string));
}

$livroId = $_GET['livro'];

$livro = new Livro();
$livro->id = $livroId;
$dados = ($livro->buscarLivroPorId());

$editora = new Editora();
$autor = new Autor();
$livroAutor = new LivroAutor();

$livroAutor->idLivro = $livroId;
$autor->id = ($livroAutor->buscarIdAutor())['idAutor'];
$nomeAutor = formatarDados(($autor->buscarAutorPorId())['nome']);
$editora->id = $dados['idEditora'];
$nomeEditora = ($editora->buscarEditoraPorId())['nome'];
?>

<section class="container-flex">
	<div class="left">
		<h2 class="titulo"><?=formatarDados($dados['titulo']) ?></h2>

		<section class="capa-img-livro">
			<img width="200px;" src="capas-livros/<?=$dados['fotoCapa']?>" alt="fotoCapa">
		</section>
	</div>

	<div class="right">
		<h3 class="informacoes">Informações:</h3>
		<ul>
			<li>Número de Páginas: <?=$dados['totalPaginas']?></li>
			<li>ISBN: <?=$dados['isbn']?></li>
			<li>Editora: <?=$nomeEditora?></li>
			<li>Edição: <?=$dados['edicao']?></li>
			<li>Ano: <?= $dados['ano'] ?></li>
		</ul>
	</div>
</section>
