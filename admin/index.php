<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Campeonato Altinão 2017</title>

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-material-design/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-material-design/css/ripples.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap-material-design/js/material.js"></script>
    <script src="../js/bootstrap-material-design/js/ripples.js"></script>

    <script>
        $.material.init();
    </script>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Created by PhpStorm.
 * User: jr
 * Date: 4/17/17
 * Time: 6:56 PM
 */


function __autoload($class_name)
{
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

    require $filename;
}

session_start();
if (isset($_SESSION['userLogged'])) {
    include_once("dash.php");
} else {
    include_once("views/login.php");
}

?>
</body>
</html>
