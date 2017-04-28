<?php 
include('../../templates/banco.php');
$id_jogador = $_GET['id'];
$select = "SELECT `id_time` AS id_time FROM `jogador` WHERE `id` = '$id_jogador'";
$id_time = mysqli_fetch_array($select);
$delete = "DELETE FROM `jogador` WHERE `jogador`.`id` = '$id_jogador'";
mysqli_query($link, $delete) or die(mysqli_error($link));
header('location: editar_time.php?id_time='$id_time['id_time']);
?>
