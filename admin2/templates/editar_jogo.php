<?php
	include('header.php');
	include('../../templates/banco.php');

$id_jogo = $_GET['id'];
var_dump($id_jogo);

	//FORM
if(!$_GET){

}
else
{
	if($_GET['data'] == "")
	{
		echo '<p class="bg-danger erro">Preencha os campos.</p>';
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
			echo '<p class="bg-danger erro">Campo Time (Casa) e Time (Visitante) são obrigatório e não podem conter o mesmo time</p>';
		}
		else
		{
			$query = "UPDATE `jogo` SET  `data` = $data, `placar_casa` = '$placar_casa', `placar_visitante` = '$placar_visitante', `time_casa` = '$time_casa', `time_visitante` = '$time_visitante' WHERE `id` = '$id_jogo'";


				mysqli_query($link, $query) or die(mysqli_error($link));
				/*header('location: ../index.php');*/
		}
	}
}
?>

	<!-- Editar Jogo -->
<div class="row times">
<div class="col-md-12">
<h1>Editar Jogo</h1>
<br>
<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Data</label>
    <input type="text" class="form-control" id="calendario" name="data" placeholder="">
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
			echo '<option value="' . $time['id'] . '">' . $time['nome'] . '</option>';
	}
    ?>
    </select>
     <label for="exampleInputName2">Placar Time da Casa</label>
    <input type="text" class="form-control" name="placar_casa" placeholder="">
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
</form>
</div>
</div>
								<!-- Fim Editar Jogo -->
<script>
	function voltar(){
		window.location = "index.php";
	};
	$(function() {
    $( "#calendario" ).datepicker();
});
</script>
<?php
	include('footer.php');
?>