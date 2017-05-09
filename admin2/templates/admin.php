<?php
session_start();
if (!isset($_SESSION['logged'])) {
header('location:../index.php');
}
$paginaAtiva = "admin";
include('header.php');
?>
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<a href="../logout.php" class="btn btn-success btn-lg largo">Sair</a>
	</div>
	<div class="col-md-4">
	</div>

</div>

<?php
include('footer.php');
?>