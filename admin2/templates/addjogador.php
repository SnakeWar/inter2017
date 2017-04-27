<?php 
		include('../../templates/banco.php');
		$id_time = $_GET['id_time'];
		$nome_jogador = $_GET['nome_jogador'];
		var_dump($id_time);
		var_dump($nome_jogador);

if($_GET['id_time'] == null){
	/*echo '<br><p class="bg-danger erro">Preencha o campo Time.</p>';
	echo '<a class="btn btn-success" onclick="voltar()">Voltar</a>';
	echo '<script>
	function voltar(){
		window.location = "tabela.php";
	};
</script>';*/
}
else
{
	if($_GET['nome_jogador'] == null){

/*echo '<br><p class="bg-danger erro">Preencha o campo Nome.</p><br>';
echo '<a class="btn btn-success" onclick="voltar()">Voltar</a>';
echo '<script>
	function voltar(){
		window.location = "tabela.php";
	};
</script>';*/

	}
	else{
		
		/*$add = "INSERT INTO jogador (nome, id_time) VALUES ($nome_jogador, $id_time)";
		mysqli_query($link, $add) or die(mysqli_error($link));*/
		/*header('location: editar_time.php');*/

	}
}
?>