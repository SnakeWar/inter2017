<?php
	include('header2.php');
	include('../../templates/banco.php');

    $id_time = $_GET['id'];
    $resultado_query = "SELECT nome, pontos FROM time WHERE id = $id_jogo";

$times = mysqli_query($link, $resultado_query) or die(mysqli_error($link));
    $time = mysqli_fetch_array($jogos);
    /*$id_time_casa = $jogo['time_casa'];*/
unset($_GET['id']);

	//FORM
if(!$_GET){

}
else
{
	if($_GET['nome'] == null)
	{
		echo '<br><p class="bg-danger erro">Preencha o campo Nome.</p>';
	}
	else
	{
		$nome = $_GET['nome'];

		if($_GET['pontos'] == null)
		{
			echo '<br><p class="bg-danger erro">Preencha o campo Pontos</p>';
		}
		else
		{
      $pontos = $_GET['pontos'];
			$query = "UPDATE `time` SET `nome` = '$nome', `pontos` = '$pontos' WHERE `id` = '$id_time'";

				mysqli_query($link, $query) or die(mysqli_error($link));
				header('location: tabela.php');
		}
	}
}
?>

	<!-- Editar Jogo -->
<div class="row times">
<div class="col-md-12">
<br>
<h1>Editar Jogo</h1>
<br>
<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Nome</label>
    <input type="text" class="form-control" value="" name="nome" value="<?php echo $time['nome']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Pontos</label>
    <input type="text" class="form-control" value="<?php echo $time['pontos']?>" name="pontos" value="<?php echo $time['pontos']?>">
  </div>
<br>
  <button type="submit" class="btn btn-primary">Editar Time</button>
  <a class="btn btn-success" onclick="voltar()">Voltar</a>
</form>
</div>
</div>
								<!-- Fim Editar Jogo -->
<script>
	function voltar(){
		window.location = "tabela.php";
	};
</script>
<?php
	include('footer.php');
?>