<?php
	include('header2.php');
	include('../../templates/banco.php');

    $id_time = $_GET['id'];
    $resultado_query = "SELECT nome, pontos FROM time WHERE id = $id_time";

  $times = mysqli_query($link, $resultado_query) or die(mysqli_error($link));
  $time = mysqli_fetch_array($times);
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
<div class="col-md-6">
<br>
<h1>Editar Time</h1>
<br>
<form>
<input type="hidden" name="id" value="<?php echo $id_time ?>">
  <div class="form-group">
    <label for="exampleInputName2">Nome</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $time['nome'];?>" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Pontos</label>
    <input type="text" class="form-control" value="<?php echo $time['pontos'];?>" name="pontos" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary">Editar Time</button>
  <a class="btn btn-success" onclick="voltar()">Voltar</a>
</form>
<h1>Adicionar Jogador</h1>
<br>
<form onsubmit="add(e);">
<input type="hidden" name="id_time" value="<?php echo $id_time ?>">
  <div class="form-group">
    <label for="exampleInputName2">Nome</label>
    <input type="text" class="form-control" name="nome_jogador" value="" placeholder="">
  </div>
  <label for="exampleInputEmail2">Time</label>
    <?php
    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = '$id_time'");
    ?>
 <input type="text" class="form-control" name="time" value="<?php echo $time['nome'] ?>" placeholder="" disabled>
    <br>
  <button class="btn btn-primary">Adicionar</button>
  <a class="btn btn-success" onclick="voltar()">Voltar</a>
</form>
</div>
<div class="col-md-6">
<br>
<h1>Escalação</h1>
<br>
<div class="list-group">
            <a href="#" class="list-group-item active">
               <?php
                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = '$id_time'");
                    $time = mysqli_fetch_array($result);
                    echo $time['nome'];
                ?>
            </a>
            <?php
            $result = mysqli_query($link, "SELECT `nome` FROM `jogador` WHERE (`jogador`.`id_time` = '$id_time') ORDER BY `jogador`.`nome` ASC");

            while($jogador = mysqli_fetch_array($result)){
                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
            }
        ?>
        </div>
</div>
</div>
								      <!-- Fim Editar Jogo -->
<script>
	function voltar(){
		window.location = "tabela.php";
	};
  function add(){
    e.preventDefault();
    var nome == document.getElementsByName('nome_jogador');
    var time == document.getElementsByName('id_time');
    window.location = "addjogador.php?nome=" + nome + "time=" + time;
  };
</script>
<?php
	include('footer.php');
?>