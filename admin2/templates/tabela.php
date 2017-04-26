<?php
$paginaAtiva = 'times';
include('header.php');
include('../../templates/banco.php');

if(!$_GET){

}
else{
	if($_GET['nome'] == null){

	}
	else{
	$nome = $_GET['nome'];
	$add = "INSERT INTO `time` (`nome`, `pontos`) VALUES ('$nome', '0')";

				mysqli_query($link, $add) or die(mysqli_error($link));
	}
}
?>
<div class="row times">

								<!-- Cadastrar Time -->

<div class="col-md-6">
<br>
<h1>Cadastrar Time</h1>
<br>
<form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Time</button>
    </form>
</div>
								<!-- FIM Cadastrar Time -->

								<!-- Editar Time -->
<div class="col-md-6">
<br>
    <h1>Editar Times</h1>
    <br>
 <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Gols</th>
            <th>Pontos</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = "SELECT nome, pontos, id FROM time ORDER BY pontos DESC";
        $times = mysqli_query($link, $result);
        foreach($times as $time){
        	echo '<tr><td>' . $time['nome'] . '</td><td></td><td>' . $time['pontos'] . '</td><td><button type="submit" class="btn btn-success" onclick="editar('. $time['id'] .')">Editar</button> <button type="submit" class="btn btn-danger" onclick="confirmacao('. $time['id'] .')">Excluir</button></td></tr>';
        }
        ?>
    </table>
    </div>

    							<!-- FIM Editar Time -->

    </div>
    <script>
  function confirmacao(id) {
  if (confirm("Deseja Realmente Excluir?") == true) {
  window.location = "remover_time.php?id=" + id;
  }
  else {
  
  }
  }
  function editar(id) {
  window.location = "editar_time.php?id=" + id;
  }
  </script>
<?php
include('footer.php');
?>
