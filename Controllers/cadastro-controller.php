<?php

session_start();

require "../Models/Conexao.php";
require "../Models/Livro.php";
require "../Models/Editora.php";
require "../Models/Autor.php";
require "../Models/LivroAutor.php";

$tipo = $_GET['tipo'] ? $_GET['tipo'] : "indefinido";


function formatarDado($dado) {
	return str_ireplace(" ", "*", (trim(strtolower($dado))));
}

$livro = new Livro();
$editora = new Editora();
$autor = new Autor();

switch ($tipo) {	
	case 'livro':
		['titulo' => $titulo, 'totalPaginas' => $totalPaginas, 'edicao' => $edicao, 'isbn' => $isbn, 'ano' => $ano, 'editora' => $nomeEditora, 'autor' => $nomeAutor] = $_POST;

		$fotoCapa = $_FILES['fotoCapa']['name'];

		move_uploaded_file($_FILES['fotoCapa']['tmp_name'], '../capas-livros/'.$fotoCapa);

		$titulo = formatarDado($titulo);
		$nomeEditora = !formatarDado($nomeEditora) ? 'desconhecido' : $nomeEditora;
		$nomeAutor = formatarDado($nomeAutor);

		$livro->titulo = $titulo;
		$livro->totalDePaginas = $totalPaginas;
		$livro->edicao = $edicao;
		$livro->isbn = $isbn;
		$livro->ano = $ano;
		$livro->fotoCapa = $fotoCapa;

		$editora->nome = $nomeEditora;

		$idEditora = $editora->buscarEditora();

		if (!$idEditora) { // Verifica se a editora passada existe. Caso não, retorna para a página de cadastro
				
			header('Location: ../index.php/?pagina=cadastro/livro&erro=editora');
			
		} else {
			$livro->idEditora = $idEditora['id'];

			$livro->cadastrarLivro();

			$idLivro = ($livro->buscarLivro())['id'];

			$autor->nome = $nomeAutor;

			$idAutor = !($autor->buscarAutor()) ? 3 : ($autor->buscarAutor())['id'];

			$livroAutor = new LivroAutor();

			$livroAutor->idLivro = $idLivro;
			$livroAutor->idAutor  $idAutor;

			$livroAutor->cadastrarDados();

		
			header("Location: ../index.php");
		
		}

		break;

	case 'editora': 
		['nome' => $nome, 'endereco' => $endereco, 'cidade' => $cidade, 'email' => $email, 'telefone' => $telefone] = $_POST;

		$nome = formatarDado($editora);
		$endereco = formatarDado($endereco);
		$cidade = formatarDado($cidade);
		$email = formatarDado($email);

		$editora->nome = $nome;
		$editora->endereco = $endereco;
		$editora->cidade = $cidade;
		$editora->email = $email;
		$editora->telefone = $telefone;

		$editora->cadastrarEditora();

		header("Location: ../index.php");
					
		break;

	default:
		['nome' => $nome, 'email' => $email, 'formacao' => $formacao] = $_POST;

		$foto = $_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'], '../autores-img/'.$foto);
		$nome = formatarDado($nome);
		$email = formatarDado($email);
		$formacao = formatarDado($formacao);

		$autor->nome = $nome;
		$autor->email = $email;
		$autor->formacao = $formacao;
		$autor->foto = $foto;

		$autor->cadastrarAutor();

		header("Location: ../index.php");
					
		break;
} // Final do bloco switch
