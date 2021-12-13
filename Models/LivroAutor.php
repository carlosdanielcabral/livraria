<?php

class LivroAutor extends Conexao {
	public $idLivro;
	public $idAutor;
	public $conexao;

	function __construct($idLivro, $idAutor){
		$this->idLivro = $idLivro;
		$this->idAutor = $idAutor;
		$this->conexao = $this->conectarDb();
	}

	public function cadastrarDados() {
		$query = 'INSERT INTO livro_autor(idLivro, idAutor) VALUES (:idLivro, :idAutor)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':idLivro', $this->idLivro);
		$stmt->bindValue('idAutor', $this->idAutor);
		$stmt->execute();
	}
}

?>