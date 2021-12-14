<?php

class Autor extends Conexao{
	public $id;
	public $nome;
	public $email;
	public $formacao;
	public $foto;
	protected $conexao;

	function __construct() {
		$this->conexao = $this->conectarDb();
	}

	public function cadastrarAutor() {
		$query = "INSERT INTO autor(nome, email, formacao, foto) VALUES (:nome, :email, :formacao, :foto)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':email', $this->email);
		$stmt->bindValue(':formacao', $this->formacao);
		$stmt->bindValue(':foto', $this->foto);
		$stmt->execute();
	}

	public function listarTodosOsAutores() {
		$query = "SELECT * from autor";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarAutor() {
		$query = "SELECT * from autor where nome like ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute(array("%$this->nome%"));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function buscarAutorPorId() {
		$query = "SELECT * from autor where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function deletarAutor($nome) {
		$query = "DELETE from autor where nome=:nome";
		$stmt->bindValue(':nome', $nome);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}
