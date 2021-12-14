<?php

session_start();

require "../Models/Conexao.php";
require "../Models/Livro.php";
require "../Models/Editora.php";
require "../Models/Autor.php";
require "../Models/LivroAutor.php";

$acao = $_GET['acao'] ? $_GET['acao'] : "indefinida";
$tipo = $_GET['tipo'] ? $_GET['tipo'] : "indefinido";


function formatarDado($dado) {
	return str_ireplace(" ", "-", (trim(strtolower($dado))));
}

$livro = new Livro();
$editora = new Editora();
$autor = new Autor();

['pesquisa-escolha' => $pesquisaEscolha, 'tipo-pesquisa' => $tipoPesquisa, 'pesquisa' => $pesquisa] = $_POST;

$pesquisa = formatarDado($pesquisa);

if ($pesquisaEscolha === 'livro') {
			
	if ($tipoPesquisa === 'todos') {
				
		$resultados = $livro->listarTodosOsLivros();
						
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
	
	header('Location: ../index.php/?pagina=resultados&tipo=editora');

} else {

	if ($tipoPesquisa === 'todos') {
		$resultados = $autor->listarTodosOsAutores();
	} else {
		$autor->nome = $pesquisa;
		$resultados = $autor->buscarAutor();	
	}
	
	$_SESSION['resultados'] = $resultados;
}
