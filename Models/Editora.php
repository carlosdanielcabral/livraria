<?php

class Editora extends Conexao{
	public $nome;
	public $endereco;
	public $cidade;
	public $email;
	public $telefone;
	protected $conexao;

	function __construct() {
		$this->conexao = $this->conectarDb();
	}

	public function cadastrarEditora() {
		$query = "INSERT INTO editora(nome, endereco, cidade, email, telefone) VALUES (:nome, :endereco, :cidade, :email, :telefone)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':endereco', $this->endereco);
		$stmt->bindValue(':cidade', $this->cidade);
		$stmt->bindValue(':email', $this->email);
		$stmt->bindValue(':telefone', $this->telefone);
		$stmt->execute();
	}

	public function listarTodasAsEditoras() {
		$query = "SELECT * from editora where nome = :nome";
	}

	public function buscarEditora() {
		$query = "SELECT * from editora where nome = :nome";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function deletarEditora($nome) {
		$query = "DELETE from editora where nome=:nome";
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}