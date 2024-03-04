<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>printTable</title>
</head>
<body>
    <?php

        session_start();

        if($_SESSION['tour'] == 0)
        {
            $_SESSION['vara'] = $_POST["a"];
            $_SESSION['varb'] = $_POST["b"];
        }

        $a = $_SESSION['vara'];
        $b = $_SESSION['varb'];

        echo "<h1>TABLE DE MULTIPLICATION</h1>";

        function createTab($a,$b)
        {
            $tableau[0] = [[0,0,0]];
            for($i = 1;$i <= $b;$i++)
            {
                $tableau[$i] = [$i,$a,$i*$a];
            }
            return $tableau;
        }

        function echoTab($tableau,$b)
        {
            for($i = 1;$i <= $b;$i++)
            {
                echo "<table border=\"1px solid black\">";
                    echo ($i%2)?"<tr id=\"impair\">":"<tr id=\"pair\">";
                        echo "<td>".$tableau[$i][0]."</td>";
                        echo "<td>".$tableau[$i][1]."</td>";
                        echo "<td>".$tableau[$i][2]."</td>";
                        $indice = $tableau[$i][0];
                        $table = $tableau[$i][1];//la table a executer
                        echo "<td><a href=oui.php?indice_supprimer=$i><button>supprimer</button><a href=modif.php?a=$indice&b=$table>modifier</a></td>";
                    echo "</tr>";
                echo "</table>";
            }
        }

        if($_SESSION['tour'] == 0)
        {
            $tableau = createTab($a,$b);
            $_SESSION['tableau_principale'] = $tableau;
        }

        elseif($_SESSION['tour'] == 1)
        {
            $A = $_GET['var_a'];
            $B = $_GET['var_b'];
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][0] = $B;
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][1] = $A;
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][2] = $B * $A;
        }

        elseif($_SESSION['tour'] == 2)
        {
            $in = $_GET['in'];
            array_splice($_SESSION['tableau_principale'],$in,1);
            $_SESSION['tour'] = 1;
        }

        echoTab($_SESSION['tableau_principale'],count($_SESSION['tableau_principale'])-1);

    ?>
</body>
</html>

