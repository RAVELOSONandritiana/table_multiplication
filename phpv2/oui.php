<?php
session_start();
$in = $_GET['indice_supprimer'];
$_SESSION['tour'] = 2;
header("Location: traitement.php?in=$in");

?>