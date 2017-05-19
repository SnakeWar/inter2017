<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Campeonato Altinão 2017</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Meu Estilo -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="page-header">
        <ul class="nav nav-pills gran-menu">
            <li role="presentation" class="<?php echo ($paginaAtiva=='home')?'active':''; ?>"><a href="index.php">HOME</a></li>
            <li role="presentation" class="<?php echo ($paginaAtiva=='admin')?'active':''; ?>"><a href="admin2/index.php">ADMIN</a></li>
        </ul>
        <ul class="nav nav-pills min-menu">
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger menu-icon"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-large">
                    <ul class="nav nav-pills nav-stacked ">
                        <li role="presentation" class="active"><a href="#">HOME</a></li>
                        <li role="presentation"><a href="admin2/index.php">ADMIN</a></li>
                    </ul>
                </ul>
            </li>
            <img src="../img/logo.png">
        </ul>
        </div>