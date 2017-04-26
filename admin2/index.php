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
		$get_placar_casa = $_GET['placar_casa'];
        $get_placar_visitante = $_GET['placar_visitante'];

		if($time_casa == $time_visitante)
		{
			echo '<p class="bg-danger erro">Campo Time (Casa) e Time (Visitante) são obrigatório e não podem conter o mesmo time</p>';
		}
		else
		{
			$query = "INSERT INTO `jogo` (`data`, `placar_casa`, `placar_visitante`, `time_casa`, `time_visitante`) VALUES ('$data', '$get_placar_casa', '$get_placar_visitante', '$time_casa', '$time_visitante')";


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
        <br>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail2">Time Casa</label>
            <select class="form-control" name="time_casa">
                <option></option>
                <?php
                $times = mysqli_query($link, "SELECT `time`.`id`, `time`.`nome` FROM `time`");

                foreach($times as $time){
                    echo '<option value="' . $time['id'] . '">' . $time['nome'] . '<?=($TipoBeneficiario == \'Selecione\')?\'selected\':\'\'?></option>';
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
        <button type="submit" class="btn btn-primary">Adicionar Jogo</button>
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
                        $result = mysqli_query($link, "SELECT j.id AS id_jogo, tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa AS placar_casa, j.placar_visitante AS placar_visitante FROM jogo  j
                            LEFT JOIN time tv ON tv.id = j.time_visitante
                            LEFT JOIN time tc ON tc.id = j.time_casa");

                    while ($jogos = mysqli_fetch_array($result))
                    {
                    	$post_id_jogo = $jogos['id_jogo'];
                        /*$post_time_casa = $jogos['time_casa'];
                        $post_placar_casa = $jogos['placar_casa'];
                        $post_time_visitante = $jogos['time_visitante'];
                        $post_placar_visitante = $jogos['placar_visitante'];*/
                       	echo '<tr><td>' . $jogos['data'] . '</td><td>' . $jogos['time_casa'] . '</td><td>' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td><td> <button type="submit" class="btn btn-success" onclick="editar('. $post_id_jogo . ')">Editar</button> <button type="submit" class="btn btn-danger" onclick="confirmacao(' . $post_id_jogo . ')">Excluir</button></td></tr>';
                    }
                    ?>
                    </table>
									<!-- Fim Lista de Jogos -->
<!-- Datepicker -->
<script>
$(function() {
    $( "#calendario" ).datepicker();
});
  function confirmacao(id) {
  if (confirm("Deseja Realmente Excluir?") == true) {
  window.location = "remover_jogo.php?id=" + id;
  }
  else {
  
  }
  }
  function editar(id) {
  window.location = "templates/editar_jogo.php?id=" + id;
  }
  </script>
<?php
	mysqli_close($link);
	include('../templates/footer2.php');
?>