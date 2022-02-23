<?php

session_start();

require "../Models/Conexao.php";
require "../Models/Livro.php";
require "../Models/Editora.php";
require "../Models/Autor.php";
require "../Models/LivroAutor.php";


function formatarDado($dado) {
	return str_ireplace(" ", "*", (trim(strtolower($dado))));
}

$livro = new Livro();
$editora = new Editora();
$autor = new Autor();

['pesquisa-escolha' => $pesquisaEscolha, 'tipo-pesquisa' => $tipoPesquisa, 'pesquisa' => $pesquisa] = $_POST;

$pesquisa = formatarDado($pesquisa);

if ($pesquisaEscolha === 'livro') {
			
	if ($tipoPesquisa === 'todos') {
				
		$resultados = $livro->listarTodosOsLivros();
	} else if ($tipoPesquisa === 'por-autor') {
		$autor->nome = $pesquisa;
		$idAutor = $autor->buscarAutor();
		print_r($idAutor);	

		if ($idAutor) {
			$resultados = $livro->obterLivrosPorAutor($idAutor[0]['id']);
			print_r($resultados);
		}	

	} else if ($tipoPesquisa === 'por-editora') {
		$editora->nome = $pesquisa;
		$idEditora = $editora->buscarEditora();

		if ($idEditora) {
			$resultados = $livro->obterLivrosPorEditora($idEditora[0]['id']);
		}
	} else {
		$livro->titulo = $pesquisa;
		$resultados = $livro->buscarLivro();
	}

	$_SESSION['resultados'] = $resultados;
	header('Location: ../index.php?pagina=resultados&tipo=livro');

} else if ($pesquisaEscolha === 'editora') {

	if ($tipoPesquisa === 'todos') {

		$resultados = $editora->listarTodasAsEditoras();
	} else {
		$editora->nome = $pesquisa;
		$resultados = $editora->buscarEditora();
	}

	$_SESSION['resultados'] = $resultados;
	
	header('Location: ../index.php?pagina=resultados&tipo=editora');

} else {

	if ($tipoPesquisa === 'todos') {
		$resultados = $autor->listarTodosOsAutores();
	} else {
		$autor->nome = $pesquisa;
		$resultados = $autor->buscarAutor();	
	}
	
	$_SESSION['resultados'] = $resultados;
	header('Location: ../index.php?pagina=resultados&tipo=autor');
}
