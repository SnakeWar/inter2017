<?php
	include('header2.php');
	include('../../templates/banco.php');

    $id_jogo = $_GET['id'];
    $resultado_query = "SELECT j.id AS id_jogo, tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa AS placar_casa, j.placar_visitante AS placar_visitante FROM jogo  j
    LEFT JOIN time tv ON tv.id = j.time_visitante
    LEFT JOIN time tc ON tc.id = j.time_casa WHERE j.id = $id_jogo";

$jogos = mysqli_query($link, $resultado_query) or die(mysqli_error($link));
    $jogo = mysqli_fetch_array($jogos);
    /*$id_time_casa = $jogo['time_casa'];*/
unset($_GET['id']);

	//FORM
if(!$_GET){

}
else
{
	if($_GET['data'] == null)
	{
		echo '<br><p class="bg-danger erro">Preencha os campos.</p>';
	}
	else
	{
		$data = $_GET['data'];
		$time_casa = $_GET['time_casa'];
		$time_visitante = $_GET['time_visitante'];
		$placar_casa = $_GET['placar_casa'];
		$placar_visitante = $_GET['placar_visitante'];

		if($time_casa == $time_visitante)
		{
			echo '<br><p class="bg-danger erro">Campo Time (Casa) e Time (Visitante) são obrigatório e não podem conter o mesmo time</p>';
		}
		else
		{

			$query = "UPDATE jogo SET `data` = '$data', `placar_casa` = '$placar_casa', `placar_visitante` = '$placar_visitante', `time_casa` = '$time_casa', `time_visitante` = '$time_visitante' WHERE `id` = '$id_jogo'";

				mysqli_query($link, $query) or die(mysqli_error($link));
				header('location: ../index.php');
		}
	}
}
?>

	<!-- Editar Jogo -->
<div class="row times">
<div class="col-md-6">
    <table class="table table-striped">
        <tr>
            <th>Data</th>
            <th>Time (Casa)</th>
            <th>Placar</th>
            <th>Time (Visitante)</th>
        </tr>
        <tr><td><?php echo $jogo['data'] ?></td><td><?php echo $jogo['time_casa'] ?></td><td><?php echo $jogo['placar_casa']?> X <?php echo $jogo['placar_visitante']?></td><td><?php echo $jogo['time_visitante']?></td></tr>
    </table>
    <br>
<h1>Editar Jogo</h1>
<br>
<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Data</label>
    <input type="text" class="form-control" id="calendario" value="" name="data" placeholder="">
  </div>
  <br>
    <br>
  <div class="form-group">
    <label for="exampleInputEmail2">Time Casa</label>
    <select class="form-control" name="time_casa">
    <option></option>
    <?php
		$times = mysqli_query($link, "SELECT `time`.`id`, `time`.`nome` FROM `time`");

		foreach($times as $time){

            $time_id = $time['id'];
			echo '<option value="' . $time['id'] . '">' . $time['nome'] . '</option>';
	}
    ?>
    </select>
     <label for="exampleInputName2">Placar Time da Casa</label>
        <input type="text" class="form-control" name="placar_casa" placeholder="">
        <input type="hidden" name="id" value="<?php echo $id_jogo ?>">
  </div>
  <br>
    <br>
   <div class="form-group">
    <label for="exampleInputName2">Time Visitante</label>
    <select class="form-control" name="time_visitante">
    <option></option>
     <?php
		foreach($times as $time){
			echo '<option value="' . $time['id'] . '">' . $time['nome'] . '</option>';
	}
    ?>
    </select>
     <label for="exampleInputName2">Placar Time Visitante</label>
    <input type="text" class="form-control" name="placar_visitante" placeholder="">
  </div>
    <br>
      <br>
  <button type="submit" class="btn btn-primary">Editar Jogo</button>
  <a class="btn btn-success" onclick="voltar()">Voltar</a>
</form>
</div>
</div>
								<!-- Fim Editar Jogo -->
<script>
	function voltar(){
		window.location = "jogos.php";
	};
	$(function() {
    $( "#calendario" ).datepicker();
});
</script>
<?php
	include('footer.php');
?>