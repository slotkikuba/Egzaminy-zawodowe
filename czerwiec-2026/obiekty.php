<?php

    include("polaczenie.php");

    $zap1 = 'SELECT nazwa FROM obiekty WHERE idRodzaj = 10 AND panstwo = "Islandia";';
    $odp1 = mysqli_query($conn, $zap1);

    $zap2 = 'SELECT nazwa FROM obiekty WHERE idRodzaj = 14 AND panstwo = "Islandia";';
    $odp2 = mysqli_query($conn, $zap2);

    $zap3 = 'SELECT idObiekt, plik, nazwa FROM obiekty WHERE panstwo = "Islandia";';
    $odp3 = mysqli_query($conn, $zap3);

    $idObiekt = $_GET['idObiekt'];

    $zap4 = 'SELECT o.plik, o.nazwa, o.nazwaCechy, O.wartoscCechy, o.opis, r.rodzaj FROM obiekty o JOIN rodzaje r ON r.idRodzaj = o.idRodzaj WHERE idObiekt = '. $idObiekt .';';
    $odp4 = mysqli_query($conn, $zap4);

?> 

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Islandia</title>
</head>
<body>
    <header>
        <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
    </header>
    <aside>
        <h3>Opis miejsca</h3>
        <ul>
            <li>Wodospady:
                <?php
                    echo "<ol>";
                    while ($row = mysqli_fetch_row($odp2)) {
                        echo '<li>'.$row[0].'</li>';
                    }
                    echo "</ol>";
                ?>
            </li>
            <li>Siedliska zwierząt:
                <?php
                    echo "<ol>";
                    while ($row = mysqli_fetch_row($odp1)) {
                        echo '<li>'.$row[0].'</li>';
                    }
                    echo "</ol>";
                ?>
            </li>
        </ul>
    </aside>
    <main>
        <h3>Opis Miejsca</h3>
        <section>
            <?php

                while($row = mysqli_fetch_assoc($odp4)) {
                    echo '<img src=" '.$row['plik'].'" alt=" '.$row['nazwa'].' "';
                    echo "<br>";
                    echo '<h2>'. $row['nazwa'] .'</h2>';
                    echo '<h3>'. $row['rodzaj'] .'</h3>';
                    echo '<p> '. $row['nazwaCechy'].': '. $row['wartoscCechy'] .' </p>';
                    echo '<p>'. $row['opis'] .'</p>';
                }

            ?>
        </section>
    </main>
    <footer>
        <hr>
        <p>Autor: Jakub Wiła</p>
    </footer>
</body>
</html>