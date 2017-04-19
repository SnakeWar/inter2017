<?php
/**
 * Created by PhpStorm.
 * User: Mayrc
 * Date: 08/04/2017
 * Time: 08:08
 */
include('templates/header.php');
include('templates/banco.php');

?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
<!--    <div class="carousel-inner" role="listbox">-->
<!--        <div class="item active">-->
<!--            <img src="img/maxresdefault.jpg" alt="...">-->
<!--            <div class="carousel-caption">-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <img src="img/geralteciri.jpg" alt="...">-->
<!--            <div class="carousel-caption">-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <img src="img/geralt.jpg" alt="...">-->
<!--            <div class="carousel-caption">-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<h1>Escalação dos Times</h1>

<div class="row times">

    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                <?php

                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = 1");
                    $time = mysqli_fetch_array($result);

                    echo $time['nome'];
                ?>
            </a>

        <?php
            $result = mysqli_query($link, "SELECT `nome`
                        FROM `jogador`
                        WHERE (`jogador`.`id_time` = 1)
                        ORDER BY `jogador`.`nome` ASC");
            while($jogador = mysqli_fetch_array($result)){
                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
            }
        ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
               <?php

                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = 2");
                    $time = mysqli_fetch_array($result);

                    echo $time['nome'];

                ?>
            </a>
           <?php
            $result = mysqli_query($link, "SELECT `nome`
FROM `jogador`
WHERE (`jogador`.`id_time` = 2)
ORDER BY `jogador`.`nome` ASC");
            
            while($jogador = mysqli_fetch_array($result)){
                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
            }
        ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
               <?php

                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = 3");
                    
                    $time = mysqli_fetch_array($result);

                    echo $time['nome'];
                ?>
            </a>
            <?php
            $result = mysqli_query($link, "SELECT `nome`
FROM `jogador`
WHERE (`jogador`.`id_time` = 3)
ORDER BY `jogador`.`nome` ASC");
            
            while($jogador = mysqli_fetch_array($result)){
                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
            }
        ?>
        </div>
    </div>
</div>

<div class="container-fluid top-score">
    <div class="row">
        <div class="col-md-2">
         <h1>Artilheiro</h1>
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
        <div class="col-md-4">
        <h1>Tabela</h1>
        <div class="list-group">
            <a href="#" class="list-group-item active">Time<p class="direita">Pontos</p></a>
                    <ul class="list-group">
                    <?php
                        $result = mysqli_query($link, "SELECT `nome`, `pontos` FROM `time` ORDER BY `pontos` DESC");
                        while ($classificacao = mysqli_fetch_array($result))
                    {
                            echo '<li class="list-group-item">' . $classificacao['nome'] . '<span class="badge">' . $classificacao['pontos'] . '</span></li>';
                    }
                    ?>
                    </ul>
        </div>
    </div>
    <div class="col-md-6">
       <h1>Jogos</h1>
                    <table class="table table-striped">
                    <tr>
                        <th>Data</th>
                        <th>Time (Casa)</th>
                        <th>Placar</th>
                        <th>Time (Visitante)</th>
                    </tr>
                    <?php
                        $result = mysqli_query($link, "SELECT tc.nome AS time_casa, tv.nome AS time_visitante, j.data AS data, j.placar_casa, j.placar_visitante FROM jogo  j
                            LEFT JOIN time tv ON tv.id = j.time_visitante
                            LEFT JOIN time tc ON tc.id = j.time_casa");

                    while ($jogos = mysqli_fetch_array($result))
                    {
                       echo '<tr><td>' . $jogos['data'] . '</td><td>' . $jogos['time_casa'] . '</td><td>' . $jogos['placar_casa'] . ' X ' . $jogos['placar_visitante'] . '</td><td>' . $jogos['time_visitante'] . '</td></tr>';
                    }
                    ?>
                    </table>
        </div>
    </div>
</div>

<?php
mysqli_close($link);
include('templates/footer.php'); ?>
