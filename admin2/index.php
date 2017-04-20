<?php
	include('../templates/header2.php');
	include('../templates/banco.php');

	//FORM
if(!$_GET){

}
else
{
	if($_GET['data'] == "")
	{
		echo '<p class="bg-danger erro">Data não selecionada.</p>';
	}
	else
	{
		$data = $_GET['data'];
		$time_casa = $_GET['time_casa'];
		$time_visitante = $_GET['time_visitante'];

		if($time_casa == $time_visitante)
		{
			echo '<p class="bg-danger erro">Campo Time (Casa) e Time (Visitante) são obrigatório e não podem conter o mesmo time</p>';
		}
		else
		{
			$query = "INSERT INTO `jogo` (`data`, `placar_casa`, `placar_visitante`, `time_casa`, `time_visitante`) VALUES ('$data', '0', '0', '$time_casa', '$time_visitante')";


				mysqli_query($link, $query) or die(mysqli_error($link));
		}
	}
}
?>

							<!-- Começo Cadastro -->
<div class="row times">
<div class="col-md-12">
<h1>Cadastrar Jogo</h1>
<br>
<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Data</label>
    <input type="text" class="form-control" id="calendario" name="data" placeholder="">
  </div>
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
  </div>
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
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar Jogo</button>
</form>
</div>
</div>
								<!-- Fim Cadastro -->

							<!-- Começo Lista de Jogos -->
<div class="row times">
<div class="col-md-12">
<h1>Jogos</h1>
<br>
                    <table class="table table-striped">
                    <tr>
                        <th>Data</th>
                        <th>Time (Casa)</th>
                        <th>Placar</th>
                        <th>Time (Visitante)</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                        $result = mysqli_query($link, "SELECT tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
                            LEFT JOIN time tv ON tv.id = j.time_visitante
                            LEFT JOIN time tc ON tc.id = j.time_casa");

                    while ($jogos = mysqli_fetch_array($result))
                    {
                       echo '<tr><td>' . $jogos['data'] . '</td><td>' . $jogos['time_casa'] . '</td><td>' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td><td> <button type="submit" class="btn btn-success">Editar</button> <button type="submit" class="btn btn-danger">Excluir</button></td></tr>';
                    }
                    ?>
                    </table>
									<!-- Fim Lista de Jogos -->
<!-- Datepicker -->
<script>
$(function() {
    $( "#calendario" ).datepicker();
});
</script>

<?php
	mysqli_close($link);
	include('../templates/footer2.php');
?>