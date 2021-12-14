<section style="padding: 20px;">
	<form action="../Controllers/pesquisa-controller.php" method="post" class="form">
		<div class="form-group">
			<label>O que você deseja pesquisar?</label>
			<div class="form-group">
				<label for="livro">Livro</label>
				<input type="radio" id="livro" name="pesquisa-escolha" value="livro">

				<label for="editora">Editora</label>
				<input type="radio" id="editora" name="pesquisa-escolha" value="editora">

				<label for="autor">Autor</label>
				<input type="radio" id="autor" name="pesquisa-escolha" value="autor">				
			</div>
		</div>

		<div class="form-group">
			<label>Pesquisa</label>
			<div class="form-group">
				<label for="todos">Todos</label>
				<input type="radio" id="todos" name="tipo-pesquisa" value="todos">
				<label for="especifico">Específico</label>
				<input type="radio" id="especifico" name="tipo-pesquisa" value="especifico">
			</div>

			<input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Digite aqui..." disabled> 
		</div>

		<button type="submit" class="btn btn-success">Pesquisar</button>
	</form>
</section>

<script>
	const especifico = document.getElementById('especifico');
	const todos = document.getElementById('todos');
	const pesquisa = document.getElementById('pesquisa');
	especifico.addEventListener('focus', () => {
		pesquisa.disabled = false;
	});

	todos.addEventListener('focus', () => {
		pesquisa.disabled = true;
	});
</script>
