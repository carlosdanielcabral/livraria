
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
		['id' => $id,'idEditora' => $idEditora, 'edicao' => $edicao, 'titulo' => $titulo, 'fotoCapa' => $img, 'isbn' => $isbn, 'ano' => $ano, 'idLivro' => $idLivro, 'idEditora' => $idEditora, 'idAutor' => $idAutor] = $resultado;

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

<a href="index.php?pagina=livro&livro=<?=$id?>" class="resultado-link">
<section class="livro">
	<h2 class="titulo"><?=$titulo?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> />
	</section>

	<p> Ano: <?= $ano ?> </p>
</section>
</a>

<?php 
		} else if ($tipoResultado === 'editora') {

			['id' => $id, 'nome' => $nome, 'endereco' => $endereco, 'cidade' => $cidade, 'telefone' => $telefone, 'email' => $email] = $resultado;
			$nome = formatarDados($nome);
			$endereco = formatarDados($endereco);
			$cidade = formatarDados($cidade);
			$telefone = formatarDados($telefone);
			$email = formatarDados($email);
?>

<a href="index.php?pagina=editora&editora=<?=$id?>" class="resultado-link">
<section class="editora">
	<h2 class="nome"><?=$nome?></h2>
	<h3>Cidade: <?= $cidade ?></h3>
</section>
</a>

<?php 
		} else {
			['id' => $id, 'nome' => $nome, 'email' => $email, 'formacao' => $formacao, 'foto' => $foto] = $resultado;

			$nome = formatarDados($nome);
			$email = formatarDados($email);
			$formacao = formatarDados($formacao);
			$img = 'autores-img/'.$foto;
?>

<a href="index.php?pagina=autor&autor=<?=$id?>" class="resultado-link">
<section class="autor">
	<h2 class="titulo"><?=$nome?></h2>
	<section class="capa-img">
		<img style="width: 200px"src=<?= $img ?> alt="Não possui foto"/>
	</section>

	<ul>
		<li>Email: <?= $email ?></li>
	</ul>
</section>
</a>

<?php
		}
	}
?>
</section>