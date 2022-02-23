<?php

require "Models/Conexao.php";
require "Models/Autor.php";

function formatarDados($string) {
	return ucwords(str_ireplace("*", " ", $string));
}

$autorId = $_GET['autor'];
$autor = new Autor();
$autor->id = $autorId;
$dados = $autor->buscarAutorPorId();

?>

<section>
	<h2><?=formatarDados(formatarDados($dados['nome'])) ?></h2>
	<section class="capa-img">
		<img width="200px;" src="autores-img/<?=$dados['foto']?>" alt="fotoCapa">
	</section>
	<h3 class="informacoes">Informações:</h3>
	<ul>
		<li>Email: <?=formatarDados($dados['email'])?></li>
		<li>Formação: <?=formatarDados($dados['formacao'])?> </li>
	</ul>
</section>
