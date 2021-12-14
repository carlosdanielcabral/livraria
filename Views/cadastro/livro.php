<section style="padding: 20px;">
	<form action="../Controllers/cadastro-controller.php?tipo=livro" method="post" class="form" enctype="multipart/form-data">
		<div class="form-group">
			<label for="titulo">Tíitulo</label>
			<input type="text" class="form-control" id="titulo" name="titulo"> 
		</div>

		<div class="form-group">
			<label for="editora">Total de Páginas</label>
			<input type="number" class="form-control" id="totalPaginas" name="totalPaginas"> 
		</div>

		<div class="form-group">
			<label for="editora">Edicao</label>
			<input type="text" class="form-control" id="edicao" name="edicao"> 
		</div>

		<div class="form-group">
			<label for="editora">ISBN</label>
			<input type="text" class="form-control" id="isbn" name="isbn"> 
		</div>

		<div class="form-group">
			<label for="editora">Ano</label>
			<input type="number" class="form-control" id="ano" name="ano"> 
		</div>

		<div class="form-group">
			<label for="editora">Editora</label>
			<input type="text" class="form-control" id="editora" name="editora"> 
		</div>
		
		<?php 
			if($erro === 'editora') {
		?>

		<small class="erro small text-danger">Esta editora não está cadastrada. Verifique o nome digitado.</small>

		<?php 
		}
		?>

		<div class="form-group">
			<label for="editora">Capa</label>
			<input type="file" class="form-control" id="fotoCapa" name="fotoCapa"> 
		</div>

		<div class="form-group">
			<label for="autor">Autor</label>
			<input type="text" class="form-control" id="autor" name="autor"> 
		</div>

		<button type="submit" class="btn btn-success">Cadastrar</button>

	</form>
</section>