<?php
error_reporting(E_ERROR | E_PARSE);

$pagina_atual = !$_GET['pagina'] ? "sobre" : $_GET['pagina'];
$erro = !$_GET['erro'] ? '' : $_GET['erro'];

?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Livraria</title>
		<meta name="description" content="Projeto avaliativo para o curso de Análise e Desenvolvimento de Sistemas na UCA">
	  	<meta name="keywords" content="HTML, CSS, Bootstrap, PHP, MySQL">
	  	<meta name="author" content="Carlos Daniel Cabral Figueiredo Alves">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Inclusão do Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link href="assets/style.css" rel="stylesheet">
	</head>
	<body>
		<?php require "Views/header.php" ?>

		<main id="main">
			<?php require "Views/{$pagina_atual}.php"; ?>
		</main>	

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>