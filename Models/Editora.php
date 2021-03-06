<?php

class Editora extends Conexao{
	public $id;
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
		$query = "SELECT * from editora";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarEditora() {
		$query = "SELECT * from editora where nome like ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute(array("%$this->nome%"));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarEditoraPorId() {
		$query = "SELECT * from editora where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
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