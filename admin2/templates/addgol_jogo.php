<?php
include('header2.php');
include('../../templates/banco.php');
$id_jogo = $_GET['id'];

$query = "SELECT j.id AS id_jogo, tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa AS placar_casa, j.placar_visitante AS placar_visitante, tc.id AS timec_id, tv.id AS timev_id FROM jogo  j
    LEFT JOIN time tv ON tv.id = j.time_visitante
    LEFT JOIN time tc ON tc.id = j.time_casa WHERE j.id = $id_jogo";
$jogos = mysqli_query($link, $query);
$jogo = mysqli_fetch_array($jogos);
$timea = $jogo['timec_id'];
$timeb = $jogo['timev_id'];
?>
<div class="row times">
<div class="col-md-4">
<br>
<h1>Gol(s) do Jogo</h1>
<br>
    <form action="add_gol.php" method="POST">
    <input type="hidden" name="id_jogo" value="<?php echo $id_jogo ?>">
        <div class="form-group">
            <label for="exampleInputEmail2">Jogador</label>
            <select class="form-control" name="jogador">
                <option></option>
                <?php

                $jogadores = mysqli_query($link, "SELECT id, nome, id_time FROM jogador WHERE (id_time = '$timea' OR id_time = '$timeb')");

                foreach($jogadores as $jogador){
                    echo '<option value="' . $jogador['id'] . '">' . $jogador['nome'] . '</option>';
                }
                ?>
            </select>
            <label for="exampleInputName2">Placar (Casa)</label>
            <input type="text" class="form-control" name="quantidade" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Gol</button>
    </form>
    <br>
    <button type="submit" class="btn btn-success" onclick="voltar()">Voltar</button>
</div>
       <div class="col-md-6">
<br>
<h1>Dados do Jogo</h1>
<br>
    <table class="table table-striped">
        <tr>
            <th>Data</th>
            <th>Time (Casa)</th>
            <th>Placar</th>
            <th>Time (Visitante)</th>
        </tr>
        <tr><td><?php echo $jogo['data'] ?></td><td><?php echo $jogo['time_casa'] ?></td><td><?php echo $jogo['placar_casa']?> X <?php echo $jogo['placar_visitante']?></td><td><?php echo $jogo['time_visitante']?></td></tr>
    </table>
    </div>
        <div class="col-md-2">
        <br>
         <h1>Artilheiro</h1>
         <br>
            <ul class="list-group">
             <a href="#" class="list-group-item active">Jogador<p class="direita">Gols</p></a>
                <?php
                $result = mysqli_query($link, "SELECT `info_gol`.`jogador_id`, SUM(`info_gol`.`quantidade`) as gols, `jogador`.`nome`
                FROM `jogador`
                    LEFT JOIN `info_gol` ON `info_gol`.`jogador_id` = `jogador`.`id`
                WHERE (`info_gol`.`quantidade` > 0) GROUP BY `jogador_id` ORDER BY SUM(`info_gol`.`quantidade`) DESC");

                while($artilheiro = mysqli_fetch_array($result)){
                     echo   '<li class="list-group-item">
                    <span class="badge">' . $artilheiro['gols'] . '</span>' . $artilheiro['nome'] . '</li>';
                }

                ?>
            </ul>
        </div>
        </div>
        <script type="text/javascript">
            function voltar(){
                window.location = "jogos.php";
            }
        </script>
<?php
mysqli_close($link);
include('footer.php')?>