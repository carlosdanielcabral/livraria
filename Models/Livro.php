<?php

class Livro extends Conexao{
	public $id;
	public $titulo;
	public $totalDePaginas;
	public $edicao;
	public $isbn;
	public $ano;
	public $fotoCapa;
	public $idEditora;
	protected $conexao;

	function __construct() {
		$this->conexao = $this->conectarDb();
	}

	public function validarEditora($parametro) {
		$query = "SELECT id from editora where nome = :parametro";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':parametro', $parametro);
		$stmt->execute();
		$id = $stmt->fetch(PDO::FETCH_ASSOC);
		return $id;
	}

		public function validarAutor($parametro) {
		$query = "SELECT id from autor where nome = :parametro";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':parametro', $parametro);
		$stmt->execute();
		$id = $stmt->fetch(PDO::FETCH_ASSOC);
		return $id;
	}


	public function cadastrarLivro() {
		$query = "INSERT INTO livro(titulo, totalPaginas, edicao, isbn, ano, fotoCapa, idEditora) VALUES (:titulo, :totalDePaginas, :edicao, :isbn, :ano, :fotoCapa, :idEditora)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':titulo', $this->titulo);
		$stmt->bindValue(':totalDePaginas', $this->totalDePaginas);
		$stmt->bindValue(':edicao', $this->edicao);
		$stmt->bindValue(':isbn', $this->isbn);
		$stmt->bindValue(':ano', $this->ano);
		$stmt->bindValue(':fotoCapa', $this->fotoCapa);
		$stmt->bindValue(':idEditora', $this->idEditora);
		$stmt->execute();
	}


	public function listarTodosOsLivros() {
		$query = "SELECT * from livro";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarLivro() {
		$query = "SELECT * from livro where titulo LIKE ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute(array("%$this->titulo%"));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obterLivrosPorAutor($idAutor) {
		$query = "SELECT * FROM livro_autor INNER JOIN livro ON livro.id = livro_autor.idLivro where idAutor = :idAutor";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':idAutor', $idAutor);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function obterLivrosPorEditora($idEditora) {
		$query = "SELECT * FROM editora INNER JOIN livro ON livro.idEditora = editora.id where editora.id = :idEditora";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':idEditora', $idEditora);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarLivroPorId() {
		$query = "SELECT * from livro where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function deletarLivro($nome) {
		$query = "DELETE from livro where nome=:nome";
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
	}
}