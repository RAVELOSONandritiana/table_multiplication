<?php
    session_start();
    $in = $_GET['indice_supprimer'];
    $_SESSION['tour'] = 2;
    echo "<a href=traitement.php?in=$in><button>oui</button></a>";
?>