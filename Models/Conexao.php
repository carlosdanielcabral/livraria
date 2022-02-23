<?php
abstract class Conexao {
	protected function conectarDb() {
		try {
			return $dataBase = new PDO("mysql:host=localhost;dbname=ra65697", "root", "");
		} catch (PDOException $e) {
			return "ERROR: " . $e->getMessage();
		}
	}
}
