<section style="padding: 20px;">
	<form action="../Controllers/cadastro-controller.php?tipo=autor" method="post" class="form" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome"> 
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" name="email"> 
		</div>

		<div class="form-group">
			<label for="formacao">Formacao</label>
			<input type="text" class="form-control" id="formacao" name="formacao"> 
		</div>

		<div class="form-group">
			<label for="foto">Foto</label>
			<input type="file" class="form-control" id="foto" name="foto"> 
		</div>

		<button type="submit" class="btn btn-success">Cadastrar</button>
	</form>
</section>
