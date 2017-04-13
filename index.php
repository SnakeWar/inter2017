<?php
/**
 * Created by PhpStorm.
 * User: Mayrc
 * Date: 08/04/2017
 * Time: 08:08
 */
<<<<<<< HEAD
include('templates/header.php'); 
include('templates/banco.php');
=======
include('templates/header.php');
include('templates/banco.php');



>>>>>>> 5504b6ea8bad3dd14ee9578b60ec91ac7cf605c7
?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/maxresdefault.jpg" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="img/geralteciri.jpg" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="img/geralt.jpg" alt="...">
            <div class="carousel-caption">
                ...
            </div>
        </div>
    </div>

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
<<<<<<< HEAD
                <?php 

                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = 1");
                    
                    $time = mysqli_fetch_array($result);

                    echo $time['nome']
                ?>
            </a>

        <?php
            $result = mysqli_query($link, "SELECT `time`.`nome` as nome_time, `jogador`.`nome`, `jogador`.`id_time` FROM `time` LEFT JOIN `jogador` ON `jogador`.`id_time` = `time`.`id`");
            
            while($jogador = mysqli_fetch_array($result)){
                
                if($jogador['id_time'] == 1){

                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
                
                }
            }
        ?>
=======
                Time A
            </a>
            <?php

            $query = mysqli_query($link, "SELECT `time`.`nome`, `jogador`.`nome`, `jogador`.`id_time` FROM `time` LEFT JOIN `jogador` ON `jogador`.`id_time` = `time`.`id`");
            $jogador =  mysqli_num_rows($result);
            $result = mysqli_fetch_array($query);
            var_dump($result);
            echo $jogador;


            mysqli_close($link);

            ?>
>>>>>>> 5504b6ea8bad3dd14ee9578b60ec91ac7cf605c7

        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
               <?php 

                    $result = mysqli_query($link, "SELECT `nome` FROM `time` WHERE `id` = 2");
                    
                    $time = mysqli_fetch_array($result);

                    echo $time['nome']
                ?>
            </a>
           <?php
            $result = mysqli_query($link, "SELECT `time`.`nome` as nome_time, `jogador`.`nome`, `jogador`.`id_time` FROM `time` LEFT JOIN `jogador` ON `jogador`.`id_time` = `time`.`id`");
            
            while($jogador = mysqli_fetch_array($result)){
                if($jogador['id_time'] == 2){

                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
                
                }
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

                    echo $time['nome']
                ?>
            </a>
            <?php
            $result = mysqli_query($link, "SELECT `time`.`nome` as nome_time, `jogador`.`nome`, `jogador`.`id_time` FROM `time` LEFT JOIN `jogador` ON `jogador`.`id_time` = `time`.`id`");
            
            while($jogador = mysqli_fetch_array($result)){
                if($jogador['id_time'] == 3){

                echo '<a href="#" class="list-group-item">' . $jogador['nome'] . '</a>';
                
                }
            }
        ?>
        </div>
    </div>
</div>

<div class="row titulo">
    <div class="col-md-6">
        <h1>Artilheiro</h1>
    </div>
    <div class="col-md-6">
        <h1>Jogos</h1>
    </div>
</div>
<div class="container-fluid top-score">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <?php
                $result = mysqli_query($link, "SELECT `jogador`.`nome`, `info_gol`.`jogador_id`, COUNT(`info_gol`.`jogador_id`) as gols FROM info_gol LEFT JOIN `jogador` ON `jogador`.`id` = `info_gol`.`jogador_id` GROUP BY `jogador_id` ORDER BY COUNT(`info_gol`.`jogador_id`) DESC");

                while($artilheiro = mysqli_fetch_array($result)){
                     echo   '<li class="list-group-item">
                    <span class="badge">' . $artilheiro['gols'] . '</span>' . $artilheiro['nome'] . '</li>';
                }

                    ?>

             
            </ul>
        </div>
        <div class="col-md-6">
            <div class="row">
               <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item centro">27/05/2017</li>
                        <li class="list-group-item centro">05/06/2017</li>
                        <li class="list-group-item centro">10/06/2017</li>
                        <li class="list-group-item centro">15/06/2017</li>
                        <li class="list-group-item centro">20/06/2017</li>
                        <li class="list-group-item centro">25/06/2017</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item centro">1 x 0</li>
                        <li class="list-group-item centro">2 x 0</li>
                        <li class="list-group-item centro">1 x 4</li>
                        <li class="list-group-item centro">5 x 2</li>
                        <li class="list-group-item centro">3 x 0</li>
                        <li class="list-group-item centro">1 x 2</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>
