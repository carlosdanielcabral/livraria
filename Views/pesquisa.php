<section style="padding: 20px;">
	<form action="../Controllers/pesquisa-controller.php" method="post" class="form">
		<div class="form-group">
			<label>O que você deseja pesquisar?</label>
			<div class="form-group">
				<label for="livro">Livro</label>
				<input type="radio" class="pesquisa-escolha" id="livro" name="pesquisa-escolha" value="livro">

				<label for="editora">Editora</label>
				<input type="radio" class="pesquisa-escolha" id="editora" name="pesquisa-escolha" value="editora">

				<label for="autor">Autor</label>
				<input type="radio" class="pesquisa-escolha" id="autor" name="pesquisa-escolha" value="autor">				
			</div>
		</div>

		<div class="form-group">
			<label>Pesquisa</label>
			<div class="form-group">
				<label for="todos">Todos</label>
				<input type="radio" class="tipo-pesquisa" id="todos" name="tipo-pesquisa" value="todos">
				
				<div id="livro-pesquisa-opcoes" style="display: inline-block;">
					<label for="por-autor" class="display-none">Por autor</label>
					<input type="radio" class="tipo-pesquisa display-none" id="por-todos" name="tipo-pesquisa" value="por-autor">

					<label for="por-editora"  class="display-none">Por editora</label>
					<input type="radio" class="tipo-pesquisa display-none" id="por-editora" name="tipo-pesquisa" value="por-editora">
				</div>
						
				<label for="especifico">Por nome</label>
				<input type="radio" class="tipo-pesquisa" id="especifico" name="tipo-pesquisa" value="especifico">
			</div>

			<input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Digite aqui..." disabled> 
		</div>

		<button type="submit" class="btn btn-success">Pesquisar</button>
	</form>

<script>
	const livro = document.getElementsByClassName('pesquisa-escolha');
	const livroPesquisaOpcoes = document.getElementById('livro-pesquisa-opcoes');
	const tipoPesquisa = document.getElementsByClassName('tipo-pesquisa');
	const pesquisa = document.getElementById('pesquisa');

	const mostrarOpcoes = () => {
		const displayNone = document.getElementsByClassName("display-none");
		Array.from(displayNone).forEach((elemento) => {
			elemento.classList.remove('display-none');
		});
	};

	const tornarVisivel = () => {
		Array.from(livroPesquisaOpcoes.children).forEach((opcao) => {
			if (opcao.classList.contains('display-none')) {
				opcao.classList.remove('display-none');
			}
		});
	};

	const ocultar = () => {
		Array.from(livroPesquisaOpcoes.children).forEach((opcao) => {
			if (!opcao.classList.contains('display-none')) {
				opcao.classList.add('display-none');
			}
		});
	};

	const verificarOpcao = (e) => {
		if (e.target.id === 'livro') {
			tornarVisivel();
		} else {
			ocultar();
		}
	};

	const mostrarInput = (e) => {
		if (e.target.id !== 'todos') {
			pesquisa.disabled = false;
		} else {
			pesquisa.disabled = 'true';
		}
	};

	Array.from(livro).forEach((elemento) => {
		elemento.addEventListener('click', verificarOpcao);
	});


	Array.from(tipoPesquisa).forEach((opcao) => {
		opcao.addEventListener('click', mostrarInput);
	});
</script>
</section>
