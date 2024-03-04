<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>printTable</title>
</head>
<body>
    <?php
        session_start();
        if($_SESSION['tour'] == 0)
        {
            $_SESSION['vara'] = $_POST["a"];
            $_SESSION['varb'] = $_POST["b"];
            erreur($_SESSION['vara'],$_SESSION['varb'],"form.php");
            erreurNegatif($_SESSION['varb'],"form.php");
            $tableau = createTab($_SESSION['vara'],$_SESSION['varb']);
            $_SESSION['tableau_principale'] = $tableau;
        }
        $a = $_SESSION['vara'];
        $b = $_SESSION['varb'];

        function createTab($a,$b)
        {
            $tableau[0] = [[0,0,0,0]];
            for($i = 1;$i <= $b;$i++)
            {
                $tableau[$i] = [$i,$a,$i*$a,$i];
            }
            return $tableau;
        }

        function echoTab($tableau)
        {
            for($i = 1;$i < count($tableau);$i++)
            {
                echo "<table>";
                    echo ($i%2)?"<tr id=\"impair\">":"<tr id=\"pair\">";
                        echo "<td>".$tableau[$i][0]."</td>";
                        echo "<td>".$tableau[$i][1]."</td>";
                        echo "<td>".$tableau[$i][2]."</td>";
                        $indice = $tableau[$i][0];
                        $table = $tableau[$i][1];//la table a executer
                        $h = $tableau[$i][3];
                        echo "<td><a href=oui.php?indice_supprimer=$i><button>supprimer</button><a href=modif.php?a=$indice&b=$table&indice_apuye=$h>modifier</a></td>";
                    echo "</tr>";
                echo "</table>";
            }
        }

        if($_SESSION['tour'] == 1)
        {
            $A = $_GET['var_a'];
            $B = $_GET['var_b'];
            erreur($A,$B,"modif.php");
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][0] = $A;
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][1] = $B;
            $_SESSION['tableau_principale'][$_SESSION['indice_appuye']][2] = $B * $A;
        }
        elseif($_SESSION['tour'] == 2)
        {
            $in = $_GET['in'];
            array_splice($_SESSION['tableau_principale'],$in,1);
            $_SESSION['tour'] = 1;
            if(count($_SESSION['tableau_principale']) == 1)
            {
                session_destroy();
                header("Location: form.php");
            }
        }

        function erreur($a,$b,$site)
        {
            if($a == "" || $b == "")
            {
                header("Location: ".$site);
            }
        }

        function erreurNegatif($a,$site)
        {
            if($a < 0)
            {
                header("Location: ".$site);
            }
        }
        echoTab($_SESSION['tableau_principale']);
    ?>
</body>
</html>

