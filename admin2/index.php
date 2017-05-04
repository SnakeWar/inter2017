<?php
$paginaAtiva = "admin";
include('header.php');
?>
<div class="row">
<div class="col-md-4 centralizado">
</div>
	<div class="col-md-4 centralizado">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" id="" placeholder="">
					</div>
					<div class="form-group">
						<label for="">Senha</label>
						<input type="password" class="form-control" id="" placeholder="">
					</div>
					<button type="submit" class="btn btn-primary">ENTRAR</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4 centralizado">
</div>
<?php
include('footer.php');
?>