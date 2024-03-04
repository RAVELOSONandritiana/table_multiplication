<?php
    session_start();
    $_SESSION['tour'] = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire</title>
</head>
<body>
    <?php
        $val_a = $_GET['a'];
        $_SESSION['indice_appuye'] = $_GET['indice_apuye'];
        $val_b = $_GET['b'];
        echo "<form action=\"traitement.php\" method=\"get\">";
            echo "<input type=\"numberA\" name=\"var_a\" value=$val_a>";
            echo "<input type=\"numberB\" name=\"var_b\"  value=$val_b>";
            echo "<button type=\"submit\">soumettre</button>";
        echo "</form>";    
    ?>

</body>
</html>
