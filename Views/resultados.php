
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

			['nome' => $nome, 'endereco' => $endereco, 'cidade' => $cidade, 'telefone' => $telefone, 'email' => $email] = $resultado;
			$nome = formatarDados($nome);
			$endereco = formatarDados($endereco);
			$cidade = formatarDados($cidade);
			$telefone = formatarDados($telefone);
			$email = formatarDados($email);
?>

<section class="editora">
	<h2 class="nome"><?=$nome?></h2>
	<ul>

		<h3>Informações</h3>
		<li>Endereço: <?= $endereco ?></li>

		<li>Cidade: <?= $cidade ?></li>

		<li>Email: <?= $email ?></li>

		<li>Telefone: <?= $telefone ?></li>
	</ul>
</section>

<?php 
		} else {
			['nome' => $nome, 'email' => $email, 'formacao' => $formacao, 'foto' => $foto] = $resultado;

			$nome = formatarDados($nome);
			$email = formatarDados($email);
			$formacao = formatarDados($formacao);
			$img = 'autores-img/'.$foto;
?>

<section class="autor">
	<h2 class="titulo"><?=$nome?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> alt="Não possui foto"/>
	</section>

	<ul>
		<li>Email: <?= $email ?></li>
		<li>Formação: <?= $formacao ?></li>
	</ul>
</section>

<?php
		}
	}
?>
</section>