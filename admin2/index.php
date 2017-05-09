<?php
session_start();
include('../templates/banco.php');
$usuarios = mysqli_query($link, "SELECT nome,senha FROM usuario");

if(isset($_POST))
{
	$get_usuario = $_POST['usuario'];
	$get_senha = $_POST['senha'];


	unset($error);
	if(!empty($get_usuario) && !empty($get_senha))
	{
		foreach ($usuarios as $usuario)
		{
			if(($get_usuario == $usuario['nome']) && ($get_senha == $usuario['senha']))
			{

				$_SESSION['logged'] = true;
				$_SESSION['nome'] = $usuario['usuario'];
				header('location: templates/jogos.php');
			}
		}
		$error = 'Usuário e/ou senha inválidos';
	}
}
if(isset($error))
	{
		echo '<p class="bg-danger">' . $error . '</p>';
	}
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
				<form method="post">
					<div class="form-group">
						<label for="">Usuário</label>
						<input type="text" name="usuario" class="form-control" id="" placeholder="">
					</div>
					<div class="form-group">
						<label for="">Senha</label>
						<input type="password" name="senha" class="form-control" id="" placeholder="">
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