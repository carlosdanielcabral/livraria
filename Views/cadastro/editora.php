<section style="padding: 20px;">
	<form action="../Controllers/cadastro-controller.php?tipo=editora" method="post" class="form">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome"> 
		</div>

		<div class="form-group">
			<label for="endereco">Endereço</label>
			<input type="text" class="form-control" id="endereco" name="endereco"> 
		</div>

		<div class="form-group">
			<label for="cidade">Cidade</label>
			<input type="text" class="form-control" id="cidade" name="cidade"> 
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email"> 
		</div>

		<div class="form-group">
			<label for="telefone">Telefone</label>
			<input type="tel" class="form-control" id="telefone" name="telefone"> 
		</div>

		<button type="submit" class="btn btn-success">Cadastrar</button>
	</form>
</section>