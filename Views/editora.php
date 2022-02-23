<?php

require "Models/Conexao.php";
require "Models/Editora.php";

function formatarDados($string) {
	return ucwords(str_ireplace("*", " ", $string));
}

$editoraId = $_GET['editora'];

$editora = new Editora();
$editora->id = $editoraId;
$dados = $editora->buscarEditoraPorId();
?>

<section>
	<h2><?=formatarDados($dados['nome']) ?></h2>
	<h3 class="informacoes">Informações:</h3>
	<ul>
		<li>Endereço: <?=formatarDados($dados['endereco'])?></li>
		<li>Cidade: <?=formatarDados($dados['cidade'])?></li>
		<li>Email: <?=formatarDados($dados['email'])?></li>
		<li>Telefone: <?=formatarDados($dados['telefone'])?></li>
	</ul>
</section>
