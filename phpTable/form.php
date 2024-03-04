<?php
    session_start();
    $_SESSION['tour'] = 0;
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
        <form method="post" action="traitement.php">
            <input type="number" name="a">
            <input type="number" name="b">
                <button type="submit">
                    envoyer
                </button>
        </form>
</body>
</html>