<?
    session_destroy();
    session_start();
    $_SESSION['tour'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>formulaire</title>
</head>
<body>
    <div class="principale">
        <form method="post" action="traitement.php" class="form">
            table
            <input type="number" name="a">
            1 a ->
            <input type="number" name="b">
                <button type="submit">
                    envoyer
                </button>
        </form>
    </div>
</body>
</html>