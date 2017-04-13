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

        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Cras justo odio
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Cras justo odio
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
</div>

<div class="row titulo">
    <div class="col-md-6">
        <h1>Top-Score</h1>
    </div>
    <div class="col-md-6">
        <h1>Jogos</h1>
    </div>
</div>
<div class="container-fluid top-score">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">20</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">15</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">14</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">10</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">8</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">5</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">4</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">4</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>
                    Cras justo odio
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                        <li class="list-group-item centro">Time A</li>
                        <li class="list-group-item centro">Time B</li>
                        <li class="list-group-item centro">Time C</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item centro">1 x 0</li>
                        <li class="list-group-item centro">2 x 0</li>
                        <li class="list-group-item centro">1 x 4</li>
                        <li class="list-group-item centro">5 x 2</li>
                        <li class="list-group-item centro">3 x 0</li>
                        <li class="list-group-item centro">1 x 2</li>
                    </ul>
                </div>
                <div class="col-md-4">
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
