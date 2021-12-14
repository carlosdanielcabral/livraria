<?php

class LivroAutor extends Conexao {
	public $idLivro;
	public $idAutor;
	public $conexao;

	function __construct(){
		$this->conexao = $this->conectarDb();
	}

	public function cadastrarDados() {
		$query = 'INSERT INTO livro_autor(idLivro, idAutor) VALUES (:idLivro, :idAutor)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':idLivro', $this->idLivro);
		$stmt->bindValue('idAutor', $this->idAutor);
		$stmt->execute();
	}

	public function buscarIdAutor() {
		$query = "SELECT idAutor from livro_autor where idLivro = :idLivro";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':idLivro', $this->idLivro);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>