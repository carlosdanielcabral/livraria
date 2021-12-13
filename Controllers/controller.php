<?php
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

	if ($acao === 'cadastro') {
			switch ($tipo) {
				case 'livro':
					['titulo' => $titulo, 'totalPaginas' => $totalPaginas, 'edicao' => $edicao, 'isbn' => $isbn, 'ano' => $ano, 'editora' => $editora, 'autor' => $autor] = $_POST;

					$fotoCapa = $_FILES['fotoCapa']['name'];
					move_uploaded_file($_FILES['fotoCapa']['tmp_name'], '../capas-livros/'.$fotoCapa);
					$titulo = formatarDado($titulo);
					$editora = formatarDado($editora);
					$autor = formatarDado($autor);

					$livro = new Livro();
					$livro->titulo = $titulo;
					$livro->totalPaginas = $totalPaginas;
					$livro->edicao = $edicao;
					$livro->isbn = $isbn;
					$livro->ano = $ano;
					$livro->fotoCapa = $fotoCapa;

					$editora = !$editora ? 'desconhecido' : $editora;

					$idEditora = $livro->validarEditora($editora);

					if (!$idEditora) {
						header('Location: ../index.php/?pagina=cadastro/livro&erro=editora');
					} else {
						$livro->idEditora = $idEditora['id'];

						$livro->cadastrarLivro();

						$idLivro = ($livro->listarLivros())['id'];

						$idAutor = !($livro->validarAutor($autor)) ? 3 : ($livro->validarAutor($autor))['id'];

						$livroAutor = new LivroAutor($idLivro, $idAutor);

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

					$editora = new Editora();
					$editora->nome = $nome;
					$editora->endereco = $endereco;
					$editora->cidade = $cidade;
					$editora->email = $email;
					$editora->telefone = $telefone;

					$editora->cadastrarEditora();

					header("Location: ../index.php");
				break;

				case 'autor':
					['nome' => $nome, 'email' => $email, 'formacao' => $formacao] = $_POST;

					$foto = $_FILES['foto']['name'];
					move_uploaded_file($_FILES['foto']['tmp_name'], '../autores-img/'.$foto);

					$nome = formatarDado($nome);
					$email = formatarDado($email);
					$formacao = formatarDado($formacao);

					$autor = new Autor();
					$autor->nome = $nome;
					$autor->email = $email;
					$autor->formacao = $formacao;
					$autor->foto = $foto;

					$autor->cadastrarAutor();

					header("Location: ../index.php");
				break;

			}
			
		
		} else {
			['pesquisa-escolha' => $pesquisaEscolha, 'tipo-pesquisa' => $tipoPesquisa, 'pesquisa' => $pesquisa] = $_POST;
			$pesquisa = formatarDado($pesquisa);
			session_start();
			if ($pesquisaEscolha === 'livro') {
					$livro = new Livro();
					if ($tipoPesquisa === 'todos') {
						$resultados = $livro->listarTodosOsLivros();
						
					} else {
						$livro->titulo = $pesquisa;
						$resultados = $livro->listarLivros();
					}

					$_SESSION['resultados'] = $resultados;
					header('Location: ../index.php?pagina=resultados');

			} else if ($pesquisaEscolha === 'editora') {
					$editora = new Editora();
					$editora->nome = $pesquisa;
					$resultados = $editora->listarEditoras();
					print_r($resultados);

			} else {
					$autor = new Autor();
					$autor->nome = $pesquisa;
					$resultados = $autor->listarAutores();
					print_r($resultados);
			}
		}
	