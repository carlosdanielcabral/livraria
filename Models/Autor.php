<?php

class Autor extends Conexao{
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

	public function buscarAutor() {
		$query = "SELECT * from autor where nome = :nome";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
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
